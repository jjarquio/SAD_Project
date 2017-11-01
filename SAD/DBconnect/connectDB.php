<?php

	$server="localhost";
	$username = "root";
	$password = "";
	$dbname = "RMAdb";

	$con = new mysqli($server, $username, $password, $dbname);

	if($con->connect_errno){
		die("Could not connect: " . $con->connect_error);
	}

?>