<?php
include ( "./../config/database.php" );

echo $DB_DSN . "<br>";
echo $DB_USER . "<br>";
echo $DB_PASSWORD . "<br>";

/*mysql_connect($DB_DSN, $DB_USER, $DB_PASSWORD) or die("Couldn't connect to SQL server");
mysql_select_db("camagru") or die("Couldn't Select Database!");*/

/**
 * PDO options / configuration details.
 * I'm going to set the error mode to "Exceptions".
 * I'm also going to turn off emulated prepared statements.
 
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);
 
/**
 * Connect to MySQL and instantiate the PDO object.
 
$conn = new PDO(
    "mysql:host=" . $DB_DSN  
    . ";dbname=" . $DB_NAME,
    $DB_USER, //Username
    $DB_PASSWORD, //Password
    $pdoOptions //Options
);
*/

function DB()
{
    try {
        $db = new PDO('mysql:host='. $DB_DSN .';dbname='. $DB_NAME .'', $DB_USER, $DB_PASSWORD);
        return $db;
    } catch (PDOException $e) {
        return "Error!: " . $e->getMessage();
        die();
    }
}

?>