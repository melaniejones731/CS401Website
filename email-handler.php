<?php
/*
handler for processing the contact us form as email.
many thanks to this post: http://form.guide/email-form/php-form-to-email.html 
*/
session_start();

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
//retrieve values from the submitted form
$name = sanitized($_POST['name']);
$visitor_email = sanitized($_POST['email']);
$message = sanitized($_POST['message']);

$_SESSION["name_preset"] = $name;
$_SESSION["email_preset"] = $visitor_email;
$_SESSION["message_preset"] = $message;


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $problem=false;

    if(empty($_POST['name'])){
        $problem=true;
        $name_status = "Please enter your name";
        $_SESSION["name_status"] = $name_status;
        header("Location:contact-us.php");
    }

    if(empty($_POST['email'])){
        $problem=true;
        $email_status = "Please enter your email";
        $_SESSION["email_status"] = $email_status;
        header("Location:contact-us.php");
    }
    if(empty($_POST['message'])){
        $problem=true;
        $message_status = "Please enter a message";
        $_SESSION["message_status"] = $message_status;
        header("Location:contact-us.php");
    }
    if(IsInjected($visitor_email)){
        $problem=true;
        $email_status =  "Ooops! This email appears to be invalid - please check the email you entered and try again";
        $_SESSION["message_status"] = $message_status;
        header("Location:contact-us.php");
        exit;
    }
    //if(longMessage($message)){
      //  $problem=true;
        //print '<p>The message must be less than 500 characters.</p>'
    //}

    if(!$problem){
        //create an emailish object out of the submitted values
        unset($_SESSION["email_preset"]);
        unset($_SESSION["name_preset"]);
        unset($_SESSION["message_preset"]);

        $email_from = 'melaniejones4191@gmail.com';
        $email_subject = "New Form submission";
        $email_body = "You have received a new message from the user $name.\n".
        "Here is the message:\n $message".
        
        //create the values that are needed to send an email, and use mailto to send.
        $to = "melaniejones4191@gmail.com";
        $headers = "From: $email_from \r\n";
        $headers .= "Reply-To: $visitor_email \r\n";
        mail($to,$email_subject,$email_body,$headers);
        header("Location:index.php");
        
    }    
}

function IsInjected($str){
    $injections = array('(\n+)',
    '(\r+)',
    '(\t+)',
    '(%0A+)',
    '(%0D+)',
    '(%08+)',
    '(%09+)');
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str))
    {
        return true;
    }
    else{
        return false;
        }
}

?>