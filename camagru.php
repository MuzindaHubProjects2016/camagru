<?php

if($_SESSION['status'] != "logged in")
{
    header("Location: index1.php");
}

session_start();
echo "Tout Le Monde" . "<br>";
echo $_SESSION['email'] . "<br>";
echo $_SESSION['status'] . "<br>"

?>
