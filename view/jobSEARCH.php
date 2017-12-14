<?php 

		session_start(); 
      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
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
	echo "<br> Welcome, " . $_SESSION['USERNAME'];
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

			<a href="jobSEARCH.php">Job Order</a>
			
		</div>

		<?php

	
		if (isset($_POST['submitJOB']) && $_POST['submitJOB']=="Create") {
				$Search = strip_tags($_POST['submit']);
		}


		?>
		
	

</body>
</html>