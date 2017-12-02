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
	
	

		<li> <a href="job_order.php" target="frame" >Job Order Receipt</a></li>
        <li> <a href="delivery_receipt.php" target="frame" >Delivery Receipt</a></li>
    	<li> <a href="service_report.php" target="frame" > Service Report</a></li>

  <section class="content">
                        <iframe  width="50%" height="50%" name="frame" scolling="none" frameborder="2"</iframe>                

	</section>


</body>





</html>