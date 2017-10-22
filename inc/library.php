<?php 
include ( "./../config/database.php" );

echo $DB_DSN . "<br>";
echo $DB_USER . "<br>";
echo $DB_PASSWORD . "<br>";
echo $DB_NAME . "<br>";

class Lib
{
 
    public function Register($name, $email, $password)
    {
        try {
        	$enc_password = hash('sha256', $password);
			$sql = "INSERT INTO users(name, email, password) VALUES('" . $name . "',  '" . $email . "',  '" . $enc_password . "');";
			$conn->exec($sql);
        } catch (PDOException $e) {
            echo "error: " . $sql . "<br>" . $e->getMessage();
        }
    }

    /*public function isName($name)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id FROM users WHERE name=:name");
            $query->bindParam("name", $name, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function isEmail($email)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT name FROM users WHERE email=:email");
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function Login($username, $password)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT user_id FROM users WHERE (username=:username OR email=:username) AND password=:password");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
            $query->bindParam("password", $enc_password, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                $result = $query->fetch(PDO::FETCH_OBJ);
                return $result->user_id;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }
 
    public function UserDetails($id)
    {
        try {
            $db = DB();
            $query = $db->prepare("SELECT id, name, username, email FROM users WHERE id=:id");
            $query->bindParam("id", $id, PDO::PARAM_STR);
            $query->execute();
            if ($query->rowCount() > 0) {
                return $query->fetch(PDO::FETCH_OBJ);
            }
        } catch (PDOException $e) {
            exit($e->getMessage());
        }
    }*/
}

?>
