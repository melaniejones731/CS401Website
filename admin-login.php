<?php 
/*
Site admin login page, composed of the templates below
*/

//page header
include("Templates/header.php");


// login.php
session_start();

  if (isset($_SESSION["access_granted"]) && $_SESSION["access_granted"]) {
    header("Location:camp-management.php");
  }

  $email = "";
  if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
  }
?>

<html>
  <head></head>
  <body>
  <div id="content">
    <div id="feature">
    <p class = "eyecatcher">Camp Administrator Login</p>

    <form action="login-handler.php" method="POST">
      <p>
        <label for="username">Email: </label>
        <input type="text" name="username" id="username" value="<?php echo $email; ?>"/>
    </p>
      <p>
       <label for="password">Password: </label>
        <input type="password" name="password" id="password" value=""/>
    </p>
    <?php
    if (isset($_SESSION["status"])) {
        echo $_SESSION["status"];
        unset($_SESSION["status"]);
      }
    ?>
      <p>
        <input type="submit" name="submit" id="login" value="Login"/>
    </p>
    </form>
</div>
</div>
  </body>
</html>

<?php 

//footer
include("Templates/footer.html")
?>