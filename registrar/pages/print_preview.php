<?php
	require('../../pdf/fpdf.php');
	include "connect.php";
	session_start();
    

    $ay = $_GET['ay'];
    $shsid = $_GET['shsid'];
    $sem = $_GET['sem'];
    $grade = $_GET['grade'];
    $strand = $_GET['strand'];
    $major = $_GET['major'];
    $sec = $_GET['section'];

     if($strand == "nulls"){
       $sql_strand = "";
    }else {  
    	$sql_strand = "AND strand = '$strand'";
    }
    
     if( $ay == "nulls"){
        $sql_ay = "";
    }else { $sql_ay = "";
		$sql_ay = "AND yr_start = '$ay'";
	}

	if($shsid == "nulls"){
        $sql_id = "";
    }else {
   	 	$sql_id = "AND shs_id = '$shsid'";
 	}
	
    if($sem == "nulls"){
        $sql_sem = "";
    }else { 
    	$sql_sem = "AND semester = '$sem'";
    }
	
     if($grade == "nulls"){
        $sql_grade = "";
    }else {
    	$sql_grade = "AND grade = '$grade'";
    }
	
	if($major == "nulls"){
        $sql_major = "";
    }else {
    	$sql_major = "AND major = '$major'";
    }
	
    if($sec == "nulls"){
      	$sql_section = "";
    }else { 
    	$sql_section = "AND section = '$sec'";
    }
    


	if (!isset($_POST["ay_start"]) == "nulls" or !isset($_POST["sem"]) == "nulls"
     or!isset($_POST["strand"]) == "nulls" or !isset($_POST["grade"]) == "nulls"
     or !isset($_POST["section"]) == "nulls" or !isset($_POST["major"]) == "nulls"
	 or !isset($_POST["search"]) == "nulls" or !isset($_POST["shsid"]) == "nulls"){
      
      $yr_start ="";
      $sem		="";
      $strand   ="";
	  $major    ="";
      $grade    ="";
      $section  ="";
      $shsid   ="";
	}else{      
      	$ay = $_GET['ay'];
	    $shsid = $_GET['shsid'];
	    $sem = $_GET['sem'];
	    $grade = $_GET['grade'];
	    $strand = $_GET['strand'];
	    $major = $_GET['major'];
	    $sec = $_GET['section'];   
	}
	
	
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
	
	
		$sql_app = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id IS NOT NULL 
							".$sql_ay."".$sql_sem."".$sql_strand."".$sql_major."". $sql_grade."".$sql_section."".$sql_id." ORDER BY lname");
		$num_sql = mysqli_num_rows($sql_app);

			//$sql_app1 = mysqli_query($con,"SELECT * FROM tblstudent_advised");
			//$fetch_app1 = mysqli_num_rows($sql_app1);
		
			$pdf->SetXY(5,39);
			$pdf ->SetFont('Times', 'B', 10);
			$pdf->Cell(232, 7, "LIST OF STUDENT ENROLLED", 1,0,'C');
			$pdf->SetTextColor(205,0,27);
			$pdf->Cell(55, 7, "NUMBER OF STUDENT   ", 1,0,'R');
			$pdf->SetTextColor(0,0,0);
			$pdf->SetXY(5,46);
			$pdf->Cell(17, 7, "Number", 1,0,'C');
			$pdf->Cell(25, 7, "Student ID", 1,0,'C');
			$pdf->Cell(60, 7, "Name", 1,0,'C');
			$pdf->Cell(18, 7, "Strand", 1,0,'C');
			$pdf->Cell(52, 7, "Major", 1,0,'C');
			$pdf->Cell(40, 7, "Grade", 1,0,'C');
			$pdf->Cell(15, 7, "Section", 1,0,'C');
			$pdf->Cell(30, 7, "Semester", 1,0,'C');
			$pdf->Cell(30, 7, "A.Y.", 1,0,'C');

		$pdf->SetFont('Arial', '', 7);
		$y = 53;
		$no = 1;
		$br = $num_sql + 1;

		while($fetch_app = mysqli_fetch_array($sql_app)){

			$pdf->SetXY(5,$y);
			$pdf->Cell(17, 6, $no, 1,0,'C');
			$pdf->Cell(25, 6, $fetch_app['shs_id'], 1,0,'C');
			$pdf->Cell(60, 6, strtoupper($fetch_app['lname'].", ".$fetch_app['fname']." ".$fetch_app['mname']), 1,0,'C');
			$pdf->Cell(18, 6, $fetch_app['strand'], 1,0,'C');
			$pdf->Cell(52, 6, $fetch_app['major'], 1,0,'C');
			$pdf->Cell(40, 6, $fetch_app['grade'], 1,0,'C');
			$pdf->Cell(15, 6, $fetch_app['section'], 1,0,'C');
			$pdf->Cell(30, 6, $fetch_app['semester'], 1,0,'C');
			$pdf->Cell(30, 6, $fetch_app['yr_start']."-".$fetch_app['yr_end'], 1,0,'C');
				//$pdf->Cell(25, 6, $fetch_app['date'], 1,0,'C');
			$y += 6;
			$no++;
			if($no == $br){
				break;
			}
		}
/**/
		/*}else if($option == "rem"){
			$sql_app1 = mysqli_query($con,"SELECT * FROM tblapplicant");
			$fetch_app1 = mysqli_num_rows($sql_app1);
		
			$pdf->SetXY(5,39);
			$pdf ->SetFont('Times', 'B', 10);
			$pdf->Cell(232, 7, "LIST OF APPLICANT", 1,0,'C');
			$pdf->SetTextColor(205,0,27);
			$pdf->Cell(55, 7, "NUMBER OF APPLICANTS   ".$fetch_app1, 1,0,'R');
			$pdf->SetTextColor(0,0,0);
			$pdf->SetXY(5,46);
			$pdf->Cell(15, 7, "App. #no", 1,0,'C');
			$pdf->Cell(50, 7, "Name", 1,0,'C');
			$pdf->Cell(15, 7, "Gender", 1,0,'C');
			$pdf->Cell(52, 7, "Address", 1,0,'C');
			//$pdf->Cell(60, 7, "School", 1,0,'C');
			$pdf->Cell(70, 7, "Strand", 1,0,'C');
			$pdf->Cell(30, 7, "Contact Number", 1,0,'C');
			$pdf->Cell(30, 7, "Status Req.", 1,0,'C');
			$pdf->Cell(25, 7, "Date Applied", 1,0,'C');
		}*/
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