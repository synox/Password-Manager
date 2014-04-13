<?

use PasswordManager\Permission;
use PasswordManager\Persistence\AccountPersistence;

// Route for adding a new account
$app->get('/account/add', 'requiresLogin', function () use ($app, $fpdo) {
    $app->view->appendData(array('form_errors' => array()));
    $app->view->appendData(array('example_passwords' => CryptoHelper::generatePasswords(5)));

    $account = new \PasswordManager\Model\Account();

    $app->render('edit.html', array('account' => $account));
})->name('account-add');


// Route for Saving a new account
$app->post('/account/add', 'requiresLogin', function () use ($app, $fpdo) {
    // copy fields
    $account = \PasswordManager\Model\Account::fromParams($app->request->params());

    $v = new Valitron\Validator($app->request->params());
    $v->rule('required', ['title', 'url', 'username', 'password']);
    $v->labels(array(
        'url' => 'Address',
    ));

    if($v->validate()) {
        $persistence = new \PasswordManager\Persistence\AccountPersistence($fpdo);
        $persistence->persist(\PasswordManager\Permission::getUserid(), $account);

        $app->flash('message', "Account has been added.");
        $app->redirect($app->urlFor("account-list"));
    } else {
        // Errors

        $app->view->appendData(array('form_errors' => $v->errors()));

        // Render
        $app->view->appendData(array('example_passwords' => CryptoHelper::generatePasswords(5)));
        $app->render('edit.html', array('account' => $account));
    }

})->name('account-add-save');



$app->post('/account/edit-ajax', 'requiresLogin', function () use ($app,$fpdo) {
    $account_id = $app->request->params('pk');

    $persistence = new AccountPersistence($fpdo);

    $fieldname = null;
    $newValue = null;
    foreach (array('username', 'title', 'description', 'url') as $field) {
        if($app->request->params('name') == $field) {
            $fieldname = $field;
            $newValue = $app->request->params('value');
            break;
        }
    }

    if($fieldname == null) {
        $app->error("invalid input");
        return;
    }


    if (!$persistence->updateValue($account_id, Permission::getUserid(), $fieldname, $newValue) ) {
        $app->response->setStatus(400);
    }
})->name('account-edit-ajax');


$app->get('/account/list', 'requiresLogin', function () use ($app,$fpdo) {
    $accounts =  $fpdo->from('account')->where('user_id', Permission::getUserid())->orderBy('title')->fetchAll();

    $app->render('list.html', array('accounts' =>  $accounts));
})->name('account-list');


$app->get('/account/:id', 'requiresLogin', function ($account_id) use ($app, $fpdo) {
	$account =  $fpdo->from('account')->where('user_id', Permission::getUserid())->where('id', $account_id)->orderBy('title')->fetch();

	$account['password_plaintext'] = "hallo";

    $app->render('detail.html', array('account'=>$account));
})->name('account-detail');


?>