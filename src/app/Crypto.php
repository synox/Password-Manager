<?php


namespace PasswordManager;

/**
 * Helper class for cryptographic functions.
 * @package PasswordManager
 */
class Crypto {

    /**
     * Generates a list of passwords
     * @param $count int number of passwords to generate
     * @return array list of passwords
     */
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

    /**
     * encrypts a string of information (base64 encoded)
     * @param $information String
     * @param $encryptionKey String
     * @return string ciphertext
     */
    public static function encryptInformation($information, $encryptionKey) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_OFB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $method = 'aes128';

        // Encryption of $information using aes128 method
        $cipherWithIv = $iv . openssl_encrypt($information, $method, $encryptionKey, OPENSSL_RAW_DATA, $iv);
        return base64_encode($cipherWithIv);
    }

    /**
     * decrypt a ciphertext string
     * @param $cipherWithIvBase64 String the base64 encoded ciphertext including the IV.
     * @param $encryptionKey String
     * @return string decrypted plaintext
     */
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