<?php 

namespace Web\Entityes;

class MenuEntity {
    private $id;
    private $name;

    public function __construct($array){
        $this->id = $array['ID'];
        $this->name = $array['name'];
    }

    public function getId(){
        return $this->id;
    }

    public function getName(){
        return $this->name;
    }
}