<?php
require('../../pdf/fpdf.php');
include "connect.php"; 

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);

$pdf->Ln(5);

$id = $_GET['id'];
$sql_val_app = mysqli_query($con,"SELECT * FROM tblapplicant_validate WHERE appid='$id'");
$fetch_val_app = mysqli_fetch_array($sql_val_app);
$lname = $fetch_val_app['lname'];
$fname = $fetch_val_app['fname'];
$mname = $fetch_val_app['mname'];
$grade = $fetch_val_app['grade'];
$strand = $fetch_val_app['strand'];


$pdf->SetFont('Arial', 'B', 8);
$pdf->Ln(5);
$pdf->SetXY(25,5);
$pdf->Cell(5,0, 'APPLICANT ID : '.$id, 0,1,'R');

$pdf->SetFont('Arial', 'B', 14);
//$pdf->Image('../../images/cctlogo.jpg' , LEFT ,BOTTOM, SIZE{S}, SIZE{B},'JPG');
$pdf->Image('../../images/line.png' , 105 ,15, 1, 25,'PNG');
$pdf->Image('../../images/CurveLine.png' , 10 ,40, 195, 20,'PNG');
$pdf->Image('../../images/blueline.png' , 10 ,59, 190, 2,'PNG');
$pdf->Image('../../images/border1.png' , 0,0,215,160,'PNG');
$pdf->Image('../../images/cert_adm.png' , 15,0,180, 130,'PNG');
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetTextColor(19,0,114);
$pdf->Ln(2);
$pdf->Cell(145,3, '', 0,2,'R');
$pdf->Ln(5);
$pdf->Cell(145,0, 'REPUBLIC OF THE PHILIPPINES', 0,2,'R');
$pdf->SetFont('Arial', '', 9);
$pdf->Ln(3);
$pdf->Cell(124,0, 'City of Tagaytay', 0,2,'R');
$pdf->SetFont('Arial', '', 9);
$pdf->Ln(4);
$pdf->Cell(136,0, 'City College of Tagaytay', 0,2,'R');
$pdf->SetFont('Arial', '', 10);
$pdf->Ln(4);
$pdf->Cell(155,0, 'CHARACTER AND KNOWLEDGE', 0,2,'R');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Ln(4);
$pdf->Cell(247,0, 'SENIOR HIGH SCHOOL', 0,2,'C');
$pdf->SetFont('Arial', '', 8);
$pdf->Ln(3);
$pdf->Cell(151,0, 'Akle St. Kaybagal South, Tagaytay City', 0,1,'R');
$pdf->Ln(3);
$pdf->Cell(157,0, 'Tel. Nos.: (046) 483-06-72 / (046) 483-04-70', 0,1,'R');
$pdf->SetTextColor(0,0,0);

$pdf->Ln(12);
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(25);
$pdf->Cell(185,0, 'is hereby granted to', 0,2,'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Ln(3);
$pdf->Cell(0,8, strtoupper($fname).' , '.strtoupper($mname).' '.strtoupper($lname), 0, 0, 'C');
$pdf->Line(53,85,150,85);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Ln(11);
$pdf->Cell(190,0, 'STUDENT`S First Name/Middle Name/Surname', 0,2,'C');

$pdf->SetFont('Arial', '', 12);
$pdf->Ln(5);
$pdf->Cell(190,0, 'after having completed the necessary requirements for admission', 0,2,'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(5);
$pdf->Cell(190,0, 'to the Senior High School of the City College of Tagaytay as', 0,2,'C');

	$pdf->Ln(5);
	$pdf->SetXY(34,104);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(70, 7, ''.$grade, 0,0,'C');
	$pdf->Line(53,110,90,110);
	$pdf->SetXY(110,104);
	$pdf->Cell(70, 7, ''.$strand, 0,1,'C');
	$pdf->Line(193,110,95,110);
	//Line(float x1, float y1, float x2, float y2)
$start = date('Y');
$end = date('Y') + 1;
$pdf->SetFont('Arial', 'I', 8);
$pdf->Ln(3);
$pdf->Cell(115,0, 'Grade', 0,2,'C');
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(270,0, 'Track/Strand', 0,2,'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Ln(5);
$pdf->Cell(190,0, 'for S.Y. '.$start.' - '.$end, 0,2,'C');
$pdf->SetFont('Arial', 'B', 12);


$pdf->Ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->Image('../../images/tagaytay_logo.png' , 60 ,15, 20, 20,'PNG');
$pdf->Image('../../images/cctlogo.jpg' , 85 ,15, 18, 23,'JPG');
//$pdf->Cell(0, 5, ' Registrar', 0,1,'L');


$pdf->Ln(1);
$pdf->SetXY(16,134);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Image('../../images/sig4.png' , 145 ,120, 20 , 20,'PNG');
$pdf->Image('../../images/sig3.png' , 45 ,120, 20 , 20,'PNG');
$pdf->Cell(80,0, 'Arman M. Bueno, RPm', 0,2,'C');
$pdf->Cell(280,0, 'Napoleon M. Bay, MA, Ph.L', 0,2,'C');
$pdf->Cell(100, 0, '_______________________________________', 0,0,'L');
$pdf->Cell(100, 0, '_______________________________________', 0,1,'L');
$pdf->SetFont('Arial', 'I', 10);
$pdf->Ln(2);
$pdf->SetXY(29,136);
$pdf->Cell(90, 5, ' CCT-SHS Guidance Counselor', 0,0,'L');
$pdf->Cell(0, 5, ' VP Administrative and Support Services', 0,1,'L');

/*
$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(194, 8, "Applicant's Reports", 1,1,'C');
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 6, 'App No.', 1,0,'C');
$pdf->Cell(60, 6, 'Name', 1,0,'C');
$pdf->Cell(70, 6, 'School', 1,0,'C');
$pdf->Cell(30, 6, 'Date Applied', 1,1,'C');
*/
$pdf->Output();


?>