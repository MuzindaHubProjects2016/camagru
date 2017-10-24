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

echo "Bonjour Tout Le Monde" . "<br>";
echo $name . "<br>";
echo $email . "<br>";
echo $status . "<br>";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Camagru - Home</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>

        <div class="booth">
            <video id="video" width="400" height="300"></video>
            <a href="#" id="capture" class="booth-capture-button">FUUUU SSSSIIIIOOOON HAAA!</a>
            <canvas id="canvas" width="400" height="300"></canvas>
            <img id="photo" width="400" height="300" src="https://i.ytimg.com/vi/HetfG6JR-qc/hqdefault.jpg" alt="Fusion">
        </div>

        <script src="js/photo.js"></script>
    </body>
</html>