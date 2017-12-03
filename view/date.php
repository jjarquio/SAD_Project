

<?php
include "../DBconnect/connection.php";

$sql = "SELECT Date_received FROM joborderstatus WHERE Job_order_no = 1";
$result = $con->query($sql); 

if ($result) {
		$row = $result->fetch_object();
		return $row;
	}

$date = $row->Date_received;

echo strtotime($date);
?>

