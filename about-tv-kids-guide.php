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
    <div class="biCard">
        <img src="Styles/images/parent-faq629x420.jpg" style="width:100%">
        <div class=container>    
            <h2><a href="about-parents.php" >Parent FAQs</a></h2>
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