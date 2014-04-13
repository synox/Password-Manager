<?

use PasswordManager\Permission;

// Define routes
$app->get('/', function () use ($app) {
    // Sample log message
    $app->log->info("Slim-Skeleton '/' route");
    // Render index view
    $app->render('index.html', array('name'=>'nobody'));
})->name('home');



$app->get('/register', function () use ($app) {
    $app->view->appendData(array('form_errors' => array()));
    $app->view->appendData(array('username' => ''));

    $app->render('register.html');
})->name('register');

$app->post('/register', function () use ($app,$fpdo) {
    $username = $app->request->params('username');
    $password = $app->request->params('password');

    // username is inserted on error
    $app->view->appendData(array('username' => $username));

    $v = new Valitron\Validator($app->request->params());
    $v->rule('required', ['username', 'password']);

    if($v->validate()) {
        $userPersistence = new \PasswordManager\Persistence\UserPersistence($fpdo);

        if($userPersistence->register($username, $password)) {
            $app->flash('message', "The registration was successful. You can now log in!");
            $app->redirect($app->urlFor("login"));
        } else {
            // register can fail on duplicate username
            $v->error('username', "Username is invalid. Please try another name.");
        }
    }

    // on error
    $app->view->appendData(array('form_errors' => $v->errors()));
    $app->render('register.html');

})->name('register-save');


$app->get('/login', function () use ($app) {
    $app->view->appendData(array('form_errors' => array()));

    $app->render('login.html');
})->name('login');

$app->post('/login', function () use ($app,$fpdo) {
    $v = new Valitron\Validator($app->request->params());
    $v->rule('required', ['username', 'password']);
    if($v->validate()) {
        // check username psw
        $userPersistence = new \PasswordManager\Persistence\UserPersistence($fpdo);
        $user_id = $userPersistence->checkLogin($app->request->params('username'), $app->request->params('password'));
        $app->log->debug("userid: ". $user_id);
        if($user_id != null) {
            Permission::setUserid($user_id);
            Permission::setPassword($app->request->params('password'));
            $app->flash('message', "You are now logged in.");
            $app->log->debug("login done, id=" . $user_id);
            $app->log->debug("session: =" . var_dump($_SESSION));
            //$app->redirect($app->urlFor("account-list"));
        } else {
            // login failed
            $v->error('username', 'Invalid username or password');
        }

    }

    $app->view->appendData(array('form_errors' => $v->errors()));
    $app->render('login.html');

})->name('login-save');

$app->get('/logout', function () use ($app) {
    session_unset();
    $app->redirect($app->urlFor('home'));
})->name('logout');


?>