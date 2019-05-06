<?php
include "../connect.php"; 
require_once("fpdf.php");
$shsid = $_GET['id'];
//$enrolled_id = $_GET['en_id'];
//$sql1="SELECT * FROM tblstudent_register WHERE shs_id ='$shsid'";
$sql_enrolled   = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id ='$shsid'");
$fetch_enrolled = mysqli_fetch_array($sql_enrolled);

$pdf = new FPDF('P', 'mm', array(340.2,292.1));
$pdf -> AddPage();

$pdf -> SetTitle("Thesis", true);
//$pdf -> SetFillColor();
$pdf -> SetFont('Times','', 13);
$pdf -> SetTextColor(0, 0, 0);

$pdf -> Image('thesis/tcseal.jpg', 10,10,-550);
$pdf -> Image('thesis/cct.gif', 120, 10, -550);
$pdf -> Cell(125, 10, 'City College of Tagaytay', 0, 0,'C');

$pdf -> Image('thesis/tcseal.jpg', 155,10,-550);
$pdf -> Image('thesis/cct.gif', 265, 10, -550);
$pdf -> Cell(175, 10, 'City College of Tagaytay', 0, 0,'C');

$pdf -> Ln();
$pdf ->SetFont('Times', '', 10);
$pdf -> Cell(125, 5, 'Akle St. Kaybagal South Tagaytay City', 0, 0, 'C');
$pdf -> Cell(175, 5, 'Akle St. Kaybagal South Tagaytay City', 0, 0, 'C');

$pdf -> Ln();
$pdf ->SetFont('Times', '', 10);
$pdf -> Cell(125, 5, 'Telephone No.: (046)483-0470/(046)483-0672', 0, 0, 'C');
$pdf -> Cell(175, 5, 'Telephone No.: (046)483-0470/(046)483-0672', 0, 0, 'C');

$pdf -> Ln();
$pdf ->SetFont('Times', 'B', 11);
$pdf -> Cell(125, 12, 'CERTIFICATE OF REGISTRATION', 0, 0, 'C');
$pdf -> Cell(175, 12, 'CERTIFICATE OF REGISTRATION', 0, 0, 'C');

$pdf -> Ln(8);
$pdf ->SetFont('Times', 'BU', 10);
$pdf -> Cell(125, 10, 'Date:'.date('d-m-Y').'', 0, 0, 'R');
$pdf -> Cell(145, 10, 'Date:'.date('d-m-Y').'', 0, 0, 'R');

$pdf -> Ln();
$pdf ->SetFont('Times', 'B', 10);
$pdf -> Cell(125, 0, 'NEW', 0, 0, '');

$pdf -> Ln();
$pdf -> Cell(45, 10, 'NAME:  '.strtoupper($fetch_enrolled['lname'].',   '.$fetch_enrolled['fname'].'    '.$fetch_enrolled['mname']), 0, 0, '');
//$pdf->Cell(1, 1, '_______________________________', 0,0,'L');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(80, 10, 'Student No. :'.strtoupper($fetch_enrolled['shs_id']), 0, 0, 'R');

$pdf -> Cell(165, 10, '                  NAME:', 0, 0, '');
$pdf -> Cell(0, 10, 'STUDENT NO. _________', 0, 0, 'R');



$pdf -> Ln(2);
$pdf -> Cell(15);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(125, 12, 'Last Name', 0, 0, '');
$pdf -> Cell(205, 12, '                       Last Name', 0, 0, '');

$pdf -> Ln(2);
$pdf -> Cell(35);
$pdf -> Cell(125, 8, 'First Name', 0, 0, '');
$pdf -> Cell(125, 8, '                       First Name', 0, 0, '');

$pdf -> Ln(2);
$pdf -> Cell(55);
$pdf -> Cell(125, 4, 'Middle Name', 0, 0, '');
$pdf -> Cell(125, 4, '                       Middle Name', 0, 0, '');

$pdf -> Ln();
$pdf -> SetFont('Times', 'B', 10);
$pdf -> Cell(45, 8, 'Strand  :  '.strtoupper($fetch_enrolled['strand']), 0, 0, '');
$pdf -> SetFont('Times', 'B', 10);
$pdf -> Cell(81, 8, 'MAJOR  :  '.strtoupper($fetch_enrolled['major']), 0, 0, 'R');

$pdf -> Cell(385, 8, '							COURSE _________________________________', 0, 0, '');
$pdf -> Cell(0, 8, 'MAJOR: ____________', 0, 0, 'R');

