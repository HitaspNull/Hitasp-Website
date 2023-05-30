<?php 

namespace Web\Entityes;

class UserEntity {
    private $id;
    private $username;
    private $email;
    private $password;
    private $date;

    public function __construct($array){
        $this->id = $array['ID'];
        $this->username = $array['username'];
        $this->email = $array['email'];
        $this->password = $array['password'];
        $this->date = $array['date'];
    }

    public function toArray(){
        return [
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password,
        ];
        
    }

    public function getId(){
        return $this->id;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function getUsername(){
        return $this->username;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }


    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getDate(){
        return $this->date;
    }

    public function getTimeStamp(){
        return strtotime($this->date);
    }

}