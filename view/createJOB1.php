<?php

// kani na page kay sa cookies sa pagadd sa db, dummy dashboard


	session_start();

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }
//later nani
	  if (isset($_COOKIE['job'])) {
	  	
	  }

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Job Order</title>
</head>
<body>

	

	<form name="jobFORM" action="<?php $_PHP_SELF ?>" method="POST">
		<?php
			if (isset($_COOKIE['job'])) {
				?>
	  	<!-- joborder auto inc, tempo fill in -->
		Job Order No. : <input value="<?php echo $jobORDER=$_COOKIE['job'][15]; ?>" type="number" name="jobORDER" value="" required><br>
		 Customer Name : <input value="<?php echo $custNAME=$_COOKIE['job'][0]; ?>" type="text" name="custNAME" required> <br>
		Contact No. (+63) : <input value="<?php  $custNAME=$_COOKIE['job'][1]; ?>" type="text" name="custCONT" required> <br> 		
		Customer Address : <input value="<?php echo $custNAME=$_COOKIE['job'][2]; ?>" type="text" name="custADD" required><br>
		Item / Product : <input value="<?php echo $custNAME=$_COOKIE['job'][3]; ?>" type="text" name="itemNAME" required><br>
		Brand : <input value="<?php echo $custNAME=$_COOKIE['job'][4]; ?>" type="text" name="itemBRAND" required><br>
		Model : <input value="<?php echo $custNAME=$_COOKIE['job'][5]; ?>" type="text" name="itemMODEL" required><br>
		Serial No. : <input value="<?php echo $custNAME=$_COOKIE['job'][6]; ?>" type="text" name="serialNO" required><br>
		Quantity : <input value="<?php echo $custNAME=$_COOKIE['job'][7]; ?>" type="number" name="itemQTY" required><br>
		Date Purchased : <input value="<?php echo $custNAME=$_COOKIE['job'][8]; ?>" type="date" name="datePUR" required><br>
		Accesories : <input value="<?php echo $custNAME=$_COOKIE['job'][9]; ?>" type="text" name="accesories" required><br>
		Problem : <input value="<?php echo $custNAME=$_COOKIE['job'][10]; ?>" type="text" name="problem" required><br>
		Remarks : <input value="<?php echo $custNAME=$_COOKIE['job'][11]; ?>" type="text" name="remarks" required><br>
		Service By : <input value="<?php echo $custNAME=$_COOKIE['job'][12]; ?>" type="text" name="servBY" required><br>
		Supplier Address : <input value="<?php echo $custNAME=$_COOKIE['job'][13]; ?>" type="text" name="suppADD" required><br>
		Contact No. (+63) : <input value="<?php echo $custNAME=$_COOKIE['job'][16]; ?>" type="text" name="suppCONT" placeholder="9123456780" required><br>
		Waybill : <input value="<?php echo $custNAME=$_COOKIE['job'][14]; ?>" type="text" name="waybill" required><br>

		 
		<br>
		<input type="submit" name="submitJOB" value="Create">
		<!-- <button onclick="jobVALID()">Cancel</button> -->
		<input type="submit" name="cancelJOB" value="Cancel">

		<?php


	  }


		?>
		
		
  
  				
		
		<!-- <a href="<?php $_PHP_SELF ?>" onclick="jobVALID()">Cancel</a> -->

	</form>

	<?php


	/**$jobORDER = $_COOKIE['job'][15];
	$custNAME = $_COOKIE['job'][0];
	$custCONT = $_COOKIE['job'][1];
	$custADD = $_COOKIE['job'][2];
	$itemNAME = $_COOKIE['job'][3];
	$itemBRAND = $_COOKIE['job'][4];
	$itemMODEL = $_COOKIE['job'][5];
	$serialNO = $_COOKIE['job'][6];
	$itemQTY = $_COOKIE['job'][7];
	$datePUR = $_COOKIE['job'][8];
	$accesories = $_COOKIE['job'][9];
	$problem = $_COOKIE['job'][10];
	$remarks = $_COOKIE['job'][11];
	$servBY = $_COOKIE['job'][12];
	$suppADD = $_COOKIE['job'][13];
	$suppCONT = $_COOKIE['job'][16];
	$waybill = $_COOKIE['job'][14];
*/


	if (isset($_POST['submitJOB']) && $_POST['submitJOB']=="Create") {

		include "../DBconnect/connection.php";
			$jobORDER = strip_tags($_POST['jobORDER']);
			$custNAME = strip_tags($_POST['custNAME']);
			$custCONT = strip_tags($_POST['custCONT']);
			$custADD = strip_tags($_POST['custADD']);
			$itemNAME = strip_tags($_POST['itemNAME']);
			$itemBRAND = strip_tags($_POST['itemBRAND']);
			$itemMODEL = strip_tags($_POST['itemMODEL']);
			$serialNO = strip_tags($_POST['serialNO']);
			$itemQTY = strip_tags($_POST['itemQTY']);
			$datePUR = strip_tags($_POST['datePUR']);
			$accesories = strip_tags($_POST['accesories']);
			$problem = strip_tags($_POST['problem']);
			$remarks = strip_tags($_POST['remarks']);
			$servBY = strip_tags($_POST['servBY']);
			$suppADD = strip_tags($_POST['suppADD']);
			$suppCONT = strip_tags($_POST['suppCONT']);
			$waybill = strip_tags($_POST['waybill']);
			$status = strip_tags($_POST['status']);


		$sql = "INSERT INTO joborderstatus (Job_order_no, Customer_name, Contact_no, Customer_add, Item, Brand, Model, Serial_no, Quantity, Date_purchased, Accessories, Problem, Remark, Service_by, Supplier_add, Supplier_cont_no, Waybill, Status) VALUES('$jobORDER', '$custNAME', '$custCONT', '$custADD', '$itemNAME', '$itemBRAND', '$itemMODEL', '$serialNO' , '$itemQTY', '$datePUR', '$accesories', '$problem', '$remarks', '$servBY', '$suppADD', '$suppCONT', '$waybill', 'Pending')";

		$result = $con->query($sql); 

		if($result){

		echo "Job Order: ".$_POST['jobORDER']."<br>";
			header("location: displayJOB.php?JobOrder=".$_POST['jobORDER']);
         //   echo "Job Order: ".$_POST['jobORDER']."<br>";
         //   echo "Customer Name: ".$_POST['custNAME']."<br>";
	 
  unset($_COOKIE['job']);
    
   
		}
			
	}elseif(isset($_POST['cancelJOB']) && $_POST['cancelJOB']=="Cancel") {

		setcookie("job[0]", $custNAME);
		setcookie("job[1]", $custCONT);
		setcookie("job[2]", $custADD);
		setcookie("job[3]", $itemNAME);
		setcookie("job[4]", $itemBRAND);
		setcookie("job[5]", $itemMODEL);
		setcookie("job[6]", $serialNO);
		setcookie("job[7]", $itemQTY);
		setcookie("job[8]", $datePUR);
		setcookie("job[9]", $accesories);
		setcookie("job[10]", $problem);
		setcookie("job[11]", $remarks);
		setcookie("job[12]", $servBY);
		setcookie("job[13]", $suppADD);
		setcookie("job[14]", $waybill);
		setcookie("job[15]", $jobORDER);
		setcookie("job[16]", $suppCONT);


		header("location: dashboard1.php");
	}

	?>
		

</body>
</html>

<!-- $sql="INSERT INTO joborderstatus(Job_order_no, Customer_name, Contact_no, Customer_add, Item_code, Item, Brand, Model, Serial_no, Quantity, Date_purchased, Accessories, Problem, Remark, Service_by, Supplier_add, Supplier_cont_no, Waybill, Status)  -->
		<!-- VALUES('$jobORDER', '$custNAME', '$custCONT', '$custADD', '$itemCODE', '$itemNAME', '$itemBRAND', '$itemMODEL', '$serialNO', '$itemQTY', '$datePUR', '$accesories', '$problem', $remarks', '$servBY', '$suppADD', '$suppCONT', '$waybill', '$status') "; -->

	