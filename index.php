<html>
<head>

<title> RASI COMPUTERS Sales and Service Return Merchandise Authorization </title>
<link rel="icon" href ="images/icon.png">


<?php
	session_start();

	if (isset($_SESSION['USERNAME'])) {
		header("location: view/index.php");
	}




	if(isset($_SESSION['ERROR_MESSAGE'])=='ACCOUNT_DONT_EXIST'){
		?>
		<script src = "jscript/alertmessage.js"> </script>
		<?php
		unset($_SESSION['ERROR_MESSAGE']);
	}


?>

</head>

<body>
	<form action ="login.php" method="post">
		<input type = "text" name = "username" placeholder = "Username" required/> </br>
		<input type ="password" name ="password" placeholder = "Password"  minlength = "8" required/> </br>
		<input type ="submit" name ="login" value = "Login" />

		</form>

	</body>


</html>