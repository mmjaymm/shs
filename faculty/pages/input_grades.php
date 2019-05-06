<?php
 include "connect.php";
	session_start();
	$grades  = $_GET["grades"];
	$advid   = $_GET["advid"];
	$subject = $_GET["subject"];
	$remarks = $_GET["rem"];
	$sec     = $_GET["section"];
	$sem     = $_GET["sem"];
	$ay      = $_GET["ay"];
	$end     = $_GET["end"];
	$strand  = $_GET['strand'];
	$major   = $_GET['major'];
	$grade   = $_GET['grade'];
			
	 $sql12 = mysqli_query($con,"UPDATE tblsubject_enrolled SET grades = '$grades', remarks = '$remarks' WHERE advise_id = '$advid' AND subdesc = '$subject'");
				
		if ($sql12== TRUE) {
		?>
		<script>
			window.location = "enroll_subject_of_stud.php?ay=<?php echo $ay;?>&end=<?php echo $end;?>&sem=<?php echo $sem;?>&sub=<?php echo $subject;?>&strand=<?php echo $strand;?>&major=<?php echo $major;?>&grade=<?php echo $grade;?>&sec=<?php echo $sec;?>";
		</script>
		<?php
             //header ("location: enroll_subject_of_stud.php?ay='".$ay."'&end='".$end."'&sem='".$sem."'&sub='".$subject."'&strand='".$strand."'&major='".$major."'&grade='".$grade."'&sec='".$sec."'");
        }
?>