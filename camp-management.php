<?php
/*
Site camp-management page, composed of the templates below
*/

//page header
include("Templates/header.php");

session_start();

if (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"] ||
   !isset($_SESSION["access_granted"])) {
  $_SESSION["status"] = "Login as a Camp Administrator to Access Camp Management";
  header("Location:admin-login.php");
}
?>

<a class=rightfloatred href="logout-handler.php">Logout</a>

<?php
require_once 'Dao.php';
$dao = new Dao();
$camps = $dao->getSessionsForAdmin($_SESSION["email_preset"]);

foreach ($camps as $camp) {
  echo "<h3>{$camp['camp_name']}</h3>";
  echo "<p>Date and Time: {$camp['start_date']} to {$camp['end_date']}</p>";
  echo "<p>{$camp['description']}</p>";
  echo "<p>{$camp['isActive']}</p>";
  echo "<p>{$camp['session_id']}</p>";
  $checked = "";

switch ($camp['isActive']) {
    case 1:
        $checked = "Make This Session Inactive";
        break;
    case 0:
        $checked = "Make This Session Active";
        break;
}

  echo "<p><a href=\"management-handler.php?id={$camp['session_id']}&&active={$camp['isActive']}\"><b>$checked</b></a></p>";
  echo "</br>";
}

//footer
include("Templates/footer.html")
?>