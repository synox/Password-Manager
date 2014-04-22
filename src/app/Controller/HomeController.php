<?php

namespace PasswordManager\Controller;


use PasswordManager\Permission;

/**
 * Controller for the "Homepage" with the product description.
 * @package PasswordManager\Controller
 */
class HomeController extends \SlimController\SlimController {

    /**
     * action for the "Homepage". If the user is logged in, the Account:Index is displayed instead.
     */
    public function indexAction() {
        if(Permission::isLoggedIn()) {
            $this->app->redirect($this->app->urlFor("Account:index"));
        }
        $this->render('index.html');
    }
}