<?php

session_start(); 
		include "../DBconnect/connection.php";
      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location:../index.php");
	  }
	  if (!$_GET['JobOrder']) {
	header("location: generateReport.php");
}
	  $jobORDER = $_GET['JobOrder'];

	  $sql = "SELECT * FROM joborderstatus WHERE Job_order_no = '$jobORDER'";
	$result = $con->query($sql);
	if($result){
	$row=$result->fetch_assoc();
	$datee = $row['Date_received'];
    $dater = $row['Edit_status_date'];
$dateee = strtotime($datee);
$date = date('Y-m-d', $dateee);
$daterr = strtotime($dater);
$dateRET = date('Y-m-d', $daterr);
}

require("../fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial", "B", 18);
$pdf->Cell(190,10," RASI CCOMPUTER INC. ",1,1,'C');


$pdf->SetFont("Arial", "I", 9);
$pdf->Text(64,23,"ROXAS AVE. NEAR PADRE GOMEZ ST., DAVAO CITY");
$pdf->Text(64,23,"ROXAS AVE. NEAR PADRE GOMEZ ST., DAVAO CITY");
$pdf->Text(68,27,"TEL# 222-2245/222-1075 - MOBILE: 09228457291");
// box para sa location sa rasi

$pdf->Line(10,20,10,28);
$pdf->Line(200,20,200,28);
$pdf->Line(200,28,10,28);

$pdf->Line(10,28,10,30);
$pdf->Line(200,28,200,30);
$pdf->Line(200,30,10,30);
$pdf->Ln(10);
$pdf->SetFont("Arial", "", 15);
$pdf->Cell(190,8,"SERVICE REPORT ",1,1,'C');
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(76,5,"",1,0,'R');
$pdf->Cell(32,5," DATE RECEIVED: ",1,0,'C');
$pdf->Cell(25,5,$date,1,0,'C');

$pdf->Cell(32,5," DATE RETURNED: ",1,0,'C');
$pdf->Cell(25,5,$dateRET,1,1,'C');

$pdf->Cell(60,5,"Job Order No.: ",1,0,'R');
$pdf->Cell(130,5,$row['Job_order_no'],1,1,'L');

$pdf->Cell(60,5," Client Name: ",1,0,'R');
$pdf->Cell(130,5,$row['Customer_name'],1,1,'L');

$pdf->Cell(60,5," Contact No.: ",1,0,'R');
$pdf->Cell(130,5,$row['Contact_no'],1,1,'L');

$pdf->Cell(60,5," Qty - Item/Brand/Model: ",1,0,'R');
$pdf->Cell(130,5,$row['Quantity']." | ".$row['Item']." | ".$row['Brand']." | ".$row['Model'],1,1,'L');

$pdf->Cell(60,5," Accessories: ",1,0,'R');
$pdf->Cell(130,5,$row['Accessories'],1,1,'L');

$pdf->SetFont("Arial", "U", 10);
$pdf->Cell(60,5," Serial No.: ",1,0,'C');
$pdf->Cell(130,5," Date of Purchase: ",1,1,'C');

$pdf->SetFont("Arial", "", 10);
$pdf->Cell(60,5,$row['Serial_no'],1,0,'C');
$pdf->Cell(130,5,$row['Date_purchased'],1,1,'C');

$pdf->SetFont("Arial", "U", 10);
$pdf->Cell(190,5,"Problem",1,1,'C');

$pdf->SetFont("Arial", "", 10);
$pdf->Cell(190,5,$row['Problem'],1,1,'C');

$pdf->Cell(60,5,"Replacement",1,0,'C');
$pdf->Cell(130,5,"",1,1,'C');


$pdf->Text(12,100,"TERMS AND CONDITION:");
$pdf->Text(12,105,"1.");
$pdf->SetFont("Arial", "I", 10);
$pdf->Text(16,105,"RASI COMPUTER");
$pdf->SetFont("Arial", "", 10);
$pdf->Text(46,105,"is not liable for any DATA LOSS and UNLICENSED/PIRATED SOFTWARE that is presently");

$pdf->Text(16,109,"in the computer brought in for check up and repair.");
$pdf->Text(12,115,"2.");
$pdf->Text(16,115,"Items not claimed after a period of three (3) months will automatically be come the property of RASI.");
$pdf->Text(12,121,"3.");
$pdf->Text(16,121,"A storage fee of P25/day will be charged if the item is not claimed within thirty(30) days after notice of completion.");
$pdf->Text(12,127,"4.");
$pdf->Text(16,127,"Job order must be kept and presented when claiming your item.");

$pdf->Ln(40);
$pdf->SetFont("Arial", "", 8);
$pdf->Text(17,138,"RECEIVED THE ABOVE GOODS IN");
$pdf->Text(18.5,141,"GOOD ORDER AND CONDITION");
$pdf->Text(18.5,149,"____________________________");
$pdf->Text(18,152,"PRINTED NAME AND SIGNATURE");
$pdf->Text(100,141,"RELEASED BY:");
$pdf->Text(88,149,"____________________________");
$pdf->Text(87,152,"PRINTED NAME AND SIGNATURE");

