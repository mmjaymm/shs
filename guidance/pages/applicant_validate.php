<?php include "../templates/templates.php"; 
    headertemplate('Info | Applicant'); 
	include "connect.php"; 
	
	$id="";
	$opt="";
	
	if(isset($_GET['opt']))
    	$option=$_GET['opt'];
	
	if(isset($_GET['id']))
    	$id=$_GET['id'];
	
	$sql_sel=mysqli_query($con,"SELECT * FROM tblapplicant WHERE appid=$id");
	$app_row=mysqli_fetch_array($sql_sel);
	
//------------------applicant validation----------
if(isset($_POST['btn_validate'])){
	
	$val_lname = $app_row['lname'];
	$val_fname = $app_row['fname'];
	$val_mname = $app_row['mname'];
	$val_grade = $_POST['grade'];
	$val_strand = $_POST['strand'];
	$lrn = $_POST['lrn'];
	
	$sql_val_strand = mysqli_query($con,"SELECT * FROM tblstrand WHERE strandcode='$val_strand'");
	$fetch_val_strand = mysqli_fetch_array($sql_val_strand);
	$strand = $fetch_val_strand['stranddesc'];	
	
	//$sql_upd_info=mysqli_query($con,"UPDATE tblapplicant_info SET remarks='Validated' WHERE appid='$id'");
				
	$sql_insert=mysqli_query($con,"INSERT INTO tblapplicant_validate(appid,lname,fname,mname,grade,strandcode,strand,remarks,date_val,yr)VALUES('$id','$val_lname','$val_fname','$val_mname','$val_grade','$val_strand','$strand','Validated','".date("m/d/Y")."','".date("Y")."')");
	
	$sql_upd_info1=mysqli_query($con,"UPDATE tblapplicant SET status='1',lrn_no='$lrn' WHERE appid='$id'");
	
	///////////////////////////////////
	//     REQUIREMENTS
	/*
	if($_POST['req'] == null){
		?>
				<script type="text/javascript">
					alert("No Selected Requirements");
				</script>
		<?php
	}else{
		foreach($_POST['req'] as $value) {
			$in_ch=mysqli_query($con,"insert into tblreq(appid,shs_id,req) values ('$id','','$value')");
		}
	}
	
	$sql_req_sel = mysqli_query($con,"SELECT * FROM tblreq WHERE appid='$id'");
	$num_req_reg = mysqli_num_rows($sql_req_sel);
		
		if($num_req_reg == 10){
			$sql_req_upd = mysqli_query($con,"UPDATE tblapplicant_validate SET status='COMPLETE' WHERE appid='$id'");
		}else{
			$sql_req_upd = mysqli_query($con,"UPDATE tblapplicant_validate SET status='INCOMPLETE..' WHERE appid='$id'");
		}
*/
	
		if($sql_insert==true) {
				?>
				<script type="text/javascript">
					alert("Applicant Validated Successfully .");
					window.location = "tblapplicantvalid.php";
				</script>
				<?php
		}
}

