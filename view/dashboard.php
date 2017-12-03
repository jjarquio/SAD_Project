<?php 

		session_start(); 
      if(!isset($_SESSION['username']))
	  {
		  header("location:loginSES.php");
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
	echo "<br> Welcome, " . $_SESSION['username'];
		?>
<form action="logout.php">
		<input type="submit" name="logout" value="Logout">
	</form>	


	</div>

	<div class="bar">

		<a href="createJOB.php">Create new Job Order</a>
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

			<a href="dashboard.php?JobOrder">Job Order</a>
			
		</div>

		<?php
		include "../DBconnect/connection.php";
		include "returnJO.php";

		$Search = isset($_POST['search'])?$_POST['search']:NULL;

		if(isset($_POST['submit']) && $_POST['submit']=="Search"){

			if (isset($_GET['JobOrder'])) {

				$data = retJO($Search);
				?>
				<input type="text" name="sku" placeholder="E-mail" class="inputStyle" value="<?php echo $data->Date_received ?>" required>
				<?php

			}

		}

		?>
</body>
</html>