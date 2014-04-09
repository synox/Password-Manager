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