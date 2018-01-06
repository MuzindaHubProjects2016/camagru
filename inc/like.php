<?php

include '../config/conn.php';

session_start();
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$status = $_SESSION['status'];

if($email == "" && $status != "logged in")
{
    header("Location: ../index.php");
}

if($_GET['image_name'])
{
    
    $image_name = $_GET['image_name'];

    $stmt_image = $conn->prepare("SELECT * FROM images WHERE image_name=:image_name");
    $stmt_image->bindValue(":image_name", $image_name);
    // initialise an array for the results 
    $image = array();
    if ($stmt_image->execute()) {
        while ($row = $stmt_image->fetch(PDO::FETCH_ASSOC)) {
            $image[] = $row;
            $image_creator = $row['image_creator'];
            $image_creator_email = $row['image_creator_email'];
        }
    }

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE images SET image_likes = image_likes + 1 WHERE image_name=:image_name");
    $stmt->bindParam(':image_name', $image_name);

    // ---------------- SEND MAIL FORM ----------------
            
    // send e-mail to ...
    $to=$image_creator_email;
    // Your subject
    $subject="Your Camagru image has been liked.";
    // From
    $header="from: Camagru";
    // Your message
    $message="Your photo has been liked.";
    $message.="Click on this link to view your image\r\n";
    $message.="http://localhost:8080/camagru/inc/display.php?image_url=../images/" . $image_name;

    if($stmt->execute())
    {
        // send email
        $sentmail = mail($to,$subject,$message,$header);

        // if your email succesfully sent
        if($sentmail){
            echo 
            '
                Your like has been added!</br>
                Go <a href="../camagru.php">Home</a></br>
                Go to <a href="./gallery.php">Gallery</a></br>
            ';
        } 
    }
    else 
    {
        echo 
        '
            Cannot post like!</br>
            Go <a href="../camagru.php">Home</a></br>
            Go to <a href="./gallery.php">Gallery</a></br>
        ';
    }

}

?>