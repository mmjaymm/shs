<?php
	include "connect.php"; 

	if(isset($_GET['app_id']))
    	$id=$_GET['app_id'];

		mysqli_query($con,"DELETE  FROM tblapplicant WHERE appid='$id'");
		?>
			<script type="text/javascript">
				alert("Applicant Deleted");
				window.location = "tblapplicant.php";
			</script>
		<?php

?>