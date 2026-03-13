<?php
// This is the database class to connect to.
class Database{
    private $host = "localhost";
    private $db_name = "inventory_db";
    private $username = "root";
    private $password = "";
    public $conn;
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            throw new Exception("Connection error: " . "Database connection failed try again later");

        }
        return $this->conn;
    }
}


