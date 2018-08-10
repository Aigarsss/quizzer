<?php
   /*
   
   //create connetion credentials
    $db_host = 'localhost';
    $db_name = 'quizz';
    $db_user = 'root';
    $db_pass = '';

    // create mysqli object
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

// error handling
if($mysqli->connect_error){
    printf("connect failed: %s/n", $mysqli->connect_error);
    exit();
}

*/

####################### PDO ############################

$host = 'localhost';
$db = 'quizz';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db;";
$opt=[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($dsn, $user, $pass, $opt);

?>