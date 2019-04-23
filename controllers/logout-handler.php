<?php
// logout-handler.php sets session variables when user logs out and destroys session
session_start();
$_SESSION["access_granted"] = false;
$_SESSION["email_preset"] = null;
session_destroy();
header("Location: ../index.php");
?>