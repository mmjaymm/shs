<?php
//include "connect.php"; 
require_once("fpdf.php");
//$shsid = $_GET['shsid'];

//$sql1="SELECT * FROM tblstudent_register WHERE shs_id ='$shsid'";
//$result1=mysqli_query($con,$sql1);
//$row1=mysqli_fetch_array($result1);

$pdf = new FPDF('P', 'mm', array(165.1,146.05));
$pdf -> AddPage();

$pdf -> SetTitle("Thesis", true);
//$pdf -> SetFillColor();
$pdf -> SetFont('Times','', 18);
$pdf -> SetTextColor(0, 0, 0);

$pdf -> Image('thesis/tcseal.jpg', 10,10,-550);
$pdf -> Image('thesis/cct.gif', 120, 10, -550);
$pdf -> Cell(125, 10, 'City College of Tagaytay', 0, 0,'C');

$pdf -> Ln();
$pdf ->SetFont('Times', '', 10);
$pdf -> Cell(125, 5, 'Akle St. Kaybagal South Tagaytay City', 0, 0, 'C');

$pdf -> Ln();
$pdf ->SetFont('Times', '', 10);
$pdf -> Cell(125, 5, 'Telephone No.: (046)483-0470/(046)483-0672', 0, 0, 'C');

$pdf -> Ln();
$pdf ->SetFont('Times', 'B', 11);
$pdf -> Cell(125, 12, 'CERTIFICATE OF REGISTRATION', 0, 0, 'C');

$pdf -> Ln(8);
$pdf ->SetFont('Times', 'BU', 10);
$pdf -> Cell(125, 10, 'Date:'.date('d-m-Y').'', 0, 0, 'R');

$pdf -> Ln();
$pdf ->SetFont('Times', 'B', 10);
$pdf -> Cell(125, 0, 'NEW', 0, 0, '');

$pdf -> Ln();
$pdf -> Cell(45, 10, 'NAME:', 0, 0, '');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(85, 10, 'STUDENT NO. _________', 0, 0, 'R');
$pdf -> Ln(2);
$pdf -> Cell(15);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(125, 12, 'Last Name', 0, 0, '');
$pdf -> Ln(2);
$pdf -> Cell(35);
$pdf -> Cell(125, 8, 'First Name', 0, 0, '');
$pdf -> Ln(2);
$pdf -> Cell(55);
$pdf -> Cell(125, 4, 'Middle Name', 0, 0, '');

$pdf -> Ln();
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 8, 'COURSE _________________________________', 0, 0, '');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(81, 8, 'MAJOR: ____________', 0, 0, 'R');

$pdf -> Ln(4);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 12, 'YEAR LEVEL _____________________________', 0, 0, '	');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(81, 12, 'SECTION: __________', 0, 0, 'R');

$pdf -> Ln(5);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 15, '___________ SEMESTER     20__-20__', 0, 0, '');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(80, 15, 'SUMMER TERM 20___________', 0, 0, 'R');

$pdf -> Ln(6);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 15, 'REGISTRATION STATUS:', 0, 0, '');

$pdf -> Ln(10);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(30, 6, 'COURSE CODE', 1,0,'C');
$pdf -> Cell(65, 6, 'COURSE DESCRIPTION', 1,0,'C');
$pdf -> Cell(30, 6, 'UNITS/CREDITS', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');


$pdf -> Ln(5);
$pdf -> Cell(1, 10, 'Department Head: ________________', 0, 0, '');
$pdf -> Cell(125, 10, 'Approved: _____________', 0, 0, 'R');
$pdf -> Ln(5);
$pdf -> Cell(33, 10, 'Date: _____________', 0,0,'C');
$pdf -> Cell(93, 10, '_____________', 0,0,'R');
$pdf -> Ln(5);
$pdf -> SetFont('Times', '', 6);
$pdf -> Cell(123, 10, 'DEAN/REGISTRAR', 0,0,'R');



$pdf -> Output();
?>
