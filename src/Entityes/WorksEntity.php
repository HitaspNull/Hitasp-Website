<?php

namespace Web\Entityes;

class WorksEntity {
    private $id;
    private $title;
    private $content;
    private $image;
    private $sliderclass;
    private $view;
    private $date;

    public function __construct($array){
        $this->id = $array['ID'];
        $this->title = $array['title'];
        $this->content = $array['content'];
        $this->image = $array['image'];
        $this->sliderclass = $array['sliderclass'];
        $this->view = $array['view'];
        $this->date = $array['date'];
    }

    public function toArray(){
        return[
            'title' => $this->title,
            'content' => $this->content,
            'view' => $this->view,
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

    public function setContent($content){
        $this->content = $content;
    }

    public function getContent(){
        return $this->content;
    }

    public function getExcerpt($count = 200){
        return substr($this->content, 0, $count) . '...';
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getImage(){
        return $this->image;
    }

    public function getSliderClass(){
        return $this->sliderclass;
    }

    public function setView($view){
        $this->view = $view;
    }

    public function getView(){
        return $this->view;
    }

    public function getDate(){
        return $this->date;
    }

    public function getTimeStamp(){
        return strtotime($this->date);
    }
}