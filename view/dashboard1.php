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
	<title>Dashboard</title>


</head>
<body>
	

	<div class="nav">

		<!-- code for position here -->

		<?php
	echo "<br> Welcome, " . $_SESSION['USERNAME']. "<br>";
	echo date('Y-m-d H:i:s');
		?>

<form action="logout.php">
		<input type="submit" name="logout" value="Logout">
	</form>	


	</div>

	<div class="bar">

		<a href="createJOB.php">Create new Job Order</a> <br>
		<a href ="update_job_order.php">Update Job Order </a> <br>
		<a href="generateREPORT.php">Generate Receipts</a><br>
		<a href="showDATA.php">Show all Job Order</a><br>
			<?php if($_SESSION['POSITION']=='head'){
			?>
				<a href="users.php">Manage Users</a><br> 
				<?php
				}
		?>
		<a href="notif.php">Notification</a><?php echo $_SESSION['NOTIF']; ?><br>
		<a href="help.php">Help</a> <br>

	
	</div>


			<label>Search by</label>

		<form action="<?php $_PHP_SELF ?>" method="POST">

			<select name="Subject">
			
			<option value="1" selected value = "Job Order">Job Order</option>
			<option value="2">Customer Name</option>
			<option value="3">Item Code</option>
			<option value="4">Date Created</option>
			</select>
	
			
			<input type="text" name="search" required>
			<input type="submit" name="submit" value="Search">

			</form>
		</div>
<div>
	


		<?php
		include "../DBconnect/connection.php";
		include "returnJO.php";

		$Search = isset($_POST['search'])?$_POST['search']:NULL;

		if(isset($_POST['submit']) && $_POST['submit']=="Search"){

		$option = $_POST['Subject'];

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
					<th>Action</th>
					

		 		</tr>

				 <?php

			if ($option == "1") {

				$data = retJO($Search);
				?>
				<label>Job Order No.: </label>
				<?php echo $data->Job_order_no ?><br>

				<label>Customer Name: </label>
				<?php echo $data->Customer_name ?><br>

				<label>Item: </label>
				<?php echo $data->Item ?><br>

				<label>Status: </label>
				<?php echo $data->Status ?><br>	
		

				<?php

			}elseif ($option == "2") {
				$sql = "SELECT 	Job_order_no FROM joborderstatus WHERE Customer_name = '$Search' ORDER BY Job_order_no DESC ";

				$result = $con->query($sql);

				 	while($row = $result->fetch_assoc()) {

				?>

				
					<label>Job Order No.</label>
				<input type="text" name="Job_order_no" value="<?php echo $row['Job_order_no']; 	?>" required><br>

				

				<?php
				}
			}elseif ($option == "3") {

				$data = retItem($Search);
				?>

				<label>Job Order No.: </label>
				<?php echo $data->Job_order_no ?><br>

				<label>Customer Name: </label>
				<?php echo $data->Customer_name ?><br>

				<label>Item: </label>
				<?php echo $data->Item ?><br>

				<label>Status: </label>
				<?php echo $data->Status ?><br>	

				<label>Date Received: </label>
				<?php echo $data->Date_received ?><br>			

				<?php
			}

		}



		?>

		</div>

		<div>
			<?php
			$a = $b = $c = $d = $e = $f = $g = $h = $i = $j = NULL;


		if(isset($_COOKIE['job'])) {

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