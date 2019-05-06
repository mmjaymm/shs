<?php include "../templates/templates.php"; 
    headertemplate('Appointment | Guidance'); 
	include "connect.php"; 
	
	$id="";
	
	if(isset($_GET['id']))
    	$id=$_GET['id'];
	
	$sql_sel=mysqli_query($con,"SELECT * FROM tblapplicant_schedule WHERE schedule_id=$id");
	$app_row=mysqli_fetch_array($sql_sel);
	
	if(isset($_POST['btn_update'])){
		$date = $_POST['newtxtdate'];
		$time = $_POST['time'];
		
		$sql_val_date = mysqli_query($con,"SELECT * FROM tblapplicant_schedule WHERE date=DATE_FORMAT('$date', '%m/%d/%Y') AND time='$time'");
		$num_val_date = mysqli_num_rows($sql_val_date);
		
		if($num_val_date == 1){
			?>
				<script type="text/javascript">
					alert("Duplicate Schedule");
					window.location = "schedule_edit.php?id=<?php echo $id; ?>";
				</script>
			<?php
		}
		else{
			if($date == null){
				$sql_upd=mysqli_query($con,"UPDATE tblapplicant_schedule SET time='$time' WHERE schedule_id='$id'");
				if($sql_upd == true) {
						?>
						<script type="text/javascript">
							alert("Successfully Updated");
							window.location = "applicant_schedule.php";
						</script>
						<?php
				}
			}else {
			$sql_upd=mysqli_query($con,"UPDATE tblapplicant_schedule SET date=DATE_FORMAT('$date', '%m/%d/%Y'), time='$time' WHERE schedule_id='$id'");
				if($sql_upd == true) {
						?>
						<script type="text/javascript">
							alert("Successfully Updated");
							window.location = "applicant_schedule.php";
						</script>
						<?php
				}	
			}
		}
	}
	
	if(isset($_POST['btncancel'])){
		?>
			<script type="text/javascript">
				window.location = "applicant_schedule.php";
			</script>
		<?php
	}
	

?>

  <body class="skin-green">
    <div class="wrapper">
		 <?php navbar('applicant_schedule'); ?>
		 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Interview Scheduling
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Schedule Entry</h3>
            </div>
			
            <div class="container-fluid">
				<div class="col-lg-12">
					<form role="form" data-toggle="validator" method="post" action="" class="form-horizontal">
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group" >
									<label for="dobtxt"  class="control-label col-sm-3">Date Schedule:</label>
									<div class="col-sm-5">
										<input class="form-control" id="txtdate" name="txtdate" type="text" value="<?php echo $app_row['date']; ?>" readonly/>
									</div>
								</div>
								<div class="form-group" >
									<label for="dobtxt"  class="control-label col-sm-3">New Date Schedule:</label>
									<div class="col-sm-5">
										<input class="form-control" id="newtxtdate" name="newtxtdate" type="date" value="">
									</div>
								</div>
						
								<div class="form-group">
									<label class="control-label col-sm-3">Time:</label>
									<div class="col-sm-5">
										<select name="time" class="form-control">
												<option value="<?php echo $app_row['time']; ?>"><?php echo $app_row['time']; ?></option>
												<option value="8:00 am">8:00 am</option>
												<option value="8:10 am">8:10 am</option>
												<option value="8:20 am">8:20 am</option>
												<option value="8:30 am">8:30 am</option>
												<option value="8:40 am">8:40 am</option>
												<option value="8:50 am">8:50 am</option>
												<option value="9:00 am">9:00 am</option>
												<option value="9:10 am">9:10 am</option>
												<option value="9:20 am">9:20 am</option>
												<option value="9:30 am">9:30 am</option>
												<option value="9:40 am">9:40 am</option>
												<option value="9:50 am">9:50 am</option>
												<option value="10:00 am">10:00 am</option>
												<option value="10:10 am">10:10 am</option>
												<option value="10:20 am">10:20 am</option>
												<option value="10:30 am">10:30 am</option>
												<option value="10:40 am">10:40 am</option>
												<option value="10:50 am">10:50 am</option>
												<option value="11:00 am">11:00 am</option>
												<option value="11:10 am">11:10 am</option>
												<option value="11:20 am">11:20 am</option>
												<option value="11:30 am">11:30 am</option>
												<option value="11:40 am">11:40 am</option>
												<option value="11:50 am">11:50 am</option>
												<option value="12:00 am">12:00 am</option>
												<option value="12:10 am">12:10 am</option>
												<option value="12:20 am">12:20 am</option>
												<option value="12:30 am">12:30 am</option>
												<option value="12:40 am">12:40 am</option>
												<option value="12:50 am">12:50 am</option>
												<option value="1:00 pm">1:00 pm</option>
												<option value="1:10 pm">1:10 pm</option>
												<option value="1:20 pm">1:20 pm</option>
												<option value="1:30 pm">1:30 pm</option>
												<option value="1:40 pm">1:40 pm</option>
												<option value="1:50 pm">1:50 pm</option>
												<option value="2:00 pm">2:00 pm</option>
												<option value="2:10 pm">2:10 pm</option>
												<option value="2:20 pm">2:20 pm</option>
												<option value="2:30 pm">2:30 pm</option>
												<option value="2:40 pm">2:40 pm</option>
												<option value="2:50 pm">2:50 pm</option>
												<option value="3:00 pm">3:00 pm</option>
												<option value="3:10 pm">3:10 pm</option>
												<option value="3:20 pm">3:20 pm</option>
												<option value="3:30 pm">3:30 pm</option>
												<option value="3:40 pm">3:40 pm</option>
												<option value="3:50 pm">3:50 pm</option>
												<option value="4:00 pm">4:00 pm</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<!--input type="submit" name="btn_add" value="Add" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-sm-1 col-xs-offset-2"/>
									<input type="reset" value="Cancel" class="btn btn-primary col-md-offset-3 col-sm-1 col-sm-offset-3 col-xs-offset-3"/-->
									<input type="submit" name="btn_update" value="Update" class="btn btn-success btn-md btn-block "/>
									<input type="submit" value="Cancel" name="btncancel" class="btn btn-primary btn-md btn-block"/>
								</div>
							</div>
						</div>
					</form>
				</div>
            </div><!-- /.box-body -->
            
        </div><!-- /.box -->
    </section>   
              
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
  </body>
</html>