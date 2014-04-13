<?php

namespace PasswordManager\Persistence;


class UserPersistence {
    private $fpdo;

    public function __construct($fpdo) {
        $this->fpdo = $fpdo;
    }



    public function checkLogin($username, $password) {
        $accounts =  $this->fpdo->from('account')->where('user_id', 1)->orderBy('title')->fetchAll();

    }
} 