$pdf -> Ln(4);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 12, 'YEAR LEVEL _____________________________', 0, 0, '	');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(81, 12, 'SECTION: __________', 0, 0, 'R');

$pdf -> Cell(155, 12, '                      YEAR LEVEL _____________________________', 0, 0, '	');
$pdf -> Cell(0, 12, 'SECTION: __________', 0, 0, 'R');


$pdf -> Ln(5);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 15, '___________ SEMESTER     20__-20__', 0, 0, '');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(80, 15, 'SUMMER TERM 20___________', 0, 0, 'R');

$pdf -> Cell(200, 15, '                        ___________ SEMESTER     20__-20__', 0, 0, '');
$pdf -> Cell(0, 15, 'SUMMER TERM 20___________', 0, 0, 'R');

$pdf -> Ln(6);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 15, 'REGISTRATION STATUS:', 0, 0, '');
$pdf -> Cell(0, 15, '                                                                                                                 REGISTRATION STATUS:', 0, 0, '');


$pdf -> Ln(10);
$pdf -> SetFont('Times', '', 8);
$pdf -> Cell(30, 6, 'COURSE CODE', 1,0,'C');
$pdf -> Cell(65, 6, 'COURSE DESCRIPTION', 1,0,'C');
$pdf -> Cell(30, 6, 'UNITS/CREDITS', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, 'COURSE CODE', 1,0,'C');
$pdf -> Cell(65, 6, 'COURSE DESCRIPTION', 1,0,'C');
$pdf -> Cell(30, 6, 'UNITS/CREDITS', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');



$pdf -> Ln(5);
$pdf -> Cell(1, 10, 'Department Head: ________________', 0, 0, '');
$pdf -> Cell(125, 10, 'Approved: _____________', 0, 0, 'R');

$pdf -> Cell(150, 10, '                     Department Head: ________________', 0, 0, '');
$pdf -> Cell(0, 10, 'Approved: _____________', 0, 0, 'R');

$pdf -> Ln(5);
$pdf -> Cell(33, 10, 'Date: _____________', 0,0,'C');
$pdf -> Cell(93, 10, '_____________', 0,0,'R');
$pdf -> Cell(70, 10, 'Date: _____________', 0,0,'C');
$pdf -> Cell(76, 10, '_____________', 0,0,'R');

$pdf -> Ln(5);
$pdf -> SetFont('Times', '', 6);
$pdf -> Cell(123, 10, 'DEAN/REGISTRAR', 0,0,'R');
$pdf -> Cell(146, 10, 'DEAN/REGISTRAR', 0,0,'R');


//Part 2


$pdf -> Ln();
$pdf -> SetFont('Times','', 13);
$pdf -> SetTextColor(0, 0, 0);

$pdf -> Image('thesis/tcseal.jpg', 10,170,-550);
$pdf -> Image('thesis/cct.gif', 120, 170, -550);
$pdf -> Cell(125, 10, 'City College of Tagaytay', 0, 0,'C');

$pdf -> Image('thesis/tcseal.jpg', 155,170,-550);
$pdf -> Image('thesis/cct.gif', 265, 170, -550);
$pdf -> Cell(175, 10, 'City College of Tagaytay', 0, 0,'C');

$pdf -> Ln();
$pdf ->SetFont('Times', '', 10);
$pdf -> Cell(125, 5, 'Akle St. Kaybagal South Tagaytay City', 0, 0, 'C');
$pdf -> Cell(175, 5, 'Akle St. Kaybagal South Tagaytay City', 0, 0, 'C');

$pdf -> Ln();
$pdf ->SetFont('Times', '', 10);
$pdf -> Cell(125, 5, 'Telephone No.: (046)483-0470/(046)483-0672', 0, 0, 'C');
$pdf -> Cell(175, 5, 'Telephone No.: (046)483-0470/(046)483-0672', 0, 0, 'C');

$pdf -> Ln();
$pdf ->SetFont('Times', 'B', 11);
$pdf -> Cell(125, 12, 'CERTIFICATE OF REGISTRATION', 0, 0, 'C');
$pdf -> Cell(175, 12, 'CERTIFICATE OF REGISTRATION', 0, 0, 'C');

$pdf -> Ln(8);
$pdf ->SetFont('Times', 'BU', 10);
$pdf -> Cell(125, 10, 'Date:'.date('d-m-Y').'', 0, 0, 'R');
$pdf -> Cell(145, 10, 'Date:'.date('d-m-Y').'', 0, 0, 'R');

$pdf -> Ln();
$pdf ->SetFont('Times', 'B', 10);
$pdf -> Cell(125, 0, 'NEW', 0, 0, '');

$pdf -> Ln();
$pdf -> Cell(45, 10, 'NAME:', 0, 0, '');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(85, 10, 'STUDENT NO. _________', 0, 0, 'R');

$pdf -> Cell(165, 10, '                  NAME:', 0, 0, '');
$pdf -> Cell(0, 10, 'STUDENT NO. _________', 0, 0, 'R');


$pdf -> Ln(2);
$pdf -> Cell(15);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(125, 12, 'Last Name', 0, 0, '');
$pdf -> Cell(205, 12, '                       Last Name', 0, 0, '');
$pdf -> Ln(2);
$pdf -> Cell(35);
$pdf -> Cell(125, 8, 'First Name', 0, 0, '');
$pdf -> Cell(125, 8, '                       First Name', 0, 0, '');
$pdf -> Ln(2);
$pdf -> Cell(55);
$pdf -> Cell(125, 4, 'Middle Name', 0, 0, '');
$pdf -> Cell(125, 4, '                       Middle Name', 0, 0, '');

$pdf -> Ln();
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 8, 'COURSE _________________________________', 0, 0, '');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(81, 8, 'MAJOR: ____________', 0, 0, 'R');

