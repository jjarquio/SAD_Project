<?php
	include "Function/function.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>

	<div class="container">
		<h1>Create Admin</h1><br>
		<a href="login.php"></a>
	<form action="<?php $_PHP_SELF ?>" method="POST">
		
		<div>
			<label>Username</label>
			<input type="text" name="addUser" placeholder="Enter Username" required>

		</div>

		<div>
			<label>Password</label>
			<input type="password" name="password1" placeholder="Enter Password" required minlength="6">

		</div>

		<div>
			<label>Confirm password</label>
			<input type="password" name="password2" placeholder="Confirm Password" required minlength="6">

		</div>

		<div>
			<label>Position</label>
			<input type="text" name="position" placeholder="Enter position" required>

		</div>

		<div>
		
			<input type="submit" name="add" value="Add">	
		
		</div>

	</form>

	</div>
</body>
</html>