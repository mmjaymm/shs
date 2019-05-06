<?php
	require('../../pdf/fpdf.php');
	include "connect.php";
	
	$option = $_GET['opt'];	
	
	//====================================================================================//
	//						PDF FILES													  //
	//====================================================================================//
	$pdf = new FPDF('L','mm','A4');
	$pdf->AddPage();
	//====================================//
	//				HEADER   			  //
	//====================================//
	$pdf->SetXY(270,5);
	$pdf ->SetFont('Times', 'B', 8);
	$pdf -> Cell(25, 7, 'Date :'.date('m/d/Y'), 0, 0,'R');
	
	$pdf->Image('../../images/tagaytay_logo.png' , 80 ,15, 20 , 20,'PNG');
	$pdf->Image('../../images/cctlogo.jpg' , 190 ,15, 20 , 20,'JPG');
	
	$pdf->SetXY(95,10);
	$pdf ->SetFont('Times', 'B', 8);
	$pdf -> Cell(100, 7, 'REPUBLIC OF THE PHILIPPINES', 0, 0,'C');
	$pdf->SetXY(95,17);
	$pdf ->SetFont('Times', 'B', 15);
	$pdf -> Cell(100, 7, 'CITY COLLEGE OF TAGAYTAY', 0, 0,'C');
	$pdf->SetXY(95,22);
	$pdf ->SetFont('Times', 'B', 12);
	$pdf -> Cell(100, 7, 'Character and Knowledge', 0, 0,'C');
	$pdf->SetXY(95,27);
	$pdf ->SetFont('Times', 'B', 10);
	$pdf -> Cell(100, 7, '(SENIOR HIGH SCHOOL)', 0, 0,'C');
	
	
	
		if($option == "all"){
			$sql_app1 = mysqli_query($con,"SELECT * FROM tblapplicant_validate");
			$fetch_app1 = mysqli_num_rows($sql_app1);
		
			$pdf->SetXY(5,39);
			$pdf ->SetFont('Times', 'B', 10);
			$pdf->Cell(232, 7, "LIST OF APPLICANT VALIDATED", 1,0,'C');
			$pdf->SetTextColor(205,0,27);
			$pdf->Cell(55, 7, "NUMBER OF APPLICANTS   ".$fetch_app1, 1,0,'R');
			$pdf->SetTextColor(0,0,0);
			$pdf->SetXY(5,46);
			$pdf->Cell(15, 7, "App. #no", 1,0,'C');
			$pdf->Cell(50, 7, "Name", 1,0,'C');
			$pdf->Cell(52, 7, "School(High School)", 1,0,'C');
			$pdf->Cell(18, 7, "Type", 1,0,'C');
			$pdf->Cell(52, 7, "Address", 1,0,'C');
			$pdf->Cell(70, 7, "Strand", 1,0,'C');
			$pdf->Cell(30, 7, "Contact Number", 1,0,'C');
			//$pdf->Cell(25, 7, "Date Applied", 1,0,'C');

		
			if($option == TRUE){
				$sql_app = mysqli_query($con,"SELECT * FROM tblapplicant INNER JOIN tblapplicant_validate
											ON tblapplicant.appid = tblapplicant_validate.appid WHERE tblapplicant.appid IS NOT null ORDER BY tblapplicant.lname ASC");
				$pdf->SetFont('Arial', '', 7);
				$y = 53;
				
				while($fetch_app = mysqli_fetch_array($sql_app)){
				$pdf->SetXY(5,$y);
				$pdf->Cell(15, 6, $fetch_app['appid'],1,0,'C');
				$pdf->Cell(50, 6, strtoupper($fetch_app['lname'].', '.$fetch_app['fname'].' '.$fetch_app['mname']),1,0,'L');
				$pdf->Cell(52, 6, $fetch_app['school'], 1,0,'L');
				$pdf->Cell(18, 6, $fetch_app['school_type'], 1,0,'L');
				$pdf->Cell(52, 6, strtoupper($fetch_app['city'].' , '.$fetch_app['province']), 1,0,'L');
				$pdf->Cell(70, 6, $fetch_app['strand'], 1,0,'L');
				$pdf->Cell(30, 6, $fetch_app['contact'], 1,0,'L');
				//$pdf->Cell(25, 6, $fetch_app['date'], 1,0,'C');
				$y += 6;
				}
			}
		}else if($option == "date_val"){
			$date = $_GET['date'];
			
			if(isset($_GET['date']) AND ($_GET['date'] != "")){
				$sql_date = "AND tblapplicant_validate.date_val = '$date'";
			}else { $sql_date = "";}
		
			if (!isset($_GET['date'])){
				$date_app="";
				
			}else{      
				$date_app = $_GET['date'];
			}
			
			$order = "ORDER BY tblapplicant_validate.lname ASC";
			
			$sql_app = mysqli_query($con,"SELECT * FROM tblapplicant INNER JOIN tblapplicant_validate
											ON tblapplicant.appid = tblapplicant_validate.appid WHERE tblapplicant_validate.appid != '' ".$sql_date."".$order);
			$num_app = mysqli_num_rows($sql_app);
			
			$pdf->SetXY(5,39);
			$pdf ->SetFont('Times', 'B', 10);
			
			$pdf->Cell(232, 7, "LIST OF APPLICANT VALIDATED on ".$date, 1,0,'C');
			
			$pdf->SetTextColor(205,0,27);
			$pdf->Cell(55, 7, "NUMBER OF APPLICANTS   ".$num_app, 1,0,'R');
			$pdf->SetTextColor(0,0,0);
			$pdf->SetXY(5,46);
			$pdf->Cell(15, 7, "App. #no", 1,0,'C');
			$pdf->Cell(50, 7, "Name", 1,0,'C');
			$pdf->Cell(52, 7, "School(High School)", 1,0,'C');
			$pdf->Cell(18, 7, "Type", 1,0,'C');
			$pdf->Cell(52, 7, "Address", 1,0,'C');
			$pdf->Cell(70, 7, "Strand", 1,0,'C');
			$pdf->Cell(30, 7, "Contact Number", 1,0,'C');
			
			
			$pdf->SetFont('Arial', '', 7);
			$y = 53;
				
				while($fetch_app = mysqli_fetch_array($sql_app)){
				$pdf->SetXY(5,$y);
				$pdf->Cell(15, 6, $fetch_app['appid'],1,0,'C');
				$pdf->Cell(50, 6, strtoupper($fetch_app['lname'].', '.$fetch_app['fname'].' '.$fetch_app['mname']),1,0,'L');
				$pdf->Cell(52, 6, $fetch_app['school'], 1,0,'L');
				$pdf->Cell(18, 6, $fetch_app['school_type'], 1,0,'L');
				$pdf->Cell(52, 6, strtoupper($fetch_app['city'].' , '.$fetch_app['province']), 1,0,'L');
				$pdf->Cell(70, 6, $fetch_app['strand'], 1,0,'L');
				$pdf->Cell(30, 6, $fetch_app['contact'], 1,0,'L');
				//$pdf->Cell(25, 6, $fetch_app['date'], 1,0,'C');
				$y += 6;
			}
		}
		else if($option == "strand"){
			$strand = $_GET['strand'];
			
			if(isset($_GET['strand']) AND ($_GET['strand'] != "")){
				$qstrand = "AND tblapplicant_validate.strand = '$strand'";
			}else { $qstrand = "";}
		

			if (!isset($_GET['strand'])){
				$strand="";
				
			}else{      
				$strand   = $_GET['strand'];
			}
			
			$order = "ORDER BY tblapplicant_validate.lname ASC";
			
			$sql_app = mysqli_query($con,"SELECT * FROM tblapplicant INNER JOIN tblapplicant_validate
											ON tblapplicant.appid = tblapplicant_validate.appid WHERE tblapplicant_validate.appid != '' ".$qstrand."".$order);
			$num_app = mysqli_num_rows($sql_app);
			
			$pdf->SetXY(5,39);
			$pdf ->SetFont('Times', 'B', 10);
			
			$pdf->Cell(232, 7, "LIST OF APPLICANT VALIDATED enrolled in ".$strand, 1,0,'C');
				
			
			$pdf->SetTextColor(205,0,27);
			$pdf->Cell(55, 7, "NUMBER OF APPLICANTS   ".$num_app, 1,0,'R');
			$pdf->SetTextColor(0,0,0);
			$pdf->SetXY(5,46);
			$pdf->Cell(15, 7, "App. #no", 1,0,'C');
			$pdf->Cell(50, 7, "Name", 1,0,'C');
			$pdf->Cell(52, 7, "School(High School)", 1,0,'C');
			$pdf->Cell(18, 7, "Type", 1,0,'C');
			$pdf->Cell(52, 7, "Address", 1,0,'C');
			$pdf->Cell(70, 7, "Strand", 1,0,'C');
			$pdf->Cell(30, 7, "Contact Number", 1,0,'C');
			
			
			$pdf->SetFont('Arial', '', 7);
			$y = 53;
				
				while($fetch_app = mysqli_fetch_array($sql_app)){
				$pdf->SetXY(5,$y);
				$pdf->Cell(15, 6, $fetch_app['appid'],1,0,'C');
				$pdf->Cell(50, 6, strtoupper($fetch_app['lname'].', '.$fetch_app['fname'].' '.$fetch_app['mname']),1,0,'L');
				$pdf->Cell(52, 6, $fetch_app['school'], 1,0,'L');
				$pdf->Cell(18, 6, $fetch_app['school_type'], 1,0,'L');
				$pdf->Cell(52, 6, strtoupper($fetch_app['city'].' , '.$fetch_app['province']), 1,0,'L');
				$pdf->Cell(70, 6, $fetch_app['strand'], 1,0,'L');
				$pdf->Cell(30, 6, $fetch_app['contact'], 1,0,'L');
				//$pdf->Cell(25, 6, $fetch_app['date'], 1,0,'C');
				$y += 6;
			}
		}
	//else if($option == "date"){
		
	//}
	/*else if(empty($_POST['date_app'])){
		
		$pdf->SetXY(5,39);
		$pdf ->SetFont('Times', 'B', 10);
		$pdf->Cell(287, 7, "LIST OF VALIDSSSS APPLICANT", 1,0,'C');
		$pdf->SetXY(5,46);
		$pdf->Cell(15, 7, "App. #no", 1,0,'C');
		$pdf->Cell(62, 7, "Name", 1,0,'C');
		$pdf->Cell(15, 7, "Gender", 1,0,'C');
		$pdf->Cell(70, 7, "Address", 1,0,'C');
		$pdf->Cell(70, 7, "School", 1,0,'C');
		$pdf->Cell(30, 7, "Contact Number", 1,0,'C');
		$pdf->Cell(25, 7, "Date Applied", 1,0,'C');
	
		$sql_app = mysqli_query($con,"SELECT * FROM 
										tblapplicant INNER JOIN tblapplicant_validate 
										ON tblapplicant.appid = tblapplicant_validate.appid
										WHERE tblapplicant_validate.remarks = 'Validated' order by lname asc");
		$fetch_app = mysqli_fetch_array($sql_app);
		
		$pdf->SetFont('Arial', '', 7);
		$y = 53;
		
		while($fetch_app = mysqli_fetch_array($sql_app)){
			$pdf->SetXY(5,$y);
			$pdf->Cell(15, 6, $fetch_app['appid'],1,0,'C');
			$pdf->Cell(62, 6, strtoupper($fetch_app['lname'].', '.$fetch_app['fname'].' '.$fetch_app['mname']),1,0,'L');
			$pdf->Cell(15, 6, $fetch_app['gender'],1, 'B','C');
			$pdf->Cell(70, 6,  strtoupper($fetch_app['city'].' , '.$fetch_app['province']), 1,0,'L');
			$pdf->Cell(70, 6, strtoupper($fetch_app['school']), 1,0,'L');
			$pdf->Cell(30, 6, $fetch_app['contact'], 1,0,'L');
			$pdf->Cell(25, 6, $fetch_app['date'], 1,0,'C');
			$pdf->Ln(5);
			$y += 6;
		}
	}	
	*/	
	
$pdf->Output();


?>