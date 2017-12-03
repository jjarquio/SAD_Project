<?php


function retJO($Search){

include "../DBconnect/connection.php";

	$sql = "SELECT Date_received FROM joborderstatus WHERE Job_order_no = \"".$Search."\" LIMIT 1 ";

	$result = $con->query($sql);

	if (!$result) {
		die("Could not connect: ".mysql_error());
	}
	$row = $result->fetch_object();
	return $row;
}


?>