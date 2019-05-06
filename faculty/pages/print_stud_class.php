<?php
	require('../../pdf/fpdf.php');
	include "connect.php";
	session_start();
	
	$sub    = $_GET['sub'];
	$ay     = $_GET['ay'];
	$end    = $_GET['end'];
	$sem    = $_GET['sem'];
	$strand = $_GET['strand'];
	$major  = $_GET['major'];
	$grade  = $_GET['grade'];
	$sec    = $_GET['sec'];
			
	//$date = $_GET['date'];
	//$appdate = $_GET['appdate'];
	
	$pdf = new FPDF('P','mm','A4');
	$pdf->AddPage();
	//====================================//
	//				HEADER   			  //
	//====================================//
	$pdf->SetXY(270,5);
	$pdf ->SetFont('Times', 'B', 8);
	$pdf -> Cell(25, 7, 'Date :'.date('m/d/Y'), 0, 0,'R');
	
	$pdf->Image('../../images/tagaytay_logo.png' , 30 ,15, 20 , 20,'PNG');
	$pdf->Image('../../images/cctlogo.jpg' , 155 ,15, 20 , 20,'JPG');
	
	$pdf->SetXY(95,10);
	$pdf ->SetFont('Times', 'B', 8);
	$pdf -> Cell(15, 7, 'REPUBLIC OF THE PHILIPPINES', 0, 0,'C');
	$pdf->SetXY(95,17);
	$pdf ->SetFont('Times', 'B', 15);
	$pdf -> Cell(15, 7, 'CITY COLLEGE OF TAGAYTAY', 0, 0,'C');
	$pdf->SetXY(95,22);
	$pdf ->SetFont('Times', 'B', 12);
	$pdf -> Cell(15, 7, 'Character and Knowledge', 0, 0,'C');
	$pdf->SetXY(95,27);
	$pdf ->SetFont('Times', 'B', 10);
	$pdf -> Cell(15, 7, '(SENIOR HIGH SCHOOL)', 0, 0,'C');
	
	//$_SESSION["username"];
	
	$pdf->SetXY(30,45);
	$pdf -> Cell(10, 7, 'NAME OF INSTRUCTOR :', 0, 0,'L');
	$pdf->SetXY(80,45);
	$pdf ->SetFont('Times', 'BI', 10);
	$pdf -> Cell(10, 7, strtoupper($_SESSION["lname"]."  ".$_SESSION["fname"]), 0, 0,'L');
	$pdf->SetXY(30,50);
	$pdf ->SetFont('Times', 'B', 10);
	$pdf -> Cell(10, 7, 'SUBJECT :', 0, 0,'L');
	$pdf->SetXY(80,50);
	$pdf ->SetFont('Times', 'Bi', 10);
	$pdf -> Cell(10, 7, $sub, 0, 0,'L');
	$pdf->SetXY(30,55);
	$pdf -> Cell(10, 7, 'STRAND :', 0, 0,'L');
	$pdf->SetXY(80,55);
	$pdf ->SetFont('Times', 'Bi', 10);
	$pdf -> Cell(10, 7, $strand, 0, 0,'L');
	$pdf->SetXY(30,60);
	$pdf -> Cell(10, 7, 'MAJOR :', 0, 0,'L');
	$pdf->SetXY(80,60);
	$pdf ->SetFont('Times', 'Bi', 10);
	$pdf -> Cell(10, 7, $major, 0, 0,'L');
	$pdf->SetXY(30,65);
	$pdf -> Cell(10, 7, 'GRADE :', 0, 0,'L');
	$pdf->SetXY(80,65);
	$pdf ->SetFont('Times', 'Bi', 10);
	$pdf -> Cell(10, 7, $grade, 0, 0,'L');
	$pdf->SetXY(30,70);
	$pdf -> Cell(10, 7, 'SECTION :', 0, 0,'L');
	$pdf->SetXY(80,70);
	$pdf ->SetFont('Times', 'Bi', 10);
	$pdf -> Cell(10, 7, $sec, 0, 0,'L');
	$pdf->SetXY(30,75);
	$pdf -> Cell(10, 7, 'SEMESTER :', 0, 0,'L');
	$pdf->SetXY(80,75);
	$pdf ->SetFont('Times', 'Bi', 10);
	$pdf -> Cell(10, 7, $sem, 0, 0,'L');
	$pdf->SetXY(30,80);
	$pdf -> Cell(10, 7, 'A. Y. :', 0, 0,'L');
	$pdf->SetXY(80,80);
	$pdf ->SetFont('Times', 'Bi', 10);
	$pdf -> Cell(10, 7, $ay.' - '.$end, 0, 0,'L');
	
	
	
			$sql_app1 = mysqli_query($con,"SELECT * FROM tblapplicant");
			$fetch_app1 = mysqli_num_rows($sql_app1);
		
			$pdf->SetXY(25,89);
			$pdf ->SetFont('Times', 'B', 10);
			$pdf->Cell(160, 7, "CLASS LIST", 1,0,'C');
			$pdf->SetTextColor(0,0,0);
			$pdf->SetXY(25,96);
			$pdf->Cell(13, 7, "#No.", 1,0,'C');
			$pdf->Cell(35, 7, "Student ID", 1,0,'C');
			$pdf->Cell(52, 7, "Name", 1,0,'C');
			$pdf->Cell(30, 7, "Grades", 1,0,'C');
			$pdf->Cell(30, 7, "Remarks", 1,0,'C');
			//$pdf->Cell(25, 7, "Date Applied", 1,0,'C');
	
	
		
				$sql_app = mysqli_query($con,"SELECT * FROM tblsubject_enrolled
																		INNER JOIN tblstudent_enrolled
																		ON tblstudent_enrolled.advise_id = tblsubject_enrolled.advise_id
																		AND tblstudent_enrolled.shs_id = tblsubject_enrolled.shs_id
																		WHERE subdesc = '$sub'
																		AND strand = '$strand'
																		AND grade = '$grade'
																		AND major = '$major'
																		AND semester = '$sem'
																		AND yr_start = '$ay'
																		AND yr_end = '$end'
																		AND csection = '$sec'");
				$pdf->SetFont('Arial', '', 7);
				$y = 103;
				$num_app = mysqli_num_rows($sql_app);
				$a = 1;
				$br = $num_app + 1;
				

					while($fetch_app = mysqli_fetch_array($sql_app)){
						$pdf->SetXY(25,$y);
						$pdf->Cell(13, 6, $a,1,0,'C');
						$pdf->Cell(35, 6, 'CCT-SHS-'.$fetch_app['shs_id'],1,0,'C');
						$pdf->Cell(52, 6, strtoupper($fetch_app['lname']).", ".$fetch_app['fname']." ".$fetch_app['mname'], 1,0,'L');
						$pdf->Cell(30, 6, $fetch_app['grades'], 1,0,'C');
						$pdf->Cell(30, 6, $fetch_app['remarks'], 1,0,'L');
						$y += 6;
						
						$a++;
						if($a == $br){
							break;
						}
					}
			
	
$pdf->Output();


?>