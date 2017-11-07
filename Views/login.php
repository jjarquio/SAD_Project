<?php
	include "Function.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login_style.css">
</head>
<body>

	<div class="container">
		<h1>Log-in</h1><br>
	<form action="<?php $_PHP_SELF ?>" method="POST">
		
		<div>
			
			<input type="text" name="username" placeholder="Username" required>

		</div>

		<div>
			
			<input type="password" name="pass" placeholder="Password" required minlength="6">

		</div>

		<div>
		
			<input type="submit" name="login" value="Login">	
		
		</div>

	</form>

	</div>

</body>
</html>