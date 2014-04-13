<?

// Define routes
$app->get('/', function () use ($app) {
    // Sample log message
    $app->log->info("Slim-Skeleton '/' route");
    // Render index view
    $app->render('index.html', array('name'=>'nobody'));
})->name('home');

$app->get('/login', function () use ($app) {
    $app->view->appendData(array('form_errors' => array()));

    $app->render('login.html');
})->name('login');

$app->post('/login', function () use ($app,$fpdo) {
    $v = new Valitron\Validator($app->request->params());
    $v->rule('required', ['username', 'password']);
    if($v->validate()) {
        // check username psw
//        $userPersistence = new \Persistence\UserPersistence($fpdo);

        $app->flash('message', "ok!");
        $app->redirect($app->urlFor("account-list"));
    } else {
        $app->view->appendData(array('form_errors' => $v->errors()));
        $app->render('login.html');
    }
})->name('login-save');


?>