<?php

namespace PasswordManager\Persistence;

use Aura\Sql\ExtendedPdo;
use PasswordManager\Model\Account;

class AccountPersistence {
    private $pdo;

    public function __construct(ExtendedPdo $pdo) {
        $this->pdo = $pdo;
    }

    public function listAll($user_id) {
        $bind = array('user_id' => $user_id);
        $sql = 'SELECT * FROM account WHERE user_id = :user_id';
        $accounts = $this->pdo->fetchObjects($sql, $bind, 'PasswordManager\Model\Account');
        return $accounts;
    }

    public function persist($user_id, Account $account) {
        $account->user_id = $user_id;

        // copy data to query
        $bind_values = array();
        foreach (array('user_id', 'title', 'description', 'url', 'username', 'password_cipher') as $field) {
            $bind_values[$field] = $account->$field;
        }
        $sql = 'INSERT INTO account (user_id,  title,  description,  url,  password_cipher,  username ) ' .
            ' VALUES(:user_id, :title, :description, :url, :password_cipher, :username)';
        $sth = $this->pdo->perform($sql, $bind_values);
    }

    public function save($user_id, Account $account) {
        $account->user_id = $user_id;

        // copy data to query
        $bind_values = array();
        foreach (array('id', 'user_id', 'title', 'description', 'url', 'username', 'password_cipher') as $field) {
            $bind_values[$field] = $account->$field;
        }

        $sql = 'UPDATE account ' .
            'SET title = :title, description = :description,   url = :url,  password_cipher = :password_cipher, username = :username ' .
            'WHERE id = :id and user_id = :user_id';
        $sth = $this->pdo->perform($sql, $bind_values);
    }

    /**
     * Update password
     * @param $account_id account id
     * @param $user_id user id
     * @param $field field to change
     * @param $value value to set
     * @return true if successful, else false.
     */
    public function updatePassword($account_id, $user_id, $password_cipher) {
        $bind_values = array('password_cipher' => $password_cipher, 'account_id' => $account_id, 'user_id' => $user_id);
        $sql = 'UPDATE account SET password_cipher = :password_cipher ' .
            'WHERE id = :account_id and user_id = :user_id';
        $sth = $this->pdo->perform($sql, $bind_values);
    }

    /**
     * Load an account with the given id and user_id
     * @param $account_id a account id
     * @param $user_id a userid
     * @return null|Account
     */
    public function get($account_id, $user_id) {
        $bind = array('user_id' => $user_id, 'account_id' => $account_id);
        $account = $this->pdo->fetchObject('SELECT * FROM account WHERE user_id = :user_id AND id = :account_id',
            $bind, 'PasswordManager\Model\Account');
        return $account;
    }

    public function isAccountOfUser($account_id, $user_id) {
        $account = $this->get($account_id, $user_id);
        return $account != null && $account->user_id == $user_id;
    }

}

?>