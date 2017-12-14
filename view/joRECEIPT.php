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
if($result){
	$row=$result->fetch_assoc();
}
?>
<?php

	require("../fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();
$pdf->Ln(4);
$pdf->SetFont("Arial", "B", 12);
$pdf->Cell(100,10," RASI CCOMPUTER INC. ",0,1,'');
$pdf->SetFont("Arial", "I", 8);

$pdf->Text(65,19,"ROXAS AVE. NEAR PADRE GOMEZ ST., DAVAO CITY");
$pdf->SetFont("Arial", "", 10);
$pdf->Text(65,23,"TEL# 222-2245/222-1075 - MOBILE: 09228457291");

$pdf->Ln(3);

$pdf->Cell(55,5,"JOB ORDER NO.",0,0,'');
$pdf->Cell(30,5,$row['Job_order_no'],0,0,'');
$pdf->Cell(20,5,"DATE",1,0,'');
$pdf->Cell(30,5,date('Y-m-d'),1,1,'R');
$pdf->Cell(55,5,"COMPANY/CONTACT PERSON",1,0,'');
$pdf->Cell(80,5,$row['Customer_name'],1,1,'');
$pdf->Cell(55,5,"CONTACT NO.",1,0,'');
$pdf->Cell(80,5,$row['Contact_no'],1,1,'');
$pdf->Cell(55,5,"ITEM/MODEL",1,0,'C');
$pdf->Cell(80,5,$row['Item'] ." | ". $row['Model'],1,1,'');
$pdf->Cell(55,5,"ACCESSORIES",1,0,'C');
$pdf->Cell(80,5,$row['Accessories'],1,1,'C');
$pdf->SetFont("Arial", "U", 10);
$pdf->Cell(55,5,"SERIAL NO.",0,0,'C');
$pdf->Cell(80,5,"DATE OF PURCHASE",0,1,'C');
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(55,5,$row['Serial_no'],0,0,'L');
$pdf->Cell(80,5,$row['Date_purchased'],0,1,'C');
$pdf->SetFont("Arial", "", 10);
$pdf->Line(10,52,10,62);
$pdf->Line(65,52,65,62);
$pdf->Line(65,62,10,62);
$pdf->Line(145,62,65,62);
$pdf->Line(145,52,145,62);//right-right line
$pdf->SetFont("Arial", "U", 10);
$pdf->Cell(135,5,"PROBLEM",0,1,'C');
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(135,5,$row['Problem'],0,1,'C');
$pdf->Line(10,62,10,72);
$pdf->Line(145,29,145,72);
//$pdf->Line(145,72,10,72);
$pdf->Cell(55,8,"REMARK",1,0,'C');
$pdf->Cell(80,8,$row['Remark'],1,1,'');
$pdf->Text(10,86,"1.");
$pdf->SetFont("Arial", "I", 10);
$pdf->Text(15,86,"RASI COMPUTER");
$pdf->SetFont("Arial", "", 10);
$pdf->Text(46,86,"is not liable for any DATA LOSS and UNLICENSED/PIRATED SOFTWARE");
$pdf->Text(15,90,"that is presently in the computer brought in for check up and repair.");
$pdf->Text(10,96,"2.");
$pdf->Text(15,96,"Items not claimed after a period of three (3) months will automatically be come the property of RASI.");
$pdf->Text(10,102,"3.");
$pdf->Text(15,102,"A storage fee of P25/day will be charged if the item is not claimed within thirty(30) days after notice of completion.");
$pdf->Text(10,108,"4.");
$pdf->Text(15,108,"Job order must be kept and presented when claiming your item.");
$pdf->Text(10,125,"CONFORME:");
$pdf->Text(10,130,"________________________________");
$pdf->Text(10,134,"PRINTED NAME AND SIGNATURE");
$pdf->Text(105,125,"Received by:");
$pdf->Text(105,130,$_SESSION['NAME']);
$pdf->Text(105,130,"___________________");


$pdf->Output('',"JobOrder ".$_GET['JobOrder'].".pdf");
?>


