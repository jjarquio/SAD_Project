<html>
<head>
	<meta charset = "utf-8">
</head>
<body>
<?php
	//starting a session
	session_start();

	//VALIDATION ERROR FLAG
	$error_flag = false;


	//ARRAY OF STORE ERROR MESSAGE;
	$error_messsage =array();

	if (isset($_SESSION['USERNAME'])) {
		header("location: view/dashboard.php");
	}else{
		header("location: index.php");
	}
	




	//INPUT VALIDATION
	if(isset($_POST['login']))
	{
		$con = new mysqli("localhost","root","", "rma_db");
		if (!$con){
	     	die("Could not connect to the database");	
		}
	
		$username = mysqli_real_escape_string($con, $_POST['username']); 
		$password = mysqli_real_escape_string($con, $_POST['password']);
	
	
		$sql="SELECT * FROM admin  WHERE Username = '$username' AND password = '$password'";	 
		$result = $con->query($sql); 
		if ($result->num_rows > 0){
	       while ($row = $result->fetch_array()) {
				$_SESSION['USERNAME']= $row[0];
				$_SESSION['POSITION']=$row[2];
				header ("location: view/dashboard.php" );
		   }
		}
		else{
				
				$_SESSION['ERROR_MESSAGE'] ='ACCOUNT_DONT_EXIST';
				session_write_close();
				header("location: index.php");
				exit();
		$con->close();
		}
	}
?>
</body>
</html>


