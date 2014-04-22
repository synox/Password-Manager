<?php

namespace PasswordManager\Model;

/**
 * Model class for one Account. An account has a title, a username and a password. The password is stored encrypted.
 * Depending on the persistence state, one of the password fields is used.
 * @package PasswordManager\Model
 */
class Account {
    /**
     * id @var int
     */
    public $id;
    /**
     * user id of owner @var int
     */
    public $user_id;
    /**
     * title @var String
     */
    public $title;
    /**
     * description @var String
     */
    public $description;
    /**
     * url address @var String
     */
    public $url;
    /**
     * username @var String
     */
    public $username;
    /** plaintext password @var String */
    public $password;
    /** encrypted password @var String  */
    public $password_cipher;

    /**
     * Creates a new instance from an array. if the parameter is not set in the array, an empty value is used.
     * @param $params array of parameters
     * @return Account instance
     */
    static public function fromParams($params) {
        $result = new Account();
        $result->copyFromParams($params);
        return $result;
    }

    /**
     * Copies account information from the array. Parameter not set in the array are not changed.
     * @param $params array parameters
     */
    public function copyFromParams($params) {
        foreach (array('username', 'title', 'description', 'url', 'password') as $field) {
            if (isset($params[$field])) {
                $this->$field = $params[$field];
            }
        }
    }


} 