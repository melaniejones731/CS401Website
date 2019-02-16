<?php 
/*
Site About Us page, composed of the templates below
*/

//page header
include("Templates/header.html");
//main content
include("Views/about-tv-kids-guide.html");
?>
<div id="carousel">
        <div class="biCard biCard1">
                <?php
                //about TV Kids Guide Card
                include("Templates/parentBox.html")
                ?>
            </div>
            <div class="biCard biCard2">
                <?php
                //about Camp Providers Card
                include("Templates/providerBox.html")
                ?>
            </div>
        </div>
<? 
//footer
include("Templates/footer.html")
?>