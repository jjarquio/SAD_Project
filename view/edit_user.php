 <?php
              
			  session_start();
	include "../DBconnect/connection.php";

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }
	  

	if (!$_SESSION['POSITION'] == "head") {
			header("location: users.php");
		}
	if (!$_GET['Id']) {
	header("location: users.php");
	}
			  
			
			  
			  $joID = $_GET['Id'];

	  $sql = "SELECT * FROM admin WHERE Username = '$joID'";
		$result = $con->query($sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_array()){

	$username = $row['Username'];
	$name = $row['Admin_Name'];
	$password = $row['Password'];
	$position = $row['Position'];

			}
		}
			?>


<html>
<head>
<title>Edit user
</title>
</head>
<body>
<form action="<?php $_PHP_SELF ?>" method="post">

<center><h4><i class="icon-edit icon-large"></i> Edit Users</h4></center>
<hr>
<div id="ac">

<input type="hidden" style="width:265px; height:30px;" name="username" value="<?php echo $username; ?>" /><br>
<span>User Name : <?php echo $username; ?><br>
<span>Name : </span><input type="text" style="width:265px; height:30px;" name="name" value="<?php echo $name; ?>" /><br>
<span>Password : </span><input type="text" style="width:265px; height:30px;" name="password" value="<?php echo $password; ?>" /><br>
<span>Position : </span><input type="text" style="width:265px; height:30px;" name="position" value="<?php echo $position; ?>" /><br>

<div style="float:right; margin-right:10px;">

<input type="submit" name="edit" value="Edit">
<input type="submit" name="cancel" value="Cancel">


</div>
</div>
</form>


<?php
	



	if (isset($_POST['edit']) && $_POST['edit']=="Edit") {


			 


		
			$name = strip_tags($_POST['name']);
			$password = strip_tags($_POST['password']);
			$position = strip_tags($_POST['position']);




		include '../DBconnect/connection.php';
		$sql = "UPDATE admin 
		SET
			Admin_Name = '$name',
			Password = '$password',
			Position = '$position'
			
		WHERE 
			Username = '$joID'";

				$result = $con->query($sql);

		if ($result) {
			header("location: users.php");
		}else{
			echo "ERROR";
		}
	}



	if (isset($_POST['cancel']) && $_POST['cancel']=="Cancel") {
		header("location: users.php");
	}

?>
</body>
</html>