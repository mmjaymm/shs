<?php
	include "connect.php"; 
	require('../../pdf/fpdf.php');
	////////////////////////////////////////////////

	$shsid = $_GET['shsid'];
	$adv_id = $_GET['adv_id'];
	$stats = $_GET['stats'];
	
	//======================================//
	//		kukunin ung strand, major, sem	//
	//======================================//
	$sql_stud_adv = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id='$shsid'");
	$num_stud_adv = mysqli_fetch_array($sql_stud_adv);
	
	$sql1="SELECT * FROM tblstudent_register WHERE shs_id ='$shsid'";
	$result1=mysqli_query($con,$sql1);
	$row1=mysqli_fetch_array($result1);
	//======================================//
	//		kukunin ung strand, major, sem	//
	//======================================//
	$sql_stud_adv = mysqli_query($con,"SELECT * FROM tblstudent_advised WHERE advise_id='$adv_id' AND shs_id='$shsid'");
	$fetch_stud_adv = mysqli_fetch_array($sql_stud_adv);
	//===================================//
	//		kukunin ung subject
	//===================================//
	$sql_sub_adv = mysqli_query($con,"SELECT * FROM tblsubject_enrolled WHERE advise_id='$adv_id' AND shs_id='$shsid'");
	
	$lname = $row1["lname"];
	$fname = $row1["fname"];
	$mname = $row1["mname"];
	
	$strand   = $fetch_stud_adv["strand"];
	$major 	  = $fetch_stud_adv["major"];
	$sem	  = $fetch_stud_adv["semester"];
	$yr_start = $fetch_stud_adv["yr_start"];
	$yr_end = $fetch_stud_adv["yr_end"];
		

	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(0, 5, 'Date: '.date('d-m-Y').'', 0,1,'R');
	$pdf->Ln(1);

	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Image('../../images/cctlogo.jpg' , 20 ,15, 20 , 20,'JPG');
	$pdf->Cell(0, 10, 'City College of Tagaytay', 0,2,'C');
	$pdf->Cell(0, 4, '(Senior High School)', 0,1,'C');
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell(0, 5, "Student's Advising Form", 0,1,'C');
	$pdf->Ln(5);
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0, 4, 'Student Number : '.$shsid , 0,1,'L');
	$pdf->Cell(135, 4, 'Name of Student : '.strtoupper ($lname).', '.strtoupper ($fname).' '.strtoupper ($mname) , 0,0,'L');
	$pdf->Cell(0, 4, 'Semester : '.$sem,  0,1,'L');
	$pdf->Cell(135, 4, 'Strand / Tracks : '.$strand, 0,0,'L');
	$pdf->Cell(0, 4, 'A.Y. : '.$yr_start.' - '.$yr_end, 0,1,'L');
	$pdf->Cell(135, 4, 'Major : '.$major, 0,0,'L');
	
	if($stats == "new"){
		//=================================================//
		//			PARA SA SABJECT NKARAANG Semester	   //
		//=================================================//
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects TAKEN from previous Semester:', 1,1,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Grade', 1,1,'C');
		
		$pdf->SetFont('Arial', '', 6);
		$pdf->SetXY(10,71);
		$yx = 71;
		
		$a = 1; 

		while($a <= 9) {
			$pdf->SetXY(10,$yx);
			$pdf->Cell(15, 5, '',1, 'B');
			$pdf->Cell(69, 5,'',1, 'B');
			$pdf->Cell(10, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$a++;
			$yx += 5;
		}

		//=============================================//
		//			PARA SA SABJECT NGAUNG Semester	   //
		//=============================================//
		$pdf->SetXY(106,57);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects to ENROLL this Semester:', 1,2,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Credits', 1,1,'C');
		
		$pdf->SetFont('Arial', '', 6);
		$pdf->SetXY(106,63);
		$y = 71;
		
		while ($fetch_sub_adv = mysqli_fetch_array($sql_sub_adv)){
			$pdf->SetXY(106,$y);
			$pdf->Cell(15, 5, '',1, 'B');
			$pdf->Cell(69, 5,$fetch_sub_adv['subdesc'],1, 'B');
			$pdf->Cell(10, 5,$fetch_sub_adv['hours'],1, 'B','C');
			$pdf->Ln(5);
			$y += 5;
		}
		
	}else{
		//=================================================//
		//			PARA SA SABJECT NKARAANG Semester	   //
		//=================================================//
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects TAKEN from previous Semester:', 1,1,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Grade', 1,1,'C');
		
		//=============================================//
		//			PARA SA SABJECT NGAUNG Semester	   //
		//=============================================//
		$pdf->SetXY(106,57);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects to ENROLL this Semester:', 1,2,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Credits', 1,1,'C');
	}
	
	$pdf->Ln(10);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(98, 5, '_______________________________', 0,0,'L');
	$pdf->Cell(100, 5, '_______________________________', 0,1,'L');
	$pdf->Cell(100, 5, ' Department Head', 0,0,'L');
	$pdf->Cell(0, 5, ' Registrar', 0,1,'L');

	$pdf->Ln(6);
	$pdf->Cell(0, 15, '-   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -  
							-   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -  ', 0,1,'C');
	
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(0,0, 'Date: '.date('d-m-Y').'', 0,1,'R');
	$pdf->Ln(1);
	
	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Image('../../images/cctlogo.jpg' , 20 ,162, 20 , 20,'JPG');
	$pdf->Cell(0, 10, 'City College of Tagaytay', 0,2,'C');
	$pdf->Cell(0, 4, '(Senior High School)', 0,1,'C');
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell(0, 5, "Student's Advising Form", 0,1,'C');
	$pdf->Ln(5);
		
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0, 4, 'Student Number : '.$shsid , 0,1,'L');
	$pdf->Cell(135, 4, 'Name of Student : '.strtoupper ($lname).', '.strtoupper ($fname).' '.strtoupper ($mname) , 0,0,'L');
	$pdf->Cell(0, 4, 'Semester : '.$sem,  0,1,'L');
	$pdf->Cell(135, 4, 'Strand / Tracks : '.$strand, 0,0,'L');
	$pdf->Cell(0, 4, 'A.Y. : '.$yr_start.' - '.$yr_end, 0,1,'L');
	$pdf->Cell(135, 4, 'Major : '.$major, 0,0,'L');
		
	if($stats == "new"){
		//=================================================//
		//			PARA SA SABJECT NKARAANG Semester	   //
		//=================================================//
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects TAKEN from previous Semester:', 1,1,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Grade', 1,1,'C');
		
		$pdf->SetFont('Arial', '', 6);
		$pdf->SetXY(10,213);
		$yx = 213;
		
		$a = 1; 

		while($a <= 9) {
			$pdf->SetXY(10,$yx);
			$pdf->Cell(15, 5, '',1, 'B');
			$pdf->Cell(69, 5,'',1, 'B');
			$pdf->Cell(10, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$a++;
			$yx += 5;
		}
		
		//=============================================//
		//			PARA SA SABJECT NGAUNG Semester	   //
		//=============================================//
		$pdf->SetXY(106,199);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects to ENROLL this Semester:', 1,2,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Credits', 1,1,'C');
		
		$sql_sub1_adv = mysqli_query($con,"SELECT * FROM tblsubject_enrolled WHERE advise_id='$adv_id' AND shs_id='$shsid'");
		
		/////////////////////////////////////////////////////////
		$pdf->SetFont('Arial', '', 6);
		$pdf->SetXY(106,213);
		$yy = 213;
		
		while ($fetch_sub1_adv = mysqli_fetch_array($sql_sub1_adv)){
			$pdf->SetXY(106,$yy);
			$pdf->Cell(15, 5, '',1, 'B');
			$pdf->Cell(69, 5,$fetch_sub1_adv["subdesc"],1, 'B');
			$pdf->Cell(10, 5, $fetch_sub1_adv["hours"],1, 'B','C');
			$yy += 5;
		}
	}else{
		//=================================================//
		//			PARA SA SABJECT NKARAANG Semester	   //
		//=================================================//
		$pdf->Ln(5);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects TAKEN from previous Semester:', 1,1,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Grade', 1,1,'C');
		
		//=============================================//
		//			PARA SA SABJECT NGAUNG Semester	   //
		//=============================================//
		$pdf->SetXY(106,157);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects to ENROLL this Semester:', 1,2,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Credits', 1,1,'C');
	}
	$pdf->Ln(10);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Cell(98, 5, '_______________________________', 0,0,'L');
	$pdf->Cell(100, 5, '_______________________________', 0,1,'L');
	$pdf->Cell(100, 5, ' Department Head', 0,0,'L');
	$pdf->Cell(0, 5, ' Registrar', 0,1,'L');
		
