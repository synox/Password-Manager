<?php

namespace PasswordManager\Controller;

class Home extends \SlimController\SlimController {

    public function indexAction() {
        // Sample log message
        $this->app->log->info("Slim-Skeleton '/' route");
        // Render index view
        $this->render('index.html');
    }
}