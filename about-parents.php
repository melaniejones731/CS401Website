<?php 
/*
Site Parent FAQ page, composed of the templates below
*/

//page header
include("templates/header.html");
//main content
include("views/about-parents.html");
?>
<div id="carousel">
        <div class="biCard biCard1">
                <?php
                //about TV Kids Guide Card
                include("templates/tvBox.html")
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