<?php
/*
handler for processing changes to camp status. 
checks if user is valid, processes request
*/
session_start();
//retrieve values from the submitted request
$_SESSION['id'] = $_GET['id'];
$_SESSION['active']=$_GET['active'];
if ((isset($_GET['id']))) 
{
    $sessionID =$_GET['id'];
    $sessionActive = $_GET['active'];
    require_once 'controllers/Dao.php';
    $dao = new Dao();
    $active = $dao->getSessionStatus($sessionID);

    
    
    if($_GET['active']==0){
        $dao = new Dao();
        $dao->setSessionStatus($sessionID, 1);
        unset($_SESSION['id']);
        unset($_SESSION['active']);
        header("Location: ../camp-management.php");
    }
    else if($_GET['active']==1){
        $dao = new Dao();
        $dao->setSessionStatus($sessionID, 0);
        unset($_SESSION['id']);
        unset($_SESSION['active']);
        header("Location: ../camp-management.php");
    }
    
}
else {
echo '<p class ="error">This page was accessed in error. <a href="camp-management.php">Return to Camp Management</a></p>';
exit();
}

