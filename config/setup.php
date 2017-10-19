<?php
include 'database.php';
echo "user: " . $DB_USER . "<br>";
echo "host: " . $DB_DSN . "<br>";

try {
	$conn = new PDO("mysql:host=$DB_DSN;dbname=camagru", $DB_USER, $DB_PASSWORD);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "CREATE DATABASE camagru";
	$conn->exec($sql);
	echo "Database created successfully<br>";
} catch (PDOException $e) {
	echo "error: " . $sql . "<br>" . $e->getMessage();
}

/*
$sql2 = "CREATE TABLE users ("
. "id int NOT NULL AUTO_INCREMENT,"
. "name varchar(50),"
. "email varchar(50),"
. "password varchar(50));";

echo $sql2;

if (mysqli_query($conn, $sql2)) {
    echo "Table created successfully";
} else {
    echo "Error creating table users: " . mysqli_error($conn);
}

mysqli_close($conn);
*/

$conn = null;
?>
