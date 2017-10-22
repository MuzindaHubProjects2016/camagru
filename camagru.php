<?php

if($_SESSION['status'] == "")
{
    header("Location: index.php");
}

session_start();
echo "Tout Le Monde" . "<br>";
echo $_SESSION['email'] . "<br>";
echo $_SESSION['status'] . "<br>"

?>