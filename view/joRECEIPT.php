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
	//echo $jobORDER;
	if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
    
	?>
	
	<section>
		<table>
			<tr>
				<td>
					<h2>RASI COMPUTER INC.</h2>
				</td>
				<td>
					<h5>NEAR PADRE GOMEZ ST., DAVAO CITY</h5>
				</td>
			</tr>
		</table>
		<table style="width: 50%">
			<td align="right">
				
			<h4>TEL# 222-2245/222-1075 - MOBILE 09228457291</h4>
			
			</td>
			
		</table>
		
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
				
				
					<td style="padding-left: 40%" >
					Problem
					</td>
					<tr>
						<td>
						<?php echo $row['Problem']; ?>
					</td>
					</tr>
					
				
			</table>
			<table  style="width: 50%">
				
			</table>

			<table border="1" style="width: 50%">
				<tr>
					<td><br>
						REMARK
					</td>
					<td align="left"><br>
						<?php echo $row['Problem']; ?>
					</td>
				</tr>
			</table>
					
			
			 

		</div>
	</section>
<br><br>


	<section class="note">
		1. RASI COMPUTER is not liable for any DATA LOSS and UNLICENSED/PIRATED SOFTWARE that is presently in the computer brought in for check up and repair.<br><br>
		2. Items not claimed after a period of three (3) months will automatically be come the property of RASI.<br><br>
		3. A storage fee of P25/day will be charged if the item is not claimed within thirty(30) days after notice of completion.<br><br>
		4. <br><br><br>

		<table style="width: 45%">
			<tr>
				<td>
					CONFORME:
				</td>
				<td>
					Received by:
				</td>
				
			</tr>
			<tr>
				<td><br>
					________________________________
				</td>
				<td>
					<?php echo $_SESSION['NAME']; ?>
				</td>
			</tr>
		</table>
	</section>
	<?php
}
}
?>
</body>
</html>