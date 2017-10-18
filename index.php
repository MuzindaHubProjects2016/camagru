<?php
session_start();
include ( "./inc/connect.php" );
// User Login Code
if (isset($_POST["user_email"]) && isset($_POST["password_login"])){
	$user_email = $_POST["user_email"];
	$password_login = $_POST["password_login"];
	if (!empty($user_email) && !empty($password_login)){
		$sql = mysql_query("SELECT id FROM users WHERE email='" . $user_email . "' AND password ='" . $password_login . "' LIMIT 1");
		$userCount = mysql_num_rows($sql); //Count the number of rows returned
		if ($userCount == 1){
			$_SESSION['user_email'] = $user_email;
			echo $_SESSION['user_email'];
			echo "Logged In";
			$query = "SELECT name FROM users WHERE email ='" . $user_email . "'";
			$result = $conn->query($query);
			$user_name = $result->fetch_assoc();
			$_SESSION['user_name'] = $user_name;
			echo $_SESSION['user_email'];
			echo $_SESSION['user_name'];
			//header("location: index.php");
			//exit();
		}else{
			echo 'That information is incorrect, try again';
    		//exit();			
		}
	}else{
		echo 'You must enter both an email address and a password';
	}
}
?>
<HTML>
	<HEAD>
		<TITLE>Camagru</TITLE>
		<link rel="stylesheet" href="css/styles.css" type="text/css">
	</HEAD>
	<BODY>
		<div class="login">
	   		<table>
	        <tr>
			    <td width=40% valing="top">
				     <h2>Sign In Below</h2>
				     <form action="index.php" method="POST">
                     <input type=email name="user_email" maxlength=50 size="50" placeholder="Email" /> <br/><br/>
					 <input type=password name="password_login" maxlength=50  size=50 placeholder="Password" /> <br/><br/>
					 <input type="submit" name="submit" value="Sign In" >
					 </form>					 
				</td>
			</tr>
       		</table>
		</div>
		<FOOTER>
		<p1>© kmuvezwa 2017</p1>
		</FOOTER>
	</BODY>
</HTML>