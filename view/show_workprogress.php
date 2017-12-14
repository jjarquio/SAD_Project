<?php
	include "../DBconnect/connection.php";
	session_start();

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }

?>
<html>
	<head>
		</head>
		<body>

 			<?php echo $_SESSION['USERNAME']. ",<br>". $_SESSION['POSITION']. "<br>"; ?>
			
			 <a href="showDATA.php">BACK</a><br><br>
<?php
			 	$sql = "SELECT * FROM joborderstatus WHERE Status ='Work in Progress'";

				$result = $con->query($sql);
				?>
			<thead>
		 	<table border="1" align="center"style"line-height: 25px";>
		 		<tr>

		 			<th>Job Order No.</th>
		 			<th>Date Recieved</th>
		 			<th>Customer Name</th>
					<th>Customer Contact No.</th>
					<th>Customer Address</th>
					<th>Item / Product</th>	
					<th>Item Code</th>
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
					
					<?php
					if ($_SESSION['POSITION']=="head"){ ?>
					<th>Action</th>
					<?php
					}
?>		 		</tr>


<?php 
    if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            ?>
			<tr class="record">
            <tr>
				            <td><?php echo $row['Job_order_no']; 		?></td>
				 			<td><?php echo $row['Date_received']; 		?></td>
							<td><?php echo $row['Customer_name'];?></td>
							<td><?php echo $row['Contact_no']; 	?></td>
							<td><?php echo $row['Customer_add']; ?></td>
							<td><?php echo $row['Item']; 	?></td>
							<td><?php echo $row['Item_code']; 	?></td>
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

							<?php    
		if ($_SESSION['POSITION'] == "head") {
?>
			<td><a  title="Click To Edit user" rel="facebox" href="edit_job_order.php?id=<?php echo $row['Job_order_no']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
            <a onclick = "return confirm('Are you sure?')" href="show_workprogress.php?idd=<?php echo $row['Job_order_no']; ?>" ><button class = "btn btn-danger">Delete </button></a>
		    </tr>

					<?php
							if(isset($_GET['idd'])){
								$idd = $_GET['idd'];
								   $sql = "DELETE FROM joborderstatus WHERE Job_order_no = '$idd'";
									$result = $con->query($sql);
								if($result){
									?>
									<script>
										alert("Data deleted");
										window.location.href='show_workprogress.php';
										</script>
									<?php
								}else{
									?>
									<script>
										alert("Failed to delete");
										window.location.href='show_workprogress.php';
										</script>
										<?php
								}
							}

							?>

				<?php
							}
					}
				}
				?>
				</body>
				</html>