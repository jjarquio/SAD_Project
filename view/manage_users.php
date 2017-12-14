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
	<label>Name</label>
	<input type="text" name="Admin_Name" placeholder="Enter name" required>
	</div>

	<div>
	<label>Username</label>
	<input type="text" name="username" placeholder="Enter username" required>
	</div>

	<div>
	<label>Password</label>
	<input type="text" name="password" placeholder="Enter password"  minlength = "8" required>
	</div>

	<div>
	<label>Confirm Password</label>
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
		$d = strip_tags($_POST['Admin_Name']);
		$confirm= strip_tags($_POST['confirm']);

			$sql="SELECT * FROM admin  WHERE Username = '$a'";	 
				$result = $con->query($sql); 
				if ($result->num_rows > 0){
					?>
					<script>myFunction();
					function myFunction() {

						alert("Username already exist");
					
					}
					</script>
					


				<?php

				}else{
				
		

				if($b==$confirm){
					
				$sqlx = "INSERT INTO admin (
								Admin_Name,
								Username,
								Password,
								Position
								)
								VALUES(
									'$d',
									'$a',
									'$b',
									'$c'
								
								)";

						
						$resultx = $con->query($sqlx);
						
					$_SESSION['ERROR_MESSAGE'] ='ACCOUNT_ADDED';	
					session_write_close();									
					header("location: users.php");
					exit();


					}else{
					echo "password do not match try again";
					}
				}
}
?>



</form>

</body>
</html>