/*
$pdf->SetFont('Arial', '', 6);
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
	$pdf->Cell(10, 5,$gwa,1, 'B','C');
	
$pdf->SetXY(106,49);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(94, 8, 'Subjects to ENROLL this Semester:', 1,2,'C');
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
$pdf->Cell(69, 6, 'Description', 1,0,'C');
$pdf->Cell(10, 6, 'Credits', 1,1,'C');
$pdf->SetFont('Arial', '', 6);
$pdf->SetXY(106,63);
$y = 63;

while ($row4=mysqli_fetch_assoc($result4)){
	$pdf->SetXY(106,$y);
	$pdf->Cell(15, 5, $row4["subject_code"],1, 'B');
	$pdf->Cell(69, 5,$row4["subject_desc"],1, 'B');
	$pdf->Cell(10, 5, $row4["credits"],1, 'B','C');
	$pdf->Ln(5);
	$y += 5;
}
while($rowcount4<10){
	$pdf->SetXY(106,$y);
	$pdf->Cell(15, 5,'',1, 'B');
	$pdf->Cell(69, 5,'',1, 'B');
	$pdf->Cell(10, 5,'',1, 'B','C');
	$pdf->Ln(5);
	$y += 5;
	$rowcount4 += 1;
}
	
	$pdf->SetXY(106,$y);
	$pdf->Cell(15, 5,'',1, 'B');
	$pdf->Cell(69, 5,'Total Units:',1, 'B','R');
	$pdf->Cell(10, 5,$totU,1, 'B','C');



$pdf->Ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(98, 5, '_______________________________', 0,0,'L');
$pdf->Cell(100, 5, '_______________________________', 0,1,'L');
$pdf->Cell(100, 5, ' Department Head', 0,0,'L');
$pdf->Cell(0, 5, ' Registrar', 0,1,'L');


$pdf->Ln(6);
$pdf->Cell(0, 5, '-   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -
					   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -', 0,1,'C');


/*
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(0, 10, 'Date: '.date('d-m-Y').'', 0,1,'R');
$pdf->Ln(1);

$pdf->SetFont('Arial', 'B', 14);
$pdf->Image('../images/cctlogo.jpg' , 20 ,153, 20 , 20,'JPG');
$pdf->Cell(0, 10, 'City College of Tagaytay', 0,2,'C');
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(0, 5, "Student's Advising Form", 0,1,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(0, 4, 'Student Number : '.$stdntNmbr , 0,1,'L');
$pdf->Cell(135, 4, 'Name of Student : '.strtoupper ($apelyido).', '.strtoupper ($givenName).' '.strtoupper ($middlename) , 0,0,'L');
$pdf->Cell(0, 4, 'Semester : '.$sem , 0,1,'L');
$pdf->Cell(135, 4, 'Course : '.$crse , 0,0,'L');
$pdf->Cell(0, 4, 'A.Y. : '.$acadYear , 0,1,'L');
$pdf->Ln(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(94, 8, 'Subjects TAKEN from previous Semester:', 1,1,'C');
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
$pdf->Cell(69, 6, 'Description', 1,0,'C');
$pdf->Cell(10, 6, 'Grade', 1,1,'C');

$pdf->SetFont('Arial', '', 6);
while ($row3x2=mysqli_fetch_assoc($result3x2)){
	$pdf->Cell(15, 5, $row3x2["subject_code"],1, 'B');
	$pdf->Cell(69, 5,$row3x2["subject_desc"],1, 'B');
	$pdf->Cell(10, 5, $row3x2["grade"],1, 'B','C');
	$pdf->Ln(5);
}
while($rowcount3x2<10){
	$pdf->Cell(15, 5,'',1, 'B');
	$pdf->Cell(69, 5,'',1, 'B');
	$pdf->Cell(10, 5,'',1, 'B','C');
	$pdf->Ln(5);
	$rowcount3x2 += 1;
}
	$pdf->Cell(15, 5,'',1, 'B');
	$pdf->Cell(69, 5,'G.W.A.:',1, 'B','R');
	$pdf->Cell(10, 5,$gwax2,1, 'B','C');


$pdf->SetXY(106,188);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(94, 8, 'Subjects to ENROLL this Semester:', 1,2,'C');
$pdf->SetFont('Arial', 'B', 6);
$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
$pdf->Cell(69, 6, 'Description', 1,0,'C');
$pdf->Cell(10, 6, 'Credits', 1,1,'C');
$pdf->SetFont('Arial', '', 6);
$pdf->SetXY(106,202);
$y = 202;
while ($row4x2=mysqli_fetch_assoc($result4x2)){
	$pdf->SetXY(106,$y);
	$pdf->Cell(15, 5, $row4x2["subject_code"],1, 'B');
	$pdf->Cell(69, 5,$row4x2["subject_desc"],1, 'B');
	$pdf->Cell(10, 5, $row4x2["credits"],1, 'B','C');
	$pdf->Ln(5);
	$y += 5;
}
while($rowcount4x2<10){
	$pdf->SetXY(106,$y);
	$pdf->Cell(15, 5,'',1, 'B');
	$pdf->Cell(69, 5,'',1, 'B');
	$pdf->Cell(10, 5,'',1, 'B','C');
	$pdf->Ln(5);
	$y += 5;
	$rowcount4x2 += 1;
}
	
	$pdf->SetXY(106,$y);
	$pdf->Cell(15, 5,'',1, 'B');
	$pdf->Cell(69, 5,'Total Units:',1, 'B','R');
	$pdf->Cell(10, 5,$totUx2,1, 'B','C');
	


$pdf->Ln(10);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(98, 5, '_______________________________', 0,0,'L');
$pdf->Cell(100, 5, '_______________________________', 0,1,'L');
$pdf->Cell(100, 5, ' Department Head', 0,0,'L');
$pdf->Cell(0, 5, ' Registrar', 0,1,'L');
*/


$pdf->Output();


?>