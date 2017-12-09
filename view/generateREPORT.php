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
			
			<option value="1" selected >Job Order</option>
			<option value="2" selected >Delivery Receipt</option>
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
	$option = $_POST['Subject'];
	
	if ($option == "1") {
		header("location: joRECEIPT.php?JobOrder=".$jobNUM);
	}
	elseif ($option == "2") {
		header("location: drRECEIPT.php?JobOrder=".$jobNUM);
	}
}



?>