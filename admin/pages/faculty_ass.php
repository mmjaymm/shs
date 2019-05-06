<?php
include "connect.php";
session_start();
	$advid   = $_GET["advid"];
	$subject = $_GET["sub"];
	$sec     = $_GET["sec"];
	$sem     = $_GET["sem"];
	$ay      = $_GET["ay"];
	$end     = $_GET["end"];
	$strand  = $_GET['strand'];
	$major   = $_GET['major'];
	$grade   = $_GET['grade'];
	
	$sql = mysqli_query($con,"UPDATE tblsubject_enrolled SET fac_id = '".$_GET['facid']. "' WHERE advise_id = '".$_GET['advid']."' AND subdesc = '".$_GET['sub']."'");

		if ($sql == TRUE) {
		?>
		<script>
			window.location = "enroll_subject_of_stud.php?ay=<?php echo $ay;?>&end=<?php echo $end;?>&sem=<?php echo $sem;?>&sub=<?php echo $subject;?>&strand=<?php echo $strand;?>&major=<?php echo $major;?>&grade=<?php echo $grade;?>&sec=<?php echo $sec;?>";
		</script>
		<?php }
?>