<?php 
/*
Site About Us page, composed of the templates below
*/

//page header
include("Templates/header.php");

//main content
include("Views/about-tv-kids-guide.html");

?>
<div id="carousel">
    <div class="biCard biCard1">
        <a href="about-parents.php">Parent FAQs</a>
    </div>
    <div class="biCard biCard2">
        <a href="about-providers.php">Camp Provider FAQs</a>
    </div>
</div>

<? 
//footer
include("Templates/footer.html")
?>