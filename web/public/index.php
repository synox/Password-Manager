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

require APP_PATH . '/app/config/db.php';
$app->fpdo = $fpdo;

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
$app->view->appendData(array('router'=>$app->router));

// log db access
$fpdo->debug=function($BaseQuery) use ($app) {

    $str = "query: " . $BaseQuery->getQuery(false) . "\n";
    $str .= "parameters: " . implode(', ', $BaseQuery->getParameters()) . "\n";
    if($BaseQuery->getResult() != null) {
       $str .= "rowCount: " . $BaseQuery->getResult()->rowCount();
    }
    $app->log->debug($str);
};


$app->addRoutes(array(
        '/'                  => 'Home:index',
        '/logout'            => 'User:logout',
        '/login/'            => array('get'=> 'User:loginForm',    'post' => 'User:login'),
        '/register/'         => array('get'=> 'User:registerForm', 'post' => 'User:register'),
        '/account/'          => array('get'=> 'Account:index'),
        '/account/add'       => array('get'=> 'Account:add',       'post' => 'Account:addPersist'),
        '/account/:id/edit'  => array('any'=> 'Account:edit'),
        '/account/:id'       => array('get'=> 'Account:detail'),
        '/pw'                => 'Pw:gen',
));

// Run app
$app->run();