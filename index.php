<html>
<head>
<!DOCTYPE html>
<html class="no-js" lang="">
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title> RASI COMPUTERS Sales and Service Return Merchandise Authorization </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href ="images/icon.png">
<link rel="stylesheet" href="style/font-awesome.min.css">
<link rel="stylesheet" href="style/normalize.css">
<link rel="stylesheet" href="style/open-sans.css">
<link rel="stylesheet" href="style/main.css">

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
	<div id="login-form">
	<!--<img src="images/rasilogo.png" alt="Rasilogo logo">	-->
	<form action ="login.php" method="post">
		<input type = "text" name = "username" placeholder = "Username" required/> </br>
		<input type ="password" name ="password" placeholder = "Password" required/> </br>
		<input type="checkbox" name="remember" value="remember">Remember Me<br/>
		<input type ="submit" name ="login" value = "Login" />

		</form>
	</div>
	</body>


</html>