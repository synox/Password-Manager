<?

use PasswordManager\Crypto;

$app->get('/pw', function () use ($app) {
      // Initialization of strings

    $app->view->appendData(array('example_passwords' => Crypto::generatePasswords(10)));
    $app->render("generate_passwords.html");
})->name('generate-password');

?>