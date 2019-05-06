<?php
include "connect.php"; 

if(isset($_GET['shsid']))
    $id = $_GET['shsid'];

if(isset($_GET['stats']))
	$stats = $_GET['stats'];
	
	//=======================================//
	//		KUKUNIN UNG LNAME,FNAME,MNAME    //
	//=======================================//
	$sql_stud_reg   = mysqli_query($con,"SELECT * FROM tblstudent_register WHERE shs_id = $id");
	$fetch_stud_reg = mysqli_fetch_array($sql_stud_reg);
	$num_stud_reg   = mysqli_num_rows($sql_stud_reg);
	
	$lname = $fetch_stud_reg['lname'];
	$fname = $fetch_stud_reg['fname'];
	$mname = $fetch_stud_reg['mname'];
	
	$strand = $_POST['strandid'];
	$major  = $_POST['major'];
	$grade  = $_POST['grade'];
	$sem    = $_POST['sem'];
	$major  = $_POST['major'];
		
	if(isset($_POST['btn_save'])){
		
		$ay_start = date('Y');
		$ay_end = date('Y') + 1;
		//=======================================//
		//		SAVING IN TBLSTUDENT_ADVISED     //
		//=======================================//
		$sql_insert=mysqli_query($con,"INSERT INTO tblstudent_advised(shs_id,lname,fname,mname,strand,major,section,grade,semester,yr_start,yr_end,date_advised)
												values('$id','$lname','$fname','$mname','$strand','$major','','$grade','$sem','$ay_start','$ay_end','".date("m/d/Y")."')");
		//=======================================//
		//		KUNIN ANG PINAKA MAX NA SECTION  //
		//=======================================//		
	 	$select = mysqli_query($con,"SELECT max(section) FROM tblstudent_advised where strand = '$strand' AND major = '$major' AND grade='$grade' AND semester='$sem' AND yr_start='$ay_start' order by section");
		$fetch = mysqli_fetch_array($select);
		$sectioning = $fetch['max(section)'];
		//=======================================//
		//		UPDATE PARA MA ISET ANG SECTION  //
		//=======================================//			
				$sql_same = mysqli_query($con,"SELECT * FROM tblstudent_advised where section = '$sectioning' AND major = '$major' AND strand = '$strand' AND grade='$grade' AND semester='$sem' AND yr_start='$ay_start'");
				$fetch_same = mysqli_num_rows($sql_same);
					
					if($sectioning == ""){
						$sectioning1 = '1';
						
					}else if($fetch_same < 5){
						$sectioning1 = $sectioning;
						
					}else{
						$sectioning1 = $sectioning+1;
					}
					
					$sql_upd = mysqli_query($con,"update tblstudent_advised set section='$sectioning1' where shs_id='$id'");
		
		//====================================================//
		//		KUNIN ANG ADVISED ID PRA SA ENROLLED SUBJECT  //
		//====================================================//
		
		$sql_sel_enroll = mysqli_query($con,"SELECT * FROM tblstudent_advised where shs_id='$id' AND strand = '$strand' AND major = '$major' AND grade='$grade' AND semester='$sem'");
		$fetch_enroll = mysqli_fetch_array($sql_sel_enroll);
		$advise_id = $fetch_enroll['advise_id'];
		$enroll_section = $fetch_enroll['section'];
		//====================================================//
		//		KUNIN ANG MGA SUBJECTS NIYA					  //
		//====================================================//
		//$sql_sel_sub = mysqli_query($con,"SELECT * FROM tblsubject where strandcode = '$strand' AND grade='$grade' AND semester='$sem'");
		$sql_sub = mysqli_query($con, "SELECT * FROM tblsubject WHERE strandcode = '$strand' AND grade='$grade' AND semester='$sem'");
		
		while($fetch_sub = mysqli_fetch_array($sql_sub)){
			$subdesc = $fetch_sub['subdesc'];
			$hours = $fetch_sub['subhours'];
		//=============================================//
		//		ADDING NG ENROLLED SUBJECT NG STUDENT  //
		//=============================================//	
			$sql_ins_sub = mysqli_query($con,"INSERT INTO tblsubject_enrolled(advise_id,shs_id,subdesc,hours,grades,csection,fac_id,remarks)
										VALUES('$advise_id','$id','$subdesc','$hours','','$enroll_section','','')");
		}
		
		
		?>
				<script type="text/javascript">
						alert("Advising Student Successfully");
						window.location = "print_advising_form.php?stats=new&shsid=<?php echo $id;?>&adv_id=<?php echo $advise_id;?>";
				</script>
		<?php
	}
	
	if(isset($_POST['btn_save_old'])){
		$last_advid = $_GET['lstadvid'];
		$ay_start_old = date('Y');
		$ay_end_old = date('Y') + 1;
		//=======================================//
		//		SAVING IN TBLSTUDENT_ADVISED     //
		//=======================================//
		$sql_insert_old=mysqli_query($con,"INSERT INTO tblstudent_advised(shs_id,lname,fname,mname,strand,major,section,grade,semester,yr_start,yr_end,date_advised)
												values('$id','$lname','$fname','$mname','$strand','$major','','$grade','$sem','$ay_start_old','$ay_end_old','".date("m/d/Y")."')");
		//=======================================//
		//		KUNIN ANG PINAKA MAX NA SECTION  //
		//=======================================//		
	 	$select_old = mysqli_query($con,"SELECT max(section) FROM tblstudent_advised where strand = '$strand' AND grade='$grade' AND semester='$sem' AND yr_start='$ay_start_old' order by section");
		$fetch_old = mysqli_fetch_array($select_old);
		$sectioning_old = $fetch_old['max(section)'];
		//=======================================//
		//		UPDATE PARA MA ISET ANG SECTION  //
		//=======================================//			
				$sql_same_old = mysqli_query($con,"SELECT * FROM tblstudent_advised where section = '$sectioning_old' AND strand = '$strand' AND grade='$grade' AND semester='$sem' AND yr_start='$ay_start_old'");
				$fetch_same_old = mysqli_num_rows($sql_same_old);
					
					if($sectioning_old == ""){
						$sectioning1_old = '1';
						
					}else if($fetch_same_old < 2){
						$sectioning1_old = $sectioning_old;
						
					}else{
						$sectioning1_old = $sectioning_old+1;
					}
					
					$sql_upd_old = mysqli_query($con,"update tblstudent_advised set section='$sectioning1_old' where shs_id='$id'");
		
		//====================================================//
		//		KUNIN ANG ADVISED ID PRA SA ENROLLED SUBJECT  //
		//====================================================//
		
		$sql_sel_enroll_old = mysqli_query($con,"SELECT * FROM tblstudent_advised where shs_id='$id' AND strand = '$strand' AND grade='$grade' AND semester='$sem'");
		$fetch_enroll_old = mysqli_fetch_array($sql_sel_enroll_old);
		$advise_id_old = $fetch_enroll_old['advise_id'];
		$enroll_section_old = $fetch_enroll_old['section'];
		//====================================================//
		//		KUNIN ANG MGA SUBJECTS NIYA					  //
		//====================================================//
		//$sql_sel_sub = mysqli_query($con,"SELECT * FROM tblsubject where strandcode = '$strand' AND grade='$grade' AND semester='$sem'");
		$sql_sub_old = mysqli_query($con, "SELECT * FROM tblsubject WHERE strandcode = '$strand' AND grade='$grade' AND semester='$sem'");
		
		while($fetch_sub_old = mysqli_fetch_array($sql_sub_old)){
			$subdesc_old = $fetch_sub_old['subdesc'];
			$hours_old = $fetch_sub_old['subhours'];
		//=============================================//
		//		ADDING NG ENROLLED SUBJECT NG STUDENT  //
		//=============================================//	
			$sql_ins_sub_old = mysqli_query($con,"INSERT INTO tblsubject_enrolled(advise_id,shs_id,subdesc,hours,grades,csection,fac_id,remarks)
										VALUES('$advise_id_old','$id','$subdesc_old','$hours_old','','$enroll_section_old','','')");
		}
		
		?>
				<script type="text/javascript">
						alert("Advising Student Successfully");
						window.location = "print_advising.php?lstadvid=<?php echo $last_advid;?>&stats=old&shsid=<?php echo $id;?>&adv_id=<?php echo $advise_id_old;?>";
				</script>
		<?php
	}
?>
