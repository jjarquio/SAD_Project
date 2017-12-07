<?php
		session_start(); 
      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location:../index.php");
	  }
	  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="bar">
		<a href="joRECEIPT.php">Job Order Receipt</a>
		<a href="delRECEIPT.php">Delivery Receipt</a>
		<a href="serRECEIPT.php">Service Report</a>
	</div>

</body>
</html>