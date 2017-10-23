<?php

// Start Session
session_start();

$name = $_SESSION['name'];
$email = $_SESSION['email'];
$status = $_SESSION['status'];

if($email == "" && $status != "logged in")
{
    header("Location: index.php");
}

echo "Tout Le Monde" . "<br>";
echo $name . "<br>";
echo $email . "<br>";
echo $status . "<br>";

?>