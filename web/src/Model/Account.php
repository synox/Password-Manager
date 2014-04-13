<?php

namespace PasswordManager\Model;

class Account  {
    public $id;
    public $user_id;
    public $title;
    public $desc;
    public $url;
    public $username;
    public $password;

    static public function fromParams($params) {
        $result = new Account();
        foreach(array ('username', 'title', 'desc','url','password') as $field){
            if( isset($params[$field])){
                $result->$field = $params[$field];
            }
        }
        return $result;
    }


} 