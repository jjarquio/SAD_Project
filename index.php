<html>
<head>

<link rel="stylesheet" type="text/css" href="icon/css/font-awesome.min.css">

<link rel="stylesheet" type="text/css" href="style/login.css">

<title> RASI COMPUTERS Sales and Service Return Merchandise Authorization </title>
<link rel="icon" href ="images/icon.png">


<?php
	session_start();

	if (isset($_SESSION['USERNAME'])) {
		header("location: view/index.php");
	}




	if(isset($_SESSION['ERROR_MESSAGE'])=='ACCOUNT_DONT_EXIST'){
		?>
	<script > alert("Account does not exist"); </script>

		<?php
		unset($_SESSION['ERROR_MESSAGE']);
	}
	


?>

</head>

<body>


	<div class ="login-box">
		<div class="login-glass">
			
			<img src="images/logo.png" class="logo">

			

		<form action ="login.php" method="post">

		<div class="input-box">
			<span><i class="fa fa-user" aria-hidden="true"></i></span>
			<input type = "text" name = "username" value = "<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>"/>
			
		</div>
		<div class="input-box">
			<span><i class="fa fa-lock" aria-hidden="true"></i></span>
			<input type ="password" name ="password" value = "<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" />
		</div>


		<div class="remember">
			<input type="checkbox" id="remember"  name="remember"<?php if(isset($_COOKIE['username'])){echo 'checked';}?> /><label>Remember me</label> 
		</div>

		<div>
			<input  type ="submit" name ="login" value = "Login" /> 
		</div>

		</form>

		</div>

	</div>
		
		

	
	</body>

</html>