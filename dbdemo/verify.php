<?php
if(isset($_POST['btnLogin']))
{
	//get the form data
	$user = $_POST['user'];
	$pass = $_POST['pass'];

	$addUser =  isset($_POST['addUser']);
	$addPass = 	isset($_POST['addPass']);
	
	//check if account exists
	include 'config.php';

	
	//define a query
	$sql = "SELECT * FROM account WHERE username='$user' && 
			password = '$pass'";
	
	//execute the query
	$result = $con->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_array())
		{
			echo "Welcome, $row[1] <br>
				  Your password is $row[2] <br>
				  You are a member since $row[3]";
		}
	}
	else
	{
		echo "account does not exist";
	}
	//close the connection
	$con->close();
}
elseif(isset($_POST['create']))
{

	$user = $_POST['user'];
	$pass = $_POST['pass'];
	include 'config.php';

$query = "INSERT INTO account (username,password) VALUES('$user', '$pass')";

	 

 	 
 	if($con->query($query))
 	{
 		echo "inserted";
 	}

}





 	





?>




