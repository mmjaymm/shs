<?php
	include "connect.php"; 

	if(isset($_GET['id']))
    	$id=$_GET['id'];
		
		$sql_val = mysqli_query($con,"SELECT * FROM tblapplicant_schedule WHERE schedule_id='$id' AND status=1");
		$num_val = mysqli_num_rows($sql_val);
		
		if($num_val == 1){
			?>
				<script type="text/javascript">
					alert("Error Deleting");
					window.location = "applicant_schedule.php";
				</script>
			<?php
		}else{
			mysqli_query($con,"DELETE  FROM tblapplicant_schedule WHERE schedule_id='$id'");
			?>
				<script type="text/javascript">
					alert("Schedule Deleted");
					window.location = "applicant_schedule.php";
				</script>
			<?php
		}
?>