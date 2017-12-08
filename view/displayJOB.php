<?php

	session_start();

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Data</title>
	
</head>
<body>


	<div class="container">
		
		<table class="cart-table">
			
		 	<thead>
		 	
		 		<tr>

		 			<th>Job Order No.</th>
		 			<th>Date Recieved</th>
		 			<th>Customer Name</th>
					<th>Customer Contact No.</th>
						
					<th>Item Code</th>
					<th>Item / Product</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Serial No.</th>
					<th>Quantity</th>
					<th>Date Purchased</th>
					<th>Accessories </th>
					<th>Problem</th>
					<th>Remarks</th>
					<th>Service By</th>
					<th>Supplier Address</th>
					<th>Contact No.</th>
					<th>Waybill</th>
					<th>Status</th>
					<th>Action</th>
					

		 		</tr>

		 	</thead>
		 	<tbody>
		 		<?php
		 			include "../DBconnect/connection.php";
		 			$query = "SELECT * FROM joborderstatus WHERE Job_order_no = ".$_GET['JobOrder'];
				 	$result = $con->query($query);

				 	while($row = $result->fetch_assoc()) {
				 		?>

				 		<tr>

				 			<td><?php echo $row['Job_order_no']; 		?></td>
				 			<td><?php echo $row['Date_received']; 		?></td>
							<td><?php echo $row['Customer_name'];?></td>
							<td><?php echo $row['Contact_no']; 	?></td>
							<td><?php echo $row['Item_code']; 	?></td>
							<td><?php echo $row['Item']; 	?></td>
							<td><?php echo $row['Brand']; 	?></td>
							
							<td><?php echo $row['Model']; 	?></td>
							<td><?php echo $row['Serial_no']; 	?></td>
							<td><?php echo $row['Quantity']; 	?></td>
							<td><?php echo $row['Date_purchased']; 	?></td>
							<td><?php echo $row['Accessories']; 	?></td>
							<td><?php echo $row['Problem']; 	?></td>
							<td><?php echo $row['Remark']; 	?></td>
							<td><?php echo $row['Service_by']; 	?></td>
							
							
						
					</td>

				 		</tr>

				<?php 
						
				 	}

		 		?>
		 	</tbody>

		</table>

	</div>

	<a href="index.php"> OKAY </a>

</body>
</html>
