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
	<script > alert("Account does not exist"); </script>

		<?php
		unset($_SESSION['ERROR_MESSAGE']);
	}
	


?>

</head>

<body>


	<div id ="login-form">
	
			

		<form action ="login.php" method="post">

		<div><input type = "text" name = "username" value = "<?php if(isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>"/>
		<div><input type ="password" name ="password" value = "<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" />
	


		<div><input type="checkbox" id="remember"  name="remember"<?php if(isset($_COOKIE['username'])){echo 'checked';}?> /><label>Remember me</label> 
		<div><input  type ="submit" name ="login" value = "Login" /> </div>
		</form>


		</div>
		
		

	
	</body>

</html>