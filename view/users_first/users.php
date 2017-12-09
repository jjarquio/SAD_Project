<html>
<head>
<title>
USERS MANAGER
</title>
</head>

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

	<a href="index.php">Dasboard</a>
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
								<a href="deletecustomer.php?id=<?php echo $row['Username']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Delete</button></a></td>
		
								
								
								</tr>
						<?php
							}
					}

					?>	
</div>
<div class="clearfix"></div>



<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletecustomer.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>

</body>
</html>