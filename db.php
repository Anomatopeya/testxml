<!-- <?php 
$mysqli = new mysqli('localhost', 'root', '111111', 'testxml');
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}
$mysqli->set_charset('utf8');

?> -->
<?php 
   $host = 'localhost';
   $db   = 'testxml';
   $user = 'root';
   $pass = '111111';
   $charset = 'utf8';

   $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
   $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
   ];
   $pdo = new PDO($dsn, $user, $pass, $opt);


 ?>