<?php
// login_handler.php
session_start();

require_once 'Dao.php';
$dao = new Dao();
$count = $dao->userIsValid($_POST["username"], $_POST["password"]);


//validate the data
if(empty($_POST["username"])){
  $status = "Please enter a valid email.";
  $_SESSION["status"] = $status;
  $_SESSION["access_granted"] = false;
  header("Location:admin-login.php");
}
else if(empty($_POST["password"])){
  $status = "Please enter a valid password.";
  $_SESSION["status"] = $status;
  $_SESSION["email_preset"] = $_POST["username"];
  $_SESSION["access_granted"] = false;
  header("Location:admin-login.php");
}
//success!
else if ($count->fetchColumn()>0) {
      $_SESSION["access_granted"] = true;
      $_SESSION["email_preset"] = $_POST["username"];
      header("Location:camp-management.php");
} 
//hmmm...maybe a bad email or password?
else {
  $status = "That email and password combination doesn't exist in our records. Try again, or contact us for assistance.";
  $_SESSION["status"] = $status;
  $_SESSION["email_preset"] = $_POST["username"];
  $_SESSION["access_granted"] = false;

  header("Location:admin-login.php");
}
?>