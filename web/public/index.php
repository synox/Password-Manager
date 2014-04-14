<?
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

session_cache_limiter(false);
session_start();


// Report all PHP errors (see changelog)
error_reporting(E_ALL);

require '../vendor/autoload.php';

require '../lib/db.php';

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

$app->view->appendData(array('loggedin'=>\PasswordManager\Permission::isLoggedin()));

function requiresLogin() {
    $app = \Slim\Slim::getInstance();
    if(!isset($_SESSION['pm.user_id'])){
        $app->flash('error', 'Login required');
        $app->redirect($app->urlFor('login'));
    }
}

// log db access
$fpdo->debug=function($BaseQuery) use ($app) {

    $str = "query: " . $BaseQuery->getQuery(false) . "\n";
    $str .= "parameters: " . implode(', ', $BaseQuery->getParameters()) . "\n";
    if($BaseQuery->getResult() != null) {
       $str .= "rowCount: " . $BaseQuery->getResult()->rowCount();
    }
    $app->log->debug($str);
};

require '../routes/home.php';
require '../routes/user.php';
require '../routes/account.php';
require '../routes/pwgen.php';


// Run app
$app->run();