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
?>