<?php
/**<!--
$date=date_create("2013-03-15");
$sam = date_create("2013-03-11");

date_sub($date,date_interval_create_from_date_string("5 days"));
$datee = date_format($date,"Y-m-d");
echo $datee;

if($sam == "2013-03-11"){
	echo "strinf";
}else{
	echo "hi";
}
?>
<br>
<?php

$date1=date_create("2013-03-15");
$date2=date_create("2013-12-12");
$diff=date_diff($date1,$date2);
echo $diff->format("%R%a days");

$date1 = "2013-03-01 19:12:45";
$date2 = "2014-03-01 06:37:04";
 
//Convert them to timestamps.
$date1Timestamp = strtotime($date1);
$date2Timestamp = strtotime($date2);
 
//Calculate the difference.
$difference = $date2Timestamp - $date1Timestamp;
 
echo $difference."<br>";


$olderDate = "2017-2-12";
$newerDate = "2017-2-12";
 
echo $olderDate . " is " . strtotime($olderDate), "<br>";
 echo $newerDate . " is " . strtotime($newerDate) + ; 


echo "Today is " . date("Y/m/d");**/


$exp_date = strtotime('2017-12-25');
$notify_start_date = strtotime('-7 days',$exp_date );
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

?>