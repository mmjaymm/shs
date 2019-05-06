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
	$count_sub_adv = mysqli_num_rows($sql_sub_adv);
	
	$lname = $row1["lname"];
	$fname = $row1["fname"];
	$mname = $row1["mname"];
	
	$grade   = $fetch_stud_adv["grade"];
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
	$pdf->Cell(0, 4, 'Grade : '.$grade, 0,1,'L');
	$pdf->Cell(135, 4, 'Strand / Tracks : '.$strand, 0,0,'L');
	$pdf->Cell(0, 4, 'Semester : '.$sem,  0,1,'L');
	$pdf->Cell(135, 4, 'Major : '.$major, 0,0,'L');
	$pdf->Cell(0, 4, 'A.Y. : '.$yr_start.' - '.$yr_end, 0,1,'L');
	
	$pdf->Ln(1);
	
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
		
	if($stats == "new"){
		$pdf->SetFont('Arial', '', 6);
		$pdf->SetXY(10,71);
		$yx = 71;
		$a = 1; 

		while($a <= 10) {
			$pdf->SetXY(10,$yx);
			$pdf->Cell(15, 5, '',1, 'B');
			$pdf->Cell(69, 5,'',1, 'B');
			$pdf->Cell(10, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$a++;
			$yx += 5;
		}
		$pdf->Cell(15, 5,'',1, 'B');
		$pdf->Cell(69, 5,'G.W.A.:',1, 'B','R');
		$pdf->Cell(10, 5,'',1, 'B','C');
		//=============================================//
		//			PARA SA SABJECT NGAUNG Semester	   //
		//=============================================//
		/*$pdf->SetXY(106,57);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects to ENROLL this Semester:', 1,2,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Credits', 1,1,'C');*/
		
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
		
		while($count_sub_adv<10){
			$pdf->SetXY(106,$y);
			$pdf->Cell(15, 5,'',1, 'B');
			$pdf->Cell(69, 5,'',1, 'B');
			$pdf->Cell(10, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$y += 5;
			$count_sub_adv += 1;
		}
		
		$pdf->SetXY(106,$y);
		$pdf->Cell(15, 5,'',1, 'B');
		$pdf->Cell(69, 5,'Total Units:',1, 'B','R');
		$pdf->Cell(10, 5,'',1, 'B','C');

	}else{
		
	}
	$pdf->Ln(10);
	$pdf->SetFont('Arial', '', 8);
	//$pdf->Image('../../images/sig1.png' , 20 ,120, 20 , 20,'PNG');
	$pdf->Cell(98, 3, '_______________________________', 0,0,'L');
	//s$pdf->Image('../../images/sig2.png' , 120 ,120, 20 , 20,'PNG');
	$pdf->Cell(100, 3, '_______________________________', 0,1,'L');
	$pdf->Cell(100, 2, ' Department Head', 0,0,'L');
	$pdf->Cell(0, 2, ' Registrar', 0,1,'L');


	$pdf->Ln(6);
	$pdf->Cell(0, 2, '-   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -
						   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   -   ', 0,1,'C');
	$pdf->Cell(0, 4, '', 0,1,'C');
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(0, 5, 'Date: '.date('d-m-Y').'', 0,1,'R');
	$pdf->Ln(1);

	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Image('../../images/cctlogo.jpg' , 20 ,150, 20 , 20,'JPG');
	$pdf->Cell(0, 10, 'City College of Tagaytay', 0,2,'C');
	$pdf->Cell(0, 4, '(Senior High School)', 0,1,'C');
	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell(0, 5, "Student's Advising Form", 0,1,'C');
	$pdf->Ln(5);
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0, 4, 'Student Number : '.$shsid , 0,1,'L');
	$pdf->Cell(135, 4, 'Name of Student : '.strtoupper ($lname).', '.strtoupper ($fname).' '.strtoupper ($mname) , 0,0,'L');
	$pdf->Cell(0, 4, 'Grade : '.$grade, 0,1,'L');
	$pdf->Cell(135, 4, 'Strand / Tracks : '.$strand, 0,0,'L');
	$pdf->Cell(0, 4, 'Semester : '.$sem,  0,1,'L');
	$pdf->Cell(135, 4, 'Major : '.$major, 0,0,'L');
	$pdf->Cell(0, 4, 'A.Y. : '.$yr_start.' - '.$yr_end, 0,1,'L');
	$pdf->Ln(1);
	
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(94, 8, 'Subjects TAKEN from previous Semester:', 1,1,'C');
	$pdf->SetFont('Arial', 'B', 6);
	$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
	$pdf->Cell(69, 6, 'Description', 1,0,'C');
	$pdf->Cell(10, 6, 'Grade', 1,1,'C');
	
	//=============================================//
	//			PARA SA SABJECT NGAUNG Semester	   //
	//=============================================//
	$pdf->SetXY(106,195);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(94, 8, 'Subjects to ENROLL this Semester:', 1,2,'C');
	$pdf->SetFont('Arial', 'B', 6);
	$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
	$pdf->Cell(69, 6, 'Description', 1,0,'C');
	$pdf->Cell(10, 6, 'Credits', 1,1,'C');
	
	if($stats == "new"){
		$sql_sub_adv1 = mysqli_query($con,"SELECT * FROM tblsubject_enrolled WHERE advise_id='$adv_id' AND shs_id='$shsid'");
		$count_sub_adv1 = mysqli_num_rows($sql_sub_adv1);
	
		$pdf->SetFont('Arial', '', 6);
		$pdf->SetXY(10,209);
		$yx = 209;
		$a = 1; 

		while($a <= 10) {
			$pdf->SetXY(10,$yx);
			$pdf->Cell(15, 5, '',1, 'B');
			$pdf->Cell(69, 5,'',1, 'B');
			$pdf->Cell(10, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$a++;
			$yx += 5;
		}
		
		$pdf->Cell(15, 5,'',1, 'B');
		$pdf->Cell(69, 5,'G.W.A.:',1, 'B','R');
		$pdf->Cell(10, 5,'',1, 'B','C');
		//=============================================//
		//			PARA SA SABJECT NGAUNG Semester	   //
		//=============================================//
		/*$pdf->SetXY(106,157);
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(94, 8, 'Subjects to ENROLL this Semester:', 1,2,'C');
		$pdf->SetFont('Arial', 'B', 6);
		$pdf->Cell(15, 6, 'Subject Code', 1,0,'C');
		$pdf->Cell(69, 6, 'Description', 1,0,'C');
		$pdf->Cell(10, 6, 'Credits', 1,1,'C');*/
		
		$pdf->SetFont('Arial', '', 6);
		$pdf->SetXY(106,109);
		$yy = 209;
		
		while ($fetch_sub_adv1 = mysqli_fetch_array($sql_sub_adv1)){
			$pdf->SetXY(106,$yy);
			$pdf->Cell(15, 5, '',1, 'B');
			$pdf->Cell(69, 5,$fetch_sub_adv1['subdesc'],1, 'B');
			$pdf->Cell(10, 5,$fetch_sub_adv1['hours'],1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
		}
		
		while($count_sub_adv1<10){
			$pdf->SetXY(106,$yy);
			$pdf->Cell(15, 5,'',1, 'B');
			$pdf->Cell(69, 5,'',1, 'B');
			$pdf->Cell(10, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$yy += 5;
			$count_sub_adv1 += 1;
		}
		
		$pdf->SetXY(106,$yy);
		$pdf->Cell(15, 5,'',1, 'B');
		$pdf->Cell(69, 5,'Total Units:',1, 'B','R');
		$pdf->Cell(10, 5,'',1, 'B','C');

	}else{
		
	}
	$pdf->Ln(10);
	$pdf->SetFont('Arial', '', 8);
	//$pdf->Image('../../images/sig1.png' , 20 ,260, 20 , 20,'PNG');
	$pdf->Cell(98, 3, '_______________________________', 0,0,'L');
	//$pdf->Image('../../images/sig2.png' , 120 ,258, 20 , 20,'PNG');
	$pdf->Cell(100, 3, '_______________________________', 0,1,'L');
	$pdf->Cell(100, 2, ' Department Head', 0,0,'L');
	$pdf->Cell(0, 2, ' Registrar', 0,1,'L');
	
$pdf->Output();


?>