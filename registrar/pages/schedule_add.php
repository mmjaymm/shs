<?php include "../templates/templates.php"; 
    headertemplate('Appointment | Guidance'); 
	include "connect.php"; 
	
	if(isset($_POST['btn_add'])){
		$date = $_POST['txtdate'];
		$time = $_POST['time'];
		
		$sql_insert=mysql_query("INSERT INTO tblapplicant_schedule(date,time)VALUES('$date','$time')");
		if($sql_insert==true) {
				?>
				<script type="text/javascript">
					alert("Successfully");
					window.location = "applicant_schedule.php";
				</script>
				<?php
		}
	}

?>

  <body class="skin-red">
    <div class="wrapper">
		 <?php navbar('teachers'); ?>
		 
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
			
            <div class="container">
				<div class="col-md-10 col-md-offset-1">
					<form role="form" data-toggle="validator" method="post" action="" class="form-horizontal">
						<div class="row">
							<div class="form-group" >
								<label for="dobtxt"  class="control-label col-sm-3">Date Schedule:</label>
								<div class="col-sm-8">
									<input class="form-control" id="txtdate" name="txtdate" type="date">
								</div>
							</div>
						
							<div class="form-group">
								<label class="control-label col-sm-3">Time:</label>
								<div class="col-sm-2">
									<select name="time" class="form-control">
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
							<div class="form-group">
								<input type="submit" name="btn_add" value="Add" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-sm-1 col-xs-offset-2"/>
								<input type="reset" value="Cancel" class="btn btn-primary col-md-offset-3 col-sm-1 col-sm-offset-3 col-xs-offset-3"/>
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