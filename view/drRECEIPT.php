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
	//$suppADD;

	//$sql = "SELECT Supplier_name FROM supplier WHERE Supplier_add IN (SELECT Supplier_add FROM joborderstatus WHERE Supplier_add = '$suppADD')";
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
	<center>
		<section>
		<table border="1" style="width: 80%">
			<tr>
				<td>
					<h1>
					RASI COMPUTER INC.
					</h1>
				</td>
				
			</tr>
		</table>
		
		<table border="1" style="width: 80%">
				<tr>
					<td>
						<h3>DELIVERY RECEIPT</h3> 
					</td>
					
				</tr>
		</table>
		<table border="1" style="width: 80%">
			<tr>
					<td align="right" width="20%">
					JOB ORDER NO. 
					</td>
					<td align="left" width="20%">
						<?php echo $row['Job_order_no']; ?>
					</td>
					<td align="right" width="10%">
						DATE
					</td>
					<td align="right" width="10%">
						<?php echo date('Y-m-d'); ?> <br>
					</td>
				</tr>
			</tr>
			
		</table>
		<table border="1" style="width: 80%">
			<tr> 
				<!-- kani na query kay para makuha ang supplier
				name sa laing table -->
				<?php
				$sql = "SELECT Supplier_name FROM supplier WHERE Supplier_add IN (SELECT Supplier_add FROM joborderstatus WHERE Job_order_no = '$jobORDER')";
				$result = $con->query($sql);

				$row1=$result->fetch_assoc();

				?>
				<!-- SUPPLIER NAME dapat -->
				<td align="right" width="25%">
					DELIVERED TO
				</td>

				
				<td align="left" width="50%">
					<?php echo $row1['Supplier_name']; ?>
				</td>
				
			</tr>
			
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					ADDRESS
				</td>
				
				<td align="left" width="50%">
					<?php echo $row['Supplier_add']; ?>
				</td>
			</tr>
			
		</table>
		
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					QTY - ITEM | BRAND | MODEL
				</td>
				<td align="left" width="50%">
					<?php echo $row['Quantity']; ?> | <?php echo $row['Item']; ?> | <?php echo $row['Brand']; ?> | <?php echo $row['Model']; ?>
				</td>
			</tr>
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					ACCESSORIES
				</td>
				<td align="left" width="50%">
					<?php echo $row['Accessories']; ?>
				</td>
			</tr>
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					<center>
						SERIAL NO.<br>
					</center>
					<center>
						<?php echo $row['Serial_no']; ?>
					</center>
				</td>
				<td align="left" width="50%">
					<center>
						END USER - DATE PURCHASED
					</center>
					<center>
					<?php echo $row['Date_purchased']; ?>
					</center>
				</td>
			</tr>
				
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					<center>
						PROBLEM<br>
					</center>
					<center>
						<?php echo $row['Problem']; ?>
					</center>
				</td>
			</tr>
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="left" width="40%">
					<br>
					Received  the above items as per descriptions:
					<br><br>
					___________________________ 
					<br>
					AUTHORIZED SIGNATURE
					<br> <br>
					<td>
					<center>________________</center> 
					
					<center>DATE</center> 
					</td>
				</td>
				<td align="right" width="40%">
					END USER INFORMATION
					<br>
					<?php echo $row['Customer_name']; ?>
					<br>
					<?php echo $row['Contact_no']; ?>
				</td>
			</tr>
		</table>
		
	</section>
	</center>
	
<?php
		}
	}
?>
</body>
</html>