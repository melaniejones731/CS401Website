<?php 
/*
Site Provider FAQ page, composed of the templates below
*/

//page header
include("templates/header.html");
//main content
include("views/about-providers.html");
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
                //about Parents Card
                include("templates/parentBox.html")
                ?>
            </div>
        </div>
<? 
//footer
include("templates/footer.html")
?>