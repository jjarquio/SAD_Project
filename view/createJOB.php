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
	<title>Create Job Order</title>
</head>
<body>

	<div class="nav">
		
		<a href="dashboard.php">Dashboard</a>

	</div>

	<form action="<?php $_PHP_SELF ?>" method="POST">
		
		
		Customer Name : <input type="text" name="custNAME" required> <br>
		Contact No. (+63) : <input type="text" name="custCONT" placeholder="9123456780" required><br>
		Customer Address : <input type="text" name="custADD" required><br>
		Item / Product : <input type="text" name="itemNAME" required><br>
		Brand : <input type="text" name="itemBRAND" required><br>
		Model : <input type="text" name="itemMODEL" required><br>
		Serial No. : <input type="text" name="serialNO" required><br>
		Date Purchased : <input type="date" name="datePUR" required><br>
		Accesories : <input type="text" name="accesories" required><br>
		Problem : <input type="text" name="problem" required><br>
		Remarks : <input type="text" name="remarks" required><br>
		Service By : <input type="text" name="servBY" required><br>
		<input type="hidden" name="status" value="pending" ><br>
  
		<input type="submit" name="submitJOB" value="Create">

	</form>

	<?php


	$a = isset($_POST['custNAME'])?$_POST['custNAME']:NULL;
	$b = isset($_POST['custCONT'])?$_POST['custCONT']:NULL;
	$c = isset($_POST['custADD'])?$_POST['custADD']:NULL;
	$d = isset($_POST['itemNAME'])?$_POST['itemNAME']:NULL;
	$e = isset($_POST['itemBRAND'])?$_POST['itemBRAND']:NULL;
	$f = isset($_POST['itemMODEL'])?$_POST['itemMODEL']:NULL;
	$g = isset($_POST['serialNO'])?$_POST['serialNO']:NULL;
	$h = isset($_POST['datePUR'])?$_POST['datePUR']:NULL;
	$i = isset($_POST['accesories'])?$_POST['accesories']:NULL;
	$j = isset($_POST['problem'])?$_POST['problem']:NULL;
	$k = isset($_POST['remarks'])?$_POST['remarks']:NULL;
	$l = isset($_POST['servBY'])?$_POST['servBY']:NULL;
	$m = isset($_POST['status'])?$_POST['status']:NULL;


	if (isset($_POST['submitJOB']) && $_POST['submitJOB']=="Create") {
		include "../DBconnect/connection.php";

		$sql = "INSERT INTO  joborderstatus 
		( Customer_name, Contact_no, Customer_add, Item, Brand, Model, Serial_no, Date_purchased, Accessories, Problem, Remark, Service_by, _status)
		VALUES
		( '$a', '$b', '$c', '$d', '$e', '$f', '$g' , '$h', '$i', '$j', '$k', '$l', '$m')";

		$result = $con->query($sql); 

		if($result){
            echo "Success";
            header("location; dashboard.php");
		}else{
			echo " damn!";
		}
			
	}

	?>

</body>
</html>

<!-- $sql="INSERT INTO joborderstatus(Job_order_no, Customer_name, Contact_no, Customer_add, Item_code, Item, Brand, Model, Serial_no, Quantity, Date_purchased, Accessories, Problem, Remark, Service_by, Supplier_add, Supplier_cont_no, Waybill, Status)  -->
		<!-- VALUES('$jobORDER', '$custNAME', '$custCONT', '$custADD', '$itemCODE', '$itemNAME', '$itemBRAND', '$itemMODEL', '$serialNO', '$itemQTY', '$datePUR', '$accesories', '$problem', $remarks', '$servBY', '$suppADD', '$suppCONT', '$waybill', '$status') "; -->