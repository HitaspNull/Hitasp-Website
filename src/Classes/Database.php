<?php

namespace Web\Classes;

use PDO;

class Database extends Connection{
    private $data;

    public function __construct($table, $entityAddress){
        parent::__construct();
        $pdo = $this->conn;
        $sql = "SELECT * FROM $table";
        $statment = $pdo->query($sql);
        $posts = $statment->fetchAll(PDO::FETCH_ASSOC);
        $this->data = array_map(function($item) use($entityAddress){
            return new ($entityAddress)($item);
        },$posts);
    }

    public function getData(){
        return $this->data;
    }
}