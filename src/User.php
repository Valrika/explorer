<?php


namespace App;


class User
{
    private $user_name;
    private $user_pass;

    public function getNom(){
        $this->user_name;
    }

    public function setNom($new_user_name){
        $this->user_name = $new_user_name;
    }

    public function setPass($new_user_pass){
        $this->user_pass = $new_user_pass;
    }
}