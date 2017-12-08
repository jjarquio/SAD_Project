<?php
$link = mysqli_connect("localhost", "root", "", "rma_db");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if ($result = mysqli_query($link, "SELECT Job_order_no FROM joborderstatus ORDER BY Customer_name")) {

    /* determine number of rows result set */
    $row_cnt = mysqli_num_rows($result);

 
	setcookie("job[17]", $row_cnt);

    /* close result set */
    mysqli_free_result($result);
}

/* close connection */
mysqli_close($link);
?>