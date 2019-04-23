<?php
// teen_handler populates a query for a carousel box.
session_start();
$_SESSION["empty_search"] = false;
$_SESSION["search_string"] = "age.age_name = '12+'"; 
header("Location: ../search-camps.php"); 

?>