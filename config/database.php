<?php
include_once "environment.php";

class Database {
    private $host;
    private $database_name;
    private $username;
    private $password;

    public $conn;
    //setting the fields in the constructor with the env file
    function __construct() {
        $this->host = $_ENV["HOST"];
        $this->database_name = $_ENV["DATABASE_NAME"];
        $this->username = $_ENV["USERNAME"];
        $this->password = $_ENV["PASSWORD"];
    }

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>