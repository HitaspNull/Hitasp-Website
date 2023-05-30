<?php

const BASE_URL = 'https://hitaspnull.github.io/';

function dd($data){
    die('<pre>'.print_r($data, true).'</pre>');
}

function asset($file){
    return BASE_URL . 'assets/' . $file;
}

function url($path, $query = []){
    if(!count($query)){
        $newName = substr($path, 0 , strpos($path, "."));
        return BASE_URL . $newName;
    }else{
        $newName = substr($path, 0 , strpos($path, "."));
        return BASE_URL . $newName . '?' . http_build_query($query);
    }
}

function redirect($path, $query = []){
    $url = url($path, $query);
    header("location: $url");
    exit;
}
