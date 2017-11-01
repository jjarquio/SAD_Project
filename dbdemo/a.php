<?php

	$user = isset($_POST['user']);
	$pass = isset($_POST['pass']);

	include 'config.php';
$query = "INSERT INTO account (username,password) VALUES(\"".$user."\", \"".$pass."\")";

	 $c = mysqli_connect($server,$username,$password,$dbname);

	 $r = $con->query($query);

	 if ($r) {
	 	echo "-";
	 }
?>