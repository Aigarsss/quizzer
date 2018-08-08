<?php
# code from here https://phpdelusions.net/pdo
$host = 'localhost';
$db = 'quizz';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_EMULATE_PREPARES => false,
] ;

$pdo = new PDO($dsn, $user, $pass, $opt);

#here i am getting the tests available
$sql = 'SELECT * FROM tests order by 1';
$stm = $pdo->prepare($sql);
$stm->execute();
$result = $stm->fetchAll();

?>