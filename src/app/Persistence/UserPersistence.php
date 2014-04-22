<?php

namespace PasswordManager\Persistence;


use Aura\Sql\ExtendedPdo;

/**
 * Persistence class for user.
 *
 * There are methods for checking passwords.
 * @package PasswordManager\Persistence
 */
class UserPersistence {
    private $pdo;

    /**
     * @param ExtendedPdo $pdo pdo to be used
     */
    public function __construct(ExtendedPdo $pdo) {
        $this->pdo = $pdo;
    }


    /**
     * Checks if the given username and password belongs to a valid user.
     * @param $username String username
     * @param $password String password
     * @return null|object null if invalid, else the valid user object.
     */
    public function checkLogin($username, $password) {
        $user = $this->getByUsername($username);

        if ($user == null) {
            return null;
        }

        // Compare password with hash
        if (password_verify($password, $user->password_hash)) {
            return $user;
        } else {
            return null;
        }
    }

    /**
     * loads the given user
     * @param $username String username
     * @return User the user instance or null
     */
    public function getByUsername($username) {
        $sql = 'SELECT * from user WHERE username = :username ';
        $bind = array('username' => $username);
        $user = $this->pdo->fetchObject($sql, $bind, 'PasswordManager\Model\User');
        return $user;
    }

    /**
     * Creates the user
     * @param $username String username
     * @param $password String password
     * @return bool false if user already exists.
     */
    public function create($username, $password) {
        $user = $this->getByUsername($username);
        if ($user != null) {
            return false;
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->createUser($username, $hash);
        return true;
    }

    /**
     * create a new user, with the given password hash
     * @param $username String username
     * @param $hash String password hash
     */
    private function createUser($username, $hash) {
        $bind_values = array('username' => $username, 'password_hash' => $hash);

        $sql = 'INSERT INTO user (username,  password_hash) ' .
            'VALUES(:username, :password_hash)';
        $sth = $this->pdo->perform($sql, $bind_values);
    }

    /**
     * changes the password for a user
     * @param int $user_id user id
     * @param String $password password (plaintext)
     */
    public function setNewPassword( $user_id,  $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $bind_values = array('password_hash' => $hash, 'user_id' => $user_id);
        $sql = 'UPDATE user  SET password_hash = :password_hash ' .
            'WHERE id = :user_id';
        $sth = $this->pdo->perform($sql, $bind_values);
    }


} 