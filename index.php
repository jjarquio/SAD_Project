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
<<<<<<< HEAD
<<<<<<< HEAD
	<div id="login-form">
	<!--<img src="images/rasilogo.png" alt="Rasilogo logo">	-->
=======
>>>>>>> parent of 1f54b65... css
=======
>>>>>>> 840d7c2e6175bd28e8055c04713d27a6946e65ba
	<form action ="login.php" method="post">
		<input type = "text" name = "username" placeholder = "Username" required/> </br>
		<input type ="password" name ="password" placeholder = "Password" required/> </br>
		<input type="checkbox" name="remember" value="remember">Remember Me<br/>
		<input type ="submit" name ="login" value = "Login" />

		</form>
	</div>
	</body>


</html>