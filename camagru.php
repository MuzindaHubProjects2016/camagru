<?php

    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache'); 

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
            <div id="booth_footage">
                <div id="video_overlays"><img width="400" height="300" src="http://www.bayouinharlem.com/pic/super-saiyan-hair-png-dragon-ball-zs-spiky-hair-quiz-vulture-7534006.png" alt="frame"></div>
                    <video id="video" width="400" height="300"></video>
                </div>
            </div>
            <div class="button">
                <a href="#" id="capture" class="booth-capture-button">FUUUU SSSSIIIIOOOON HAAA!</a>
            </div>
            <img id="photo" width="400" height="300" src="./images/output.png" alt="Fusion">
            <canvas id="canvas" width="400" height="300"></canvas>
        </div>

        <script src="js/photo.js"></script>
        <script src="js/reload.js"></script>

        <form method="post" accept-charset="utf-8" name="form1">
            <input name="hidden_data" id='hidden_data' type="hidden"/>
        </form>

    </body>
</html>