$pdf->Text(155,141,"DATE RELEASED:");
$pdf->Text(153,149,"__________________");

$pdf->Cell(60,20,"",1,0,'C');

$pdf->Line(10,155,10,30);
$pdf->Line(200,93,200,155);
$pdf->Line(200,155,10,155);
/*
$pdf->Line(10,38,10,30);
$pdf->Line(200,38,200,30);
$pdf->Line(200,38,10,38);*/
//$pdf->Cell(190,9," ROXAS AVE.NEAR PADRE GOMEZ ST., DAVAO CITY, ",1,1,'C');


$pdf->Output('',"Service Report ".$_GET['JobOrder'].".pdf");
?>








<!-- <?php 
		/*session_start(); 
		include "../DBconnect/connection.php";
      if(!isset($_SESSION['USERNAME']))
	  {
		  header("location:../index.php");
	  }
	  $jobORDER = $_GET['JobOrder'];
	  
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
    $datee = $row['Date_received'];
    $dater = $row['Edit_status_date'];
$dateee = strtotime($datee);
$date = date('Y-m-d', $dateee);
$daterr = strtotime($dater);
$dateRET = date('Y-m-d', $daterr);
	?>
	<center>
		<table>
			<table  border="1" style="width: 80%">
			<tr>
				<td align="center">
					<h1>
					RASI COMPUTER INC.
					</h1>
				</td>
			</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="center">
						
							<b>ROXAS AVE. NEAR PADRE GOMEZ ST., DAVAO CITY</b> <br>
							TEL# 222-2245 / 222-1075 - MOBILE: 09228457291
						
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td>
					<br>
					</td>
				</tr>
				
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="center" style="font-size: 22px">
						SERVICE REPORT
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="right" width="20%">
						JOB ORDER NO.
					</td>
					<td align="left" width="20%" >
						<?php echo $row['Job_order_no']; ?>
					</td>
					<td align="center" width="1%">
						DATE
					</td>
					<td align="right" width="10%">
						<center>
							RECEIVED<br>
						</center>
						<center>
							<?php echo $date; ?>
						</center>
						
					</td>
					<td align="right" width="10%">
						<center>
							RETURN<br>
						</center>
						<center>
							<?php echo $dateRET; ?>
						</center>
						
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="right" width="9.175%">
						CLIENT NAME
					</td>
					<td align="left" width="20%" >
						<?php echo $row['Customer_name']; ?>
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="right" width="8.4%">
						CONTACT NO.<br>
						QTY - ITEM | BRAND | MODEL<br>
						ACCESSORIES
					</td>
					<td align="left" width="20%" >
						<?php echo $row['Contact_no']; ?><br>
						<?php echo $row['Quantity']; ?> | <?php echo $row['Item']; ?> | <?php echo $row['Brand']; ?> | <?php echo $row['Model']; ?><br>
						<?php echo $row['Accessories']; ?>
					</td>
				</tr>
			</table>
			<table border="1" style="width: 80%">
			<tr>
				<td align="right" width="25%">
					<center>
						PROBLEM DESCRIPTION<br>
					</center>
					<center>
						<?php echo $row['Problem']; ?>
					</center>
				</td>
			</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="right" width="9.175%">
						REPLACEMENT / REPLACEMENT DETAILS:
					</td>
					<td align="left" width="20%" >
						<?php echo $row['Customer_name']; ?>
					</td>
				</tr>
			</table>
			<table border="1"  style="width: 80%">
				<tr>
					<td align="left" width="20%" >
	<section class="note">
		1. RASI COMPUTER is not liable for any DATA LOSS and UNLICENSED/PIRATED SOFTWARE that is presently in the computer brought in for check up and repair.<br><br>
		2. Items not claimed after a period of three (3) months will automatically be come the property of RASI.<br><br>
		3. A storage fee of P25/day will be charged if the item is not claimed within thirty(30) days after notice of completion.<br><br>
		4. <br><br>
		<table align="right" style="width: 60%">
					<tr>
						<td align="center">
					<br>
					RELEASED BY
					<br><br>
					___________________________ 
					<br>
					PRINTED NAME AND SIGNATURE
						</td>
						
					<td align="center">
						<br>
								RELEASED BY
							<br><br>
							___________________________ 
							<br>
							DATE
							</td>
						
					</tr>
				</table>
		<table border="1" style="width: 40%">
			<tr>
				<td align="center" style="width: -20%">
					<br>
					Received  the above items as per descriptions:
					<br><br>
					___________________________ 
					<br>
					AUTHORIZED SIGNATURE
				</td>
				
			</tr>

			</table><br>
			
	</section>
					</td>
				</tr>
			</table>
			
			
	
		</table>
		
		
	</center>
	<?php
}
}
	?>
</body>
</html>*/