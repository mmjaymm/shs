<!DOCTYPE html>
<html>
	<head>
	<?php include "header.php";?>
	<!---Calendar-->
	<link href="css/jquery-ui.css" rel="Stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js" ></script>
	
	<script language="javascript">
	$(document).ready(function () {
		$("#txt_date").datepicker({
			minDate: 0, 
			beforeShowDay: $.datepicker.noWeekends 
		});
	});
	</script>






	<script>
	$(document).ready(function()
		{
		$("#txt_date").on('change',function()
			{
				var keyword = $(this).val();
				
				$.ajax(
					{
					url:'output_time.php',
					type:'POST',
					data:{keyword:keyword},
										
					beforeSend:function()
					{$("#display_time").html('Working...');},
										
					success:function(data)
					{$("#display_time").html(data);},
				});
			});
		});
	</script>

	</head>
	
	<?php  
		include "connect.php";
		$app_id = $_GET["id"];
		
	if(isset($_POST['btn_submit'])){				
			$date = $_POST['txt_date'];
			$time =  $_POST['time'];
			$appid = $_POST['appid'];
		
			$sql_sched = mysqli_query($con,"SELECT * FROM tblapplicant_schedule WHERE time = '$time' AND date='$date' AND status='1'");
			$num_sched = mysqli_num_rows($sql_sched);

		if($time == null){
			?>
			<script type="text/javascript">
				alert("Select date and time for interview");
				window.location = "schedule_interview.php?id=<?php echo $app_id?>";
			</script>
			<?php
		}else if($num_sched == 1){
			?>
			<script type="text/javascript">
				alert("You have the same Schedule try other schedule.");
				window.location = "schedule_interview.php?id=<?php echo $app_id?>";
			</script>
			<?php
		}else{
			///SAVING APPLICANT INFORMATION
			$sql_update = "UPDATE tblapplicant_schedule SET status='1',appid='$appid' WHERE date='$date' AND time='$time'";
			
			$sql_ins_app=mysqli_query($con,$sql_update);
			
			?>
			<script type="text/javascript">
				alert("You need to be in the GUIDANCE OFFICE on your scheduled interview.");
				window.location = "requirements.php";
			</script>
			<?php
		}
		
	}
	
?>	
<body class="login-page">	
    <div class="container ">
		<div class="row">
			<div class="login-logo">
				<img src="images/logo.png" width="150px" class="img-fluid" alt="Responsive image">
				<a href="index.php"><b>Schedule of Interview</b></a>
			</div><!-- /.login-logo -->
		</div>	
		
		<form method="POST" class="form-horizontal">
			
					
			<div class="container login-box-body">
				<div class="alert alert-success alert-dismissible" role="alert">Take Note of your <strong>Applicant Number</strong>.
				</div>
				<div class="row">
						<div class="form-group">
							<label for="appid" class="col-md-2 control-label">Applicant Number : </label>
							<div class="col-md-4">
								<input type="text" class="form-control" id="appid" name="appid" value="<?php echo $app_id; ?>" placeholder="Applicant No." readonly>
							</div>
						</div>
						
						<div class="form-group">
							<label for="appid" class="col-md-2 control-label">Select Date : </label>
							<div class="col-md-4">
								<!--input class="form-control" id="txtdate" name="txtdate" type="date"-->
								<input class="form-control" id="txt_date" name="txt_date" type="text">
							</div>
						</div>
				</div>
				
				<div class="" style="background: #e0e0d1; text-align: center;">
					<div class="form-group" id="display_time">
					
					</div>
				</div>
				
				<div class="container">
					<div class="form-group">
						<input type="submit" name="btn_submit" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
						<a href="schedule_interview.php?id=<?php echo $app_id?>" class="btn btn-primary col-md-offset-2 col-sm-offset-2 col-xs-offset-3">Cancel</a>
					</div>
				</div>
			</div>
		</form>
		
    </div><!-- /.login-box -->
	<?php include "footer_interview.php";?>
	<br/><br/>

</body>
</html>