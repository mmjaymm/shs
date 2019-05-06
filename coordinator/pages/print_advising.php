<?php
	include "connect.php"; 
	require('../../pdf/fpdf.php');
	////////////////////////////////////////////////

	$shsid = $_GET['shsid'];
	$adv_id = $_GET['adv_id'];
	$last_advid = $_GET['lstadvid'];
	
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
	//===================================//
	//		kukunin ung subject TAKEN    //
	//===================================//
	$sql_max_enid   = mysqli_query($con, "SELECT max(advise_id) FROM tblstudent_enrolled WHERE shs_id='$shsid'");
	$fetch_max_anid = mysqli_fetch_array($sql_max_enid);
	$result_max_enid= $fetch_max_anid[0];
										
	$sql_sub_taken = mysqli_query($con, "SELECT * FROM tblsubject_enrolled WHERE advise_id='$result_max_enid' AND shs_id='$shsid'");
	$count_sub_taken = mysqli_num_rows($sql_sub_taken);
	
	$lname = $fetch_stud_adv["lname"];
	$fname = $fetch_stud_adv["fname"];
	$mname = $fetch_stud_adv["mname"];
	
	$strand   = $fetch_stud_adv["strand"];
	$grade   = $fetch_stud_adv["grade"];
	$major 	  = $fetch_stud_adv["major"];
	$sem	  = $fetch_stud_adv["semester"];
	$yr_start = $fetch_stud_adv["yr_start"];
	$yr_end = $fetch_stud_adv["yr_end"];
	
	//==========================================================//
	$sql_com_grade = mysqli_query($con,"SELECT SUM(grades)
										FROM tblsubject_enrolled
										INNER JOIN tblstudent_enrolled
										ON tblsubject_enrolled.shs_id = tblstudent_enrolled.shs_id
										WHERE tblsubject_enrolled.advise_id = '$last_advid'
										AND tblsubject_enrolled.shs_id = '$shsid'");						
	$fetch_com_grade = mysqli_fetch_array($sql_com_grade);
										$dividend = $fetch_com_grade[0];
																
	$sql_com_grades = mysqli_query($con,"SELECT grades FROM tblsubject_enrolled
										INNER JOIN tblstudent_enrolled
										ON tblsubject_enrolled.shs_id = tblstudent_enrolled.shs_id
										WHERE tblsubject_enrolled.advise_id = '$last_advid'
										AND tblsubject_enrolled.shs_id = '$shsid'
										AND grades != ''");						
	$fetch_com_grades = mysqli_num_rows($sql_com_grades);
																
	$gen_ave = $dividend/$fetch_com_grades;
	$gen_ave1 = $dividend/$fetch_com_grades;
	//==========================================================//
	
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
		
	
		$pdf->SetFont('Arial', '', 6);
		$pdf->SetXY(10,71);
		$yx = 71;
		$a = 1; 
	//==========================================================//
	//		PARA IDISPLAY UNG NAKUHA NG SUBJECT NKARAAN SEM	   //
	//=========================================================//
		while ($fetch_sub_taken = mysqli_fetch_array($sql_sub_taken)){
			$pdf->SetXY(10,$yx);
			$pdf->Cell(15, 5, '',1, 'B');
			$pdf->Cell(69, 5,$fetch_sub_taken['subdesc'],1, 'B');
			$pdf->SetFont('Arial', 'B', 8);
			$pdf->Cell(10, 5,$fetch_sub_taken['grades'],1, 'B','C');
			$pdf->SetFont('Arial', '', 6);
			$pdf->Ln(5);
			$a++;
			$yx += 5;
		}
		while($count_sub_taken<10){
			$pdf->SetXY(10,$yx);
			$pdf->Cell(15, 5,'',1, 'B');
			$pdf->Cell(69, 5,'',1, 'B');
			$pdf->Cell(10, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$yx += 5;
			$count_sub_taken += 1;
		}
		
		$pdf->Cell(15, 5,'',1, 'B');
		$pdf->Cell(69, 5,'G.W.A.:',1, 'B','R');
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(10, 5,round($gen_ave),1, 'B','C');
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

	
	$pdf->Ln(10);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Image('../../images/sig1.png' , 20 ,120, 20 , 20,'PNG');
	$pdf->Image('../../images/sig1.png' , 20 ,120, 20 , 20,'PNG');
	$pdf->Image('../../images/sig1.png' , 20 ,120, 20 , 20,'PNG');
	$pdf->Cell(98, 3, '_______________________________', 0,0,'L');
	$pdf->Image('../../images/sig2.png' , 120 ,120, 20 , 20,'PNG');
	$pdf->Image('../../images/sig2.png' , 120 ,120, 20 , 20,'PNG');
	$pdf->Image('../../images/sig2.png' , 120 ,120, 20 , 20,'PNG');
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
	
	
		$sql_sub_adv1 = mysqli_query($con,"SELECT * FROM tblsubject_enrolled WHERE advise_id='$adv_id' AND shs_id='$shsid'");
		$count_sub_adv1 = mysqli_num_rows($sql_sub_adv1);
		
		$sql_max_enid1   = mysqli_query($con, "SELECT max(advise_id) FROM tblstudent_enrolled WHERE shs_id='$shsid'");
		$fetch_max_anid1 = mysqli_fetch_array($sql_max_enid1);
		$result_max_enid1= $fetch_max_anid1[0];
											
		$sql_sub_taken1 = mysqli_query($con, "SELECT * FROM tblsubject_enrolled WHERE advise_id='$result_max_enid1' AND shs_id='$shsid'");
		$count_sub_taken1 = mysqli_num_rows($sql_sub_taken1);
	
		$pdf->SetFont('Arial', '', 6);
		$pdf->SetXY(10,209);
		$yx = 209;
		
		//==========================================================//
		//		PARA IDISPLAY UNG NAKUHA NG SUBJECT NKARAAN SEM	   //
		//=========================================================//
		while ($fetch_sub_taken1 = mysqli_fetch_array($sql_sub_taken1)){
			$pdf->SetXY(10,$yx);
			$pdf->Cell(15, 5, '',1, 'B');
			$pdf->Cell(69, 5,$fetch_sub_taken1['subdesc'],1, 'B');
			$pdf->SetFont('Arial', 'B', 8);
			$pdf->Cell(10, 5,$fetch_sub_taken1['grades'],1, 'B','C');
			$pdf->SetFont('Arial', '', 6);
			$pdf->Ln(5);
			$a++;
			$yx += 5;
		}
		while($count_sub_taken1<10){
			$pdf->SetXY(10,$yx);
			$pdf->Cell(15, 5,'',1, 'B');
			$pdf->Cell(69, 5,'',1, 'B');
			$pdf->Cell(10, 5,'',1, 'B','C');
			$pdf->Ln(5);
			$yx += 5;
			$count_sub_taken1 += 1;
		}
		
		$pdf->Cell(15, 5,'',1, 'B');
		$pdf->Cell(69, 5,'G.W.A.:',1, 'B','R');
		$pdf->SetFont('Arial', 'B', 8);
		$pdf->Cell(10, 5,round($gen_ave1),1, 'B','C');
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

	
	$pdf->Ln(10);
	$pdf->SetFont('Arial', '', 8);
	$pdf->Image('../../images/sig1.png' , 20 ,260, 20 , 20,'PNG');
	$pdf->Image('../../images/sig1.png' , 20 ,260, 20 , 20,'PNG');
	$pdf->Image('../../images/sig1.png' , 20 ,260, 20 , 20,'PNG');
	$pdf->Cell(98, 3, '_______________________________', 0,0,'L');
	$pdf->Image('../../images/sig2.png' , 120 ,258, 20 , 20,'PNG');
	$pdf->Image('../../images/sig2.png' , 120 ,258, 20 , 20,'PNG');
	$pdf->Image('../../images/sig2.png' , 120 ,258, 20 , 20,'PNG');
	$pdf->Cell(100, 3, '_______________________________', 0,1,'L');
	$pdf->Cell(100, 2, ' Department Head', 0,0,'L');
	$pdf->Cell(0, 2, ' Registrar', 0,1,'L');
	
$pdf->Output();


?>