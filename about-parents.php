<?php 
/*
Site Parent FAQ page, composed of the templates below
*/

//page header
include("Templates/header.html");
//main content
include("Views/about-parents.html");
?>
<div id="carousel">
        <div class="biCard biCard1">
                <?php
                //about TV Kids Guide Card
                include("Templates/tvBox.html")
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