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
        <p>Search Filters</p>
        <form action="search-handler.php" method="GET">
            <p> 
                <label for='category'>Categories: </label><br>
                <select multiple name="category[ ]" size="2" >
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
                <select name="attributes[ ]" size="2" multiple="multiple">
                <option value="bacare">Before/After Care</option>
                <option value="boysonly">Boys Only</option>
                <option value="girls only">Girls Only</option>
                <option value="gifted">Gifted</option>
                <option value="scholarship available">Scholarship Available</option>
                <option value="special">Special Needs</option>
            </select>
            </p>
            <p> 
                <label for='ages'>Ages: </label><br>
                <select name="ages[ ]" size="2" multiple="multiple">
                    <option value="0">0-4</option>
                    <option value="5">5-7</option>
                    <option value="8">8-11</option>
                    <option value="12">12+</option>
                </select>  
            </p>
            <p> 
                <label for='time'>Time of Day: </label><br>
                <select name="time" size="2" multiple="multiple">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                    <option value="full">Full Day</option>
                    <option value="overnight">Overnight</option>
                </select>  
            </p>
            <p> 
                <label for='datestart'>Date Range Start: </label><br>
                <input type="date" name="datestart">
            </p>
            <p> 
                <label for='dateend'>Date Range End: </label><br>
                <input type="date" name="dateend">
            </p>
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

        //$searchString = $searchString.' category.category_name=\'' .$_SESSION['category'] . '\'';
        //echo "poop";
        //echo $_SESSION['search_string'];
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
