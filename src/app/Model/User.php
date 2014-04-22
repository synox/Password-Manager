<?php

namespace PasswordManager\Model;

/**
 * User model for a User. A user can login to this website.
 * @package PasswordManager\Model
 */
class User {
    /**
     * id of user @var int
     */
    public $id;
    /**
     * username @var String
     */
    public $username;
    /**
     * salted password, includes used salt @var String
     */
    public $password_hash;
} 