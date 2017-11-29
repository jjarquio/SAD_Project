<?php

	session_start();

	if (isset($_SESSION['username'])) {
		header("location: dashboard.php");
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<form action="<?php $_PHP_SELF ?>" method="POST">
		
		<div>
			Username: <input type="text" name="username" required/>
			Password: <input type="password" name="password" minlength="8" required/>
			<input type="submit" name="submitLOGIN" value="Login">
		</div>

	</form>

	<?php

		$username = isset($_POST['username'])?$_POST['username']:NULL;
		$password = isset($_POST['password'])?$_POST['password']:NULL;

		if (isset($_POST['submitLOGIN'])) {

			include "../DBconnect/connection.php";

			$sql="SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
			$result = $con->query($sql); 

			if ($result->num_rows > 0){
	       $_SESSION['username'] = $username;
		   header("location: dashboard.php");	
				}
				else
			echo "Account does not exist.";
				$con->close();
			
		}

	?>

</body>
</html>