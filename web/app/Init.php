<?
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

session_cache_limiter(false);
session_start();

define('APP_PATH', dirname(__DIR__)); // PHP v5.3+


// Report all PHP errors (see changelog)
error_reporting(E_ALL);

require APP_PATH . '/vendor/autoload.php';


// Prepare app
$app = new \SlimController\Slim(array(
    'templates.path' => APP_PATH . '/app/templates',
    'controller.class_prefix'    => '\\PasswordManager\\Controller',
    'controller.method_suffix'   => 'Action',
    'controller.template_suffix' => 'html',
));

// connect database
$app->pdo = new \Aura\Sql\ExtendedPdo('mysql:host=localhost;dbname=password-manager;charset=utf8', 'root', 'root');

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('pm');
    $log->pushHandler(new \Monolog\Handler\StreamHandler(APP_PATH. '/logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath(APP_PATH.'/cache'),
    'auto_reload' => true,
    'strict_variables' => true,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

$app->view->appendData(array('loggedin'=>\PasswordManager\Permission::isLoggedin()));
$app->view->appendData(array('username'=>\PasswordManager\Permission::getUsername()));
$app->view->appendData(array('router'=>$app->router));

$app->notFound(function () use ($app) {
    $app->render('404.html');
});



$app->addRoutes(array(
        '/'                  => 'Home:index',
        '/logout'            => 'User:logout',
        '/login/'            => array('get'=> 'User:loginForm',    'post' => 'User:login'),
        '/register/'         => array('get'=> 'User:registerForm', 'post' => 'User:register'),
        '/account/'          => 'Account:index',
        '/account/new'       => 'Account:add',
        '/account/:id/edit'  => 'Account:edit',
        '/account/:id'       => 'Account:view',
        '/pw'                => 'Pw:gen',
        '/settings'                => 'User:settings',
        '/settings/pw'                => 'User:changePw',
));

// Run app
$app->run();