<?php
// sport-handler
session_start();
$_SESSION["empty_search"] = false;
$_SESSION["search_string"] = "category.category_name IN ('sports')"; 
header("Location:search-camps.php"); 

?>