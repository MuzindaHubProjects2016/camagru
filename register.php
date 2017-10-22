<?php
include ('./inc/connect.php');

if(isset($_POST['register'])){
	$email = !empty($_POST['email']) ? trim($_POST['email']) : null;
	$name = !empty($_POST['name']) ? trim($_POST['name']) : null;
	$password = !empty($_POST['password']) ? trim($_POST['password']) : null;

	$sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email;";
	$stmt = $conn->prepare($sql);
	$stmt->bindValue(':email', $email);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);

	if($row['num'] > 0){
		die('That email already exists!');
	}

	$sql = "INSERT INTO users (name, email, password) VALUES (:name,:email,:password);";
    $stmt = $conn->prepare($sql);
    
    //Bind our variables.
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':password', $password);
 
    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        echo 'Thank you for registering with our website.';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
    </head>
    <body>
        <h1>Register</h1>
        <form action="register" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name"><br>
            <label for="email">Email</label>
            <input type="text" id="email" name="email"><br>
            <label for="password">Password</label>
            <input type="text" id="password" name="password"><br>
            <input type="submit" name="register" value="Register"></button>
        </form>
    </body>
</html>