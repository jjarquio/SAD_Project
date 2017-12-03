<?php
		session_start(); 
      if(!isset($_SESSION['username']))
	  {
		  header("location:loginSES.php");
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