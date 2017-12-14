<?php

	session_start();

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }



?>
<htmk>
<head>
	<title>UPDATE Job Order</title>
</head>

<body>
	 <?php echo $_SESSION['USERNAME']. ",<br>". $_SESSION['POSITION']. "<br>"; ?>

           <a href="index.php">Dashboard</a><br><br>

	<form action="<?php $_PHP_SELF ?>" method="POST">
		
		<select name="Sort">
			<option value="1" selected value = "All">All</option>
			<option value="2" >Pending</option>
			<option value="3">Work in Progress</option>
			<option value="4">To Release</option>
			<option value="5">Released</option>
		</select> 
			
		<input type="submit" name="sort" value="SORT">

	</form>

<?php
    if (isset($_POST['sort']) && $_POST['sort']=="SORT") {
    	$option = $_POST['Sort'];
		echo "$option";

			if ($option == "1") {
				header("location: show_all.php");
			}elseif($option =="2"){
				header("location: show_pending.php");
			}elseif($option =="3"){
				header("location: show_workprogress.php");
			}elseif($option == "4"){
				header("location: show_torelease.php");
			}elseif($option == "5"){
				header("location: show_release.php");
			}

	}
?>

			




</body>
</html>