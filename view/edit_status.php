<?php

	session_start();
	include "../DBconnect/connection.php";

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }
	  

	if (!$_SESSION['POSITION'] == "head") {
			header("location: update_job_order.php");
		}
	if (!$_GET['id']) {
	header("location: update_job_order.php");
	}
		
	
	  $joID = $_GET['id'];

	  $sql = "SELECT * FROM joborderstatus WHERE Job_order_no = '$joID'";
		$result = $con->query($sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_array()){
					
	$jobORDER = $row['Job_order_no'];
	$dateREC = $row['Date_received'];
	$custNAME = $row['Customer_name'];
	$custCONT = $row['Contact_no'];
	$custADD = $row['Customer_add'];
	$itemCODE = $row['Item_code']; 	
	$itemNAME = $row['Item'];
	$itemBRAND = $row['Brand'];
	$itemMODEL = $row['Model'];
	$serialNO = $row['Serial_no'];
	$itemQTY = $row['Quantity'];
	$datePUR = $row['Date_purchased'];
	$accesories = $row['Accessories'];
	$problem = $row['Problem'];
	$remarks = $row['Remark']; 
	$servBY = $row['Service_by'];
	$suppADD = $row['Supplier_add'];
	$suppCONT = $row['Supplier_cont_no'];
	$waybill = $row['Waybill'];
	$status = $row['Status'];
				
				}
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<form name="jobFORM" action="<?php $_PHP_SELF ?>" method="POST">
		
<!-- joborder auto inc, tempo fill in -->
		Job Order No. : <input value="<?php echo $jobORDER ?>" type="number" name="jobORDER" value="" required><br>
		Customer Name : <input value="<?php echo $custNAME ?>" type="text" name="custNAME" required><br> 
		Contact No. (+63) : <input value="<?php echo $custCONT ?>" type="text" name="custCONT"  required> <br> 		
		Customer Address : <input value="<?php echo $custADD ?>" type="text" name="custADD" required><br>
		Item Code: <input value="<?php echo $itemCODE ?>" type="text" name="itemCODE" required><br>
		Item / Product : <input value="<?php echo $itemNAME ?>" type="text" name="itemNAME" required><br>
		Brand : <input value="<?php echo $itemBRAND ?>" type="text" name="itemBRAND" required><br>
		Model : <input value="<?php echo $itemMODEL ?>" type="text" name="itemMODEL" required><br>
		Serial No. : <input value="<?php echo $serialNO ?>" type="text" name="serialNO" required><br>
		Quantity : <input value="<?php echo $itemQTY ?>" type="number" name="itemQTY" required><br>
		Date Purchased : <input value="<?php echo $datePUR ?>" type="date" name="datePUR" required><br>
		Accesories : <input value="<?php echo $accesories ?>" type="text" name="accesories" required><br>
		Problem : <input value="<?php echo $problem ?>" type="text" name="problem" required><br>
		Remarks : <input value="<?php echo $remarks ?>" type="text" name="remarks" required><br>
		Service By : <input value="<?php echo $servBY ?>" type="text" name="servBY" required><br>
		Supplier Address : <input value="<?php echo $suppADD ?>" type="text" name="suppADD" required><br>
		Contact No. (+63) : <input value="<?php echo $suppCONT ?>" type="text" name="suppCONT" placeholder="9123456780" required><br>
		Waybill : <input value="<?php echo $waybill ?>" type="text" name="waybill" required><br>
		Status : <br>
		<input type="radio" name="status" value="Pending">Pending<br/>
		<input type="radio" name="status" value="Work in Progress">Work in Progress<br/>
		<input type="radio" name="status" value="To Release">To Release<br/>
		<br>
		<input type="submit" name="edit" value="Edit">
		<!-- <button onclick="jobVALID()">Cancel</button> -->
		<input type="submit" name="cancel" value="Cancel">

		
		
  
  				
		
		<!-- <a href="<?php $_PHP_SELF ?>" onclick="jobVALID()">Cancel</a> -->

	</form>

</body>
</html>

<?php
	

	$jobORDER = isset($_POST['jobORDER'])?$_POST['jobORDER']:NULL;
	$custNAME = isset($_POST['custNAME'])?$_POST['custNAME']:NULL;
	$custCONT = isset($_POST['custCONT'])?$_POST['custCONT']:NULL;
	$custADD = isset($_POST['custADD'])?$_POST['custADD']:NULL;
	$itemCODE = isset($_POST['itemCODE'])?$_POST['itemCODE']:NULL;
	$itemNAME = isset($_POST['itemNAME'])?$_POST['itemNAME']:NULL;
	$itemBRAND = isset($_POST['itemBRAND'])?$_POST['itemBRAND']:NULL;
	$itemMODEL = isset($_POST['itemMODEL'])?$_POST['itemMODEL']:NULL;
	$serialNO = isset($_POST['serialNO'])?$_POST['serialNO']:NULL;
	$itemQTY = isset($_POST['itemQTY'])?$_POST['itemQTY']:NULL;
	$datePUR = isset($_POST['datePUR'])?$_POST['datePUR']:NULL;
	$accesories = isset($_POST['accesories'])?$_POST['accesories']:NULL;
	$problem = isset($_POST['problem'])?$_POST['problem']:NULL;
	$remarks = isset($_POST['remarks'])?$_POST['remarks']:NULL;
	$servBY = isset($_POST['servBY'])?$_POST['servBY']:NULL;
	$suppADD = isset($_POST['suppADD'])?$_POST['suppADD']:NULL;
	$suppCONT = isset($_POST['suppCONT'])?$_POST['suppCONT']:NULL;
	$waybill = isset($_POST['waybill'])?$_POST['waybill']:NULL;
	$status = isset($_POST['status'])?$_POST['status']:NULL;

	echo $joID;

	if (isset($_POST['edit']) && $_POST['edit']=="Edit") {
		include '../DBconnect/connection.php';
		$sql = "UPDATE joborderstatus 
		SET
			Job_order_no = '$jobORDER',
			Customer_name = '$custNAME',
			Contact_no = '$custCONT',
			Customer_add = '$custADD',
			Item_code = '$itemCODE',
			Item = '$itemNAME',
			Brand = '$itemBRAND',
			Model = '$itemMODEL',
			Serial_no = '$serialNO',
			Quantity = '$itemQTY',
			Date_purchased = '$datePUR',
			Accessories = '$accesories',
			Problem = '$problem',
			Remark = '$remarks',
			Service_by = '$servBY',
			Supplier_add = '$suppADD',
			Supplier_cont_no = '$suppCONT',
			Waybill = '$waybill',
			Status = '$status'
		WHERE 
			Job_order_no = '$joID'";
		$result = $con->query($sql);

		if ($result) {
			header("location: update_job_order.php");
		}else{
			echo "ERROR";
		}
	}
	if (isset($_POST['cancel']) && $_POST['cancel']=="Cancel") {
		header("location: update_job_order.php");
	}

?>