<?php 

class Database{
    private $host = "localhost";
    private $db_name  = "amigo_secreto";
    private $username = "root";
    private $password = "Rodrix.8583";
    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name , $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}