<?php

namespace PasswordManager\Persistence;


use Aura\Sql\ExtendedPdo;

class UserPersistence {
    private $pdo;

    public function __construct(ExtendedPdo $pdo) {
        $this->pdo = $pdo;
    }

    public function checkLogin($username, $password) {
        $user = $this->getByUsername($username);

        if ($user == null) {
            return false;
        }

        // Compare password with hash
        if (password_verify($password, $user->password_hash)) {
            return $user;
        } else {
            return null;
        }
    }

    public function getByUsername($username) {
        $sql = 'SELECT * from user WHERE username = :username ';
        $bind = array('username' => $username);
        $user = $this->pdo->fetchObject($sql, $bind, 'PasswordManager\Model\User');
        return $user;
    }

    public function create($username, $password) {
        $user = $this->getByUsername($username);
        if ($user != null) {
            return false;
        }
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $this->createUser($username, $hash);
        return true;
    }

    private function createUser($username, $hash) {
        $bind_values = array('username' => $username, 'password_hash' => $hash);

        $sql = 'INSERT INTO user (username,  password_hash) ' .
            'VALUES(:username, :password_hash)';
        $sth = $this->pdo->perform($sql, $bind_values);
    }

    public function setNewPassword($user_id, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $bind_values = array('password_hash' => $hash, 'user_id' => $user_id);
        $sql = 'UPDATE user  SET password_hash = :password_hash ' .
               'WHERE id = :user_id';
        $sth = $this->pdo->perform($sql, $bind_values);
    }


} 