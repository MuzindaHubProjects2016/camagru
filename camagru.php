<?php

// Start Session
session_start();

$email = $_SESSION['email'];
$status = $_SESSION['status'];

if($email == "" && $status != "logged in")
{
    header("Location: index.php");
}

echo "Tout Le Monde" . "<br>";
echo $email . "<br>";
echo $status . "<br>";

?>