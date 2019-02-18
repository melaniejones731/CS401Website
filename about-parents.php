<?php 
/*
Site Parent FAQ page, composed of the templates below
*/

//page header
include("Templates/header.php");

//main content
include("Views/about-parents.html");
?>
<div id="carousel">
    <div class="biCard">
    <img src="Styles/images/about-us629x420.jpg" style="width:100%">
        <div class=container>
            <h2><a href="about-tv-kids-guide.php">About TVKids Guide</a></h2>
        </div>
    </div>
    <div class="biCard">
        <img src="Styles/images/camp-provider630x417.jpg" style="width:100%">
        <div class=container>
            <h2><a href="about-providers.php">Provider FAQs</a></h2>
        </div>
    </div>
</div>
<? 
//footer
include("Templates/footer.html")
?>