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
	<form action="<?php $_PHP_SELF ?>" method="POST">

		Job Order no. <br>
		<select name="Subject">
			
			<option value="jo" selected value ="Job Order">Job Order</option>
			
			</select>
		<input type="number" name="jobNUM">
		<input type="submit" name="gen" value="Generate">

		
	</form>

	<div class="bar">
		<!-- <a href="joRECEIPT.php">Job Order Receipt</a> -->
		<a href="delRECEIPT.php">Delivery Receipt</a>
		<a href="serRECEIPT.php">Service Report</a>
	</div>

</body>
</html>
<?php

$jobNUM = isset($_POST['jobNUM'])?$_POST['jobNUM']:NULL;


if (isset($_POST['gen']) && $_POST['gen']=="Generate") {
//echo $jobNUM;
	header("location: joRECEIPT.php?JobOrder=".$jobNUM);
}


?>