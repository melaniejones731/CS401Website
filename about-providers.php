<?php 
/*
Site Provider FAQ page, composed of the templates below
*/

//page header
include("Templates/header.php");

//main content
include("Views/about-providers.html");
?>
<div id="carousel">
    <div class="biCard">
        <img src="Styles/images/about-us629x420.jpg" style="width:100%">
        <div class=container>
            <h2><a href="about-tv-kids-guide.php">About TVKids Guide</a></h2>
        </div>
    </div>
    <div class="biCard">
        <img src="Styles/images/parent-faq629x473.jpg" style="width:100%">
        <div class=container>    
            <h2><a href="about-parents.php" >Parent FAQs</a></h2>
        </div>
    </div>
</div>
<? 

//footer
include("Templates/footer.html")
?>