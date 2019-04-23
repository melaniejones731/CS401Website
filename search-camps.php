<?php 
/*
Site search page, composed of the templates below
*/

//page header
include("Templates/header.php");
session_start();

//main content
?>

<div id="searchContainer">
    <div class="leftSidePane">
    
        <form action="search-handler.php" method="GET">
            <p> 
                <label for='category'>Categories: </label><br>
                <select multiple name="category[ ]" size="3" >
                <option value="academic">Academic</option>
                <option value="art">Art</option>
                <option value="cooking">Cooking & Health</option>
                <option value="dance">Dance</option>
                <option value="imaginative play">Imaginative Play</option>
                <option value="music">Music</option>
                <option value="nature">Nature</option>
                <option value="sports">Sports & Aquatics</option>
                <option value="stem">STEM</option>
                <option value="theater">Theater</option>
            </select>  
            </p>
            <p> 
                <label for='attributes'>Attributes: </label><br>
                <select multiple name="attributes[ ]" size="3" >
                <option value="Before/After Care">Before/After Care</option>
                <option value="Boys Only">Boys Only</option>
                <option value="Girls Only">Girls Only</option>
                <option value="Gifted">Gifted</option>
                <option value="scholarship available">Scholarship Available</option>
                <option value="special needs">Special Needs</option>
            </select>
            </p>
            <p> 
                <label for='ages'>Ages: </label><br>
                <select multiple name="ages[ ]" size="3">
                    <option value="0">0-4</option>
                    <option value="5">5-7</option>
                    <option value="8">8-11</option>
                    <option value="12">12+</option>
                </select>  
            </p>
            <p> 
                <label for='time'>Time of Day: </label><br>
                <select multiple name="time[ ]" size="2">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                    <option value="full day">Full Day</option>
                    <option value="overnight">Overnight</option>
                </select>  
            </p>
            <!-- <p> 
                <label for='datestart'>Date Range Start: </label><br>
                <input type="date" name="datestart">
            </p>
            <p> 
                <label for='dateend'>Date Range End: </label><br>
                <input type="date" name="dateend">
            </p> -->
            <!--input type="button" value="Clear"-->
            <input type="submit" value="Search" id=search>
        </form>
    </div>
    <div class="rightAdjustedPane">
    <p class="eyecatcher">Search Results</p>
    <?php
    if($_SESSION["empty_search"]){
        require_once 'Dao.php';
        $dao = new Dao();
        $camps = $dao->getAllCamps();
        
        foreach ($camps as $camp) {
            echo "<h3><a href='{$camp['website']}' target='_blank'>{$camp['camp_name']}</a></h3>";
            echo "<p><b>Date and Time: </b> {$camp['start_date']} to {$camp['end_date']}</p>";
            echo "<p>{$camp['description']}</p>";
            echo "<p><b>Cost: </b>{$camp['cost']}</p>";
            echo '</br>';
        }
        
    }
    else{
        require_once 'Dao.php';
        $dao = new Dao();
        
        echo $_SESSION['search_string'];
        $searchString = $_SESSION['search_string'];
        $camps = $dao->getSearchedCamps($searchString);
        if($camps->fetchColumn()>0){
            foreach ($camps as $camp) {
                echo "<h3><a href='{$camp['website']}' target='_blank'>{$camp['camp_name']}</a></h3>";
                echo "<p><b>Date and Time: </b>{$camp['start_date']} to {$camp['end_date']}</p>";
                echo "<p>{$camp['description']}</p>";
                echo "<p><b>Cost: </b>{$camp['cost']}</p>";
                echo '</br>';
              }
        }
        else{
            echo "<p class=\"error\">Sorry, there are no camps that match your search. Please try again!</p>";
            //echo $_SESSION['category'];
        }
    }
    ?>
    </div>
</div>

<?php
//carousel content
include("Templates/campCarousel.php");
//footer
include("Templates/footer.html")
?>
