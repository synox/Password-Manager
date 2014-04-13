<?

$app->post('/password/edit-ajax', function () use ($app,$fpdo) {
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


$app->post('/password/add/save', function () use ($app, $fpdo) {
    $v = new Valitron\Validator($app->request->params());



    $v->rule('required', ['name', 'email']);
    $v->rule('email', 'email');
    if($v->validate()) {
        $app->flash('message', "ok!");
    } else {
        // Errors
        $app->view->appendData(array('form_errors' => $v->errors()));
        print_r ($v->errors());
    }


    $account = array ('username' => "", 'title'=>"", 'desc'=>"", 'url'=>"", 'password'=>"");

    $errors = array();
    $params = array(
        'title' => array(
            'name'=>'Title',
            'required'=>true
        ),
        'desc' => array(
            'name'=>'Description',
            'required'=>true,
        ),
        'url' => array(
            'name'=>'Address',
            'required'=>true,
        ),
        'username' => array(
            'name'=>'Description',
            'required'=>true,
        ),
        'password' => array(
            'name'=>'Message',
            'required'=>true,
        ),
    );
    foreach($params as $param=>$options){
        $value = $app->request->params($param);
        if($options['required']){
            if(!$value){
                $errors[] = $options['name'].' is required!';
            }
        }
        $account[$param] = $value;
    }

    if($errors){
        //$app->flash('errors',$errors);
    }
    else{
        //submit_to_db($email, $subject, $message);
        $app->flash('message','Form submitted!');
    }



    $app->render('add.html', array('account' => $account));
})->name('password-add-save');

$app->get('/password/add', function () use ($app, $fpdo) {
    $app->view->appendData(array('form_errors' => array()));

    $account = array ('username' => "", 'title'=>"", 'desc'=>"", 'url'=>"", 'password'=>"");
    $app->render('add.html', array('account' => $account));
})->name('password-add');


$app->get('/password/:id', function ($account_id) use ($app, $fpdo) {
	$account =  $fpdo->from('account')->where('user_id', 1)->where('id', $account_id)->orderBy('title')->fetch();

	$account['password_plaintext'] = "hallo";

    $app->render('detail.html', array('account'=>$account));
})->name('password-detail');




$app->get('/password', function () use ($app,$fpdo) {
	$accounts =  $fpdo->from('account')->where('user_id', 1)->orderBy('title')->fetchAll();

    $app->render('list.html', array('accounts' =>  $accounts));
})->name('password-list');


?>