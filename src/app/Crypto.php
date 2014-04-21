<?php


namespace PasswordManager;


class Crypto {

    static public function generatePasswords($count) {
        $result = array();

        // Settings
        $length = 12;
        $secure = false;
        $numerals = true;
        $capitalize = true;
        $ambiguous = true; // avoid ambiguous characters
        $no_vovels = false;
        $symbols = false;

        for ($i = 0; $i < $count; $i++) {
            $result[] = new \PWGen($length, $secure, $numerals, $capitalize,
                $ambiguous, $no_vovels, $symbols);
        }
        return $result;
    }

    public static function encryptInformation($information, $encryptionKey) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_OFB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $method = 'aes128';

        // Encryption of $information using aes128 method
        $cipherWithIv = $iv . openssl_encrypt($information, $method, $encryptionKey, OPENSSL_RAW_DATA, $iv);
        return base64_encode($cipherWithIv);
    }

    public static function decryptInformation($cipherWithIvBase64, $encryptionKey) {
        $cipherWithIv = base64_decode($cipherWithIvBase64);
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_OFB);
        $method = 'aes128';

        $iv = substr($cipherWithIv, 0, $iv_size);
        $cipher = substr($cipherWithIv, $iv_size);

        // Decryption of the $cipher string
        $decrypted = openssl_decrypt($cipher, $method, $encryptionKey, OPENSSL_RAW_DATA, $iv);
        return $decrypted;
    }


}