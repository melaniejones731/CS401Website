<?php 
/*
Site search page, composed of the templates below
*/

//page header
include("Templates/header.php");
//main content
include("Views/search-camps.html");

session_start();

?>

<div id="searchContainer">
    <div class="leftSidePane">
        <p>Search Filters</p>
        <form action="search-handler.php" method="POST">
            <p> 
            <label for='category'>Categories: </label><br>
            <select name="category" size="2" multiple="multiple">
                <option value="academic">Academic</option>
                <option value="art">Art</option>
                <option value="cooking">Cooking & Health</option>
                <option value="dance">Dance</option>
                <option value="imagination">Imaginative Play</option>
                <option value="music">Music</option>
                <option value="nature">Nature</option>
                <option value="sports">Sports & Aquatics</option>
                <option value="stem">STEM</option>
                <option value="theater">Theater</option>
            </select>  
            </p>
        <p> 
            <label for='attributes'>Attributes: </label><br>
            <select name="attributes" size="2" multiple="multiple">
                <option value="bacare">Before/After Care</option>
                <option value="boysonly">Boys Only</option>
                <option value="girls only">Girls Only</option>
                <option value="gifted">Gifted</option>
                <option value="special">Special Needs</option>
            </select>  
        </p>
        <p> 
            <label for='ages'>Ages: </label><br>
                <select name="ages" size="2" multiple="multiple">
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
        <input type="button" value="Clear">
        <input type="submit" value="Search" id=search>
    </form>
</div>
<div class="rightAdjustedPane">
    <p>Search Results</p>
    <?php
    if($_SESSION["empty_search"]){
        require_once 'Controllers/Dao.php';
        $dao = new Dao();
        $camps = $dao->getAllCamps();
        echo "<table id='camps'>";
        foreach ($camps as $camp) {
            echo "<tr><td>{$camp['camp_name']}</td><td>{$camp['description']}</td></tr>";
        }
        echo "</table>";
    }
    else{
    require_once 'Controllers/Dao.php';
    $dao = new Dao();
    $searchString = '';
    if(!empty($_POST["category"])){
    $searchString = $searchString."CampCategory='".$_POST["category"]."'";
    }
    $camps = $dao->getSearchedCamps($searchString);
    echo "<table id='camps'>";
    foreach ($camps as $camp) {
         echo "<tr><td>{$camp['camp_name']}</td><td>{$camp['description']}</td></tr>";
    }
    echo "</table>";
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
