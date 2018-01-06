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

// check Register request
if (!empty($_POST['btnUpdate'])) {
    $stmt_user = $conn->prepare("SELECT * FROM users WHERE name=:name");
    $stmt_user->bindValue(":name", $name);

    // initialise an array for the results 
    $image = array();
    if ($stmt_user->execute()) {
        while ($row = $stmt_user->fetch(PDO::FETCH_ASSOC)) {
            $image[] = $row;
            $id = $row['id'];
            echo $id . '</br>';
        }
    }

    if ($_POST['name'] != "" || $_POST['email'] != "" || $_POST['password'] != "")
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = hash('sha256', $password);

        if ($_POST['name'] != "")
        {
            try 
            {
                // prepare sql and bind parameters
                $stmt = $conn->prepare("UPDATE users SET name=:name  WHERE id=:id");
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':id', $id);
                $stmt->execute();
		    } catch (PDOException $e) {
			    echo "error: " . $sql . "<br>" . $e->getMessage();
		    }
            $conn = null;
        }
        else if ($_POST['email'] == "")
        {    
            try 
            {
                // prepare sql and bind parameters
                $stmt_email = $conn->prepare("UPDATE users SET email=:email  WHERE id=:id");
                $stmt_email->bindParam(':email', $email);
                $stmt_email->bindParam(':id', $id);
                $stmt_email->execute(); 
		    } catch (PDOException $e) {
			    echo "error: " . $sql . "<br>" . $e->getMessage();
		    }
            $conn = null;
        }
        else if ($_POST['password'] != "" && $_POST['repeat_password'] != "")
        {
        
            if ($_POST['repeat_password'] != $_POST['password']) {
                $register_error_message = 'Passwords don\'t match!';
                echo $register_error_message . "<br>";
            } else if (strlen($_POST['repeat_password']) < 6) {
                $register_error_message = 'Password must be at least 6 characters!';
                echo $register_error_message . "<br>";
            } else if (!preg_match('/[^a-zA-Z]+/',($_POST['repeat_password']))) {
                $register_error_message = 'Passwords must have at least one special character!';
                echo $register_error_message . "<br>";
            }
            else
            {
                try 
                {
                    // prepare sql and bind parameters
                    $stmt_password = $conn->prepare("UPDATE users SET password=:password  WHERE id=:id");
                    $stmt_password->bindParam(':password', $password);
                    $stmt_password->bindParam(':id', $id);
                    $stmt_password->execute(); 
		        }catch (PDOException $e) {
			        echo "error: " . $sql . "<br>" . $e->getMessage();
		        }
                $conn = null;
            }
        }    
        header("Location: updatecheck.php");
    } 
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Camagru - Home</title>
</head>
<body>
 
<div class="container">
    <div class="row">
            <h4>Update</h4>
            <form action="update.php" method="post">
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
                    <label for="">Repeat Password</label>
                    <input type="password" name="repeat_password" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="submit" name="btnUpdate" class="btn btn-primary" value="Update"/>
                </div>
            </form>
    </div>
</div>
 
</body>
</html>