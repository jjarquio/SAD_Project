<?php
require_once("../DBconnect/connectDB.php");
$db_handle = new connectDB();

	//vars para sa login
	/*$username = isset($_POST['username'])?$_POST['username']:NULL;
	$password = isset($_POST['password'])?$_POST['password']:NULL;*/

	//vars para sa pagadd og admin




	

if(isset($_POST['jobOSubmit'])){

	//SESSION for job order
	$_SESSION['Job_order_no'] = strip_tags($_POST['jobNum']);
	$_SESSION['Date_received'] = strip_tags($_POST['dateRec']);
	$_SESSION['Customer_name'] = strip_tags($_POST['custName']);
	$_SESSION['Contact_no'] = strip_tags($_POST['custContact']);
	$_SESSION['Customer_add'] = strip_tags($_POST['custAdd']);
	$_SESSION['Item_code'] = strip_tags($_POST['itmCode']);
	$_SESSION['Item'] = strip_tags($_POST['itmName']);
	$_SESSION['Brand'] = strip_tags($_POST['itmBrand']);
	$_SESSION['Model'] = strip_tags($_POST['itmModel']);
	$_SESSION['Serial_no'] = strip_tags($_POST['serialNum']);
	$_SESSION['Quantity'] = strip_tags($_POST['itemQty']);
	$_SESSION['Date_purchased'] = strip_tags($_POST['datePur']);
	$_SESSION['Accessories'] = strip_tags($_POST['accesories']);
	$_SESSION['Problem'] = strip_tags($_POST['problem']);
	$_SESSION['Remark'] = strip_tags($_POST['remarks']);
	$_SESSION['Service_by'] = strip_tags($_POST['servBy']);
	$_SESSION['Supplier_add'] = strip_tags($_POST['suppAddress']);
	$_SESSION['Supplier_cont_no'] = strip_tags($_POST['suppContact']);
	$_SESSION['Waybill'] = strip_tags($_POST['wayBill']);
	$_SESSION['Status'] = strip_tags($_POST['itmStatus']);






		$stats = implode(" , ",$_POST['itmStatus']);
		print_r($_SESSION['Status']);
	}

	//pagfetch para sa login
	if (isset($_POST['login']) && $_POST['login']=="Login") {
		

		//SESSION for login
		$_SESSION['username'] = strip_tags($_POST['username']);
		$_SESSION['password'] = strip_tags($_POST['password']);


		
		$query = "SELECT * FROM admin WHERE Username = \"".$_SESSION['username']."\" AND Password = 
		\"".$_SESSION['password']."\"";

		$con =mysqli_connect("localhost","root","","rma_db");

		$result = mysqli_query($con, $query);
		


		if($result){
			if (mysqli_num_rows($result)) {
				header("Location: jobOrderForm.php");
			}else{
			echo "<div class='form'>
				<h3>Username/password is incorrect.</h3>
				<br/></div>";
		}
	}

	}


	if (isset($_POST['add']) && $_POST['add']=="Add") {
		
			$addUser = strip_tags($_POST['addUser']);
			$password1 = strip_tags($_POST['password1']);
			$password2 = strip_tags($_POST['password2']);
			$position = strip_tags($_POST['position']);



		$query = "INSERT INTO admin (Username, Password, Position) 
					VALUES 
					(\"".$_SESSION['createUsername']."\", 
					\"".$_SESSION['createPassword2']."\", 
					\"".$_SESSION['createPosition']."\") 
					";
		
		
		if ($password1 == $password2) {
			$result = $db_handle->run($query);
			if ($result) {
			echo "successfully inserted";
			}else{
				echo "wala";
			}
		}
		
	}

	 if (isset($_POST['jobOSubmit']) && $_POST['jobOSubmit']=="jobOSubmit") {
		$query = "INSERT INTO joborderstatus (Job_order_no, Date_received, 
			Customer_name, Contact_no, Customer_add, Item_code, 
			Item, Brand, Model, Serial_no, Quantity, Date_purchased, 
			Accessories, Problem, Remark, Service_by, Supplier_add, 
			Supplier_cont_no, Waybill, Status) 
					VALUES 
					(\"".$_SESSION['Job_order_no']."\", 
					\"".$_SESSION['Date_received']."\", 
					\"".$_SESSION['Customer_name']."\",
					 
					\"".$_SESSION['Customer_add']."\", 
					\"".$_SESSION['Item_code']."\",
					\"".$_SESSION['Item']."\", 
					\"".$_SESSION['Brand']."\", 
					\"".$_SESSION['Model']."\",
					\"".$_SESSION['Serial_no']."\", 
					\"".$_SESSION['Quantity']."\", 
					\"".$_SESSION['Date_purchased']."\",
					\"".$_SESSION['Accessories']."\", 
					\"".$_SESSION['Problem']."\", 
					\"".$_SESSION['Remark']."\",
					\"".$_SESSION['Service_by']."\", 
					\"".$_SESSION['Supplier_add']."\", 
					\"".$_SESSION['Supplier_cont_no']."\",
					\"".$_SESSION['Waybill']."\", 
					\"".$_SESSION['Status']."\") 
					";

				$con =mysqli_connect("localhost","root","","rma_db");

		$result = mysqli_query($con, $query);

				if ($result) {
					header("Location: login.php");
				}else{
					echo "guoohoj";
				}
	}

	 if (isset($_POST['jobOSubmit']) && $_POST['jobOSubmit']=="jobOSubmit") {
	 	$query = "INSERT INTO joborderstatus (Status) VALUES (\"".$stats."\")";
	 
	 	$result = $db_handle->run($query);

	 	if ($result) {
	 		header("Location: login.php");
	 	}else{
	 	header("Location: jobOrderForm.php ");
	 	}

	 }


?>