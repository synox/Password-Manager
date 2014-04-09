<?

try {
  $pdo = new PDO("mysql:host=localhost;dbname=password-manager", "root", "root");
  $fpdo = new FluentPDO($pdo);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>