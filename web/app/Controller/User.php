<?php

namespace PasswordManager\Controller;

use PasswordManager\Crypto;
use PasswordManager\Permission;
use PasswordManager\Persistence\AccountPersistence;
use Valitron\Validator;


class User extends ProtectedController {

    public function registerFormAction() {
        $this->app->view->appendData(array('form_errors' => array()));
        $this->app->view->appendData(array('username' => ''));

        $this->app->render('user/register.html');
    }

    public function registerAction() {
        $username = $this->app->request->params('username');
        $password = $this->app->request->params('password');

        // username is inserted on error
        $this->app->view->appendData(array('username' => $username));

        $v = new Validator($this->app->request->params());
        $v->rule('required', ['username', 'password']);
        $v->rule('lengthMin', 'password', 4);

        if ($v->validate()) {
            $userPersistence = new \PasswordManager\Persistence\UserPersistence($this->app->fpdo);

            if ($userPersistence->register($username, $password)) {
                $this->app->flash('message', "The registration was successful. You can now log in!");
                $this->app->redirect($this->app->urlFor("User:login"));
            } else {
                // register can fail on duplicate username
                $v->error('username', "Username is invalid or already used. Please try another name.");
            }
        }

        // on error
        $this->app->view->appendData(array('form_errors' => $v->errors()));
        $this->app->render('user/register.html');
    }

    public function loginFormAction() {
        $this->app->view->appendData(array('form_errors' => array()));

        $this->app->render('user/login.html');
    }

    public function loginAction() {
        $v = new Validator($this->app->request->params());
        $v->rule('required', ['username', 'password']);
        if ($v->validate()) {
            // check username psw
            $userPersistence = new \PasswordManager\Persistence\UserPersistence($this->app->fpdo);
            $user_id = $userPersistence->checkLogin($this->app->request->params('username'), $this->app->request->params('password'));
            $this->app->log->debug("userid: " . $user_id);
            if ($user_id != null) {
                Permission::setUserid($user_id);
                Permission::setPassword($this->app->request->params('password'));
                Permission::setUsername($this->app->request->params('username'));
                $this->app->flash('message', "You are now logged in.");
                $this->app->log->debug("login done, id=" . $user_id);
                $this->app->log->debug("session: =" . var_dump($_SESSION));
                $this->app->redirect($this->app->urlFor("Account:index"));
            } else {
                // login failed
                $v->error('username', 'Invalid username or password');
            }

        }

        $this->app->view->appendData(array('form_errors' => $v->errors()));
        $this->app->render('user/login.html');
    }

    public function logoutAction() {
        session_unset();
        $this->app->redirect($this->app->urlFor('Home:index'));
    }

    public function settingsAction() {
        $this->checkLogin();
        $this->app->view->appendData(array('form_errors' => array()));
        $this->app->render('user/settings.html');
    }
    public function changePwAction() {
        $this->checkLogin();

        $v = new Validator($this->app->request->params());
        $v->rule('required', ['old_password', 'new_password']);
        $v->rule('lengthMin', 'new_password', 4);
        if ($v->validate()) {
            $old_password = $this->app->request->params('old_password');
            $new_password = $this->app->request->params('new_password');
            $userPersistence = new \PasswordManager\Persistence\UserPersistence($this->app->fpdo);
            if(!$userPersistence->checkLogin(Permission::getUsername(), $old_password)) {
                $v->error('old_password', 'Current Password is not correct.');
            } else {
                // old password is correct, can now change password
                $userPersistence->setNewPassword(Permission::getUserid(), $new_password);
                Permission::setPassword($new_password);

                // reencrypt accounts
                $accountPersistence = new AccountPersistence($this->app->fpdo);
                $accounts = $accountPersistence->listAll(Permission::getUserid());
                foreach ($accounts as $account) {
                    $plaintext_pw  = Crypto::decryptInformation($account->password_cipher, $old_password);
                    $account->password_cipher = Crypto::encryptInformation($plaintext_pw, $new_password);
                    $accountPersistence->updateValue($account->id, Permission::getUserid(), 'password_cipher', $account->password_cipher);
                }
                $accounts = null;
                $this->app->flash('message', "Your password was changed successfully!");
                $this->redirect($this->app->urlFor('User:settings'));
                return;
            }
        }

        $this->app->view->appendData(array('form_errors' => $v->errors()));
        $this->app->render('user/settings.html');




    }
}