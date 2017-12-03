<?php



function retJO($Search){

include "../DBconnect/connection.php";

	$sql = "SELECT 	Job_order_no, Customer_name, Item, Status FROM joborderstatus WHERE Job_order_no = \"".$Search."\" LIMIT 1 ";

	$result = $con->query($sql);

	if (!$result) {
		die("Could not connect: ".mysql_error());
	}else{
		$row = $result->fetch_object();
	return $row;
	}
	
}

function retCust($Search){
	$sql = "SELECT 	Job_order_no FROM joborderstatus  WHERE Customer_name = \"".$Search."\" ORDER BY Job_order_no DESC";
	include "../DBconnect/connection.php";

	$result = $con->query($query);

	if ($result) {
		while ($row = $result->fetch_object()) {
		return $row;
	}
	}
	
	
}

function retItem($Search){
	include "../DBconnect/connection.php";

	$sql = "SELECT 	* FROM joborderstatus WHERE Item = \"".$Search."\" ORDER BY Job_order_no DESC LIMIT 1 ";

	$result = $con->query($sql);

	if ($result) {
		$row = $result->fetch_object();
		return $row;
	}
	
}

function retDate($Search){
	include "../DBconnect/connection.php";


	$sql = "SELECT 	Job_order_no FROM joborderstatus WHERE Date_purchased = \"".$Search."\" ORDER BY Date_received DESC LIMIT 1 ";

	$result = $con->query($sql);

	if ($result) {
		echo $Search;
		$row = $result->fetch_object();
		return $row;
	}
}


?>