<?php
	$appid = $fetch_app_val['appid'];
	
		$shsid   = $_POST['shsid'];			
		$lname   = $_POST['lnametxt'];
    	$fname   = $_POST['fnametxt'];
        $mname   = $_POST['mnametxt'];
		$gender  = $_POST['gender'];
        $contact = $_POST['phonetxt'];
		$type    = $_POST['type'];
    	$status  = $_POST['status'];
        $strandid= $_POST['strandid'];
        $grade   = $_POST['grade'];
		$sem     = $_POST['sem'];
		$ay_start= $_POST['ay_start'];
        $ay_end  = $_POST['ay_end'];
		
		$sql_select = mysqli_query($con,"SELECT * FROM tblstudent_register WHERE type='$type' AND status='$status' AND grade='$grade' AND sem='$sem' AND strand='$strand'");
		if($sql_result = mysqli_num_rows($sql_select)){
			?>
			<script type="text/javascript">
				alert("Applicant Already Register as Student");
				window.location = "student_search.php";
			</script>
			<?php
			
		}else{
			$sql_ins = mysqli_query($con,"INSERT INTO tblstudent_register(shs_id,appid,lname,fname,mname,gender,contact,type,status,strand,major,grade,sem,ay_start,ay_end)
						 VALUES('$shsid','$appid','$lname','$fname','$mname','$gender','$contact','$type','$status','$strandid','','$grade','$sem','$ay_start','$ay_end')");
			
			$sql_upd = mysqli_query($con,"");
			$sql_del = mysqli_query($con,"DELETE FROM tblapplicant_validate WHERE appid=$id");
			
			?>
			<script type="text/javascript">
				alert("Registration Successful<?php echo $appid;?>");
				window.location = "student_registered.php";
			</script>
			<?php	
		}
?>