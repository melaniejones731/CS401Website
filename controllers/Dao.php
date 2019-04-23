<?php
//The Dao class contains all queries and prepared statements as well as the database connection.

class Dao {
    //local config
    private $host = "localhost";
    private $db = "TVKids";
    private $user = "melaniejones";
    private $pass = "password";

    //heroku config
    //private $host = "us-cdbr-iron-east-03.cleardb.net";
    //private $db = "heroku_9bd6986b3a0fe57";
    //private $user = "b934344d348a79";
    //private $pass = "0f8b4c56";
    
    public function getConnection () {
        return new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,$this->pass);
    }
    
    //camp search functions 
    public function getAllCamps () {
        $conn = $this->getConnection();
        return $conn->query("SELECT DISTINCT Session.session_id, Session.start_date, Session.end_date, Session.cost, Session.isActive, Session.session_notes, Session.camp_location, Session.address_1, Session.address_2, Session.city, Session.state, Session.zipcode, Camp.camp_id, Camp.camp_name, Camp.camp_name, Camp.camp_location, Camp.address_1, Camp.address_2, Camp.city, Camp.state, Camp.zipcode, Camp.description, Camp.isActive, CampProvider.company_name, CampProvider.website, CampProvider.address_1, CampProvider.address_2, CampProvider.city, CampProvider.state, CampProvider.zipcode, CampProvider.isActive  FROM CampProvider Join Camp on CampProvider.provider_id=Camp.provider_id Join Session on Camp.camp_id = Session.camp_id WHERE Session.isActive = 1 ORDER BY Camp.camp_name");
    }

    //camp search functions 
    public function getSearchedCamps ($searchString) {
        $conn = $this->getConnection();
        $searchQuery ="SELECT DISTINCT Session.session_id, Session.start_date, Session.end_date, Session.cost, Session.isActive, Session.session_notes, Session.camp_location, Session.address_1, Session.address_2, Session.city, Session.state, Session.zipcode, Camp.camp_id, Camp.camp_name, Camp.camp_name, Camp.camp_location, Camp.address_1, Camp.address_2, Camp.city, Camp.state, Camp.zipcode, Camp.description, Camp.isActive, CampProvider.company_name, CampProvider.website, CampProvider.address_1, CampProvider.address_2, CampProvider.city, CampProvider.state, CampProvider.zipcode, CampProvider.isActive  FROM CampProvider Join Camp on CampProvider.provider_id=Camp.provider_id Join Session on Camp.camp_id = Session.camp_id Join CampCategory on Camp.camp_id = CampCategory.camp_id Join Category on CampCategory.category_id = Category.category_id Join CampAge on Camp.camp_id = CampAge.camp_id Join Age on CampAge.age_id = Age.age_id Join CampAttribute on Camp.camp_id = CampAttribute.camp_id Join Attribute on CampAttribute.attribute_id = attribute.attribute_id WHERE Session.isActive = 1 AND $searchString ORDER BY Camp.camp_name, Session.start_date";
        return $conn->query($searchQuery);

    }
        
    //camp administration functions 
    public function getUserPassword ($username) {
        $conn = $this->getConnection();
        return $conn->query("SELECT User.password From User WHERE User.email = '$username'");
    }
    
    public function getSessionsforAdmin ($username) {    
        $conn = $this->getConnection();
        return $conn->query("SELECT DISTINCT Session.session_id, Session.start_date, Session.end_date, Session.cost, Session.isActive, Session.session_notes, Session.camp_location, Session.address_1, Session.address_2, Session.city, Session.state, Session.zipcode, Camp.camp_id, Camp.camp_name, Camp.camp_location, Camp.address_1, Camp.address_2, Camp.city, Camp.state, Camp.zipcode, Camp.description, CampProvider.company_name, CampProvider.website, CampProvider.address_1, CampProvider.address_2, CampProvider.city, CampProvider.state, CampProvider.zipcode FROM CampProvider Join Camp on CampProvider.provider_id=Camp.provider_id Join Session on Camp.camp_id = Session.camp_id Join Admin on CampProvider.provider_id = Admin.provider_id Join User on Admin.user_id = User.user_id where email = '$username' ORDER BY Camp.camp_name");
    }
    
    public function getSessionStatus ($sessionID) {    
        $conn = $this->getConnection();
        $status = $conn->query("SELECT Session.isActive FROM Session WHERE Session.session_id=$sessionID");
    }

    public function setSessionStatus ($sessionID, $active) {    
        $conn = $this->getConnection();
        $statusQuery = "UPDATE Session SET Session.isActive = (:active) WHERE Session.session_id=(:sessionID)";
        $q = $conn->prepare($statusQuery);
        $q->bindParam(":active", $active);
        $q->bindParam(":sessionID", $sessionID);
        $q->execute();
    } 
}