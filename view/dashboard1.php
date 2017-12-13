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
		<!-- mao ni tong naay cancel -->
		<a href="createJOB1.php">Create new Job Order</a>
		<a href="generateREPORT.php">Generate Report</a>
		<a href="showDATA.php">Data</a>
		<a href="notif.php">Notification</a>
		<a href="help.php">Help</a>
		
	</div>

	
		<form action="<?php $_PHP_SELF ?>" method="POST">
			
		<input type="text" name="search" required>
		<input type="submit" name="submit" value="Search">

		</form>
		
		<div>

			<label>Search by</label>

			<a href="index.php?JobOrder">Job Order</a>
			<a href="index.php?CustName">Customer Name</a>
			<a href="index.php?ItemName">Item Name</a>
			<a href="searchDATE.php?DateCreate">Date Created</a>

		</div>
<div>
	


		<?php
		include "../DBconnect/connection.php";
		include "returnJO.php";

		$Search = isset($_POST['search'])?$_POST['search']:NULL;

		if(isset($_POST['submit']) && $_POST['submit']=="Search"){

			if (isset($_GET['JobOrder'])) {

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

			}elseif(isset($_GET['CustName'])) {

				$sql = "SELECT 	Job_order_no FROM joborderstatus WHERE Customer_name = '$Search' ORDER BY Job_order_no DESC ";

				$result = $con->query($sql);

				 	while($row = $result->fetch_assoc()) {

				?>

				
					<label>Job Order No.</label>
				<input type="text" name="Job_order_no" value="<?php echo $row['Job_order_no']; 	?>" required><br>

				

				<?php
				}
			}elseif (isset($_GET['ItemName'])) {

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