?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('tblapplicant'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
             Applicant
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border"  style="background-color: #4aab69; color:white;">
              <h3 class="box-title"> Applicant Information</h3>
			  <div class="pull-right">
                    <a href="tblapplicant.php" class="btn btn-warning">Back</a> 
				</div>
            </div>
			<br/>
			
			<?php if($option=="view"){
				
				$sel_sched = mysqli_query($con,"SELECT * FROM tblapplicant_schedule WHERE appid='$id'");
				$row_sched = mysqli_fetch_array($sel_sched);
			?>
				
			<div class="content">
				<div class="row">
					<div class="col-md-7">
						<form method="post" action="applicant_update.php?app_id=<?php echo $id;?>" class="form-horizontal">
							<div class="form-group">
								<label for="roll_no" class="control-label col-md-3">Applicant Number:</label>
								<div class="col-md-8">
									<input  type="text" class="form-control only-number" id="roll_no" name="roll_no" value="<?php echo $id;?>" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="fnametxt" class="control-label col-md-3">First Name:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $app_row['fname'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="lnametxt" class="control-label col-md-3">Last Name:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $app_row['lname'];?>"/>
								</div>
							</div>
							 <div class="form-group">
								<label for="mnametxt" class="control-label col-md-3">Middle Name:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $app_row['mname'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="gender" class="control-label col-md-3">Gender:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $app_row['gender'];?>" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="phonetxt" class="control-label col-md-3">Contact Number:</label>
								<div class="col-md-8">
									<input type="text" class="form-control only-number" id="phonetxt" name="phonetxt" value="<?php echo $app_row['contact'];?>">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="bday" class="control-label col-md-3">Date of Birth :</label>
								<div class="col-md-8">
									<input type="text" class="form-control datepicker" name="bday" value="<?php echo $app_row['bday'];?>" data-date-format="mm/dd/yyyy" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-md-3">Street:</label>
								<div class="col-md-8">
									<input class="form-control" name="street" id="street" value="<?php echo $app_row['street'];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-md-3">City:</label>
								<div class="col-md-8">
									<input class="form-control" name="city" id="city" value="<?php echo $app_row['city'];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-md-3">Province:</label>
								<div class="col-md-8">
									<input class="form-control" name="province" id="province" value="<?php echo $app_row['province'];?>"></textarea>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Update" name="btn_upd" class="btn btn-success col-md-offset-2 col-sm-offset-4 col-xs-offset-2"/>

								<a name="btn_del" onclick="deleteData(<?php echo $id;?>)" class="btn btn-danger col-md-offset-3 col-sm-offset-3 col-xs-offset-3">Delete</a>
							</div>
						
					</div>
					
					<div class="col-md-5">
						<div class="col-lg-12">
							<div class="box">
								<div class="box-header with-border"  style="background-color: #4aab69;">
									<h5 class="box-title">Schedule of Interview	</h5>
								</div>
								<div class="content">
									<div class="form-group">
										<div class="form-group">
											<label for="datetxt" class="control-label col-md-4">Date:</label>
											<label  class="control-label col-md-8"><?php echo $row_sched['date']; ?></label>
										</div>
										<div class="form-group">
											<label for="timetxt" class="control-label col-md-4">Time:</label>
											<label  class="control-label col-md-8"><?php echo $row_sched['time']; ?></label>
										</div>
									</div>
								</div>
								
							</div>
						</div>
						<div class="col-lg-12 form-horizontal">
							<div class="row">
								<div class="form-group">
									<label for="schooltxt" class="control-label col-md-3">School Name (Junior High School):</label>
									<div class="col-md-8">
										<textarea class="form-control" name="school" id="school" cols="10" rows="3" ><?php echo $app_row['school'];?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="typetxt" class="control-label col-md-3">Type of School:</label>
									<div class="col-md-8">
										<select class="form-control" id="s_type" name="s_type" required>
											<option value="Public" <?php if($app_row['school_type'] == "Public"){ echo "selected";}?> >Public</option>
											<option value="Private" <?php if($app_row['school_type'] == "Private"){ echo "selected";}?>>Private</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="lrn" class="control-label col-md-3">LRN-Number:</label>
									<div class="col-md-8">
										<input class="form-control" name="lrn" id="lrn" value="<?php echo $app_row['lrn_no'];?>"></textarea>
									</div>
								</div>
							</div>
						</div>
					</form>	
					</div>
				</div>
            </div><!-- /.box-body -->
			
			<?php }else{ 
				$sel_sched = mysqli_query($con,"SELECT * FROM tblapplicant_schedule WHERE appid='$id'");
				$row_sched = mysqli_fetch_array($sel_sched);
				?>
			<div class="container-fluid">
				<div class="col-lg-12">
					<form method="post" class="form-horizontal">
						<div class="row col-lg-6">
							<div class="form-group">
								<label for="roll_no" class="control-label col-md-3">Applicant Number:</label>
								<div class="col-md-8">
									<input  type="text" class="form-control only-number" id="roll_no" name="roll_no" value="<?php echo $id;?>" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="fnametxt" class="control-label col-md-3">First Name:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $app_row['fname'];?>"readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="lnametxt" class="control-label col-md-3">Last Name:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $app_row['lname'];?>"readonly/>
								</div>
							</div>
							 <div class="form-group">
								<label for="mnametxt" class="control-label col-md-3">Middle Name:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $app_row['mname'];?>"readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="gender" class="control-label col-md-3">Gender:</label>
								<div class="col-md-8">
									<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $app_row['gender'];?>" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="phonetxt" class="control-label col-md-3">Contact Number:</label>
								<div class="col-md-8">
									<input type="text" class="form-control only-number" id="phonetxt" name="phonetxt" value="<?php echo $app_row['contact'];?>"readonly/>
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="bday" class="control-label col-md-3">Date of Birth :</label>
								<div class="col-md-8">
									<input type="text" class="form-control datepicker" name="bday" value="<?php echo $app_row['bday'];?>" data-date-format="mm/dd/yyyy" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-sm-3">Address:</label>
								<div class="col-md-8">
									<textarea class="form-control" name="addrtxt" cols="8" rows="3" required readonly><?php echo $app_row['street'];?>, <?php echo $app_row['city'];?>, <?php echo $app_row['province'];?></textarea>
								</div>
							</div>
						</div>
						
						<div class="col-lg-6">
							<div class="box"><!----SCHEDULE---->
								<div class="box-header with-border"  style="color:white; background-color: #4aab69;">
								  <center><h5 class="box-title">Schedule of Interview	</h5> </center>
								</div>
									<div class="form-group">
										<label for="datetxt" class="control-label col-md-4">Date:</label>
										<label  class="control-label col-md-4"><?php echo $row_sched['date']; ?></label>
									</div>
									<div class="form-group">
										<label for="timetxt" class="control-label col-md-4">Time:</label>
										<label  class="control-label col-md-4"><?php echo $row_sched['time']; ?></label>
									</div>
							</div><!----SCHEDULE---->

							<div class="form-group">
													<label for="lrn" class="control-label col-lg-3">LRN-Number :</label>
													<div class="col-lg-9">
														<input type="text"  class="form-control" id="lrn" name="lrn" value="<?php echo $app_row['lrn_no'];?>"/>
													</div>
												</div>
							<div class="form-group">
								<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
								<div class="col-lg-8">
									<input class="form-control" name="grade" id="grade" cols="8" rows="3" value="Grade 11" readonly>
								</div>
							</div>
							<div class="form-group">
								<label for="strandtxt" class="control-label col-lg-3">Strand/Tracks :</label>
								<div class="col-lg-8">
									<select class="form-control" name="strand" id="strand" required>
										<option></option>
										<?php
											$sql_strand = mysqli_query($con,"SELECT * FROM tblstrand");
											while($fetch_strand = mysqli_fetch_array($sql_strand)){
												echo "<option value=".$fetch_strand['strandcode'].">".$fetch_strand['strandcode']."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
									<label for="schooltxt" class="control-label col-md-3">School (Junior High School):</label>
									<div class="col-md-8">
										<textarea class="form-control" name="schooltxt" cols="10" rows="3" readonly><?php echo $app_row['school'];?></textarea>
									</div>
							</div>
							<div class="form-group">
									<label for="typetxt" class="control-label col-md-3">TYPE OF SCHOOL:</label>
									<div class="col-md-8">
										<input class="form-control" name="type" id="type" value="<?php echo $app_row['school_type'];?>" readonly>
									</div>
							</div>	
						</div>
						
							<div class="form-group">
								<input type="submit" name="btn_validate" value="Proceed >>" class="btn btn-success col-md-offset-9 col-sm-offset-3 col-xs-offset-1"/>
							</div>
						</div>
					</form>
            </div><!-- /.box-body -->
			<?php }	?>
            
            
        </div><!-- /.box -->
    </section>   
              
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>

     <script>
     	function deleteData(appid){
     		if(confirm("Are you sure you want to delete this record?")){
     			window.location = "applicant_delete.php?app_id="+ appid +"";
     		}
     	}
     </script>

    
  </body>
</html>