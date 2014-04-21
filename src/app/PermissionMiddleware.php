<?php

namespace PasswordManager;


class PermissionMiddleware extends \Slim\Middleware {

    public function call() {
        // Get reference to application
        $app = $this->app;

        $routename = $app->router->getCurrentRoute();
        $app->log->info("checking permission $routename");

        if (!isset($_SESSION['pm.user_id'])) {
            $app->flash('error', 'Login required');
            $app->redirect($app->urlFor('User:login'));
        } else {
            // Run inner middleware and application
            $this->next->call();

        }
    }
}
