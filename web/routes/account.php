<?

// Route for adding a new account
$app->get('/account/add', function () use ($app, $fpdo) {
    $app->view->appendData(array('form_errors' => array()));
    $app->view->appendData(array('example_passwords' => CryptoHelper::generatePasswords(5)));

    $account = new Account();

    $app->render('edit.html', array('account' => $account));
})->name('password-add');


// Route for Saving a new account
$app->post('/account/add', function () use ($app, $fpdo) {
    // copy fields
    $account = Account::fromParams($app->request->params());

    $v = new Valitron\Validator($app->request->params());
    $v->rule('required', ['title', 'url', 'username', 'password']);
    $v->labels(array(
        'url' => 'Address',
        'desc' => 'Description',
    ));

    if($v->validate()) {
        $app->flash('message', "ok!");
        $app->redirect($app->urlFor("password-list"));
    } else {
        // Errors

        $app->view->appendData(array('form_errors' => $v->errors()));

        // Render
        $app->view->appendData(array('example_passwords' => CryptoHelper::generatePasswords(5)));
        $app->render('edit.html', array('account' => $account));
    }

})->name('password-add-save');



$app->post('/account/edit-ajax', function () use ($app,$fpdo) {
    $account_id = $app->request->params('pk');

    $query = $fpdo->update('account')->where('user_id', 1)->where('id', $account_id);

    foreach (array('username', 'title', 'descr', 'url') as $field) {
        if($app->request->params('name') == $field) {
            $value = $app->request->params('value');
            $query = $query->set($field, $value);
        }
    }
    if(!$query->execute()) {
        $app->response->setStatus(400);
    }
})->name('password-edit-ajax');



$app->get('/account/:id', function ($account_id) use ($app, $fpdo) {
	$account =  $fpdo->from('account')->where('user_id', 1)->where('id', $account_id)->orderBy('title')->fetch();

	$account['password_plaintext'] = "hallo";

    $app->render('detail.html', array('account'=>$account));
})->name('password-detail');




$app->get('/password', function () use ($app,$fpdo) {
	$accounts =  $fpdo->from('account')->where('user_id', 1)->orderBy('title')->fetchAll();

    $app->render('list.html', array('accounts' =>  $accounts));
})->name('password-list');


?>