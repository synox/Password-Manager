<?php

namespace PasswordManager\Controller;

use PasswordManager\Permission;
use Valitron\Validator;


class User extends \SlimController\SlimController {

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

        if ($v->validate()) {
            $userPersistence = new \PasswordManager\Persistence\UserPersistence($this->app->fpdo);

            if ($userPersistence->register($username, $password)) {
                $this->app->flash('message', "The registration was successful. You can now log in!");
                $this->app->redirect($this->app->urlFor("User:login"));
            } else {
                // register can fail on duplicate username
                $v->error('username', "Username is invalid. Please try another name.");
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
}