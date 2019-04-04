<?php 
/*
Site contact page, composed of the templates below
*/
session_start();
//page header
include("Templates/header.php");

$name = "";
  if (isset($_SESSION["name_preset"])) {
    $name = $_SESSION["name_preset"];
  }

$email = "";
  if (isset($_SESSION["email_preset"])) {
    $email = $_SESSION["email_preset"];
  }

$message = "";
  if (isset($_SESSION["message_preset"])) {
    $message = $_SESSION["message_preset"];
}
//main content
?>
<div id="content">
    <div id="feature">
        <p class="eyecatcher">Contact Us</p>
        <form action="email-handler.php" method="POST">
            <p>
            <label for='name'>Name: </label><br>
            <input type="text" id="name" name="name" value = "<?php echo $name; ?>"/>
            </p>
           <?php
            if (isset($_SESSION["name_status"])) {
                echo "<p class=\"error\">{$_SESSION["name_status"]}</p>";
                unset($_SESSION["name_status"]);
            }
            ?>
           
            <p>
                <label for='email'>Email: </label><br>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>"/>
            </p>
            <?php
            if (isset($_SESSION["email_status"])) {
                echo "<p class=\"error\">{$_SESSION["email_status"]}</p>";
                unset($_SESSION["email_status"]);
            }
            ?>
            <p>
                <label for='message'>Your message here: </label><br>
                <input type="text" id="message" name="message" value = "<?php echo $message; ?>"/>
            </p>
            <?php
            if (isset($_SESSION["message_status"])) {
                echo "<p class=\"error\">{$_SESSION["message_status"]}</p>";
                unset($_SESSION["message_status"]);
            }
            ?>

            <input type="submit" value="Send">

        </form>
    </div>
</div>
<?php
//carousel content
include("Templates/campCarousel.php");
//footer
include("Templates/footer.html")
?>