<div><a href="index.php">Dashboard</a><br><br></div>
<div>
	<h1>Pending</h1>
<?php

$notif = 0;

session_start();
	include "../DBconnect/connection.php";

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }
	
// if ang status kay pending tapos 7 days na and nilabay

$sql = "SELECT * FROM joborderstatus WHERE Status = 'Pending' ";
$result = $con->query($sql);
if ($result) {
    while($row1 = $result->fetch_assoc()) {
    $res = $row1['Date_received'];
    $itmNme = $row1['Item'];
    $cNme = $row1['Customer_name'];
    $job = $row1['Job_order_no'];
    $itmStat = $row1['Status'];

    $datee = $row1['Date_received'];
$dateee = strtotime($datee);
$date = date('Y-m-d', $dateee);

$exp_date = strtotime($res);
$notify_start_date = strtotime('-7 days',$exp_date );
$notify_end_date = strtotime('+15 days', $exp_date);
$now = new DateTime();
$now = $now->format('Y-m-d');
$now = strtotime($now);




if ( $exp_date > $notify_start_date  &&  $exp_date < $notify_end_date ) {
    if ($exp_date < $now) {
        echo "already expired";
    } 
    if ($exp_date == $now) {
        echo "will expire today";
    }
    if ($exp_date > $now) {
    	//echo $job."<br>";
//echo $joEXPDATE = 'expiry date--->'.date('Y-m-d',$exp_date).'<br>';

    	$notif = $notif + 1;

?>
<!DOCTYPE html>
<html>
<head>
	<title>NOTIFICATION</title>
</head>
<body>


	<table>
		<thead>
			<tr>
				<th>Date Created</th>
				<th>Job Order No.</th>
				<th>Customer Name</th>
				<th>Item</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td><?php echo $date; ?> </td>
				<td><?php echo $job; ?> </td>
				<td><?php echo $cNme; ?> </td>
				<td><?php echo $itmNme; ?> </td>
				<td><?php echo $itmStat; ?> </td>

				<?php

		if ($_SESSION['POSITION'] == "head") {
			
		

		?>

			<td><a  title="Click To Edit Job Order" rel="facebox" href="edit_status.php?id=<?php echo $job; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
            </tr>

            <?php
}
            ?>
			</tr>
		</tbody>
	</table>

</body>
</html>
</div>
<div>
	<h1>Work in Progress</h1>
<?php
/*echo 'nofity start date--->'.date('Y-m-d',$notify_start_date).'<br>';
echo 'nofity end date--->'.date('Y-m-d',$notify_end_date).'<br>';
echo 'today--->'.date('Y-m-d',$now).'<br>';
*/
    }
} else {
    echo 'walay ma expire.ay'."<br>";
}
    }
}
?>

<?php
// if ang status kay work in progress tapos 7 days na and nilabay

$sql = "SELECT * FROM joborderstatus WHERE Status = 'Work in Progress' ";
$result = $con->query($sql);

if ($result) {
    while($row1 = $result->fetch_assoc()) {
    $res = $row1['Edit_status_date'];
    $itmNme = $row1['Item'];
    $cNme = $row1['Customer_name'];
    $job = $row1['Job_order_no'];
    $itmStat = $row1['Status'];
    $datee = $row1['Date_received'];
$dateee = strtotime($datee);
$date = date('Y-m-d', $dateee);

$exp_date = strtotime($res);
$notify_start_date = strtotime('-7 days',$exp_date );
$notify_end_date = strtotime('+15 days', $exp_date);
$now = new DateTime();
$now = $now->format('Y-m-d');
$now = strtotime($now);

//echo $res;


if ( $exp_date > $notify_start_date  &&  $exp_date < $notify_end_date ) {
    if ($exp_date < $now) {
        echo "already expired";
    } 
    if ($exp_date == $now) {
        echo "will expire today";
    }
    if ($exp_date > $now) {
    	$notif = $notif + 1;
    	//echo $job."<br>";
//echo $joEXPDATE = 'expiry date--->'.date('Y-m-d',$exp_date).'<br>';
?>
<!DOCTYPE html>
<html>
<head>
	<title>NOTIFICATION</title>
</head>
<body>


	<table>
		<thead>
			<tr>
				<th>Date Created</th>
				<th>Job Order No.</th>
				<th>Customer Name</th>
				<th>Item</th>
				<th>Status</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td><?php echo $date; ?> </td>
				<td><?php echo $job; ?> </td>
				<td><?php echo $cNme; ?> </td>
				<td><?php echo $itmNme; ?> </td>
				<td><?php echo $itmStat; ?> </td>
				<?php

		if ($_SESSION['POSITION'] == "head") {
			
		

		?>

			<td><a  title="Click To Edit Job Order" rel="facebox" href="edit_status.php?id=<?php echo $job; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
            </tr>

            <?php
}
            ?>
			</tr>
		</tbody>
	</table>

</body>
</html>


<?php
/*echo 'nofity start date--->'.date('Y-m-d',$notify_start_date).'<br>';
echo 'nofity end date--->'.date('Y-m-d',$notify_end_date).'<br>';
echo 'today--->'.date('Y-m-d',$now).'<br>';
*/
    }
} else {
    echo 'walay ma expire.ay'."<br>";
}
    }
}
?>
</div>
<?php

 $_SESSION['NOTIF'] = $notif;
echo intval($_SESSION['NOTIF']); 

?>