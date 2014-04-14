<?php
/**
 * Created by PhpStorm.
 * User: synox
 * Date: 14.04.14
 * Time: 14:16
 */

namespace PasswordManager\Controller;


use PasswordManager\Permission;
use SlimController\SlimController;

class ProtectedController extends SlimController {
    protected function checkLogin() {
        if (!Permission::isLoggedIn()) {
            $this->app->flash('error', 'Login required');
            $this->app->redirect($this->app->urlFor('User:login'));
        }
    }
} 