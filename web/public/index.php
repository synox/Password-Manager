<?
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

session_cache_limiter(false);
session_start();


// Report all PHP errors (see changelog)
error_reporting(E_ALL);

$loader = require '../vendor/autoload.php';
var_dump($loader);

require '../lib/db.php';
require '../model/Account.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => '../templates',
));

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('pm');
    $log->pushHandler(new \Monolog\Handler\StreamHandler('../logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'charset' => 'utf-8',
    'cache' => realpath('../cache'),
    'auto_reload' => true,
    'strict_variables' => true,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

//$userPersistence = new \PasswordManager\Persistence\UserPersistence($fpdo);


function requiresLogin() {
        echo "login";
        if(!isset($_SESSION['pm_userid'])){
            $app = \Slim\Slim::getInstance();
            $app->flash('error', 'Login required');

        }
        $app->redirect($app->urlFor('login'));
}

require '../routes/account.php';
require '../routes/crypto.php';
require '../routes/site.php';





// Run app
$app->run();