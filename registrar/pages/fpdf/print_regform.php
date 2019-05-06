<?php
include "../connect.php"; 

require_once("fpdf.php");
$shsid = $_GET['shsid'];
$advid = $_GET['advid'];
$en_id = $_GET['en_id'];

$sql_enrolled   = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id ='$shsid' AND enrolled_id='$en_id' AND advise_id='$advid'");
$fetch_enrolled = mysqli_fetch_array($sql_enrolled);
$type = $fetch_enrolled['student_type'];
$status = $fetch_enrolled['reg_status'];

$sql_sub = mysqli_query($con,"SELECT * FROM tblsubject_enrolled WHERE advise_id='$advid' AND shs_id='$shsid'");
$num_sub = mysqli_num_rows($sql_sub);
$sql_sub1 = mysqli_query($con,"SELECT * FROM tblsubject_enrolled WHERE advise_id='$advid' AND shs_id='$shsid'");
$num_sub1 = mysqli_num_rows($sql_sub1);
$sql_sub2 = mysqli_query($con,"SELECT * FROM tblsubject_enrolled WHERE advise_id='$advid' AND shs_id='$shsid'");
$num_sub2 = mysqli_num_rows($sql_sub2);
$sql_sub3 = mysqli_query($con,"SELECT * FROM tblsubject_enrolled WHERE advise_id='$advid' AND shs_id='$shsid'");
$num_sub3 = mysqli_num_rows($sql_sub3);

$pdf = new FPDF('P', 'mm', array(340.2,292.1));
$pdf -> AddPage();

