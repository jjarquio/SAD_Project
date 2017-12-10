<html>
<head>
</head>
<title>delete customer
</title>


<body>
<h1> duh </h1>


<?php		  session_start();
	include "../DBconnect/connection.php";

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }
	  

	if (!$_SESSION['POSITION'] == "head") {
			header("location: users.php");
		}
	if (!$_GET['Id']) {
	header("location: users.php");
	}
			
			  
		$joID = $_GET['Id'];

	  $sql = "DELETE FROM admin WHERE Username = '$joID'";
		$result = $con->query($sql);


		if ($result) {
			header("location: users.php");
		}else{
			echo "ERROR";
		}


?>
</body>
</html>