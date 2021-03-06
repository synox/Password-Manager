<?
/*
 * Initializes the Controllers, the routing and the template framework.
 */

// everything is utf8
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

session_cache_limiter(false);
session_start();

define('APP_PATH', dirname(__DIR__)); // PHP v5.3+


// Report all PHP errors
error_reporting(E_ALL);

// auto-load dependencies
require APP_PATH . '/vendor/autoload.php';


// Prepare app
$app = new \SlimController\Slim(array(
    'templates.path' => APP_PATH . '/app/templates',
    'controller.class_prefix' => '\\PasswordManager\\Controller',
    'controller.class_suffix' => 'Controller',
    'controller.method_suffix' => 'Action',
    'controller.template_suffix' => 'html',
    'mode' => 'production', 
    'debug' => false

));



// connect database
$app->pdo = new \Aura\Sql\ExtendedPdo('mysql:host=localhost;dbname=password-manager;charset=utf8', 'root', 'root');

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('pm');
    $log->pushHandler(new \Monolog\Handler\StreamHandler(APP_PATH . '/logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view framework
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath(APP_PATH . '/cache'),
    'auto_reload' => true,
    'strict_variables' => true,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

// some variables are available to all views:
$app->view->appendData(array('loggedin' => \PasswordManager\Permission::isLoggedin()));
$app->view->appendData(array('username' => \PasswordManager\Permission::getUsername()));
$app->view->appendData(array('router' => $app->router));

// setup not-found and error pages
$app->notFound(function () use ($app) {
    $app->render('404.html');
});
$app->error(function (\Exception $e) use ($app) {
    $app->log->error($e);
    $app->render('500.html');
});

// all routes
$app->addRoutes(array(
        '/'                  => 'Home:index',
        '/logout'            => 'User:logout',
        '/login/'            => array('get'=> 'User:loginForm',    'post' => 'User:login'),
        '/register/'         => array('get'=> 'User:registerForm', 'post' => 'User:register'),
        '/account/'          => 'Account:index',
        '/account/new'       => 'Account:add',
        '/account/:id/delete'=> 'Account:delete',
        '/account/:id/edit'  => 'Account:edit',
        '/account/:id'       => 'Account:view',
        '/pw'                => 'Pwgen:gen',
        '/settings'          => 'User:settings',
        '/settings/pw'       => 'User:changePw',
));

// Run app
$app->run();