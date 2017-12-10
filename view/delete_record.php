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
			header("location: showDATA.php");
		}
	if (!$_GET['Id']) {
	header("location: showDATA.php");
	}
			
			  
		$joID = $_GET['Id'];

	  $sql = "DELETE FROM joborderstatus WHERE Job_order_no = '$joID'";
		$result = $con->query($sql);


		if ($result) {
			header("location: showDATA.php");
		}else{
			echo "ERROR";
		}


?>
</body>
</html>