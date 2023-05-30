<?php

namespace Web\Models;

use Web\Entityes\UserEntity;

class User extends Model{
    protected $fileName = 'website.users';
    protected $entityClass = UserEntity::class;

    public function authenticatUser($email, $password){
        $data = $this->database->getData();
        $user = array_filter($data, function($item) use($email, $password){
            if($item->getEmail() == $email and $item->getPassword() == $password){
                return true;
            }else{
                return false;
            }
        });

        $user = array_values($user);
        if(count($user)){
            return $user[0];
        }else{
            return false;
        }
    }
}