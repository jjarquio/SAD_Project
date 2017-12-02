<html>
<head>

</head>


<body>
<?php

	session_start();

	if (!isset($_SESSION['username'])) {
		header("location: dashboard.php");
	}

?>

<div class="nav">
		
		<a href="dashboard.php">Dashboard</a>

	</div>
	
	

		<a href="delivery_receipt.php">Delievery Receipt</a> <br>
		<a href="job_order.php">Job Order Receipt</a> <br>
		<a href="service_report.php">Service Report</a>



</body>





</html>