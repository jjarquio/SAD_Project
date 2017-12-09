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

	$jobORDER = $_GET['JobOrder'];
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
	echo $jobORDER;
	if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
    
	?>
	<table align="center" style="width: 100%">
		
	</table>
	<section>
		<div>
			<h3>RASI COMPUTER INC. ROXAS AVE. NEAR PADRE GOMEZ ST., DAVAO CITY</h4>
		</div>
		<div>
			<h4>TEL# 222-2245/222-1075 - MOBILE 09228457291</h4>
		</div>
		<div>
			
			<table border="1" style="width: 50%">
				<tr>
					<td align="right" style="padding-right: 5%">
						DATE
					</td>
					<td align="left">
						<?php echo date('Y-m-d'); ?> <br>
					</td>
				</tr>
				<tr>

					<td>
					JOB ORDER NO. 
					</td>
					<td align="left">
						<?php echo $row['Job_order_no']; ?>
					</td>
					
				</tr>
				<tr>
					<td>
						COMPANY / CONTACT PERSON
					</td>
					 <td align="left">
					 	<?php echo $row['Customer_name']; ?>
					 </td>
				</tr>
				<tr>
					<td>
						CONTACT NO.
					</td>
					<td align="left">
						<?php echo $row['Contact_no']; ?>
					</td>
				</tr>
				<tr>
					<td>
						ITEM | MODEL
					</td>
					<td align="left">
						<?php echo $row['Item']; ?> | <?php echo $row['Model']; ?>
					</td>
				</tr>
				<tr>
					<td>
						ACCESSORIES
					</td>
					<td align="left">
						<?php echo $row['Accessories']; ?>
					</td>
				</tr>
				
			</table>
			  
			
			
			<table border="1" style="width: 50%">
				<tr>
					<td style="padding-left: 10%">
					SERIAL NO.
					</td>
				<td>
					DATE OF PURCHASE
				</td>
				</tr>

				<td style="padding-left: 10%">
					<?php echo $row['Serial_no']; ?>
				</td>
				<td>
					<?php echo $row['Date_purchased']; ?>
				</td>
				
				
			</table>

			<table border="1" style="width: 50%">
				
				
					<td style="padding-left: 25%" >
					Problem
					</td>
					<tr>
						<td style="padding-left: 20%">
						<?php echo $row['Problem']; ?>
					</td>
					</tr>
					
				
			</table>
			<table  style="width: 50%">
				
			</table>

			<table border="1" style="width: 50%">
				<tr>
					<td>
						REMARK
					</td>
					<td align="left">
						<?php echo $row['Problem']; ?>
					</td>
				</tr>
			</table>
					
			
			 

		</div>
	</section>
	<?php
}
}
?>
</body>
</html>