<?php

// Start Session
    session_start();
    define ('SITE_ROOT', realpath(dirname(__FILE__)));

    include SITE_ROOT . '/inc/uploadphoto.php';

    header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
    header('Last-Modified: ' . gmdate( 'D, d M Y H:i:s') . ' GMT');
    header('Cache-Control: no-store, no-cache, must-revalidate');
    header('Cache-Control: post-check=0, pre-check=0', false);
    header('Pragma: no-cache'); 

    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $status = $_SESSION['status'];
    $overlay = $_SESSION['overlay'];

    if($email == "" && $status != "logged in")
    {
        header("Location: index.php");
    }

    echo "Bonjour " . $name . "<br>";
    echo $name . "<br>";
    echo $email . "<br>";
    echo $status . "<br>";
    echo $overlay . "<br>";

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
                <div id="video_overlays"><img id="vid_overlay" width="400" height="300" src="./images/overlay.png?v=<?php echo Date("Y.m.d.G.i.s")?>" alt="frame"></div>
                    <video id="video" width="400" height="300"></video>
                </div>
            </div>
            <img id="photo" width="400" height="300" src="./images/output.png?v=<?php echo Date("Y.m.d.G.i.s")?>" alt="Fusion">
            <canvas id="canvas" width="400" height="300"></canvas>
        </div>

        <div class="button">
            <a href="#" id="capture" class="booth-capture-button">Fusion HAAA!</a>
            <a href="#" id="switch" class="booth-capture-button">Change Overlay</a>
        </div>

        <script src="js/photo.js"></script>
        <script src="js/reload.js"></script>
        <script src="js/switchoverlay.js"></script>

        <form method="post" accept-charset="utf-8" name="form1">
            <input name="hidden_data" id='hidden_data' type="hidden"/>
        </form>

        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" />
            <input type="submit"/>
        </form>

    </body>
</html>