<?php
$DB_DSN = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = 'password';
$DB_NAME = 'camagru';

$conn = new PDO("mysql:host=$DB_DSN;dbname=" . $DB_NAME . "", $DB_USER, $DB_PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>