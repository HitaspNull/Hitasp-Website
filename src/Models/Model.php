<?php

namespace Web\Models;
use Web\Classes\Database;
use Web\Exceptions\DoesNotExsistException;

class Model {
    protected $database;
    protected $fileName;
    protected $entityClass;

    public function __construct(){
        $this->database = new Database($this->fileName, $this->entityClass);
    }

    public function getAllData(){
        return $this->database->getData();
    }

    public function getDataById($id){
        $data = $this->database->getData();
        $array = array_filter($data, function($item) use($id){
            return $item->getId() == $id;
        });

        $array = array_values($array);
        if(count($array)){
            return $array[0];
        }else{
            throw new DoesNotExsistException("Does Not exist any {$this->entityClass}");
        }
    }

    public function getLastData(){
        $data = $this->database->getData();
        uasort($data, function($first, $second){
            return $first->getId() > $second->getId()? -1 : 1;
        });

        $data = array_values($data);
        if(count($data)){
            return $data[0];
        }else{
            throw new DoesNotExsistException("Does Not exist any {$this->entityClass}");
        }
    }

    public function getFirstData(){
        $data = $this->database->getData();
        uasort($data, function($first, $second){
            return $first->getId() < $second->getId()? -1 : 1;
        });

        $data = array_values($data);
        if(count($data)){
            return $data[0];
        }else{
            throw new DoesNotExsistException("Does Not exist any {$this->entityClass}");
        }
    }
    public function sortData($callback){
        $data = $this->database->getData();
        uasort($data, $callback);

        if(count($data)){
            return $data;
        }else{
            throw new DoesNotExsistException("Does Not exist any {$this->entityClass}");
        }
    }

    public function filterData($callback){
        $data = $this->database->getData();
        $data = array_filter($data, $callback);
        $data = array_values($data);

        if(count($data)){
            return $data;
        }else{
            throw new DoesNotExsistException("Does Not exist any {$this->entityClass}");
        }
    }
}