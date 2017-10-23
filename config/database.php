<?php

$DB_DSN = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = 'password';
$DB_NAME = 'camagru';

try{
    //$db = new PDO("dbtype:host=yourhost;dbname=yourdbname;charset=utf8","username","password");
    $conn = new PDO("mysql:host=$DB_DSN;dbname=camagru", $DB_USER, $DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException  $e ){
    echo "Error: ".$e;
}

?>