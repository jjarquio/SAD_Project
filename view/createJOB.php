<?php

	session_start();

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }

	  if (isset($_COOKIE['job'])) {
	  	
	  }

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create Job Order</title>
</head>
<body>




	<a href="index.php">Dasboard</a>

	<form name="jobFORM" action="<?php $_PHP_SELF ?>" method="POST">
		
<!-- joborder auto inc, tempo fill in -->
		Job Order No. : <input type="number" name="jobORDER" value="" required><br>
		Customer Name : <input type="text" name="custNAME" required> <br> 
		Contact No. (+63) : <input type="text" name="custCONT" placeholder="9123456780" required> <br> 		
		Customer Address : <input type="text" name="custADD" required><br>
		Item Code: <input type="text" name="itemCODE" required><br>
		Item / Product : <input type="text" name="itemNAME" required><br>
		Brand : <input type="text" name="itemBRAND" required><br>
		Model : <input type="text" name="itemMODEL" required><br>
		Serial No. : <input type="text" name="serialNO" required><br>
		Quantity : <input type="number" name="itemQTY" required><br>
		Date Purchased : <input type="date" name="datePUR" required><br>
		Accesories : <input type="text" name="accesories" required><br>
		Problem : <input type="text" name="problem" required><br>
		Remarks : <input type="text" name="remarks" required><br>
		
		<br>
		<input type="submit" name="submitJOB" value="Create">
		<!-- <button onclick="jobVALID()">Cancel</button> -->
		<input type="submit" name="cancelJOB" value="Cancel">

		
		
  
  				
		
		<!-- <a href="<?php $_PHP_SELF ?>" onclick="jobVALID()">Cancel</a> -->

	</form>

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



	if (isset($_POST['submitJOB']) && $_POST['submitJOB']=="Create") {
		include "../DBconnect/connection.php";

		$sql = "INSERT INTO joborderstatus (Job_order_no, Customer_name, Contact_no, Customer_add, Item_code, Item, Brand, Model, Serial_no, Quantity, Date_purchased, Accessories, Problem, Remark, Service_by, Supplier_add, Supplier_cont_no, Waybill, Status) VALUES('$jobORDER', '$custNAME', '$custCONT', '$custADD', '$itemCODE', '$itemNAME', '$itemBRAND', '$itemMODEL', '$serialNO' , '$itemQTY', '$datePUR', '$accesories', '$problem', '$remarks', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending')";

		$result = $con->query($sql); 

		if($result){

		echo "Job Order: ".$_POST['jobORDER']."<br>";
			header("location: displayJOB.php?JobOrder=".$_POST['jobORDER']);
         //   echo "Job Order: ".$_POST['jobORDER']."<br>";
         //   echo "Customer Name: ".$_POST['custNAME']."<br>";
			/** $cookies=explode(';',$_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) 
    {$parts=explode('=',$cookie);
    $name=trim($parts[0]);
    setcookie($name,'',time()-1000);
    setcookie($name,'',time()-1000,'/');
    }
*/
            
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

	