	<?php
	require('../../pdf/fpdf.php');
		include "connect.php";
		session_start();
		
	$shsid = $_GET['shsid'];
	$advid = $_GET['advid'];

	  
	$sql="SELECT * FROM tblstudent_enrolled WHERE shs_id ='$shsid' AND advise_id = '$advid'";
	$result=mysqli_query($con,$sql);
	$trows = mysqli_num_rows($result);
	$row=mysqli_fetch_assoc($result);

	$yrs    = $row["yr_start"];
	$yre    = $row["yr_end"];
	$sem    = $row["semester"];
	$shsid  = $row["shs_id"];
	$strand = $row["strand"];
	$major  = $row["major"];
	$grade  = $row["grade"];
	$lname  = $row["lname"];
	$fname  = $row["fname"];
	$mname  = $row["mname"];
		
		
	$sql3="SELECT * FROM tblstudent_enrolled 
			INNER JOIN tblsubject_enrolled
			ON tblstudent_enrolled.advise_id = tblsubject_enrolled.advise_id
			WHERE tblstudent_enrolled.advise_id ='$advid' 
			AND tblsubject_enrolled.shs_id ='$shsid'";
		$result3=mysqli_query($con,$sql3);
		
	//$sql_instructor = mysqli_query($con,"SELECT * FROM users_tbl");
	/*	$sql3="SELECT * FROM tblstudent_enrolled 
			INNER JOIN tblsubject_enrolled
			ON tblstudent_enrolled.advise_id = tblsubject_enrolled.advise_id 
			INNER JOIN users_tbl
			ON tblsubject_enrolled.fac_id = users_tbl.u_id
			WHERE tblstudent_enrolled.advise_id ='$advid' 
			AND tblsubject_enrolled.shs_id ='$shsid'";
		$result3=mysqli_query($con,$sql3);
		$row3=mysqli_fetch_assoc($result3);*/
		
		$sql_com_grade = mysqli_query($con,"SELECT SUM(grades) FROM tblsubject_enrolled
									INNER JOIN tblstudent_enrolled
									ON tblsubject_enrolled.shs_id = tblstudent_enrolled.shs_id
									WHERE tblsubject_enrolled.advise_id = '$advid'
																	AND tblsubject_enrolled.shs_id = '$shsid'");						
											$fetch_com_grade = mysqli_fetch_array($sql_com_grade);
																$dividend = $fetch_com_grade[0];
																
											
											$sql_com_grades = mysqli_query($con,"SELECT 
																	grades
																	FROM tblsubject_enrolled
																	INNER JOIN tblstudent_enrolled
																	ON tblsubject_enrolled.shs_id = tblstudent_enrolled.shs_id
																	WHERE tblsubject_enrolled.advise_id = '$advid'
																	AND tblsubject_enrolled.shs_id = '$shsid'
																	AND grades != ''");						
											$fetch_com_grades = mysqli_num_rows($sql_com_grades);
																
											$gen_ave = $dividend/$fetch_com_grades;
		

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial', '', 9);
	$pdf->Cell(0, 10, 'Date: '.date('d-m-Y').'', 0,1,'R');
	$pdf->Ln(5);

	$pdf->SetFont('Arial', 'B', 14);
	$pdf->Image('../../images/tagaytay_logo.png' , 20 ,20, 25 , 25,'PNG');
	$pdf->Image('../../images/cctlogo.jpg' , 160 ,20, 25 , 25,'JPG');
	$pdf->Cell(18, 10, '', 0);
	$pdf->Cell(150, 10, 'City College of Tagaytay', 0,1,'C');
	$pdf->Ln(15);

	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell(0, 5, 'REPORT OF GRADES', 0,1,'C');
	$pdf->Cell(0, 5, 'Academic Year : '.$yrs."-".$yre, 0,1,'C');
	$pdf->Cell(0, 5, 'Semester : '.$sem , 0,1,'C');
	$pdf->Ln(8);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(0, 4, 'Student Number : CCT-SHS-'.$shsid , 0,1,'L');
	$pdf->Cell(0, 4, 'Name of Student : '.strtoupper($fname." ".$mname." ".$lname), 0,1,'L');
	$pdf->Cell(0, 4, 'Strand : '.$strand , 0,1,'L');
	$pdf->Cell(0, 4, 'Major : '.$major , 0,1,'L');
	$pdf->Cell(0, 4, 'Grade Level : '.$grade , 0,1,'L');
	$pdf->Ln(5);
	$pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(20, 8, 'Subject Code', 1,0,'C');
	$pdf->Cell(80, 8, 'Description', 1,0,'C');
	$pdf->Cell(15, 8, 'Grade', 1,0,'C');
	$pdf->Cell(20, 8, 'Remarks', 1,0,'C');
	$pdf->Cell(43, 8, 'Instructor', 1,0,'C');
	$pdf->Cell(12, 8, 'Section', 1,0,'C');
	$pdf->Ln(11);
	$pdf->SetFont('Arial', '', 8);

	while ($row3=mysqli_fetch_array($result3)){
		$facid = $row3["fac_id"];
		$sql_fac = mysqli_query($con,"SELECT * FROM users_tbl WHERE u_id='$facid'");
		$fetch_fac = mysqli_fetch_array($sql_fac);
		
		$pdf->Cell(20, 5, "", 'B');
		$pdf->Cell(80, 5,$row3["subdesc"], 'B');
		$pdf->Cell(10, 5, "", 'B',0,'C');
		$pdf->Cell(10, 5, $row3["grades"], 'B',0,'C');
		$pdf->Cell(15, 5, $row3["remarks"], 'B',0,'C');
		if($facid == 0){
			$pdf->Cell(43, 5, 'to be determine', 'B');
		}else{
			$pdf->Cell(43, 5, strtoupper($fetch_fac["fname"]).", ".strtoupper($fetch_fac["lname"]), 'B');
		}
		
		$pdf->Cell(12, 5, $row3["csection"], 'B',0,'C');
		$pdf->Ln(5);
		
	}

	$pdf->Ln(20);
	$pdf->SetFont('Arial', '', 12);
	$pdf->Cell(55, 20, 'General weigthed average: ', 0,0,'L');
	$pdf->SetFont('Arial', 'B', 12);
	$pdf->Cell(20, 20, round($gen_ave), 0,1,'L');
	$pdf->Cell(100, 20, 'Noted by: ', 0,0,'L');
	$pdf->Cell(0, 20, 'Certified by: ', 0,1,'L');
	$pdf->Cell(100, 5, '_______________________________', 0,0,'L');
	$pdf->Cell(100, 5, '_______________________________', 0,1,'L');
	$pdf->Cell(100, 5, ' Strand Coordinator', 0,0,'L');
	$pdf->Cell(0, 5, ' Registrar', 0,1,'L');


	$pdf->Output();


	?>