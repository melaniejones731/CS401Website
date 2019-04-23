<?php
// search_handler handles all camp searches throughout the site, regardless of where they originate from
session_start();

if(empty($_GET["category"]) && empty($_GET["attributes"]) && empty($_GET["ages"]) && empty($_GET["time"]) && empty($_GET["datestart"]) && empty($_GET["dateend"])){
    $_SESSION["empty_search"] = true;
    header("Location: ../search-camps.php");
}
else{
    $_SESSION["empty_search"] = false;
    $_SESSION["category"] = $_GET['category'];
    $_SESSION["age"] = $_GET['ages'];
    $_SESSION["attributes"] = $_GET['attributes'];
    
    $_SESSION["search_string"] = '';
    $list = '';
    if (!empty($_GET["category"])){
        foreach ($_GET['category'] as $cat){
            $list = $list . "'".$cat . "', ";
        }
        $list = rtrim($list, ", ");
        $list= ' category.category_name IN ('.$list.') AND';
    }
    if(!empty($_GET["ages"])){
        $ages = '';
        foreach($_GET['ages'] as $age){
            if($age==0){
                $ages = $ages . "'0-4'" . ", ";
            }
            if($age==5){
                $ages = $ages . "'5-7'" . ", ";
            }
            if($age==8){
                $ages = $ages . "'8-11'" . ", ";
            }
            if($age==12){
                $ages = $ages . "'12+'" . ", ";
            }
        }
        $ages = rtrim($ages, ", ");
        $list= $list . ' age.age_name IN ('.$ages.') AND';
    }
    if (!empty($_GET["attributes"])){
        $attrs = '';
        foreach ($_GET["attributes"] as $attr){
            $attrs = $attrs . "'".$attr . "', ";
        }
        $attrs = rtrim($attrs, ", ");
        $list=  $list . ' attribute.attribute_name IN ('.$attrs.') AND';
    }
    if (!empty($_GET["time"])){
        $times = '';
        foreach ($_GET['time'] as $time){
            $times = $times . "'".$time . "', ";
        }
        $times = rtrim($times, ", ");
        $list=  $list . ' attribute.attribute_name IN ('.$times.') AND';
    }
    if (!empty($_GET["datestart"])){
        $datestart = $_GET["datestart"];
        $list=  $list . ' session.end_date >= \''.$datestart.'\' AND';
    }
    if (!empty($_GET["dateend"])){
        $dateend = $_GET["dateend"];
        $list=  $list . ' session.start_date <= \''.$dateend.'\' AND';
    }

    $list = rtrim($list, " AND");
    
    $_SESSION["search_string"] = $list; 
    header("Location: ../search-camps.php"); 
}
?>