<?php

$upload_dir = "../images/";
$img = $_POST['hidden_data'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$data = base64_decode($img);
$file = $upload_dir . mktime() . ".png";
$success = file_put_contents($file, $data);
print $success ? $file : 'Unable to save the file.';

$file2 = $upload_dir . "randomss1.png";

 // Get dimensions for specified images

 list($width_x, $height_x) = getimagesize($file);
 list($width_y, $height_y) = getimagesize($file2);

 // Create new image with desired dimensions

 $image = imagecreatetruecolor($width_x, $height_x);

 // Load images and then copy to destination image

 $image_x = imagecreatefrompng($file);
 $image_y = imagecreatefrompng($file2);

 imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x);
 imagecopy($image, $image_y, 0, 0, 0, 0, $width_y, $height_y);

 // Save the resulting image to disk (as png)

 imagepng($image, $upload_dir . 'output.png');

 // Clean up

 imagedestroy($image);
 imagedestroy($image_x);
 imagedestroy($image_y);

?>