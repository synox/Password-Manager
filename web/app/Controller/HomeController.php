<?php

namespace PasswordManager\Controller;

class HomeController extends \SlimController\SlimController {

    public function indexAction() {
        // Sample log message
        $this->app->log->info("Slim-Skeleton '/' route");
        // Render index view
        $this->render('index.html');
    }
}