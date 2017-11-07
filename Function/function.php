<?php
require_once("DBconnect/connectDB.php");
$db_handle = new connectDB();

	//vars para sa login
	$username = isset($_POST['username'])?$_POST['username']:NULL;
	$password = isset($_POST['password'])?$_POST['password']:NULL;

	//vars para sa pagadd og admin
	$addUser = isset($_POST['addUser'])?$_POST['addUser']:NULL;
	$password1 = isset($_POST['password1'])?$_POST['password1']:NULL;
	$password2 = isset($_POST['password2'])?$_POST['password2']:NULL;
	$position = isset($_POST['position'])?$_POST['position']:NULL;

	//pagfetch para sa login
	if (isset($_POST['login']) && $_POST['login']=="Login") {
		
		$query = "SELECT * FROM admin WHERE Username = \"".$username."\" AND Password = \"".$password."\"";

		$con =mysqli_connect("localhost","root","","rma_db");

		$result = mysqli_query($con, $query);
		S


		if($result){
			if (mysqli_num_rows($result)) {
				header("Location: https://www.facebook.com/anjeml");
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
					(\"".$addUser."\", 
					\"".$password2."\", 
					\"".$position."\") 
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



?>