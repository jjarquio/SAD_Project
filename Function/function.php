<?php
require_once("../DBconnect/connectDB.php");
$db_handle = new connectDB();

	//vars para sa login
	/*$username = isset($_POST['username'])?$_POST['username']:NULL;
	$password = isset($_POST['password'])?$_POST['password']:NULL;*/

	//vars para sa pagadd og admin
	$addUser = isset($_POST['addUser'])?$_POST['addUser']:NULL;
	$password1 = isset($_POST['password1'])?$_POST['password1']:NULL;
	$password2 = isset($_POST['password2'])?$_POST['password2']:NULL;
	$position = isset($_POST['position'])?$_POST['position']:NULL;

	//SESSION for login
	$_SESSION['username'] = isset($_POST['username'])?$_POST['username']:NULL;
	$_SESSION['password'] = isset($_POST['password'])?$_POST['password']:NULL;

	//SESSION for createadmin
	$_SESSION['createUsername'] = isset($_POST['addUser'])?$_POST['addUser']:NULL;
	$_SESSION['createPassword1'] = isset($_POST['password1'])?$_POST['password1']:NULL;
	$_SESSION['createPassword2'] = isset($_POST['password2'])?$_POST['password2']:NULL;
	$_SESSION['createPosition'] = isset($_POST['position'])?$_POST['position']:NULL;


	//SESSION for job order
	$_SESSION['Job_order_no'] = isset($_POST['jobNum'])?$_POST['jobNum']:NULL;
	$_SESSION['Date_received'] = isset($_POST['dateRec'])?$_POST['dateRec']:NULL;
	$_SESSION['Customer_name'] = isset($_POST['custName'])?$_POST['custName']:NULL;
	$_SESSION['Contact_no'] = isset($_POST['custContact'])?$_POST['custContact']:NULL;
	$_SESSION['Customer_add'] = isset($_POST['custAdd'])?$_POST['custAdd']:NULL;
	$_SESSION['Item_code'] = isset($_POST['itmCode'])?$_POST['itmCode']:NULL;
	$_SESSION['Item'] = isset($_POST['itmName'])?$_POST['itmName']:NULL;
	$_SESSION['Brand'] = isset($_POST['itmBrand'])?$_POST['itmBrand']:NULL;
	$_SESSION['Model'] = isset($_POST['itmModel'])?$_POST['itmModel']:NULL;
	$_SESSION['Serial_no'] = isset($_POST['serialNum'])?$_POST['serialNum']:NULL;
	$_SESSION['Quantity'] = isset($_POST['itemQty'])?$_POST['itemQty']:NULL;
	$_SESSION['Date_purchased'] = isset($_POST['datePur'])?$_POST['datePur']:NULL;
	$_SESSION['Accessories'] = isset($_POST['accesories'])?$_POST['accesories']:NULL;
	$_SESSION['Problem'] = isset($_POST['problem'])?$_POST['problem']:NULL;
	$_SESSION['Remark'] = isset($_POST['remarks'])?$_POST['remarks']:NULL;
	$_SESSION['Service_by'] = isset($_POST['servBy'])?$_POST['servBy']:NULL;
	$_SESSION['Supplier_add'] = isset($_POST['suppAddress'])?$_POST['suppAddress']:NULL;
	$_SESSION['Supplier_cont_no'] = isset($_POST['suppContact'])?$_POST['suppContact']:NULL;
	$_SESSION['Waybill'] = isset($_POST['wayBill'])?$_POST['wayBill']:NULL;
	$_SESSION['Status'] = isset($_POST['itmStatus'])?$_POST['itmStatus']:NULL;

if(isset($_POST['jobOSubmit'])){
		$stats = implode(" , ",$_POST['itmStatus']);
		print_r($_SESSION['Status']);
	}

	//pagfetch para sa login
	if (isset($_POST['login']) && $_POST['login']=="Login") {
		
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

/*	 if (isset($_POST['jobOSubmit']) && $_POST['jobOSubmit']=="jobOSubmit") {
		$query = "INSERT INTO joborderstatus (Job_order_no, Date_received, 
			Customer_name, Contact_no, Customer_add, Item_code, 
			Item, Brand, Model, Serial_no, Quantity, Date_purchased, 
			Accessories, Problem, Remark, Service_by, Supplier_add, 
			Supplier_cont_no, Waybill, Status) 
					VALUES 
					(\"".$_SESSION['Job_order_no']."\", 
					\"".$_SESSION['Date_received']."\", 
					\"".$_SESSION['Customer_name']."\",
					\"".$_SESSION['Contact_no']."\", 
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
	}*/

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