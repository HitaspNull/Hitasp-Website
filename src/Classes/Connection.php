<?php 

namespace Web\Classes;

use PDO;
use PDOException;

class Connection{
    private $host;
    private $db;
    private $user;
    private $password;
    protected $conn;

    public function __construct(){
        $this->host = 'localhost';
        $this->db = 'website';
        $this->user = 'root';
        $this->password = 'programmer@8203';
        $dsn = "mysql:host:$this->host;dbname=$this->db;charset=UTF8";

        try{
            $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $dbs = new PDO($dsn, $this->user, $this->password, $option);
            $this->conn = $dbs;
            
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }
}