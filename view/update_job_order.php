<?php

	session_start();

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }

	  if (isset($_COOKIE['job'])) {
	  	
	  }

	

?>

<!DOCTYPE html>
<html>
<head>
	<title>UPDATE Job Order</title>
</head>
<body>
 	<form action="<?php $_PHP_SELF ?>" method="POST">

            <?php echo $_SESSION['USERNAME']. ",<br>". $_SESSION['POSITION']. "<br>"; ?>

           <a href="index.php">Dashboard</a><br><br>

		    <input type="text" name="search" required>
			<input type="submit" name="submit" value="Search">

			</form>

<thead>
		 	<table border="1" align="center"style"line-height: 25px";>
		 		<tr>

		 			<th>Job Order No.</th>
		 			<th>Date Recieved</th>
		 			<th>Customer Name</th>
					<th>Customer Contact No.</th>
					<th>Customer Address</th>	
					
					<th>Item / Product</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Serial No.</th>
					<th>Quantity</th>
					<th>Date Purchased</th>
					<th>Accessories </th>
					<th>Problem</th>
					<th>Remarks</th>
					<th>Service By</th>
					<th>Supplier Address</th>
					<th>Contact No.</th>
					<th>Waybill</th>
					<th>Status</th>
					<th>Action</th>
					

		 		</tr>


<?php 



  
            	include "../DBconnect/connection.php";


            $Search = isset($_POST['search'])?$_POST['search']:NULL;



				$sql="SELECT * FROM joborderstatus WHERE Job_order_no = '$Search'";	 
                    $result = $con->query($sql); 

        if(isset($_POST['submit']) && $_POST['submit']=="Search"){

                if ($result->num_rows > 0){

                    while ($row = $result->fetch_array()) {
            ?>
			<tr class="record">
            <tr>
				            <td><?php echo $row['Job_order_no']; 		?></td>
				 			<td><?php echo $row['Date_received']; 		?></td>
							<td><?php echo $row['Customer_name'];?></td>
							<td><?php echo $row['Contact_no']; 	?></td>
							<td><?php echo $row['Customer_add']; ?></td>
							<td><?php echo $row['Item']; 	?></td>
							<td><?php echo $row['Brand']; 	?></td>
							<td><?php echo $row['Model']; 	?></td>
							<td><?php echo $row['Serial_no']; 	?></td>
							<td><?php echo $row['Quantity']; 	?></td>
							<td><?php echo $row['Date_purchased']; 	?></td>
							<td><?php echo $row['Accessories']; 	?></td>
							<td><?php echo $row['Problem']; 	?></td>
							<td><?php echo $row['Remark']; 	?></td>
							<td><?php echo $row['Service_by']; 	?></td>
							<td><?php echo $row['Supplier_add']; 	?></td>
							<td><?php echo $row['Supplier_cont_no']; 	?></td>
							<td><?php echo $row['Waybill']; 	?></td>
							<td><?php echo $row['Status']; 	?></td>
						
                      
            
		<?php

		if ($_SESSION['POSITION'] == "head") {
			
		

		?>

			<td><a  title="Click To Edit Job Order" rel="facebox" href="edit_job_order.php?id=<?php echo $row['Job_order_no']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a> 
            </tr>

            <?php
}
            ?>

	<?php	
                   }
            }else{
                echo "job order doesnt exist";
            }
    }
?>
</body>
</html>