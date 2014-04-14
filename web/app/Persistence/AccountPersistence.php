<?php

namespace PasswordManager\Persistence;

use PasswordManager\Model\Account;

class AccountPersistence {
    private $fpdo;

    public function __construct(\FluentPDO  $fpdo) {
        $this->fpdo = $fpdo;
    }

    public function listAll($user_id) {
        $result = $this->fpdo->from('account')->where('user_id', $user_id)->orderBy('title')->fetchAll();

        $accounts = array();
        foreach($result as $row) {
            $account = $this->convertQueryRowToAccount($row);
            $accounts[] = $account;
        }
        return $accounts;
    }

    public function persist($user_id, Account $account)
    {
        $account->user_id = $user_id;

        // copy data to query
        $data = array();
        foreach(array('user_id', 'title', 'description', 'url', 'username', 'password_cipher') as $field) {
            $data[$field] = $account->$field;
        }

        $query = $this->fpdo->insertInto('account', $data);
        return $query->execute();
    }
    public function save($user_id, Account $account)
    {
        $account->user_id = $user_id;

        // copy data to query
        $data = array();
        foreach(array('title', 'description', 'url', 'username', 'password_cipher') as $field) {
            $data[$field] = $account->$field;
        }

        $query = $this->fpdo->update('account', $data)->where('user_id',$user_id)->where('id', $account->id);
        return $query->execute();
    }

    /**
     * Update a field on a given account
     * @param $account_id account id
     * @param $user_id user id
     * @param $field field to change
     * @param $value value to set
     * @return true if successful, else false.
     */
    public function updateValue($account_id, $user_id, $field, $value)
    {
        $query = $this->fpdo->update('account')->where('user_id',  $user_id)->where('id', $account_id);
        $query = $query->set($field, $value);
        return $query->execute();
    }

    /**
     * Load an account with the given id and user_id
     * @param $account_id a account id
     * @param $user_id a userid
     * @return null|Account
     */
    public function get($account_id, $user_id)
    {
        $result =  $this->fpdo->from('account')
            ->where('user_id', $user_id)
            ->where('id', $account_id)
            ->fetch();

        if($result == null) {
            return null;
        }
        $account = $this->convertQueryRowToAccount($result);
        return $account;
     }

    public function isAccountOfUser($account_id, $user_id) {
        $account = $this->get($account_id, $user_id);
        return $account != null && $account->user_id == $user_id;
    }

    /**
     * @param $result
     * @return Account
     */
    private function convertQueryRowToAccount($result) {
        $account = new Account();
        foreach (array('id', 'user_id', 'title', 'username', 'description', 'url', 'password_cipher') as $field) {
            $account->$field = $result[$field];
        }
        return $account;
    }

}

?>