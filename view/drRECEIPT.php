<?php




session_start();

if(!isset($_SESSION['USERNAME']))
{
	header("location: ../index.php");
}

if (!$_GET['JobOrder']) {
	header("location: generateReport.php");
}

$jobORDER = $_GET['JobOrder'];

include "../DBconnect/connection.php";
$sql = "SELECT * FROM joborderstatus WHERE Job_order_no = '$jobORDER'";
	$result = $con->query($sql);
if($result->num_rows>0){
	$row=$result->fetch_assoc();
}
else{
	header("location: generateReport.php");
}

require("../fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

$pdf->Image('../images/drLOGO.png',30,0,150);
$pdf->Ln(35);

$pdf->SetFont("Arial", "", 15);
$pdf->SetLeftMargin(25);
$pdf->Cell(160,8," DELIVERY RECEIPT ",1,1,'L');

$pdf->SetFont("Arial", "", 10);
$pdf->Cell(160,5," Contact no: ",1,1,'L');

$pdf->Cell(55,5," Job order no: ",1,0,'R');
$pdf->Cell(55,5,$row['Job_order_no'],1,0,'L');
$pdf->Cell(20,5," DATE: ",1,0,'C');
$pdf->Cell(30,5,date('Y-m-d'),1,1,'C');

$sql = "SELECT Supplier_name FROM supplier WHERE Supplier_add IN (SELECT Supplier_add FROM joborderstatus WHERE Job_order_no = '$jobORDER')";

$result = $con->query($sql);
$row1=$result->fetch_assoc();

$pdf->Cell(55,5," Delivered to: ",1,0,'R');
$pdf->Cell(105,5,$row1['Supplier_name'],1,1,'L');

$pdf->Cell(55,5," Address: ",1,0,'R');
$pdf->Cell(105,5,$row['Supplier_add'],1,1,'L');

$pdf->Cell(55,5," Qty - Item/Brand/Model: ",1,0,'R');
$pdf->Cell(105,5,$row['Quantity']." | ".$row['Item']." | ".$row['Brand']." | ".$row['Model'],1,1,'L');

$pdf->Cell(55,5," Accessories: ",1,0,'R');
$pdf->Cell(105,5,$row['Accessories'],1,1,'L');


$pdf->SetFont("Arial", "U", 10);
$pdf->Cell(55,5," Serial No.: ",1,0,'C');
$pdf->Cell(105,5," END USER - Date of Purchase: ",1,1,'C');

$pdf->SetFont("Arial", "", 10);
$pdf->Cell(55,5,$row['Serial_no'],1,0,'C');
$pdf->Cell(105,5,$row['Date_purchased'],1,1,'C');

$pdf->SetFont("Arial", "U", 10);
$pdf->Cell(160,5,"Problem",1,1,'C');

$pdf->SetFont("Arial", "", 10);
$pdf->Cell(160,5,$row['Problem'],1,1,'C');

$pdf->Text(28,110,"Received the above items as per descriptions:");
$pdf->Text(28,120,"________________________");
$pdf->Text(29,124,"AUTHORIZED SIGNATURE");

$pdf->Text(85,120,"___________");
$pdf->Text(91,124,"DATE");


$pdf->Cell(90,8,"",0,0,'C');
$pdf->Cell(70,8,"END USER INFORMATIONS: ",0,1,'R');
$pdf->Cell(90,8,"",0,0,'C');
$pdf->Cell(70,8,$row['Customer_name']." ",0,1,'R');
$pdf->Cell(90,8,"",0,0,'C');
$pdf->Cell(70,8,$row['Contact_no']." ",0,1,'R');

$pdf->Line(25,15,25,50);
$pdf->Line(185,15,185,50);
$pdf->Line(185,15,25,15);

$pdf->Line(25,103,25,130);
$pdf->Line(185,103,185,130);
$pdf->Line(120,103,120,130);
$pdf->Line(185,130,25,130);

/*END USER INFORMATION
					<br>
					<?php echo $row['Customer_name']; ?>
					<br>
					<?php echo $row['Contact_no']; ?>
				</td>

*/
$pdf->Output('',"Delivery Receipt ".$_GET['JobOrder'].".pdf");
?>








<!-- <?php /*

	session_start();
	include "../DBconnect/connection.php";

      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location: ../index.php");
	  }

	  if (!$_GET['JobOrder']) {
	header("location: generateReport.php");
	}

	$jobORDER = $_GET['JobOrder'];
	//$suppADD;

	//$sql = "SELECT Supplier_name FROM supplier WHERE Supplier_add IN (SELECT Supplier_add FROM joborderstatus WHERE Supplier_add = '$suppADD')";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$sql = "SELECT * FROM joborderstatus WHERE Job_order_no = '$jobORDER'";
	$result = $con->query($sql);
	//echo $jobORDER;
	if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
    
	?>
	<center>
		<section>
		<table border="1" style="width: 80%">
			<tr>
				<td>
					<h1>
					RASI COMPUTER INC.
					</h1>
				</td>
				
			</tr>
		</table>
		
		<table border="1" style="width: 80%">
				<tr>
					<td>
						<h3>DELIVERY RECEIPT</h3> 
					</td>
					
				</tr>
		</table>
		<table border="1" style="width: 80%">
			<tr>
					<td align="right" width="20%">
					JOB ORDER NO. 
					</td>
					<td align="left" width="20%">
						<?php echo $row['Job_order_no']; ?>
					</td>
					<td align="right" width="10%">
						DATE
					</td>
					<td align="right" width="10%">
						<?php echo date('Y-m-d'); ?> <br>
					</td>
				</tr>
			</tr>
			
		</table>
		<table border="1" style="width: 80%">
			<tr> 
				<!-- kani na query kay para makuha ang supplier
				name sa laing table -->
				<?php
				$sql = "SELECT Supplier_name FROM supplier WHERE Supplier_add IN (SELECT Supplier_add FROM joborderstatus WHERE Job_order_no = '$jobORDER')";
				$result = $con->query($sql);

				$row1=$result->fetch_assoc();

				?>
				<!-- SUPPLIER NAME dapat -->
				<td align="right" width="25%">
					DELIVERED TO
				</td>

				
				<td align="left" width="50%">
					<?php echo $row1['Supplier_name']; ?>
				</td>
				
			</tr>
			
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					ADDRESS
				</td>
				
				<td align="left" width="50%">
					<?php echo $row['Supplier_add']; ?>
				</td>
			</tr>
			
		</table>
		
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					QTY - ITEM | BRAND | MODEL
				</td>
				<td align="left" width="50%">
					<?php echo $row['Quantity']; ?> | <?php echo $row['Item']; ?> | <?php echo $row['Brand']; ?> | <?php echo $row['Model']; ?>
				</td>
			</tr>
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					ACCESSORIES
				</td>
				<td align="left" width="50%">
					<?php echo $row['Accessories']; ?>
				</td>
			</tr>
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					<center>
						SERIAL NO.<br>
					</center>
					<center>
						<?php echo $row['Serial_no']; ?>
					</center>
				</td>
				<td align="left" width="50%">
					<center>
						END USER - DATE PURCHASED
					</center>
					<center>
					<?php echo $row['Date_purchased']; ?>
					</center>
				</td>
			</tr>
				
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					<center>
						PROBLEM<br>
					</center>
					<center>
						<?php echo $row['Problem']; ?>
					</center>
				</td>
			</tr>
		</table>
		<table border="1" style="width: 80%">
			<tr>
				<td align="left" width="40%">
					<br>
					Received  the above items as per descriptions:
					<br><br>
					___________________________ 
					<br>
					AUTHORIZED SIGNATURE
					<br> <br>
					<td>
					<center>________________</center> 
					
					<center>DATE</center> 
					</td>
				</td>
				<td align="right" width="40%">
					END USER INFORMATION
					<br>
					<?php echo $row['Customer_name']; ?>
					<br>
					<?php echo $row['Contact_no']; ?>
				</td>
			</tr>
		</table>
		
	</section>
	</center>
	
<?php
		}
	}
?>
</body>
</html>*/