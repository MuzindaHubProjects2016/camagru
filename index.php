<?php
include './config/database.php';

// Start Session
session_start();
 
// check Register request
if (!empty($_POST['btnRegister'])) {
    if ($_POST['name'] == "") {
        $register_error_message = 'Name field is required!';
        echo $register_error_message . "<br>";
    } else if ($_POST['email'] == "") {
        $register_error_message = 'Email field is required!';
        echo $register_error_message . "<br>";
    } else if ($_POST['password'] == "") {
        $register_error_message = 'Password field is required!';
        echo $register_error_message . "<br>";
    } else {
        try {
        	$name = $_POST['name'];
        	$email = $_POST['email'];
        	$password = $_POST['password'];
        	$enc_password = hash('sha256', $password);
        	echo $name . "<br>" . $email . "<br>" . $password . "<br>" . $enc_password . "<br>";
			$sql = "INSERT INTO users(name, email, password) VALUES('" . $name . "',  '" . $email . "',  '" . $enc_password . "');";
			echo $sql . "<br>";
			$conn->exec($sql);
			echo "Registered successfully<br>";
		} catch (PDOException $e) {
			echo "error: " . $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
    }
}

// check Register request
if (!empty($_POST['btnLogin'])) {
    
	$email = trim($_POST['email']);
    $password = trim($_POST['password']);
 
    if ($email == "") {
        $login_error_message = 'Username field is required!';
        echo $login_error_message . "<br>";
    } else if ($password == "") {
        $login_error_message = 'Password field is required!';
        echo $login_error_message . "<br>";
    } else {
    	try {
        	$enc_password = hash('sha256', $password);
        	echo $email . "<br>" . $password . "<br>" . $enc_password . "<br>";
        	$sql = "SELECT COUNT(*) FROM users WHERE email = '" . $email . "' AND password = '" . $enc_password . "';";
        	echo $sql . "<br>";
			if ($res = $conn->query($sql)) {
  				if ($res->fetchColumn() > 0) {
					$_SESSION['email'] = $email;
					$_SESSION['status'] = "logged in";
					header("Location: camagru.php");
				} else {
					echo "Incorrect user credentials, please try again!" . "<br>";
				}

			}
		} catch (PDOException $e) {
			echo "error: " . $sql . "<br>" . $e->getMessage();
		}
		$conn = null;
    }

}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
 
<div class="container">
    <div class="row">
            <h4>Register</h4>
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="name" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnRegister" class="btn btn-primary" value="Register"/>
                </div>
            </form>
            <h4>Login</h4>
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="email" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnLogin" class="btn btn-primary" value="Login"/>
                </div>
            </form>
    </div>
</div>
 
</body>
</html>