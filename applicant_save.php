<?php
	include "connect.php";

	if(isset($_POST['btn_submit'])){				
		$lname = $_POST['lname'];
		$fname =  $_POST['fname'];
		$mname =  $_POST['mname'];
		$bday =  $_POST['bday'];
		$age =  $_POST['age'];
		$gender = $_POST['sex'];
		$street =  $_POST['street'];
		$city =  $_POST['city'];
		$province = $_POST['province'];
		$contact =  $_POST['contact'];
		$school =  $_POST['school'];
		$lrn =  $_POST['lrn'];
		$type =  $_POST['s_type'];
		$guardian =  $_POST['gname'];
		$gcontact =  $_POST['gcontact'];
		$newBirth = date("m/d/Y", strtotime($bday));
		
		///////////////////VALIDATE IF THE FIELD IS EMPTY//////////////////
		$sql_app_val = mysqli_query($con,"SELECT * FROM tblapplicant WHERE lrn_no='$lrn'");
		$num_app_val = mysqli_num_rows($sql_app_val);

		if($num_app_val > 0){
			?>
				<script type="text/javascript">
					alert("Duplicate LRN Number. \n Please try again !!");
					window.location = "application_form.php";
				</script>
			<?php
			
		}else if($lname=="" || $fname=="" || $mname=="" 
			|| $bday=="" || $age=="" || $gender=="" || $street==""
			|| $city=="" || $province=="" || $contact=="" || $school=="" || $type=="" || $guardian=="" || $gcontact==""){
			?>
				<script type="text/javascript">
					alert("Required All Fields are filled in...!!");
					window.location = "application_form.php";
				</script>
			<?php
		}else{

		/////////////---------SAVING APPLICANT INFORMATION-----//////////////////////////
		$sql_ins_app=mysqli_query($con,"INSERT INTO tblapplicant(appid, shs_id, lrn_no,lname, fname, mname, gender, bday, age, street, city, province, contact, school, school_type, guardian, gcontact, date, status)		
				VALUES('','','$lrn','$lname','$fname','$mname','$gender','$newBirth','$age','$street','$city','$province','$contact','$school','$type','$guardian','$gcontact','".date("m/d/Y")."','0')");
		
		$sql_max_id = mysqli_query($con,"SELECT MAX(appid) FROM tblapplicant");
		$fetch_max_id = mysqli_fetch_array($sql_max_id);
		$max_id = $fetch_max_id[0];
				
		//$sql_ins_info=mysqli_query($con,"INSERT INTO tblapplicant_info(id,appid, lname, fname, mname, remarks, date)		
		//		VALUES('','$max_id','$lname','$fname','$mname','','".date("m/d/Y")."')");
		?>
		<script type="text/javascript">
			alert("Applicant Added Successfully...!!");
			window.location = "schedule_interview.php?id=<?php echo $max_id; ?>";
		</script>
		<?php	
		}			
	}
?>