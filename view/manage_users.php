<?php

include "../DBconnect/connection.php";

		session_start(); 
      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location:../index.php");
	  }
	  


?>

<html>
<body>

<form action="<?php $_PHP_SELF ?>" method="POST">


<a href="index.php">Dasboard</a><br>


	<div>
	<label>Username</label>
	<input type="text" name="username" placeholder="Enter username" required>
	</div>

	<div>
	<label>Password</label>
	<input type="text" name="password" placeholder="Enter password"  minlength = "8" required>
	</div>

	<div>
	<label>Enter password again</label>
	<input type="text" name="confirm" placeholder="Confirm password" required>
	</div>

					<select name="status">
					
					<option value="admin" selected ="admin">Admin</option>
					<option value="head">Head Admin</option>
					
					</select><br>
	<div>
	<input type="submit" name="createADMIN" value="submit">
	</div>

<?php

		




	if(isset($_POST['createADMIN']) && $_REQUEST['createADMIN'] == "submit"){

		$a = strip_tags($_POST['username']);
		$b= strip_tags($_POST['password']);
		$c = strip_tags($_POST['status']);
		$confirm= strip_tags($_POST['confirm']);

			$sql="SELECT * FROM admin  WHERE Username = '$a'";	 
				$result = $con->query($sql); 
				if ($result->num_rows > 0){
					echo "username already exist try again";
				}else{
				
		

				if($b==$confirm){
					
				$sqlx = "INSERT INTO admin (
								Username,
								Password,
								Position
								)
								VALUES(
									'$a',
									'$b',
									'$c'
								
								)";

						$resultx = $con->query($sqlx);

						echo "account added";


					}else{
					echo "password do not match try again";
					}
				}
}
?>



</form>

</body>
</html>