<html>
<head>
<title>
USERS MANAGER
</title>

</head>
<?php
	session_start();

	if(isset($_SESSION['ERROR_MESSAGE'])=='ACCOUNT_ADDED'){
		?>
		<script src = "../jscript/addeduser.js"> </script>
		<?php
		unset($_SESSION['ERROR_MESSAGE']);
	}
?>
<body>
		
<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" >
	
	<thead>
		<tr>
			<th width ="30%"> Name </th>
			<th width="30%"> User Name </th>
			<th width="30%"> Position</th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>



	<div style="margin-top: 19px; margin-bottom: 21px;">
 	<?php echo $_SESSION['USERNAME']. ",<br>". $_SESSION['POSITION']. "<br>"; ?>

           <a href="index.php">Dashboard</a><br><br>

	<br> 	<a href="manage_users.php">Create new user</a>
		<?php 

			include('../DBconnect/connection.php');
				$sql ="SELECT * FROM admin ";
					$result = $con->query($sql); 
					$numrow=1;
					if($result->num_rows>0){
							$numrow=$numrow+1;
							while($row=$result->fetch_assoc()){ ?>
							<tr>
							<td><?php echo $row['Admin_Name'];?></td>
				 			<td><?php echo $row['Username'];?></td>
							<td><?php echo $row['Position'];?></td>
							<td><a  title="Click To Edit user" rel="facebox" href="edit_user.php?Id=<?php echo $row['Username']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Edit </button></a>
								<a  title="Click To delete user" rel="facebox" href="deleteuser.php?Id=<?php echo $row['Username']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Delete </button></a>
								
								</tr>
						<?php
							}
					}

					?>	
</div>
