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


 <?php echo $_SESSION['USERNAME']. ",<br>". $_SESSION['POSITION']. "<br>"; ?>

           <a href="index.php">Dashboard</a><br><br>


	<form name="jobFORM" action="<?php $_PHP_SELF ?>" method="POST">
		
<!-- joborder auto inc, tempo fill in -->
		Job Order No. : <input type="number" name="jobORDER" value="" ><br>
		Customer Name : <input type="text" name="custNAME" > <br> 
		Contact No. (+63) : <input type="text" name="custCONT" placeholder="9123456780" > <br> 		
		Customer Address : <input type="text" name="custADD" ><br>
		Item Code: <input type="text" name="itemCODE" ><br>
		Item / Product : <input type="text" name="itemNAME" ><br>
		Brand : <input type="text" name="itemBRAND" ><br>
		Model : <input type="text" name="itemMODEL" ><br>
		Serial No. : <input type="text" name="serialNO" ><br>
		Quantity : <input type="number" name="itemQTY" ><br>
		Date Purchased : <input type="date" name="datePUR" ><br>
		Accesories : <textarea type="text" name="accesories"></textarea><br>
		
		Problem : <textarea type="text" name="problem"></textarea><br>
		
		Remarks : <textarea type="text" name="remarks"></textarea><br>

		<!-- date edit -->
		 <!-- <input type="hidden" name="dateEDIT"><br> -->
		
		<br>
		<input type="submit" name="submitJOB" value="Create">
		<!-- <button onclick="jobVALID()">Cancel</button> -->
		<input type="submit" name="cancelJOB" value="Cancel">

		
		
  
  				
		
		<!-- <a href="<?php $_PHP_SELF ?>" onclick="jobVALID()">Cancel</a> -->

	</form>

	<?php

	



	if (isset($_POST['submitJOB']) && $_POST['submitJOB']=="Create") {
		include "../DBconnect/connection.php";

		$jobORDER = strip_tags($_POST['jobORDER']);
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
		
		$sql = "INSERT INTO joborderstatus (Job_order_no, Customer_name, Contact_no, Customer_add, Item_code, Item, Brand, Model, Serial_no, Quantity, Date_purchased, Accessories, Problem, Remark, Service_by, Supplier_add, Supplier_cont_no, Waybill, Status, Edit_status_date) VALUES('$jobORDER', '$custNAME', '$custCONT', '$custADD', '$itemCODE', '$itemNAME', '$itemBRAND', '$itemMODEL', '$serialNO' , '$itemQTY', '$datePUR', '$accesories', '$problem', '$remarks', 'Pending', 'Pending', 'Pending', 'Pending', 'Pending', '0000-00-00')";

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

		header("location: index.php");
	}

	?>
		

</body>
</html>

<!-- $sql="INSERT INTO joborderstatus(Job_order_no, Customer_name, Contact_no, Customer_add, Item_code, Item, Brand, Model, Serial_no, Quantity, Date_purchased, Accessories, Problem, Remark, Service_by, Supplier_add, Supplier_cont_no, Waybill, Status)  -->
		<!-- VALUES('$jobORDER', '$custNAME', '$custCONT', '$custADD', '$itemCODE', '$itemNAME', '$itemBRAND', '$itemMODEL', '$serialNO', '$itemQTY', '$datePUR', '$accesories', '$problem', $remarks', '$servBY', '$suppADD', '$suppCONT', '$waybill', '$status') "; -->

	