<?php

namespace PasswordManager\Controller;


use PasswordManager\Permission;

class HomeController extends \SlimController\SlimController {

    public function indexAction() {
        if(Permission::isLoggedIn()) {
            $this->app->redirect($this->app->urlFor("Account:index"));
        }
        $this->render('index.html');
    }
}