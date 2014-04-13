<?

require '../lib/crypto.lib.php';

$app->get('/c', function () use ($app) {
    echo "test";
    $x = new X();
    $x->hi();
});


$app->get('/crypt', function () use ($app) {
      // Initialization of strings

        $string = 'It works ? Or not it works ?';
        $pass = '1234';
        $method = 'aes128';
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);

        echo "clear text message = $string<br>";
        echo "secret password = $pass<br>";
        echo "iv = $iv<br>";

        // Encryption of $string using aes128 method
        // the password $pass is used for symetric encryption
        $cipherWithIv = $iv . openssl_encrypt ($string, $method, $pass, OPENSSL_RAW_DATA, $iv);

        echo "Encrypted value = $cipherWithIv<br>";

        $iv2 = substr($cipherWithIv, 0, $iv_size);
        $cipher = substr($cipherWithIv, $iv_size);

        // Decryption of the $encrypted string: we use the same secret: $pass
        $decrypted = openssl_decrypt ($cipher, $method, $pass, OPENSSL_RAW_DATA, $iv2);

        echo "Decrypted value = $decrypted<br>";
});

$app->get('/pw', function () use ($app) {
      // Initialization of strings

      $pwgen = new PWGen(12, false, true,true,true,false,true);
      echo $pwgen->generate();
});

?>