$pdf -> SetTitle("Thesis", true);
//$pdf -> SetFillColor();
$pdf -> SetFont('Times','', 13);
	
	$pdf->SetXY(10,170);
	$pdf->Image('thesis/tcseal.jpg' , 10 ,10, 20 , 20,'JPG');
	$pdf->Image('thesis/cct.jpg' , 120 ,10, 20 , 20,'JPG');

	$pdf->SetXY(25,10);
	$pdf ->SetFont('Times', 'B', 13);
	$pdf -> Cell(100, 7, 'CITY COLLEGE OF TAGAYTAY', 0, 0,'C');
	$pdf ->SetFont('Times', '', 10);
	$pdf->SetXY(25,15);
	$pdf -> Cell(105, 7, 'Akle St. Kaybagal South Tagaytay City', 0, 0,'C');
	$pdf ->SetFont('Times', '', 10);
	$pdf->SetXY(25,20);
	$pdf -> Cell(105, 7, 'Telephone No.: (046)483-0470/(046)483-0672', 0, 0,'C');
	$pdf->SetXY(25,28);
	$pdf ->SetFont('Times', 'B', 13);
	$pdf -> Cell(100, 7, 'CERTIFICATE OF REGISTRATION', 0, 0,'C');
	$pdf->SetXY(110,35);
	$pdf ->SetFont('Times', 'BU', 10);
	$pdf -> Cell(30, 7, 'Date : '.date('m-d-Y').'', 0, 0, 'R');
	
	///   FOR TYPE OF STUDENT ///
	if($type == "NEW"){
		$pdf->Image('thesis/checked.png' , 7 ,46, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 7 ,46, 5 , 5,'PNG');
	}
	if($type == "OLD"){
		$pdf->Image('thesis/checked.png' , 32 ,46, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 32 ,46, 5 , 5,'PNG');
	}
	if($type == "TRANSFEREE"){
		$pdf->Image('thesis/checked.png' , 56 ,46, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 56 ,46, 5 , 5,'PNG');
	}
	$pdf->SetXY(12,45);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(24, 8, 'NEW', 0,0,'L');
	$pdf->Cell(24, 8, 'OLD', 0,0,'L');
	$pdf->Cell(34, 8, 'TRANSFEREE FROM:', 0,0,'L');
	
	$pdf->SetXY(7,53);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(14, 8, 'NAME :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(74, 8, strtoupper($fetch_enrolled['lname'].' , '.$fetch_enrolled['fname'].'  '.$fetch_enrolled['mname']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(31, 8, 'STUDENT NO. CCT-SHS-', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(15, 8, $shsid, 0,0,'L');
	$pdf->SetXY(24,57);
	$pdf->SetFont('Arial', 'I', 6);
	$pdf->Cell(15, 8, 'Last Name', 0,0,'L');
	$pdf->Cell(20, 8, 'First Name', 0,0,'C');
	$pdf->Cell(15, 8, 'Middle Name', 0,0,'L');
	
	$pdf->SetXY(7,61);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(14, 8, 'STRAND :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(74, 8, strtoupper($fetch_enrolled['strand']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(10, 8, 'MAJOR:', 0,0,'L');
	
	if($fetch_enrolled['major'] == "Bread and Pastry Production"){
		$pdf->SetFont('Arial', 'BU', 6);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
		
	}else if($fetch_enrolled['major'] == "Food and Beverage Services"){
		$pdf->SetFont('Arial', 'BU', 6);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
		
	}else{
		$pdf->SetFont('Arial', 'BU', 8);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
	}
	
	
	$pdf->SetXY(7,67);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(21, 8, 'GRADE LEVEL :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(67, 8, strtoupper($fetch_enrolled['grade']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(25, 8, 'SECTION :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(15, 8, strtoupper($fetch_enrolled['section']), 0,0,'L');
	
	$pdf->SetXY(7,73);
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(21, 8, strtoupper($fetch_enrolled['semester']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(23, 8, 'SEMESTER ,', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	
	$pdf->Cell(34, 8, $fetch_enrolled['yr_start'].'-'. $fetch_enrolled['yr_end'], 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(23, 8, 'SUMMER TERM 20_______________________', 0,0,'L');
	
	$pdf->SetXY(7,79);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(21, 8, 'REGISTRATION STATUS :', 0,0,'L');
	
	if($status == "REGULAR"){
		$pdf->Image('thesis/checked.png' , 45 ,80, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 45 ,80, 5 , 5,'PNG');
	}
	if($status == "TEMPORARY"){
		$pdf->Image('thesis/checked.png' , 68 ,80, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 68 ,80, 5 , 5,'PNG');
	}
	if($status == "IRREGULAR"){
		$pdf->Image('thesis/checked.png' , 100 ,80, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 100 ,80, 5 , 5,'PNG');
	}
	$pdf->SetXY(45,79);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(24, 8, 'REGULAR', 0,0,'C');
	$pdf->Cell(24, 8, 'TEMPORARY', 0,0,'C');
	$pdf->Cell(28, 8, 'IRREGULAR', 0,0,'R');
	
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->SetXY(7,90);
	$pdf->Cell(20, 6,'COURSE CODE',1,'B','C');
	$pdf->Cell(94, 6,'COURSE DESCRIPTION',1, 'B','C');
	$pdf->Cell(20, 6,'CREDITS',1, 'B','C');
		
		$pdf->SetFont('Arial', '', 6);
		$yy = 96;
		
		while($fetch_sub = mysqli_fetch_array($sql_sub)){
			$pdf->SetXY(7,$yy);
			$pdf->Cell(20, 5,'',1, 'B');
			$pdf->Cell(94, 5,$fetch_sub['subdesc'],1, 'B');
			$pdf->Cell(20, 5,$fetch_sub['hours'],1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
		}
		while($num_sub<=10){
			$pdf->SetXY(7,$yy);
			$pdf->Cell(20, 5,'',1, 'B');
			$pdf->Cell(94, 5,'',1, 'B');
			$pdf->Cell(20, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
			$num_sub += 1;
		}
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->SetXY(7,146);
		$pdf->Cell(20, 5,'',1, 'B');
		$pdf->Cell(94, 5,'Total :',1, 'B','R');
		$pdf->Cell(20, 5,'',1, 'B','C');
	//----------------------------------------//
	//                FOOTER 				  //
	//----------------------------------------//
	$pdf->SetXY(7,153);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(74, 5, 'Department Head :', 0,0,'L');
	$pdf->Cell(55, 5, 'Approved :', 0,0,'L');
	$pdf->SetXY(7,158);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(74, 5, 'Date :', 0,0,'L');
	$pdf->Cell(55, 5, '_______________________________________', 0,0,'L');
	$pdf->SetXY(100,160);
	$pdf->SetFont('Arial', 'I', 7);
	$pdf->Cell(20, 8, 'Dean / Registrar', 0,0,'L');
	$pdf->SetXY(120,163);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(20, 8, 'STUDENTs COPY ', 0,0,'L');
	
	//----------------------------------------//
	//                PART II 				  //
	//----------------------------------------//
	
	//$pdf->SetXY(180,170);
	$pdf->Image('thesis/tcseal.jpg' , 153 ,10, 20 , 20,'JPG');
	$pdf->Image('thesis/cct.jpg' , 263 ,10, 20 , 20,'JPG');
	$pdf->SetXY(168,10);
	$pdf ->SetFont('Times', 'B', 13);
	$pdf -> Cell(100, 7, 'CITY COLLEGE OF TAGAYTAY', 0, 0,'C');
	$pdf ->SetFont('Times', '', 10);
	$pdf->SetXY(168,15);
	$pdf -> Cell(105, 7, 'Akle St. Kaybagal South Tagaytay City', 0, 0,'C');
	$pdf ->SetFont('Times', '', 10);
	$pdf->SetXY(168,20);
	$pdf -> Cell(105, 7, 'Telephone No.: (046)483-0470/(046)483-0672', 0, 0,'C');
	$pdf->SetXY(168,28);
	$pdf ->SetFont('Times', 'B', 13);
	$pdf -> Cell(100, 7, 'CERTIFICATE OF REGISTRATION', 0, 0,'C');
	$pdf->SetXY(254,35);
	$pdf ->SetFont('Times', 'BU', 10);
	$pdf -> Cell(30, 7, 'Date : '.date('m-d-Y').'', 0, 0, 'R');
	
	///   FOR TYPE OF STUDENT ///
	if($type == "NEW"){
		$pdf->Image('thesis/checked.png' , 152 ,46, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 152 ,46, 5 , 5,'PNG');
	}
	if($type == "OLD"){
		$pdf->Image('thesis/checked.png' , 175 ,46, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 175 ,46, 5 , 5,'PNG');
	}
	if($type == "TRANSFEREE"){
		$pdf->Image('thesis/checked.png' , 199 ,46, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 199 ,46, 5 , 5,'PNG');
	}
	$pdf->SetXY(157,45);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(24, 8, 'NEW', 0,0,'L');
	$pdf->Cell(24, 8, 'OLD', 0,0,'L');
	$pdf->Cell(34, 8, 'TRANSFEREE FROM:', 0,0,'L');
	
	$pdf->SetXY(152,53);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(14, 8, 'NAME :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(74, 8, strtoupper($fetch_enrolled['lname'].' , '.$fetch_enrolled['fname'].'  '.$fetch_enrolled['mname']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(31, 8, 'STUDENT NO. CCT-SHS-', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(15, 8, $shsid, 0,0,'L');
	$pdf->SetXY(169,57);
	$pdf->SetFont('Arial', 'I', 6);
	$pdf->Cell(15, 8, 'Last Name', 0,0,'L');
	$pdf->Cell(20, 8, 'First Name', 0,0,'C');
	$pdf->Cell(15, 8, 'Middle Name', 0,0,'L');
	
	$pdf->SetXY(152,61);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(14, 8, 'STRAND :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(74, 8, strtoupper($fetch_enrolled['strand']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(10, 8, 'MAJOR :', 0,0,'L');
	
	if($fetch_enrolled['major'] == "Bread and Pastry Production"){
		$pdf->SetFont('Arial', 'BU', 6);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
		
	}else if($fetch_enrolled['major'] == "Food and Beverage Services"){
		$pdf->SetFont('Arial', 'BU', 6);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
		
	}else{
		$pdf->SetFont('Arial', 'BU', 8);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
	}
	
	$pdf->SetXY(152,67);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(21, 8, 'GRADE LEVEL :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(67, 8, strtoupper($fetch_enrolled['grade']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(25, 8, 'SECTION :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(15, 8, strtoupper($fetch_enrolled['section']), 0,0,'L');
	
	$pdf->SetXY(152,73);
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(21, 8, strtoupper($fetch_enrolled['semester']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(23, 8, 'SEMESTER ,', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(34, 8, $fetch_enrolled['yr_start'].'-'. $fetch_enrolled['yr_end'], 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(23, 8, 'SUMMER TERM 20_______________________', 0,0,'L');
	
	$pdf->SetXY(152,79);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(21, 8, 'REGISTRATION STATUS :', 0,0,'L');
	
	if($status == "REGULAR"){
		$pdf->Image('thesis/checked.png' , 190 ,80, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 190 ,80, 5 , 5,'PNG');
	}
	if($status == "TEMPORARY"){
		$pdf->Image('thesis/checked.png' , 213 ,80, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 213 ,80, 5 , 5,'PNG');
	}
	if($status == "IRREGULAR"){
		$pdf->Image('thesis/checked.png' , 245 ,80, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 245 ,80, 5 , 5,'PNG');
	}
	$pdf->SetXY(190,79);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(24, 8, 'REGULAR', 0,0,'C');
	$pdf->Cell(24, 8, 'TEMPORARY', 0,0,'C');
	$pdf->Cell(28, 8, 'IRREGULAR', 0,0,'R');
	
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->SetXY(152,90);
	$pdf->Cell(20, 6,'COURSE CODE',1,'B','C');
	$pdf->Cell(94, 6,'COURSE DESCRIPTION',1, 'B','C');
	$pdf->Cell(20, 6,'CREDITS',1, 'B','C');
		
		$pdf->SetFont('Arial', '', 6);
		$yy = 96;
		
		while($fetch_sub1 = mysqli_fetch_array($sql_sub1)){
			$pdf->SetXY(152,$yy);
			$pdf->Cell(20, 5,'',1, 'B');
			$pdf->Cell(94, 5,$fetch_sub1['subdesc'],1, 'B');
			$pdf->Cell(20, 5,$fetch_sub1['hours'],1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
		}
		while($num_sub1<=10){
			$pdf->SetXY(152,$yy);
			$pdf->Cell(20, 5,'',1, 'B');
			$pdf->Cell(94, 5,'',1, 'B');
			$pdf->Cell(20, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
			$num_sub1 += 1;
		}
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->SetXY(152,146);
		$pdf->Cell(20, 5,'',1, 'B');
		$pdf->Cell(94, 5,'Total :',1, 'B','R');
		$pdf->Cell(20, 5,'',1, 'B','C');
	//----------------------------------------//
	//                FOOTER 				  //
	//----------------------------------------//
	$pdf->SetXY(152,153);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(74, 5, 'Department Head :', 0,0,'L');
	$pdf->Cell(55, 5, 'Approved :', 0,0,'L');
	$pdf->SetXY(152,158);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(74, 5, 'Date :', 0,0,'L');
	$pdf->Cell(55, 5, '_______________________________________', 0,0,'L');
	$pdf->SetXY(245,160);
	$pdf->SetFont('Arial', 'I', 7);
	$pdf->Cell(20, 8, 'Dean / Registrar', 0,0,'L');
	$pdf->SetXY(265,163);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(20, 8, 'STUDENTs COPY ', 0,0,'L');
	
	//----------------------------------------//
	//                PART III 				  //
	//----------------------------------------//
	//dag dag 166
	$pdf->Image('thesis/tcseal.jpg' , 10 ,176, 20 , 20,'JPG');
	$pdf->Image('thesis/cct.jpg' , 120 ,176, 20 , 20,'JPG');
	$pdf->SetXY(25,176);
	$pdf ->SetFont('Times', 'B', 13);
	$pdf -> Cell(100, 7, 'CITY COLLEGE OF TAGAYTAY', 0, 0,'C');
	$pdf ->SetFont('Times', '', 10);
	$pdf->SetXY(25,181);
	$pdf -> Cell(105, 7, 'Akle St. Kaybagal South Tagaytay City', 0, 0,'C');
	$pdf ->SetFont('Times', '', 10);
	$pdf->SetXY(25,186);
	$pdf -> Cell(105, 7, 'Telephone No.: (046)483-0470/(046)483-0672', 0, 0,'C');
	$pdf->SetXY(25,194);
	$pdf ->SetFont('Times', 'B', 13);
	$pdf -> Cell(100, 7, 'CERTIFICATE OF REGISTRATION', 0, 0,'C');
	$pdf->SetXY(110,201);
	$pdf ->SetFont('Times', 'BU', 10);
	$pdf -> Cell(30, 7, 'Date : '.date('m-d-Y').'', 0, 0, 'R');
	
	///   FOR TYPE OF STUDENT ///
	if($type == "NEW"){
		$pdf->Image('thesis/checked.png' , 7 ,212, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 7 ,212, 5 , 5,'PNG');
	}
	if($type == "OLD"){
		$pdf->Image('thesis/checked.png' , 32 ,212, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 32 ,212, 5 , 5,'PNG');
	}
	if($type == "TRANSFEREE"){
		$pdf->Image('thesis/checked.png' , 56 ,212, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 56 ,212, 5 , 5,'PNG');
	}
	$pdf->SetXY(12,211);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(24, 8, 'NEW', 0,0,'L');
	$pdf->Cell(24, 8, 'OLD', 0,0,'L');
	$pdf->Cell(34, 8, 'TRANSFEREE FROM:', 0,0,'L');
	
	$pdf->SetXY(7,219);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(14, 8, 'NAME :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(74, 8, strtoupper($fetch_enrolled['lname'].' , '.$fetch_enrolled['fname'].'  '.$fetch_enrolled['mname']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(31, 8, 'STUDENT NO. CCT-SHS-', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(15, 8, $shsid, 0,0,'L');
	$pdf->SetXY(24,223);
	$pdf->SetFont('Arial', 'I', 6);
	$pdf->Cell(15, 8, 'Last Name', 0,0,'L');
	$pdf->Cell(20, 8, 'First Name', 0,0,'C');
	$pdf->Cell(15, 8, 'Middle Name', 0,0,'L');
	
	$pdf->SetXY(7,227);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(14, 8, 'STRAND :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(74, 8, strtoupper($fetch_enrolled['strand']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(10, 8, 'MAJOR :', 0,0,'L');
	
	if($fetch_enrolled['major'] == "Bread and Pastry Production"){
		$pdf->SetFont('Arial', 'BU', 6);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
		
	}else if($fetch_enrolled['major'] == "Food and Beverage Services"){
		$pdf->SetFont('Arial', 'BU', 6);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
		
	}else{
		$pdf->SetFont('Arial', 'BU', 8);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
	}
	
	$pdf->SetXY(7,233);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(21, 8, 'GRADE LEVEL :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(67, 8, strtoupper($fetch_enrolled['grade']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(25, 8, 'SECTION :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(15, 8, strtoupper($fetch_enrolled['section']), 0,0,'L');
	
	$pdf->SetXY(7,239);
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(21, 8, strtoupper($fetch_enrolled['semester']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(23, 8, 'SEMESTER ,', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(34, 8, $fetch_enrolled['yr_start'].'-'. $fetch_enrolled['yr_end'], 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(23, 8, 'SUMMER TERM 20_______________________', 0,0,'L');
	
	$pdf->SetXY(7,245);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(21, 8, 'REGISTRATION STATUS :', 0,0,'L');
	
	if($status == "REGULAR"){
		$pdf->Image('thesis/checked.png' , 45 ,246, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 45 ,246, 5 , 5,'PNG');
	}
	if($status == "TEMPORARY"){
		$pdf->Image('thesis/checked.png' , 68 ,246, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 68 ,246, 5 , 5,'PNG');
	}
	if($status == "IRREGULAR"){
		$pdf->Image('thesis/checked.png' , 100 ,246, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 100 ,246, 5 , 5,'PNG');
	}
	$pdf->SetXY(45,245);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(24, 8, 'REGULAR', 0,0,'C');
	$pdf->Cell(24, 8, 'TEMPORARY', 0,0,'C');
	$pdf->Cell(28, 8, 'IRREGULAR', 0,0,'R');
	
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->SetXY(7,256);
	$pdf->Cell(20, 6,'COURSE CODE',1,'B','C');
	$pdf->Cell(94, 6,'COURSE DESCRIPTION',1, 'B','C');
	$pdf->Cell(20, 6,'CREDITS',1, 'B','C');
		
		$pdf->SetFont('Arial', '', 6);
		$yy = 262;
		
		while($fetch_sub2 = mysqli_fetch_array($sql_sub2)){
			$pdf->SetXY(7,$yy);
			$pdf->Cell(20, 5,'',1, 'B');
			$pdf->Cell(94, 5,$fetch_sub2['subdesc'],1, 'B');
			$pdf->Cell(20, 5,$fetch_sub2['hours'],1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
		}
		while($num_sub2<=10){
			$pdf->SetXY(7,$yy);
			$pdf->Cell(20, 5,'',1, 'B');
			$pdf->Cell(94, 5,'',1, 'B');
			$pdf->Cell(20, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
			$num_sub2 += 1;
		}
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->SetXY(7,312);
		$pdf->Cell(20, 5,'',1, 'B');
		$pdf->Cell(94, 5,'Total :',1, 'B','R');
		$pdf->Cell(20, 5,'',1, 'B','C');
	//----------------------------------------//
	//                FOOTER 				  //
	//----------------------------------------//
	$pdf->SetXY(7,319);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(74, 5, 'Department Head :', 0,0,'L');
	$pdf->Cell(55, 5, 'Approved :', 0,0,'L');
	$pdf->SetXY(7,324);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(74, 5, 'Date :', 0,0,'L');
	$pdf->Cell(55, 5, '_______________________________________', 0,0,'L');
	$pdf->SetXY(100,326);
	$pdf->SetFont('Arial', 'I', 7);
	$pdf->Cell(20, 8, 'Dean / Registrar', 0,0,'L');
	$pdf->SetXY(120,329);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(20, 8, 'STUDENTs COPY ', 0,0,'L');
	
	//----------------------------------------//
	//                PART IV 				  //
	//----------------------------------------//
	$pdf->Image('thesis/tcseal.jpg' , 153 ,176, 20 , 20,'JPG');
	$pdf->Image('thesis/cct.jpg' , 263 ,176, 20 , 20,'JPG');
	$pdf->SetXY(168,176);
	$pdf ->SetFont('Times', 'B', 13);
	$pdf -> Cell(100, 7, 'CITY COLLEGE OF TAGAYTAY', 0, 0,'C');
	$pdf ->SetFont('Times', '', 10);
	$pdf->SetXY(168,181);
	$pdf -> Cell(105, 7, 'Akle St. Kaybagal South Tagaytay City', 0, 0,'C');
	$pdf ->SetFont('Times', '', 10);
	$pdf->SetXY(168,186);
	$pdf -> Cell(105, 7, 'Telephone No.: (046)483-0470/(046)483-0672', 0, 0,'C');
	$pdf->SetXY(168,194);
	$pdf ->SetFont('Times', 'B', 13);
	$pdf -> Cell(100, 7, 'CERTIFICATE OF REGISTRATION', 0, 0,'C');
	$pdf->SetXY(254,201);
	$pdf ->SetFont('Times', 'BU', 10);
	$pdf -> Cell(30, 7, 'Date : '.date('m-d-Y').'', 0, 0, 'R');
	
	///   FOR TYPE OF STUDENT ///
	if($type == "NEW"){
		$pdf->Image('thesis/checked.png' , 152 ,212, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 152 ,212, 5 , 5,'PNG');
	}
	if($type == "OLD"){
		$pdf->Image('thesis/checked.png' , 175 ,212, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 175 ,212, 5 , 5,'PNG');
	}
	if($type == "TRANSFEREE"){
		$pdf->Image('thesis/checked.png' , 199 ,212, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 199 ,212, 5 , 5,'PNG');
	}
	$pdf->SetXY(157,211);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(24, 8, 'NEW', 0,0,'L');
	$pdf->Cell(24, 8, 'OLD', 0,0,'L');
	$pdf->Cell(34, 8, 'TRANSFEREE FROM:', 0,0,'L');
	
	$pdf->SetXY(152,219);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(14, 8, 'NAME :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(74, 8, strtoupper($fetch_enrolled['lname'].' , '.$fetch_enrolled['fname'].'  '.$fetch_enrolled['mname']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(31, 8, 'STUDENT NO. CCT-SHS-', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(15, 8, $shsid, 0,0,'L');
	$pdf->SetXY(169,223);
	$pdf->SetFont('Arial', 'I', 6);
	$pdf->Cell(15, 8, 'Last Name', 0,0,'L');
	$pdf->Cell(20, 8, 'First Name', 0,0,'C');
	$pdf->Cell(15, 8, 'Middle Name', 0,0,'L');
	
	$pdf->SetXY(152,227);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(14, 8, 'STRAND :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(74, 8, strtoupper($fetch_enrolled['strand']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(10, 8, 'MAJOR :', 0,0,'L');
	
	if($fetch_enrolled['major'] == "Bread and Pastry Production"){
		$pdf->SetFont('Arial', 'BU', 6);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
		
	}else if($fetch_enrolled['major'] == "Food and Beverage Services"){
		$pdf->SetFont('Arial', 'BU', 6);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
		
	}else{
		$pdf->SetFont('Arial', 'BU', 8);
		$pdf->Cell(15, 8, strtoupper($fetch_enrolled['major']), 0,0,'L');
	}
	
	$pdf->SetXY(152,233);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(21, 8, 'GRADE LEVEL :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(67, 8, strtoupper($fetch_enrolled['grade']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(25, 8, 'SECTION :', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(15, 8, strtoupper($fetch_enrolled['section']), 0,0,'L');
	
	$pdf->SetXY(152,239);
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(21, 8, strtoupper($fetch_enrolled['semester']), 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(23, 8, 'SEMESTER ,', 0,0,'L');
	$pdf->SetFont('Arial', 'BU', 9);
	$pdf->Cell(34, 8, $fetch_enrolled['yr_start'].'-'. $fetch_enrolled['yr_end'], 0,0,'L');
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(23, 8, 'SUMMER TERM 20_______________________', 0,0,'L');
	
	$pdf->SetXY(152,245);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(21, 8, 'REGISTRATION STATUS :', 0,0,'L');
	
	if($status == "REGULAR"){
		$pdf->Image('thesis/checked.png' , 190 ,246, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 190 ,246, 5 , 5,'PNG');
	}
	if($status == "TEMPORARY"){
		$pdf->Image('thesis/checked.png' , 213 ,246, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 213 ,246, 5 , 5,'PNG');
	}
	if($status == "IRREGULAR"){
		$pdf->Image('thesis/checked.png' , 245 ,246, 5 , 5,'PNG');
	}else{
		$pdf->Image('thesis/chk.png' , 245 ,246, 5 , 5,'PNG');
	}
	$pdf->SetXY(190,245);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(24, 8, 'REGULAR', 0,0,'C');
	$pdf->Cell(24, 8, 'TEMPORARY', 0,0,'C');
	$pdf->Cell(28, 8, 'IRREGULAR', 0,0,'R');
	
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->SetXY(152,256);
	$pdf->Cell(20, 6,'COURSE CODE',1,'B','C');
	$pdf->Cell(94, 6,'COURSE DESCRIPTION',1, 'B','C');
	$pdf->Cell(20, 6,'CREDITS',1, 'B','C');
		
		$pdf->SetFont('Arial', '', 6);
		$yy = 262;
		
		while($fetch_sub3 = mysqli_fetch_array($sql_sub3)){
			$pdf->SetXY(152,$yy);
			$pdf->Cell(20, 5,'',1, 'B');
			$pdf->Cell(94, 5,$fetch_sub3['subdesc'],1, 'B');
			$pdf->Cell(20, 5,$fetch_sub3['hours'],1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
		}
		while($num_sub3<=10){
			$pdf->SetXY(152,$yy);
			$pdf->Cell(20, 5,'',1, 'B');
			$pdf->Cell(94, 5,'',1, 'B');
			$pdf->Cell(20, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
			$num_sub3 += 1;
		}
		
		$pdf->SetFont('Arial', 'B', 7);
		$pdf->SetXY(152,312);
		$pdf->Cell(20, 5,'',1, 'B');
		$pdf->Cell(94, 5,'Total :',1, 'B','R');
		$pdf->Cell(20, 5,'',1, 'B','C');
	//----------------------------------------//
	//                FOOTER 				  //
	//----------------------------------------//
	$pdf->SetXY(152,319);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(74, 5, 'Department Head :', 0,0,'L');
	$pdf->Cell(55, 5, 'Approved :', 0,0,'L');
	$pdf->SetXY(152,324);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(74, 5, 'Date :', 0,0,'L');
	$pdf->Cell(55, 5, '_______________________________________', 0,0,'L');
	$pdf->SetXY(245,326);
	$pdf->SetFont('Arial', 'I', 7);
	$pdf->Cell(20, 8, 'Dean / Registrar', 0,0,'L');
	$pdf->SetXY(265,329);
	$pdf->SetFont('Arial', 'B', 7);
	$pdf->Cell(20, 8, 'STUDENTs COPY ', 0,0,'L');
	/*
	$pdf->Image('thesis/sig1.png' , 105 ,148, 20 , 20,'PNG');$pdf->Image('thesis/sig1.png' , 105 ,148, 20 , 20,'PNG');$pdf->Image('thesis/sig1.png' , 105 ,148, 20 , 20,'PNG');
	$pdf->Image('thesis/sig1.png' , 245 ,148, 20 , 20,'PNG');$pdf->Image('thesis/sig1.png' , 245 ,148, 20 , 20,'PNG');$pdf->Image('thesis/sig1.png' , 245 ,148, 20 , 20,'PNG');
	$pdf->Image('thesis/sig1.png' , 105 ,314, 20 , 20,'PNG');$pdf->Image('thesis/sig1.png' , 105 ,314, 20 , 20,'PNG');$pdf->Image('thesis/sig1.png' , 105 ,314, 20 , 20,'PNG');
	$pdf->Image('thesis/sig1.png' , 245 ,314, 20 , 20,'PNG');$pdf->Image('thesis/sig1.png' , 245 ,314, 20 , 20,'PNG');$pdf->Image('thesis/sig1.png' , 245 ,314, 20 , 20,'PNG');
	*/
	$pdf->Line(146,0,146,340);
	//----------------------------------------//
	// 					MIDDLE  			  //
	//----------------------------------------//
	$pdf->SetXY(2,163.5);
	$pdf->Cell(20, 14, '=====================================================================================================================================================================================================', 0,0,'L');
	
$pdf -> Output();
?>
