<?php
		session_start(); 
		include "../DBconnect/connection.php";
      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location:../index.php");
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
    $datee = $row['Date_received'];
    $dater = $row['Edit_status_date'];
$dateee = strtotime($datee);
$date = date('Y-m-d', $dateee);
$daterr = strtotime($dater);
$dateRET = date('Y-m-d', $daterr);
	?>
	<center>
		<table>
			<table  border="1" style="width: 80%">
			<tr>
				<td align="center">
					<h1>
					RASI COMPUTER INC.
					</h1>
				</td>
			</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="center">
						
							<b>ROXAS AVE. NEAR PADRE GOMEZ ST., DAVAO CITY</b> <br>
							TEL# 222-2245 / 222-1075 - MOBILE: 09228457291
						
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td>
					<br>
					</td>
				</tr>
				
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="center" style="font-size: 22px">
						SERVICE REPORT
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="right" width="20%">
						JOB ORDER NO.
					</td>
					<td align="left" width="20%" >
						<?php echo $row['Job_order_no']; ?>
					</td>
					<td align="center" width="1%">
						DATE
					</td>
					<td align="right" width="10%">
						<center>
							RECEIVED<br>
						</center>
						<center>
							<?php echo $date; ?>
						</center>
						
					</td>
					<td align="right" width="10%">
						<center>
							RETURN<br>
						</center>
						<center>
							<?php echo $dateRET; ?>
						</center>
						
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="right" width="9.175%">
						CLIENT NAME
					</td>
					<td align="left" width="20%" >
						<?php echo $row['Customer_name']; ?>
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="right" width="8.4%">
						CONTACT NO.<br>
						QTY - ITEM | BRAND | MODEL<br>
						ACCESSORIES
					</td>
					<td align="left" width="20%" >
						<?php echo $row['Contact_no']; ?><br>
						<?php echo $row['Quantity']; ?> | <?php echo $row['Item']; ?> | <?php echo $row['Brand']; ?> | <?php echo $row['Model']; ?><br>
						<?php echo $row['Accessories']; ?>
					</td>
				</tr>
			</table>
			<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					<center>
						PROBLEM DESCRIPTION<br>
					</center>
					<center>
						<?php echo $row['Problem']; ?>
					</center>
				</td>
			</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="right" width="9.175%">
						REPLACEMENT / REPLACEMENT DETAILS:
					</td>
					<td align="left" width="20%" >
						<?php echo $row['Customer_name']; ?>
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="left" width="20%" >
	<section class="note">
		1. RASI COMPUTER is not liable for any DATA LOSS and UNLICENSED/PIRATED SOFTWARE that is presently in the computer brought in for check up and repair.<br><br>
		2. Items not claimed after a period of three (3) months will automatically be come the property of RASI.<br><br>
		3. A storage fee of P25/day will be charged if the item is not claimed within thirty(30) days after notice of completion.<br><br>
		4. <br><br>
		<table align="right" style="width: 60%">
					<tr>
						<td align="center">
					<br>
					RELEASED BY
					<br><br>
					___________________________ 
					<br>
					PRINTED NAME AND SIGNATURE
						</td>
						
					<td align="center">
						<br>
								RELEASED BY
							<br><br>
							___________________________ 
							<br>
							DATE
							</td>
						
					</tr>
				</table>
		<table border="1" style="width: 40%">
			<tr>
				<td align="center" style="width: -20%">
					<br>
					Received  the above items as per descriptions:
					<br><br>
					___________________________ 
					<br>
					AUTHORIZED SIGNATURE
				</td>
				
			</tr>

			</table><br>
			
	</section>
					</td>
				</tr>
			</table>
			
			
	
		</table>
		
		
	</center>
	<?php
}
}
	?>
</body>
</html>