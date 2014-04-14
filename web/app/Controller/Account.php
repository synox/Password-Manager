<?php

namespace PasswordManager\Controller;

use PasswordManager\Crypto;
use PasswordManager\Permission;
use PasswordManager\Persistence\AccountPersistence;
use Valitron\Validator;


class Account extends ProtectedController {

    public function indexAction() {
        $this->checkLogin();

        $accounts = $this->app->fpdo->from('account')->where('user_id', Permission::getUserid())->orderBy('title')->fetchAll();

        $this->render('account/list.html', array('accounts' => $accounts));
    }

    public function detailAction($account_id) {
        $this->checkLogin();

        $persistence = new AccountPersistence($this->app->fpdo);
        $account = $persistence->get($account_id, Permission::getUserid());
        if ($account == null) {
            $this->app->response->header(404);
            $this->render('404.html');
            return;
        }

        // decrypt password
        $account->password = Crypto::decryptInformation($account->password_cipher, Permission::getPassword());

        $this->render('account/view.html', array('account' => $account));
    }

    public function editAction($account_id) {
        $this->checkLogin();

        if($this->app->request->getMethod() == "GET") {
            $this->editForm($account_id);
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

            if (!$persistence->isAccountOfUser($account_id, Permission::getUserid()) ){
                // account not found or wrong user
                $this->app->log->error("wrong user: account.id=$account_id, current user_id=". Permission::getUserid());
                $this->app->response->header(404);
                $this->render('404.html');
                return;
            }

            // encrypt password
            $account->password_cipher = Crypto::encryptInformation($account->password, Permission::getPassword());

            $persistence->save(Permission::getUserid(), $account);

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

    private function editForm($account_id) {
        $this->app->view->appendData(array('form_errors' => array()));
        $this->app->view->appendData(array('example_passwords' => Crypto::generatePasswords(5)));

        $persistence = new AccountPersistence($this->app->fpdo);
        $account = $persistence->get($account_id, Permission::getUserid());

        $this->app->render('account/edit.html', array('account' => $account, 'mode'=>'edit'));
    }


    public function addAction() {
        $this->checkLogin();

        $this->app->view->appendData(array('form_errors' => array()));
        $this->app->view->appendData(array('example_passwords' => Crypto::generatePasswords(5)));

        $account = new \PasswordManager\Model\Account();

        $this->app->render('account/edit.html', array('account' => $account));
    }


    public function addPersistAction() {
        $this->checkLogin();

        // copy fields
        $account = \PasswordManager\Model\Account::fromParams($this->app->request->params());

        $v = new Validator($this->app->request->params());
        $v->rule('required', ['title', 'url', 'username', 'password']);
        $v->labels(array(
            'url' => 'Address',
        ));

        if ($v->validate()) {
            $persistence = new AccountPersistence($this->app->fpdo);

            // encrypt password
            $account->password_cipher = Crypto::encryptInformation($account->password, Permission::getPassword());

            $persistence->persist(Permission::getUserid(), $account);

            $this->app->flash('message', "Account has been added.");
            $this->app->redirect($this->app->urlFor("Account:index"));
        } else {
            // Errors
            $this->app->view->appendData(array('form_errors' => $v->errors()));

            // Render
            $this->app->view->appendData(array('example_passwords' => Crypto::generatePasswords(5)));
            $this->app->render('account/edit.html', array('account' => $account));
        }

    }


    public function editAjaxAction() {
        $this->checkLogin();

        $account_id = $this->app->request->params('pk');

        $persistence = new AccountPersistence($this->app->fpdo);

        $fieldname = null;
        $newValue = null;
        foreach (array('username', 'title', 'description', 'url') as $field) {
            if ($this->app->request->params('name') == $field) {
                $fieldname = $field;
                $newValue = $this->app->request->params('value');
                break;
            }
        }

        if ($fieldname == null) {
            $this->app->error("invalid input");
            return;
        }


        if (!$persistence->updateValue($account_id, Permission::getUserid(), $fieldname, $newValue)) {
            $this->app->response->setStatus(400);
        }

    }


}