<?php

namespace PasswordManager\Controller;

use PasswordManager\Crypto;
use PasswordManager\Permission;
use PasswordManager\Persistence\AccountPersistence;
use Valitron\Validator;


class Account extends ProtectedController {

    public function indexAction() {
        $this->checkLogin();
        $persistence = new AccountPersistence($this->app->fpdo);

        $accounts = $persistence->listAll(Permission::getUserid());

        $this->render('account/list.html', array('accounts' => $accounts));
    }

    public function viewAction($account_id) {
        $this->checkLogin();

        $persistence = new AccountPersistence($this->app->fpdo);
        $account = $persistence->get($account_id, Permission::getUserid());
        if ($account == null) {
            $this->app->notFound();
            return;
        }

        // decrypt password
        $account->password = Crypto::decryptInformation($account->password_cipher, Permission::getPassword());

        $this->render('account/view.html', array('account' => $account));
    }

    public function editAction($account_id) {
        $this->checkLogin();

        if($this->app->request->getMethod() == "GET") {
            $persistence = new AccountPersistence($this->app->fpdo);
            $account = $persistence->get($account_id, Permission::getUserid());
            $this->editForm($account);
        } else {
            $this->editSave($account_id);
        }
    }


    private function editSave($account_id) {
        $v = new Validator($this->app->request->params());
        $v->rule('required', ['title', 'url', 'username', 'password']);
        $v->labels(array(
            'url' => 'Address',
        ));

        $account = \PasswordManager\Model\Account::fromParams($this->app->request->params());
        $account->id = $account_id;

        if ($v->validate()) {
            $persistence = new AccountPersistence($this->app->fpdo);

            // encrypt password
            $account->password_cipher = Crypto::encryptInformation($account->password, Permission::getPassword());

            if($account_id == 'new') {
                // create new
                $persistence->persist(Permission::getUserid(), $account);

            } else {
                // change existing
                if (!$persistence->isAccountOfUser($account_id, Permission::getUserid()) ){
                    // account not found or wrong user
                    $this->app->log->error("wrong user: account.id=$account_id, current user_id=". Permission::getUserid());
                    $this->app->notFound();
                    return;
                }
                $persistence->save(Permission::getUserid(), $account);
            }

            $this->app->flash('message', "Account information have been saved.");
            $this->app->redirect($this->app->urlFor("Account:index"));
        } else {
            // Show validation errors
            $this->app->view->appendData(array('form_errors' => $v->errors()));

            // Render
            $this->app->view->appendData(array('example_passwords' => Crypto::generatePasswords(5)));
            $this->app->render('account/edit.html', array('account' => $account, 'mode'=>'edit'));
        }
    }

    private function editForm($account) {
        $this->app->view->appendData(array('form_errors' => array()));
        $this->app->view->appendData(array('example_passwords' => Crypto::generatePasswords(5)));
        $this->app->render('account/edit.html', array('account' => $account));
    }

    public function addAction() {
        $this->checkLogin();

        if($this->app->request->getMethod() == "GET") {
            $account = new \PasswordManager\Model\Account();
            $account->id = 'new';
            $this->editForm($account);
        } else {
            $this->editSave('new');
        }
    }




}