<?php
// search_handler
session_start();

if(empty($_POST["category"]) && empty($_POST["attributes"]) && empty($_POST["ages"]) && empty($_POST["time"]) && empty($_POST["datestart"]) && empty($_POST["dateend"])){
    $_SESSION["empty_search"] = true;
    header("Location:search-camps.php");
}
else{
    $_SESSION["empty_search"] = false;
    $_SESSION["category"] = $_POST["category"];
    header("Location:search-camps.php"); 
}
?>