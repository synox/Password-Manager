<?

class CryptoHelper {

    static public function generatePasswords ($count) {
        $result = array();

        // Settings
        $length=12;
        $secure=false;
        $numerals=true;
        $capitalize=true;
        $ambiguous=true; // avoid ambiguous characters
        $no_vovels=false;
        $symbols=false;

        for($i = 0; $i < $count; $i++) {
           $result[] = new PWGen($length, $secure, $numerals, $capitalize,
               $ambiguous, $no_vovels, $symbols);
        }
        return $result;
    }
}

?>