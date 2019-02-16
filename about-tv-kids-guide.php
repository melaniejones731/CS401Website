<?php 
/*
Site About Us page, composed of the templates below
*/

//page header
include("templates/header.html");
//main content
include("views/about-tv-kids-guide.html");
?>
<div id="carousel">
        <div class="biCard biCard1">
                <?php
                //about TV Kids Guide Card
                include("templates/parentBox.html")
                ?>
            </div>
            <div class="biCard biCard2">
                <?php
                //about Camp Providers Card
                include("templates/providerBox.html")
                ?>
            </div>
        </div>
<? 
//footer
include("templates/footer.html")
?>