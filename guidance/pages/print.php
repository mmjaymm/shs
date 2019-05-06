<?php
require('../../pdf/fpdf.php');

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 5, 'Date: '.date('d-m-Y').'', 0,1,'R');
$pdf->Ln(1);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Image('../../images/tagaytay_logo.png' , 40 ,15, 20 , 20,'PNG');
$pdf->Image('../../images/cctlogo.jpg' , 150 ,15, 20 , 20,'JPG');

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(0, 8, 'REPUBLIC OF THE PHILIPPINES', 0,2,'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, 'City College of Tagaytay', 0,2,'C');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 5, "Character and Knowledge", 0,1,'C');

/*$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 4, 'Student Number : ', 0,1,'L');
$pdf->Cell(135, 4, 'Name of Student : ', 0,0,'L');
$pdf->Cell(0, 4, 'Semester : ' , 0,1,'L');
$pdf->Cell(135, 4, 'Course : ', 0,0,'L');
$pdf->Cell(0, 4, 'A.Y. : ', 0,1,'L');*/
$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(194, 8, "Applicant's Reports", 1,1,'C');
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 6, 'App No.', 1,0,'C');
$pdf->Cell(60, 6, 'Name', 1,0,'C');
$pdf->Cell(70, 6, 'School', 1,0,'C');
$pdf->Cell(30, 6, 'Date Applied', 1,1,'C');

/*$pdf->SetFont('Arial', '', 6);
while ($row3=mysqli_fetch_assoc($result3)){
	$pdf->Cell(15, 5, $row3["subject_code"],1, 'B');
	$pdf->Cell(69, 5,$row3["subject_desc"],1, 'B');
	$pdf->Cell(10, 5, $row3["grade"],1, 'B','C');
	$pdf->Ln(5);
}
while($rowcount3<10){
	$pdf->Cell(15, 5,'',1, 'B');
	$pdf->Cell(69, 5,'',1, 'B');
	$pdf->Cell(10, 5,'',1, 'B','C');
	$pdf->Ln(5);
	$rowcount3 += 1;
}
	$pdf->Cell(15, 5,'',1, 'B');
	$pdf->Cell(69, 5,'G.W.A.:',1, 'B','R');
	$pdf->Cell(10, 5,$gwa,1, 'B','C'); */
	
$pdf->Output();


?>