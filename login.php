<html>
<head>
	<meta charset = "utf-8">
</head>
<body>
<?php

	include "DBconnect/connection.php";

	//starting a session
	session_start();

	//VALIDATION ERROR FLAG
	$error_flag = false;



	if (!isset($_SESSION['USERNAME'])) {
		header("location: index.php");
	}else{
		header("location: view/index.php");
	}
	


	//INPUT VALIDATION
	if(isset($_POST['login']))
	{


	
		$username = mysqli_real_escape_string($con, $_POST['username']);  //converting the string to cancell out all tags and  special chracters 
		$password = mysqli_real_escape_string($con, $_POST['password']);  //converting the string to cancell out all the tagsa nd special characters
	
	

		//DB QUERY
		$sql="SELECT * FROM admin  WHERE Username = '$username' AND password = '$password'";	 
		$result = $con->query($sql); 
		if ($result->num_rows > 0){
	       while ($row = $result->fetch_array()) {


				$_SESSION['USERNAME']= $row[1];
				$_SESSION['POSITION']=$row[3];
				$_SESSION['NAME']=$row[0];

				header ("location: view/index.php" );
		   }
		}
		else{
				
				$_SESSION['ERROR_MESSAGE'] ='ACCOUNT_DONT_EXIST';		//NAG STORE UG ERROR MESSAGE SA SESSION, GAMITON AS FLAG SA LOGIN PARA MAG 
				session_write_close();									//FUNCTION ANG JAVASCRIPT
				header("location: index.php");
				exit();
		$con->close();
		}
	}
?>
</body>
</html>


