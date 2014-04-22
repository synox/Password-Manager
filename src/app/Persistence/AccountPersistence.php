<?php

namespace PasswordManager\Persistence;

use Aura\Sql\ExtendedPdo;
use PasswordManager\Model\Account;

/**
 * Persistence class for account model objects. Supports the operations list, create, read, update, delete.
 *
 * @package PasswordManager\Persistence
 */
class AccountPersistence {
    private $pdo;

    /**
     * @param ExtendedPdo $pdo pdo to be used
     */
    public function __construct(ExtendedPdo $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * lists all accounts of one user
     * @param $user_id int user id
     * @return list of accounts
     */
    public function listAll($user_id) {
        $bind = array('user_id' => $user_id);
        $sql = 'SELECT * FROM account WHERE user_id = :user_id';
        $accounts = $this->pdo->fetchObjects($sql, $bind, 'PasswordManager\Model\Account');
        return $accounts;
    }

    /**
     * persists a new account
     * @param $user_id int user id
     * @param Account $account
     */
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

    /**
     * Save changes of an account
     * @param $user_id int user id
     * @param Account $account
     */
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
     * Update password for an account
     * @param $account_id int account id
     * @param $user_id int user id
     * @param $password_cipher String encrypted password
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
     * @param $account_id int a account id
     * @param $user_id int user id
     * @return null|Account
     */
    public function get($account_id, $user_id) {
        $bind = array('user_id' => $user_id, 'account_id' => $account_id);
        $account = $this->pdo->fetchObject('SELECT * FROM account WHERE user_id = :user_id AND id = :account_id',
            $bind, 'PasswordManager\Model\Account');
        return $account;
    }

    /**
     * returns true if the account belongs to the given user.
     * @param $account_id int account id
     * @param $user_id int user id
     * @return bool true if the account belongs to the given user.
     */
    public function isAccountOfUser($account_id, $user_id) {
        $account = $this->get($account_id, $user_id);
        return $account != null && $account->user_id == $user_id;
    }

    /**
     * deletes the given account, but only if it belongs to the given user.
     * @param $account_id int account id
     * @param $user_id int user id
     * @return \PDOStatement the statement. can be checked for true or false if change was successful.
     */
    public function delete($account_id, $user_id) {
        $bind_values = array('account_id' => $account_id, 'user_id' => $user_id);

        $sql = 'DELETE from account  ' .
            'WHERE id = :account_id and user_id = :user_id LIMIT 1';
        return $sth = $this->pdo->perform($sql, $bind_values);
    }

}

?>