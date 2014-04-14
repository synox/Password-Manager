<?php

namespace PasswordManager\Persistence;


class UserPersistence {
    private $fpdo;

    public function __construct($fpdo) {
        $this->fpdo = $fpdo;
    }

    public function checkLogin($username, $password) {
        $user =  $this->fpdo->from('user')->where('username', $username)->fetch();
        if($user == null) {
            return false;
        }

        if( password_verify($password, $user['password_hash']) ) {
            return $user['id'];
        }  else {
            return null;
        }

        return null;

    }
    private function createUser($username, $hash) {
        $query = $this->fpdo->insertInto('user', array('username' => $username, 'password_hash'=>$hash));
        $query->execute();
    }

    public function register($username, $password) {
        $user =  $this->fpdo->from('user')->where('username', $username)->fetch();
        if($user != null) {
            return false;
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->createUser($username, $hash);
        return true;


    }


} 