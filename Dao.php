<?php
//The Dao class contains all queries and prepared statements as well as the database connection.

class Dao {
    //local config
    //private $host = "localhost";
    //private $db = "TVKids";
    //private $user = "melaniejones";
    //private $pass = "password";

    //heroku config
    private $host = "us-cdbr-iron-east-03.cleardb.net";
    private $db = "heroku_9bd6986b3a0fe57";
    private $user = "b934344d348a79";
    private $pass = "0f8b4c56";
    public function getConnection () {
        return new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,$this->pass);
    }
    
    //camp search functions 
    public function getAllCamps () {
        $conn = $this->getConnection();
        return $conn->query("SELECT DISTINCT Session.session_id, Session.start_date, Session.end_date, Session.cost, Session.isActive, Session.session_notes, Session.camp_location, Session.address_1, Session.address_2, Session.city, Session.state, Session.zipcode, Camp.camp_id, Camp.camp_name, Camp.camp_name, Camp.camp_location, Camp.address_1, Camp.address_2, Camp.city, Camp.state, Camp.zipcode, Camp.description, Camp.isActive, CampProvider.company_name, CampProvider.website, CampProvider.address_1, CampProvider.address_2, CampProvider.city, CampProvider.state, CampProvider.zipcode, CampProvider.isActive  FROM CampProvider Join Camp on CampProvider.provider_id=Camp.provider_id Join Session on Camp.camp_id = Session.camp_id");
    }

    //camp search functions 
    public function getSearchedCamps ($searchString) {
        $conn = $this->getConnection();
        return $conn->query("SELECT DISTINCT Session.session_id, Session.start_date, Session.end_date, Session.cost, Session.isActive, Session.session_notes, Session.camp_location, Session.address_1, Session.address_2, Session.city, Session.state, Session.zipcode, Camp.camp_id, Camp.camp_name, Camp.camp_name, Camp.camp_location, Camp.address_1, Camp.address_2, Camp.city, Camp.state, Camp.zipcode, Camp.description, Camp.isActive, CampProvider.company_name, CampProvider.website, CampProvider.address_1, CampProvider.address_2, CampProvider.city, CampProvider.state, CampProvider.zipcode, CampProvider.isActive  FROM CampProvider Join Camp on CampProvider.provider_id=Camp.provider_id Join Session on Camp.camp_id = Session.camp_id Join CampCategory on Camp.camp_id = CampCategory.camp_id Join Category on CampCategory.category_id = Category.category_id Where $searchString");
    }
        
    //camp administration functions 
    public function getUser ($username, $password) {
        $conn = $this->getConnection();
        return $conn->query("SELECT User.email, User.password From `User` where User.email = '$username' and User.password = '$password'");
    }

    //camp administration functions 
    public function userIsValid ($username, $password) {
        $conn = $this->getConnection();
        return $conn->query("SELECT COUNT(*) From `User` where User.email = '$username' and User.password = '$password'");
    }
    
    public function getSessionsforAdmin ($username) {    
        $conn = $this->getConnection();
        return $conn->query("SELECT DISTINCT Session.session_id, Session.start_date, Session.end_date, Session.cost, Session.isActive, Session.session_notes, Session.camp_location, Session.address_1, Session.address_2, Session.city, Session.state, Session.zipcode, Camp.camp_id, Camp.camp_name, Camp.camp_name, Camp.camp_location, Camp.address_1, Camp.address_2, Camp.city, Camp.state, Camp.zipcode, Camp.description, Camp.isActive, CampProvider.company_name, CampProvider.website, CampProvider.address_1, CampProvider.address_2, CampProvider.city, CampProvider.state, CampProvider.zipcode, CampProvider.isActive FROM CampProvider Join Camp on CampProvider.provider_id=Camp.provider_id Join Session on Camp.camp_id = Session.camp_id Join Admin on CampProvider.provider_id = Admin.provider_id Join User on Admin.user_id = User.user_id where email = '$username'");
    }
    
}