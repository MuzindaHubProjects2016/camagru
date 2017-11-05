<?php

    define ('SITE_ROOT', realpath(dirname(__FILE__)));
    $image=$_GET['image_url'];
    $image_url = $image;

    $comment=$_GET['comment'];
    //echo $comment . '<BR>';
    //echo $image . '<BR>';
    // check Register request
    if (!empty($_POST['btnComment'])) {
        echo 'commented';
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Camagru - Home</title>
        <link rel="stylesheet" href="css/gallery.css">
    </head>
    <body>
        <h1 align="center" style="margin: 0px auto;"><?php echo $image; ?></h1>
        <div  align="center" style="margin: 0px auto;">
            <?php
                echo '<img src="' . $image_url . '" width="400" height="400">';
            ?>
        </div>
        <div  align="center" style="margin: 0px auto;">
            <form action="display.php" id="usrform">
                <textarea rows="4" cols="50" name="comment" form="usrform">Enter Comment Here...</textarea>
                <br>
                <input type="submit" name="btnComment" class="btn btn-primary" value="Comment"/>
                <input type=button onClick="parent.location='./display.php?image_url=" . $image_url . " " value='Comment'>
            </form>
        </div>
        <div class="button" align="center">
                <a href="?comment=hello&image_url=kmuvezwa-1509680656" id="comment" class="comment-button">Comment</a>
        </div>
    </body>
</html>