<?php
include 'database.php';
echo "user: " . $DB_USER . "<br>";
echo "host: " . $DB_DSN . "<br>";

try {
	$conn = new PDO("mysql:host=$DB_DSN;dbname=test", $DB_USER, $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE IF NOT EXISTS camagru;";
	$conn->exec($sql);
	echo "Database created successfully<br>";
} catch (PDOException $e) {
	echo "error: " . $sql . "<br>" . $e->getMessage();
}

$conn = null;

$sql2 = "CREATE TABLE IF NOT EXISTS users ("
. "id int NOT NULL AUTO_INCREMENT,"
. "name varchar(50),"
. "email varchar(50),"
. "password varchar(50),"
. "PRIMARY KEY (id));";

//echo $sql2;

try {
	$conn = new PDO("mysql:host=$DB_DSN;dbname=camagru", $DB_USER, $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conn->exec($sql2);
	echo "Users created successfully<br>";
} catch (PDOException $e) {
	echo "error: " . $sql2 . "<br>" . $e->getMessage();
}

$sql3 = "CREATE TABLE IF NOT EXISTS images ("
. "image_id int NOT NULL AUTO_INCREMENT,"
. "image_creator varchar(50),"
. "image_creator_email varchar(50),"
. "image_url varchar(100),"
. "image_timestamp timestamp NOT NULL DEFAULT current_timestamp on update current_timestamp,"
. "PRIMARY KEY (image_id));";

try {
	$conn->exec($sql3);
	echo "Images created successfully<br>";
} catch (PDOException $e) {
	echo "error: " . $sql3 . "<br>" . $e->getMessage();
}

$conn = null;
?>
