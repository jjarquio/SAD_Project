<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<p>
<?php
	$server="localhost";
	$username = "root";
	$password = "";
	$dbname = "portfoliodemo";
	
	//create a connection
	$con = new mysqli($server, $username, $password, $dbname);
	
	//evaluate the connection 
	if($con->connect_errno)
		die("Could not connect: " . $con->connect_error);
	
	/*
	//define a query
	//$sql = "CREATE DATABASE portfoliodb";
	$sql = "CREATE TABLE account(
			id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			username VARCHAR(50) NOT NULL UNIQUE,
			password VARCHAR(50) NOT NULL, 
			dateAdded TIMESTAMP)";
	
	//execute the query
	if($con->query($sql))
		echo "Table was created successfully";
	else
		die("Error creating the table"); 
	
	//close the connection
	$con->close();*/
?>
</p>
</body>
</html>







