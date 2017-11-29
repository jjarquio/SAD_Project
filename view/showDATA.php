<?php

	session_start();

      if(!isset($_SESSION['username']))
	  {
		  header("location: loginSES.php");
	  }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Data</title>
	
</head>
<body>
<div class="nav">

<a href="dashboard.php">Dashboard</a>

</div>

	<div class="container">
		
		<table class="cart-table">
			
		 	<thead>
		 	
		 		<tr>

		 			<th>Job Order No.</th>
		 			<th>Date Recieved</th>
		 			<th>Customer Name</th>
					<th>Customer Contact No.</th>
					<th>Customer Address</th>	
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
		 			$query = "SELECT * FROM joborderstatus";
				 	$result = $con->query($query);

				 	while($row = $result->fetch_assoc()) {
				 		?>

				 		<tr>

				 			<td><?php echo $row['Job_order_no']; 		?></td>
				 			<td><?php echo $row['Date_received']; 		?></td>
							<td><?php echo $row['Customer_name'];?></td>
							<td><?php echo $row['Contact_no']; 	?></td>
							<td><?php echo $row['Customer_add']; ?></td>
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
							<td><?php echo $row['Supplier_add']; 	?></td>
							<td><?php echo $row['Supplier_cont_no']; 	?></td>
							<td><?php echo $row['Waybill']; 	?></td>
							<td><?php echo $row['Status']; 	?></td>
							<td>
							
						<a href="EditProduct.php?editProd=yes&Product_id=<?php echo $row['Product_id']; ?>">Edit</a>
						<a href="DeleteProd.php?&Product_id=<?php echo $row['Product_id']; ?>">Delete</a>
					</td>

				 		</tr>

				<?php 
						
				 	}

		 		?>
		 	</tbody>

		</table>

	</div>

</body>
</html>
