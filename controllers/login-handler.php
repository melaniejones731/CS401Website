<?php
// login_handler.php sets session variables when user logs in
session_start();

require_once 'Dao.php';


function sanitized($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
  }

$dao = new Dao();
$user = sanitized($_POST["username"]);
$password = sanitized($_POST["password"]);
$hashes = $dao->getUserPassword($user);
$hash = '';

if($hashes->fetchColumn()>0){
  
  foreach ($hashes as $hash) {
      $hash = $hashes['password'];
    }
   
}

//validate the data

if(empty($_POST["username"])){
  $status = "Please enter a valid email.";
  $_SESSION["status"] = $status;
  $_SESSION["access_granted"] = false;
  header("Location: ../admin-login.php");
}
else if(empty($_POST["password"])){
  $status = "Please enter a valid password.";
  $_SESSION["status"] = $status;
  $_SESSION["email_preset"] = $user;
  $_SESSION["access_granted"] = false;
  header("Location:../admin-login.php");
}
//success!
else if ($hash = $password) {
      $_SESSION["access_granted"] = true;
      $_SESSION["email_preset"] = $user;
      header("Location: ../camp-management.php");
} 
//hmmm...maybe a bad email or password?
else {
  $status = "That email and password combination doesn't exist in our records. Try again, or contact us for assistance.";
  $_SESSION["status"] = $status;
  $_SESSION["email_preset"] = $user;
  $_SESSION["access_granted"] = false;
  header("Location: ../admin-login.php");
}
?>