<?php
	include "connect.php"; 

	if(isset($_GET['app_id']))
    	$id=$_GET['app_id'];

		if(isset($_POST['btn_upd'])){
			$fname    = $_POST['fnametxt'];
			$lname    = $_POST['lnametxt'];
			$mname    = $_POST['mnametxt'];
			$contact    = $_POST['phonetxt'];
			$street   = $_POST['street'];
			$city 	  = $_POST['city'];
			$province = $_POST['province'];
			$school   = $_POST['school'];
			$type     = $_POST['s_type'];
			$lrn      = $_POST['lrn'];

			mysqli_query($con,"UPDATE tblapplicant SET fname='$fname', lname='$lname',mname='$mname',contact='$contact', street='$street', city='$city', province='$province', school='$school', school_type='$type', lrn_no='$lrn' WHERE appid='$id'");
			?>
				<script type="text/javascript">
					alert("Successfully Updated");
					window.location = "tblapplicant.php";
				</script>
			<?php
		}
?>