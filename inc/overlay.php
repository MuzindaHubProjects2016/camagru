<?php

// Start Session
session_start();

$overlay = $_SESSION['overlay'];

$upload_dir = "../images/";
if ($overlay < 3) {
    $overlay = $overlay + 1;
} else {
    $overlay = 1;
}

if ($overlay == 1) {
    $file = $upload_dir . "randomss1.png";     
} else if ($overlay == 2) {
    $file = $upload_dir . "goku.png";
} else if ($overlay == 3) {
    $file = $upload_dir . "gohan.png";
}
 // Get dimensions for specified images

 list($width_x, $height_x) = getimagesize($file);

 // Create new image with desired dimensions

 //$image = imagecreatetruecolor($width_x, $height_x);

 // Load images and then copy to destination image

 $image_x = imagecreatefrompng($file);

 //imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x);

 imagepng($image_x, $upload_dir . 'overlay.png');
 // Clean up
 //imagedestroy($image);
 imagedestroy($image_x);

?>