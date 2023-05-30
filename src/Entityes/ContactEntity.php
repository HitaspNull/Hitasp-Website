<?php

namespace Web\Entityes;

class ContactEntity{
    private $id;
    private $title;
    private $link;

    public function __construct($array){
        $this->id = $array['ID'];
        $this->title = $array['title'];
        $this->link = $array['link'];
    }

    public function toArray(){
        return[
            'title' => $this->title,
            'link' => $this->link,
        ];
    }

    public function getId(){
        return $this->id;
    }

    public function setTitle($title){
        $this->title = $title;
    }

    public function getTitle(){
        return $this->title;
    }

    public function setLink($link){
        $this->link = $link;
    }
    
    public function getLink(){
        return $this->link;
    }
}