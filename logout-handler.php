<?php
// logout-handler.php
session_start();
$_SESSION["access_granted"] = false;
$_SESSION["email_preset"] = null;
session_destroy();
header("Location:index.php");
?>