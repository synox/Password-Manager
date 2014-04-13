<?php

namespace PasswordManager\Persistence;

use PasswordManager\Model\Account;

class AccountPersistence {
    private $fpdo;

    public function __construct(\FluentPDO  $fpdo) {
        $this->fpdo = $fpdo;
    }

    public function listAll($user_id) {

    }

    public function persist($user_id, Account $account)
    {
        $account->user_id = $user_id;

        // copy data to query
        $data = array();
        foreach(array('user_id', 'title', 'description', 'url', 'username') as $field) {
            $data[$field] = $account->$field;
        }

        $query = $this->fpdo->insertInto('account', $data);
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

}

?>