$pdf -> Cell(175, 8, '                      COURSE _________________________________', 0, 0, '');
$pdf -> Cell(0, 8, 'MAJOR: ____________', 0, 0, 'R');



$pdf -> Ln(4);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 12, 'YEAR LEVEL _____________________________', 0, 0, '	');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(81, 12, 'SECTION: __________', 0, 0, 'R');

$pdf -> Cell(155, 12, '                      YEAR LEVEL _____________________________', 0, 0, '	');
$pdf -> Cell(0, 12, 'SECTION: __________', 0, 0, 'R');



$pdf -> Ln(5);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 15, '___________ SEMESTER     20__-20__', 0, 0, '');
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(80, 15, 'SUMMER TERM 20___________', 0, 0, 'R');


$pdf -> Cell(200, 15, '                        ___________ SEMESTER     20__-20__', 0, 0, '');
$pdf -> Cell(0, 15, 'SUMMER TERM 20___________', 0, 0, 'R');


$pdf -> Ln(6);
$pdf -> SetFont('Times', '', 10);
$pdf -> Cell(45, 15, 'REGISTRATION STATUS:', 0, 0, '');
$pdf -> Cell(0, 15, '                                                                                                                 REGISTRATION STATUS:', 0, 0, '');

$pdf -> Ln(10);
$pdf -> SetFont('Times', '', 8);
$pdf -> Cell(30, 6, 'COURSE CODE', 1,0,'C');
$pdf -> Cell(65, 6, 'COURSE DESCRIPTION', 1,0,'C');
$pdf -> Cell(30, 6, 'UNITS/CREDITS', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, 'COURSE CODE', 1,0,'C');
$pdf -> Cell(65, 6, 'COURSE DESCRIPTION', 1,0,'C');
$pdf -> Cell(30, 6, 'UNITS/CREDITS', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');

$pdf -> Ln(6);
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(20, 6, '', 0, 0, '');
$pdf -> Cell(30, 6, '', 1,0,'C');
$pdf -> Cell(65, 6, '', 1,0,'C');
$pdf -> Cell(30, 6, '', 1,0,'C');


$pdf -> Ln(5);
$pdf -> Cell(1, 10, 'Department Head: ________________', 0, 0, '');
$pdf -> Cell(125, 10, 'Approved: _____________', 0, 0, 'R');
$pdf -> Cell(150, 10, '                     Department Head: ________________', 0, 0, '');
$pdf -> Cell(0, 10, 'Approved: _____________', 0, 0, 'R');

$pdf -> Ln(5);
$pdf -> Cell(33, 10, 'Date: _____________', 0,0,'C');
$pdf -> Cell(93, 10, '_____________', 0,0,'R');
$pdf -> Cell(70, 10, 'Date: _____________', 0,0,'C');
$pdf -> Cell(76, 10, '_____________', 0,0,'R');

$pdf -> Ln(5);
$pdf -> SetFont('Times', '', 6);
$pdf -> Cell(123, 10, 'DEAN/REGISTRAR', 0,0,'R');
$pdf -> Cell(146, 10, 'DEAN/REGISTRAR', 0,0,'R');














$pdf -> Output();
?>
