

<?php
include "../DBconnect/connection.php";
/*
$sql = "SELECT Date_purchased FROM joborderstatus WHERE Job_order_no = 1";
$result = $con->query($sql); 

if ($result) {
		$row = $result->fetch_object();
		return $row;
	}

$date = $row->Date_received;

echo strtotime($date);
*/

$sql = "SELECT Date_received FROM joborderstatus";
$result = $con->query($sql);
if ($result) {
    while($row1 = $result->fetch_assoc()) {
    $res = $row1['Date_received'];
$exp_date = strtotime($res);
$notify_start_date = strtotime('+7 days',$exp_date );
$notify_end_date = strtotime('+15 days', $exp_date);
$now = new DateTime();
$now = $now->format('Y-m-d');
$now = strtotime($now);


echo 'expiry date--->'.date('Y-m-d',$exp_date).'<br>';
echo 'nofity start date--->'.date('Y-m-d',$notify_start_date).'<br>';
echo 'nofity end date--->'.date('Y-m-d',$notify_end_date).'<br>';
echo 'today--->'.date('Y-m-d',$now).'<br>';


if ( $exp_date > $notify_start_date  &&  $exp_date < $notify_end_date ) {
    if ($exp_date < $now) {
        echo "already expired";
    } 
    if ($exp_date == $now) {
        echo "will expire today";
    }
    if ($exp_date > $now) {
        echo "going to expire ";
    }
} else {
    echo 'false'."<br>";
}
    }
}
/*
$exp_date = strtotime($res);
$notify_start_date = strtotime('+7 days',$exp_date );
$notify_end_date = strtotime('+15 days', $exp_date);
$now = new DateTime();
$now = $now->format('Y-m-d');
$now = strtotime($now);


echo 'expiry date--->'.date('Y-m-d',$exp_date).'<br>';
echo 'nofity start date--->'.date('Y-m-d',$notify_start_date).'<br>';
echo 'nofity end date--->'.date('Y-m-d',$notify_end_date).'<br>';
echo 'today--->'.date('Y-m-d',$now).'<br>';


if ( $exp_date > $notify_start_date  &&  $exp_date < $notify_end_date ) {
    if ($exp_date < $now) {
        echo "already expired";
    } 
    if ($exp_date == $now) {
        echo "will expire today";
    }
    if ($exp_date > $now) {
        echo "going to expire ";
    }
} else {
    echo 'false';
}
*/

?>

