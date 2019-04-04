<?php
// search_handler
session_start();

if(empty($_GET["category"]) && empty($_GET["attributes"]) && empty($_GET["ages"]) && empty($_GET["time"]) && empty($_GET["datestart"]) && empty($_GET["dateend"])){
    $_SESSION["empty_search"] = true;
    header("Location:search-camps.php");
}
else{
    $_SESSION["empty_search"] = false;
    $_SESSION["category"] = $_GET['category'];
    $_SESSION["age"] = $_GET['age'];
    
    $_SESSION["search_string"] = '';
    $list = '';
    foreach ($_GET['category'] as $cat){
        $list = $list . "'".$cat . "', ";
    }
    $list = rtrim($list, ", ");
    $list= ' category.category_name IN ('.$list.')';
    
    //$ages = '';
    //foreach($_GET['age'] as $age){
      //  $ages = $ages."'".$age."', ";
    //}
    //$ages = rtrim($ages, ", ");
    //$list=$list.' AND age.age_name IN('.$ages.')';
    
        

    //rtrim($list, "or");
    $_SESSION["search_string"] = $list; 
    header("Location:search-camps.php"); 
}
?>