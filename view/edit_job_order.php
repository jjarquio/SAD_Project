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
	$dateEDIT = $row['Edit_status_date'];
				
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


	 <a href="index.php">Dashboard</a><br><br>
		
<!-- joborder auto inc, tempo fill in -->

	<?php 
		if($_SESSION['POSITION']=='head'){

			?>
 <input value="<?php echo $jobORDER ?>" type="hidden" name="jobORDER" />
		Job Order No. : <?php echo $jobORDER ?><br>
		<!-- Date Received : --><input value="<?php echo $dateREC ?>" type="hidden" name="dateREC" value="" required><br> 
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
		
		Accesories : <textarea type="text" name="accesories" required><?php echo $accesories ?></textarea><br>
		Problem : <textarea type="text" name="problem" required><?php echo $problem ?></textarea><br>
		
		Remarks : <textarea type="text" name="remarks" required><?php echo $remarks ?></textarea><br>
		Date Transfer: <input type="date" name="dateEDIT" required><br>
		Service By : <input value="<?php echo $servBY ?>" type="text" name="servBY" required><br>
		Supplier Address : <input value="<?php echo $suppADD ?>" type="text" name="suppADD" required><br>
		Contact No. (+63) : <input value="<?php echo $suppCONT ?>" type="text" name="suppCONT" placeholder="9123456780" required><br>
		Waybill : <textarea type="text" name="waybill" required><?php echo $waybill ?></textarea><br>
		Status : 
		



			<select name="status">
			<option value="Pending" selected value = "<?php $status ?>">Pending</option>
			<option value="Work in Progress">Work in Progress</option>
			<option value="To Release">To Release</option>
			<option value="Released">Released</option>
			</select>



		<input type="submit" name="edit" value="Edit">
		

		<?php

		}else{
			?>



					<input value="<?php echo $jobORDER ?>" type="hidden" name="jobORDER" />
					<input value="<?php echo $dateREC ?>" type="hidden" name="dateREC" />
					<input value="<?php echo $custNAME ?>" type="hidden" name="custNAME" />
					<input value="<?php echo $custCONT ?>" type="hidden" name="custCONT" />		
					<input value="<?php echo $custADD ?>" type="hidden" name="custADD" />
					<input value="<?php echo $itemCODE ?>" type="hidden" name="itemCODE" />
					<input value="<?php echo $itemNAME ?>" type="hidden" name="itemNAME" />
					<input value="<?php echo $itemBRAND ?>" type="hidden" name="itemBRAND" />
					<input value="<?php echo $itemMODEL ?>" type="hidden" name="itemMODEL" />
					<input value="<?php echo $serialNO ?>" type="hidden" name="serialNO" />
					<input value="<?php echo $itemQTY ?>" type="hidden" name="itemQTY" />
					<input value="<?php echo $datePUR ?>" type="hidden" name="datePUR" />
					<input value="<?php echo $accesories ?>" type="hidden" name="accesories" />
					<input value="<?php echo $problem ?>" type="hidden" name="problem" />







					Job Order No. : <?php echo $jobORDER ?><br>
					Date Received : <?php echo $dateREC ?><br>
					Customer Name : <?php echo $custNAME ?><br>
					Contact No. (+63): <?php echo $custCONT ?><br>		
					Customer Address : <?php echo $custADD ?><br>
					Item Code: <?php echo $itemCODE ?><br>
					Item / Product : <?php echo $itemNAME ?><br>
					Brand : <?php echo $itemBRAND ?><br>
					Model : <?php echo $itemMODEL ?><br>
					Serial No. : <?php echo $serialNO ?><br>
					Quantity : <?php echo $itemQTY ?><br>
					Date Purchased : <?php echo $datePUR ?><br>
					Accesories : <?php echo $accesories ?><br>
					Problem : <?php echo $problem ?><br>
					
					Remarks : <textarea type="text" name="remarks" required><?php echo $remarks ?></textarea><br>
					Date Transfer: <input type="date" name="dateEDIT" required><br>
					Service By : <input value="<?php echo $servBY ?>" type="text" name="servBY" required><br>
					Supplier Address : <input value="<?php echo $suppADD ?>" type="text" name="suppADD" required><br>
					Contact No. (+63) : <input value="<?php echo $suppCONT ?>" type="text" name="suppCONT" placeholder="9123456780" required><br>
					
					Waybill : <textarea type="text" name="waybill" required><?php echo $waybill ?></textarea><br>
					Status : <br>
				
						<select name="status" selected value = "<?php $status ?>">
						
						<option value="Pending" >Pending</option>
						<option value="Work in Progress">Work in Progress</option>
						<option value="To Release">To Release</option>
						<option value="Released" > Release</option>
						
						</select>
					<br>
					<input type="submit" name="edit" value="Edit">
					<!-- <button onclick="jobVALID()">Cancel</button> -->
					<input type="submit" name="cancel" value="Cancel">





	<?php
		}
?>
		
  
  				
		
		<!-- <a href="<?php $_PHP_SELF ?>" onclick="jobVALID()">Cancel</a> -->

	</form>

</body>
</html>

<?php
	

	if (isset($_POST['edit']) && $_POST['edit']=="Edit") {
			 


			$jobORDER = strip_tags($_POST['jobORDER']);
			$dateREC = strip_tags($_POST['dateREC']);
			$custNAME = strip_tags($_POST['custNAME']);
			$custCONT = strip_tags($_POST['custCONT']);
			$custADD = strip_tags($_POST['custADD']);
			$itemCODE = strip_tags($_POST['itemCODE']);
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
			$dateEDIT = strip_tags($_POST['dateEDIT']);

			$status = strip_tags($_POST['status']);




		include '../DBconnect/connection.php';
		$sql = "UPDATE joborderstatus 
		SET
			Job_order_no = '$jobORDER',
			Date_received = '$dateREC',
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
			Status = '$status',
			Edit_status_date = '$dateEDIT'
		WHERE 
			Job_order_no = '$joID'";
		$result = $con->query($sql);

		if ($result) {
			?>
			<script>myFunction();
					function myFunction() {

						alert("Job order updated");
					window.location.href='update_job_order.php';
					}
					</script><?php
			//header("location: update_job_order.php");
		}else{
			echo "ERROR";
		}
	}

?>