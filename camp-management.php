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

<a href="logout-handler.php">Logout</a>

<?php
require_once 'Dao.php';
$dao = new Dao();
$camps = $dao->getSessionsForAdmin($_SESSION["email_preset"]);
echo "<table id='camps'>";
foreach ($camps as $camp) {
  echo "<tr><td>{$camp['camp_name']}</td><td>{$camp['description']}</td></tr>";
}
echo "</table>";

//footer
include("Templates/footer.html")
?>