<?php

namespace PasswordManager\Controller;


use PasswordManager\Permission;
use SlimController\SlimController;

/**
 * Provides methods for permission checking to classes extending this class.
 * @package PasswordManager\Controller
 */
class ProtectedController extends SlimController {
    protected function checkLogin() {
        if (!Permission::isLoggedIn()) {
            $this->app->flash('error', 'Login required');
            $this->app->redirect($this->app->urlFor('User:login'));
        }
    }
} 