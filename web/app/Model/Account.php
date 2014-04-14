<?php

namespace PasswordManager\Model;

class Account  {
    public $id;
    public $user_id;
    public $title;
    public $description;
    public $url;
    public $username;
    public $password;
    public $password_cipher;

    static public function fromParams($params) {
        $result = new Account();
        foreach(array ('username', 'title', 'description','url','password') as $field){
            if( isset($params[$field])){
                $result->$field = $params[$field];
            }
        }
        return $result;
    }


} 