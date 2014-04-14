<?php

namespace PasswordManager\Controller;

use PasswordManager\Crypto;

class Pw extends \SlimController\SlimController {

    public function genAction() {
        $this->app->view->appendData(array('example_passwords' => Crypto::generatePasswords(10)));
        $this->render("generate_passwords.html");
    }

}