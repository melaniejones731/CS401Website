<?php
/*
many thanks to this post: http://form.guide/email-form/php-form-to-email.html 
*/

//retrieve values from the submitted form
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$message = $_POST['message'];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $problem=false;

    if(empty($_POST['name'])){
        $problem=true;
        print '<p>Please enter your name</p>';
    }

    if(empty($_POST['email'])){
        $problem=true;
        print '<p>Please enter your email</p>';
    }
    if(empty($_POST['message'])){
        $problem=true;
        print '<p>Please enter a message</p>';
    }
    if(IsInjected($visitor_email)){
        $problem=true;
        echo "Ooops! This email appears to be invalid - please check the email you entered and try again.";
        exit;
    }
    //if(longMessage($message)){
      //  $problem=true;
        //print '<p>The message must be less than 500 characters.</p>'
    //}

    if(!$problem){
        //create an emailish object out of the submitted values
        $email_from = 'melaniejones4191@gmail.com';
        $email_subject = "New Form submission";
        $email_body = "You have received a new message from the user $name.\n".
        "Here is the message:\n $message".
        
        //create the values that are needed to send an email, and use mailto to send.
        $to = "melaniejones4191@gmail.com";
        $headers = "From: $email_from \r\n";
        $headers .= "Reply-To: $visitor_email \r\n";
        mail($to,$email_subject,$email_body,$headers);
        
        }    
    }
    
    function IsInjected($str)
        {
            $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
        );
        $inject = join('|', $injections);
        $inject = "/$inject/i";
        if(preg_match($inject,$str))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

?>