<?php 

	session_start(); 

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location:../index.php");
	  }
		unset($_COOKIE['job']);

	?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>


</head>
<body>
	

	<div class="nav">

		<!-- code for position here -->

		<?php
	echo "<br> Welcome, " . $_SESSION['POSITION']. "<br>";
	echo date('Y-m-d H:i:s');
		?>

<form action="logout.php">
		<input type="submit" name="logout" value="Logout">
	</form>	


	</div>

	<div class="bar">

		<a href="createJOB.php">Create new Job Order</a> <br>
		<a href ="update_job_order.php">Update Job Order </a> <br>
		<a href="generateREPORT.php">Generate Report</a><br>
		<a href="showDATA.php">Show all Data</a><br>
		<a href="notif.php">Notification</a><br>
		<a href="help.php">Help</a> <br><br>
		
	</div>

	
		
		
		<div>


		<!-- GI HIMO LNG NAKO UG OPTION  ANG SA BEFORE MAG UNDERGO UG SEARCHING-->
			<label>SEARCHED BY:</label>

		<form action="<?php $_PHP_SELF ?>" method="POST">

			<select name="Subject">
			
			<option value="1" selected value = "Job Order">Job Order</option>
			<option value="2 ">Customer Name</option>
			<option value="3">Item Code</option>
			<option value="4">Date Created</option>
			</select>
	
			
			<input type="text" name="search" required>
			<input type="submit" name="submit" value="Search">

			</form>
  <br>

		</div>

<div>
	

		<?php

	
		include "../DBconnect/connection.php";
		include "returnJO.php";

		
		$Search = isset($_POST['search'])?$_POST['search']:NULL;
	
		echo "$Search";


		if(isset($_POST['submit']) && $_POST['submit']=="Search"){
		$option = $_POST['Subject'];

			if ($option == "1") {
				
				$sql = "SELECT * FROM joborderstatus WHERE Job_order_no ='$Search'";

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
						<td><a  title="Click To Edit user" rel="facebox" href="edit_job_order.php?id=<?php echo $row['Job_order_no']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
            </tr>

				<?php
			}

		}
		


		}if ($option == "2") {
				
				$sql = "SELECT Job_order_no FROM joborderstatus WHERE Customer_name ='$Search'";

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
						<td><a  title="Click To Edit user" rel="facebox" href="edit_job_order.php?id=<?php echo $row['Job_order_no']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
            </tr>

				<?php
			}

		}
		


		}if ($option == "3") {
				
				$sql = "SELECT * FROM joborderstatus WHERE Item_Code ='$Search'";

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
						<td><a  title="Click To Edit user" rel="facebox" href="edit_job_order.php?id=<?php echo $row['Job_order_no']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
            </tr>

				<?php
			}

		}
		


		}
		}

		?>

		</div>

		<div>
			<?php
			$a = $b = $c = $d = $e = $f = $g = $h = $i = $j = NULL;


	
		if(isset($_COOKIE['job'])){

				?>
			Job order : <?php echo $a=$_COOKIE['job'][15]; ?> <br>
			Customer Name : <?php echo $b=$_COOKIE['job'][0]; ?> <br>
			Contact No. (+63) : <?php echo $c=$_COOKIE['job'][1]; ?> <br>
			Customer Address : <?php echo $d=$_COOKIE['job'][2]; ?> <br>
			Item / Product : <?php echo $e=$_COOKIE['job'][3]; ?> <br>
			Brand : <?php echo $f=$_COOKIE['job'][4]; ?> <br>
			Model : <?php echo $g=$_COOKIE['job'][5]; ?> <br>
			Quantity : <?php echo $h=$_COOKIE['job'][7]; ?> <br>
			Date Purchased : <?php echo $i=$_COOKIE['job'][8]; ?> <br>
			Accesories : <?php echo $j=$_COOKIE['job'][9]; ?> <br>
			<?php
    
} else {
    echo "No cookies";
}

?>

			
			

		</div>
</body>
</html>