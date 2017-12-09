<?php

	session_start();
	include "../DBconnect/connection.php";

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }
	  if (!$_GET['JobOrder']) {
	header("location: generateReport.php");
	}

	$jobORDER = isset($_GET['JobOrder']);
//echo $jobORDER ;
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

	$sql = "SELECT * FROM joborderstatus WHERE Job_order_no = '$jobORDER'";
	$result = $con->query($sql);
	if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
    
	?>

	<section>
		<div>
			<h3>RASI COMPUTER INC. ROXAS AVE. NEAR PADRE GOMEZ ST., DAVAO CITY</h4>
		</div>
		<div>
			<h4>TEL# 222-2245/222-1075 - MOBILE 09228457291</h4>
		</div>
		<div>
			Job Order No. : <?php echo $row['Job_order_no']; ?>
		</div>
	</section>
	<?php
}
}
?>
</body>
</html>