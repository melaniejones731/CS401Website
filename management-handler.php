<?php
/*
handler for processing changes to camp status. 
*/
session_start();
//retrieve values from the submitted request
$_SESSION['id'] = $_GET['id'];
if ((isset($_GET['id']))) 
{
    $sessionID =$_GET['id'];
    require_once 'Dao.php';
    $dao = new Dao();
    $active = $dao->getSessionStatus($sessionID);
    
    switch ($camp['isActive']) {
        case 1:
        $dao = new Dao();
        $dao->setSessionStatus($sessionID, 0);
        header("Location: camp-management.php");
            break;
        case 0:
        $dao = new Dao();
        $dao->setSessionStatus($sessionID, 1);
        header("Location: camp-management.php");
            break;
    }   
}
else {
echo '<p class ="error">This page was accessed in error. <a href="camp-management.php">Return to Camp Management</a></p>';
exit();
}

