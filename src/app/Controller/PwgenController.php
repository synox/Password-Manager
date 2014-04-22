<?php

namespace PasswordManager\Controller;

use PasswordManager\Crypto;

/**
 * Controller generates random passwords.
 * @package PasswordManager\Controller
 */
class PwgenController extends \SlimController\SlimController {

    /**
     * Action generates random passwords.
     */
    public function genAction() {
        $this->app->view->appendData(array('example_passwords' => Crypto::generatePasswords(10)));
        $this->render("pwgen/list.html");
    }

}