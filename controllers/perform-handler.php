<?php
// perform-handler populates a query for a carousel box.
session_start();
$_SESSION["empty_search"] = false;
$_SESSION["search_string"] = "category.category_name IN ('music, theater, dance')"; 
header("Location: ../search-camps.php"); 

?>