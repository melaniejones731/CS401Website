<?php
// search_handler
session_start();

if(empty($_POST["category"]) && empty($_POST["attributes"]) && empty($_POST["ages"]) && empty($_POST["time"]) && empty($_POST["datestart"]) && empty($_POST["dateend"])){
    $_SESSION["empty_search"] = true;
    header("Location:search-camps.php");
}
else{
    $_SESSION["empty_search"] = false;
    $_SESSION["category"] = $_POST['category'];
    
    $_SESSION["search_string"] = '';
    $list = '';
    $options = $_GET['category'];
    $append=str_replace("\\","",$options);
    $list= ' category.category_name IN (\'' .$_SESSION["category"]. '\')';
    //$list = $list .' category.category_name in (\''.$append.'\')';
        
    
    
    //rtrim($list, "or");
    $_SESSION["search_string"] = $list; 
    header("Location:search-camps.php"); 
}
?>