<?php

namespace PasswordManager\Controller;

use PasswordManager\Crypto;
use PasswordManager\Permission;
use PasswordManager\Persistence\AccountPersistence;
use Valitron\Validator;

/**
 * Controller manages registration, login, logout and settings.
 *
 * The user has to be signed in for accessing the settings.
 * @package PasswordManager\Controller
 */
class UserController extends ProtectedController {

    /**
     * show the register form. Users already logged in are being redirected to Account:index.
     */
    public function registerFormAction() {
        if(Permission::isLoggedIn()) {
            $this->app->flash('message', "You are already logged in.");
            $this->app->redirect($this->app->urlFor("Account:index"));
        }

        $this->app->view->appendData(array('form_errors' => array()));
        $this->app->view->appendData(array('username' => ''));

        $this->app->render('user/register.html');
    }

    /**
     * finishes the registration. Validates the input and creates a new user if pssible.
     */
    public function registerAction() {
        $username = $this->app->request->params('username');
        $password = $this->app->request->params('password');

        // username is appended to the form  on error
        $this->app->view->appendData(array('username' => $username));

        // validate input
        $v = new Validator($this->app->request->params());
        $v->rule('required', ['username', 'password']);
        $v->rule('lengthMin', 'password', 4);

        if ($v->validate()) {
            // create new user
            $userPersistence = new \PasswordManager\Persistence\UserPersistence($this->app->pdo);
            if ($userPersistence->create($username, $password)) {
                // registration is successful. The user has to login himself.
                $this->app->flash('message', "The registration was successful. You can now log in!");
                $this->app->redirect($this->app->urlFor("User:login"));
            } else {
                // register can fail on duplicate username. The error handler on the end of the method is used.
                $v->error('username', "Username is invalid or already used. Please try another name.");
            }
        }

        // on error
        $this->app->view->appendData(array('form_errors' => $v->errors()));
        $this->app->render('user/register.html');
    }

    /**
     * shows the login form. Users already being logged in will be redirected.
     */
    public function loginFormAction() {
        if(Permission::isLoggedIn()) {
            $this->app->flash('message', "You are already logged in.");
            $this->app->redirect($this->app->urlFor("Account:index"));
        }

        $this->app->view->appendData(array('form_errors' => array()));
        $this->app->render('user/login.html');
    }

    /**
     * performs the login. Validates the input and persists data in the session.
     */
    public function loginAction() {
        $v = new Validator($this->app->request->params());
        $v->rule('required', ['username', 'password']);
        if ($v->validate()) {
            // check username psw
            $userPersistence = new \PasswordManager\Persistence\UserPersistence($this->app->pdo);
            $user = $userPersistence->checkLogin($this->app->request->params('username'), $this->app->request->params('password'));
            if ($user != null) {
                // a user with the given username and password was found. Store the userinformation in the Permission
                // class, which stores the information into the session.
                Permission::setUserid($user->id);
                Permission::setPassword($this->app->request->params('password'));
                // this is used to decrypt the passwords. The password is deleted when logging out.
                Permission::setUsername($this->app->request->params('username'));
                $this->app->flash('message', "You are now logged in.");
                $this->app->log->debug("login done, id=" . $user->id);
                $this->app->redirect($this->app->urlFor("Account:index"));
            } else {
                // login failed, see error handling on the end of method.
                $v->error('username', 'Invalid username or password');
            }
        }

        $this->app->view->appendData(array('form_errors' => $v->errors()));
        $this->app->render('user/login.html');
    }

    /**
     * Action to log out. Deletes the session and login information.
     */
    public function logoutAction() {
        Permission::logout();
        $this->app->redirect($this->app->urlFor('Home:index'));
    }

    /**
     * show the settings page. User must be logged in.
     */
    public function settingsAction() {
        $this->checkLogin();
        $this->app->view->appendData(array('form_errors' => array()));
        $this->app->render('user/settings.html');
    }

    /**
     * Changes the user password (if credentials are correct).
     */
    public function changePwAction() {
        $this->checkLogin();

        // validate password strength
        $v = new Validator($this->app->request->params());
        $v->rule('required', ['old_password', 'new_password']);
        $v->rule('lengthMin', 'new_password', 4);
        if ($v->validate()) {
            $old_password = $this->app->request->params('old_password');
            $new_password = $this->app->request->params('new_password');
            $userPersistence = new \PasswordManager\Persistence\UserPersistence($this->app->pdo);
            if (!$userPersistence->checkLogin(Permission::getUsername(), $old_password)) {
                // old password does not match the current password
                $v->error('old_password', 'Current Password is not correct.');
            } else {
                // old password is correct, can now change password
                $userPersistence->setNewPassword(Permission::getUserid(), $new_password);
                // Updates the password in the session, so decryption still works
                Permission::setPassword($new_password);

                // reencrypt all the accounts with the new password. This is required, as the password is the only
                // key to decrypt the account information.
                $accountPersistence = new AccountPersistence($this->app->pdo);
                $accounts = $accountPersistence->listAll(Permission::getUserid());
                foreach ($accounts as $account) {
                    $plaintext_pw = Crypto::decryptInformation($account->password_cipher, $old_password);
                    $account->password_cipher = Crypto::encryptInformation($plaintext_pw, $new_password);
                    $accountPersistence->updatePassword($account->id, Permission::getUserid(), $account->password_cipher);
                }
                $this->app->flash('message', "Your password was changed successfully!");
                $this->redirect($this->app->urlFor('User:settings'));
            }
        }

        $this->app->view->appendData(array('form_errors' => $v->errors()));
        $this->app->render('user/settings.html');
    }
}