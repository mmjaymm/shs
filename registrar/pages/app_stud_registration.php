<?php 
	include "../templates/templates.php"; 
    headertemplate('Registration'); 
	include "connect.php";
	//=================================//
	//		GETTING URL EQUIVALENT	   //
	//=================================//
	if(isset($_GET['appid'])){
		$appid = $_GET['appid'];
	}
	if(isset($_GET['shsid'])){
		$shsid = $_GET['shsid'];
	}
	if(isset($_GET['type'])){
		$type = $_GET['type'];
	}
?>
<body class="skin-red">
    <div class="wrapper">
      
     <?php navbar('teachers'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10"> </h1>
		  <h1> <?php include('time.php'); ?> </h1>
        </section>
<?php
	//==================================//
	//   TYPE === NEW				    //
	//==================================//
	if($type == "new"){
		$sql_sel_reg = mysqli_query($con,"SELECT * FROM tblstudent_register WHERE appid='$appid'");
		$row_reg     = mysqli_num_rows($sql_sel_reg);
		
		if($row_reg > 0){
			?>
			<script type="text/javascript">
					alert("Applicant Already Register as Student");
					window.location = "student_search.php";
			</script>
			<?php
		}else{
			//============================================//
			//		VALID APPLICANT SELECT THE ID		  //
			//============================================//
				$sql_app_val   = mysqli_query($con,"SELECT * FROM tblapplicant_validate INNER JOIN tblapplicant
							ON tblapplicant_validate.appid = tblapplicant.appid WHERE tblapplicant_validate.appid='$appid'");

				$fetch_app_val = mysqli_fetch_array($sql_app_val);
				$count_app_val = mysqli_num_rows($sql_app_val);
				
				if($count_app_val == 0){
					?>
					<script type="text/javascript">
						alert("This Applicant Number id not Valid");
						window.location = "student_search.php";
					</script>
					<?php
				}else{
			//============================================//
			//	REGISTRATION OF APPLICANT AS STUDENT	  //
			//============================================//
					$sql_sel_stud     = mysqli_query($con,"SELECT * FROM tblstudent_register");
					$num_app_stud_reg = mysqli_num_rows($sql_sel_stud);
					$rows_app_stud_reg= mysqli_fetch_array($sql_sel_stud);
					
					if($num_app_stud_reg > 0){
						$sql_max_reg = mysqli_query($con,"SELECT MAX(regid) FROM tblstudent_register");
						$rows_reg  = mysqli_fetch_array($sql_max_reg);
						$reg_id = $rows_reg[0];
						
						$sql_max_shsid = mysqli_query($con,"SELECT * FROM tblstudent_register WHERE regid='$reg_id'");
						$rows_app_reg  = mysqli_fetch_array($sql_max_shsid);
						$shs_id = $rows_app_reg['shs_id'] + 1;
						
					}else{
						$shs_id = 1601001;
					}?>
					<section class="content">
						<div class="box">
							<div class="box-header with-border" style="color:white; background-color: #dd4b39;">
								<h3 class="box-title">Student Information</h3>
								<div class="pull-right">
									<a href="student_search.php" class="btn btn-warning">Back</a> 
								</div>
							</div>
									</br>
							<div class="box-body">
								<div class="container-fluid">
									<div class="row">
										<form method="post" class="form-horizontal">
											<div class="col-lg-6">
												<div class="form-group">
													<label for="shsidtxt" class="control-label col-lg-3">SHS Student ID:</label>
													<div class="col-lg-9">
														<input  type="text" class="form-control only-number" id="shsid" name="shsid" value="<?php echo $shs_id;?>" readonly/>
													</div>
												</div>
												<div class="form-group">
													<label for="fnametxt" class="control-label col-lg-3">First Name:</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $fetch_app_val['fname'];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label for="lnametxt" class="control-label col-lg-3">Last Name:</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $fetch_app_val['lname'];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label for="mnametxt" class="control-label col-lg-3">Middle Name:</label>
													<div class="col-lg-9">
														<input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $fetch_app_val['mname'];?>"/>
													</div>
												</div>
												<div class="form-group">
													<label for="gender" class="control-label col-md-3">Gender:</label>
													<div class="col-md-9">
														<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $fetch_app_val['gender'];?>" readonly/>
													</div>
												</div>
												<div class="form-group">
													<label for="phonetxt" class="control-label col-md-3">Contact Number:</label>
													<div class="col-md-9">
														<input type="text" class="form-control only-number" id="phonetxt" name="phonetxt" value="<?php echo $fetch_app_val['contact'];?>"readonly/>
														<div class="help-block with-errors"></div>
													</div>
												</div>
												<div class="form-group">
													<label for="bday" class="control-label col-md-3">Date of Birth :</label>
													<div class="col-md-9">
														<input type="text" class="form-control datepicker" name="bday" value="<?php echo $fetch_app_val['bday'];?>" data-date-format="mm/dd/yyyy" readonly/>
													</div>
												</div>
												
											</div> 
											<div class="col-lg-6">
												<div class="form-group">
													<label for="lrn" class="control-label col-md-3">LRN-Number :</label>
													<div class="col-md-9">
														<input type="text" class="form-control" id="lrn" name="lrn" value="<?php echo $fetch_app_val['lrn_no'];?>" readonly/>
													</div>
												</div>

												<div class="form-group">
													<label for="addrtxt" class="control-label col-sm-3">Address:</label>
													<div class="col-md-9">
														<textarea class="form-control" name="addrtxt" cols="8" rows="3" required readonly><?php echo $fetch_app_val['street'];?>, <?php echo $fetch_app_val['city'];?>, <?php echo $fetch_app_val['province'];?></textarea>
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
														<input class="form-control" name="strand" id="strand" value="<?php echo $fetch_app_val['strand'];?>" readonly>
													</div>
												</div>
												<div class="form-group">
														<label for="schooltxt" class="control-label col-md-3">School:</label>
														<div class="col-md-8">
															<textarea class="form-control" name="schooltxt" cols="10" rows="3" readonly><?php echo $fetch_app_val['school'];?></textarea>
														</div>
												</div>
											</div>
											<div class="col-lg-12"><br/><br/>
												<div class="form-group">
													<input type="submit" name="btn_save" value="SAVE as STUDENT" class="btn btn-success col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
													<input type="reset" name="btn_cancel" value="CANCEL" class="btn btn-danger col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
												</div>
											</div>
										</form>
									</div>
								</div><!-- /.box-body -->
							</div>		
						</div>
					</section> 
					
					<?php
				}
		}
			
	}
	//==================================//
	//  ENDING OF === NEW				//
	//==================================//
		
	//==================================//
	//   SAVING STUDENT REGISTRATION    //
	//==================================//
	if(isset($_POST['btn_save'])){
		$shsid   = $_POST['shsid'];			
		$lname   = $_POST['lnametxt'];
    	$fname   = $_POST['fnametxt'];
        $mname   = $_POST['mnametxt'];
		//====================================//
		//===== ADDING REQUIREMENTS SELECTED==//
		//====================================//
		/*if($_POST['req'] == ""){
				?>
						<script type="text/javascript">
							alert("No Selected Requirements");
						</script>
				<?php
			}else{
				foreach($_POST['req'] as $value) {
					$in_ch=mysqli_query($con,"insert into tblreq_registrar(appid,shs_id,req) values ('$appid','$shsid','$value')");
				}
			}*/
		//=================================================//
		//=====SAVING REQUIREMENTS SELECTED / INFORMATION==//
		//=================================================//
		$sql_ins = mysqli_query($con,"INSERT INTO tblstudent_register(shs_id,appid,lname,fname,mname,date)
						 VALUES('$shsid','$appid','$lname','$fname','$mname','".date("m/d/Y")."')");
		
		if($sql_ins == true){

			$sql_ins = mysqli_query($con,"UPDATE tblapplicant SET shs_id='$shsid' WHERE appid='$appid'");

				?>
				<script type="text/javascript">
					alert("Registration Successfully.");
					window.location = "student_registered.php";
				</script>
				<?php
		}
			
	}
	//==================================//
	//   SAVING STUDENT REGISTRATION    //
	//==================================//
	
	
	//==================================//
	//   TYPE === OLD				    //
	//==================================//
	if($type == "old"){
		
		$sql_max_stud = mysqli_query($con,"SELECT MAX(advise_id),grade,semester FROM tblstudent_advised WHERE shs_id='$shsid'");
		$fetch_max_stud = mysqli_fetch_array($sql_max_stud);
		$max_reg_id = $fetch_max_stud[0];
		/*$max_reg_grade = $fetch_max_stud['grade'];
		$max_reg_sem = $fetch_max_stud['semester'];
		
		$sql_sel_stud_adv = mysqli_query($con,"SELECT * FROM tblstudent_advised WHERE shs_id='$shsid' AND grade='$$max_reg_grade' AND semester='max_reg_sem'");
		$fetch_stud_adv = mysqli_num_rows($sql_sel_stud_adv);
		
		if($fetch_stud_adv == 1){
			?>
			<script type="text/javascript">
				alert("Hindi pa na nkakakuha ng advising");
				window.location = "student_search.php";
			</script>
			<?php
		}*/
		
					
		$sql_sel_stud = mysqli_query($con,"SELECT * FROM tblstudent_advised WHERE shs_id='$shsid' AND advise_id='$max_reg_id'");
		$fetch_stud = mysqli_fetch_array($sql_sel_stud);
		$num_stud = mysqli_num_rows($sql_sel_stud);
		
					
		$sql_info_stud = mysqli_query($con,"SELECT * FROM tblapplicant WHERE shs_id='$shsid'");
		$fetch_info_stud = mysqli_fetch_array($sql_info_stud);
		$app_id    = $fetch_info_stud['appid'];
					
		if($num_stud == 0){
		?>
			<script type="text/javascript">
				alert("No DATA found");
				window.location = "student_search.php";
			</script>
		<?php
		}
?>
		<section class="content">
			<div class="box">
				<div class="box-header with-border" style="color:white; background-color: #dd4b39;">
					<h3 class="box-title">Student Information</h3>
					<div class="pull-right">
						<a href="student_search.php" class="btn btn-warning">Back</a> 
					</div>
				</div>
				<div class="box-body">
					<div class="container-fluid">
						<div class="row">
							<form method="post" class="form-horizontal">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="shsidtxt" class="control-label col-lg-3">SHS Student ID:</label>
										<div class="col-lg-9">
											<input  type="text" class="form-control only-number" id="shsid" name="shsid" value="<?php echo $shsid;?>" readonly/>
											<input  type="text" id="app_id" name="app_id" value="<?php echo $app_id;?>" hidden/>
											<input  type="text" id="adv_id" name="adv_id" value="<?php echo $fetch_stud['advise_id'];?>" hidden/>
										</div>
									</div>
									<div class="form-group">
										<label for="fnametxt" class="control-label col-lg-3">First Name:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $fetch_stud['fname'];?>" readonly/>
										</div>
									</div>
									
									<div class="form-group">
										<label for="lnametxt" class="control-label col-lg-3">Last Name:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $fetch_stud['lname'];?>" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label for="mnametxt" class="control-label col-lg-3">Middle Name:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $fetch_stud['mname'];?>" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label id="strandtxt" class="control-label col-lg-3">Strand:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" id="strand" name="strand" value="<?php echo $fetch_stud['strand'];?>" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label for="major" class="control-label col-lg-3">Major:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" id="major" name="major" value="<?php echo $fetch_stud['major'];?>" readonly/>
										</div>
									</div>
								</div> 
								
								<div class="col-lg-6">
									<div class="form-group">
										<label for="type" class="control-label col-lg-3">Stdent Type:</label>
										<div class="col-lg-9">
											<select class="form-control" name="type" id="type" required>
												<option ></option>
												<option value="NEW">NEW</option>
												<option value="OLD">OLD</option>
												<option value="TRANSFEREE">TRANSFEREE</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="status" class="control-label col-lg-3">Status:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" id="status" name="status" value="REGULAR" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
										<div class="col-lg-9">
											<select class="form-control" name="grade" id="grade" required >
												<option <?php if($fetch_stud['grade']=="Grade 11") echo "selected";?>>Grade 11</option>
												<option <?php if($fetch_stud['grade']=="Grade 12") echo "selected";?>>Grade 12</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="section" class="control-label col-lg-3">Section:</label>
										<div class="col-lg-9">
											<input type="text" class="form-control" id="section" name="section" value="<?php echo $fetch_stud['section'];?>" readonly/>
										</div>
									</div>
									<div class="form-group">
										<label for="sem" class="control-label col-lg-3">Semester:</label>
										<div class="col-lg-9">
											<select class="form-control" name="sem" id="sem" required >
												<option <?php if($fetch_stud['semester']=="First") echo "selected";?>>First</option>
												<option <?php if($fetch_stud['semester']=="Second") echo "selected";?>>Second</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label for="sytxt" class="control-label col-lg-3">Academic Year:</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="ay_start" name="ay_start" value="<?php echo date('Y');?>" readonly/>
										</div>
										<label for="sytxt" class="control-label col-lg-1">---</label>
										<div class="col-lg-4">
											<input type="text" class="form-control" id="ay_end" name="ay_end" value="<?php echo date('Y') +1;?>"readonly/>
										</div>
									</div>
								</div>
								
								<div class="col-lg-12"><br/><br/>
									<div class="form-group">
										<input type="submit" name="btn_save_stud" value="ENROLL" class="btn btn-success col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
										<input type="reset" name="btn_cancel_stud" value="CANCEL" class="btn btn-danger col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
									</div>
								</div>
							</form>
						</div>
					</div><!-- /.box-body -->
				</div>
			</div>
        </div><!-- /.box -->
		</section>  
<?PHP
	}
	
		if(isset($_POST['btn_save_stud'])){
		$e_adv_id  = $_POST['adv_id'];
		$e_shsid   = $_POST['shsid'];			
		$e_lname   = $_POST['lnametxt'];
    	$e_fname   = $_POST['fnametxt'];
        $e_mname   = $_POST['mnametxt'];
		$e_type    = $_POST['type'];
		$status    = $_POST['status'];
		$e_strand  = $_POST['strand'];
		$e_major   = $_POST['major'];
		$e_grade   = $_POST['grade'];
		$e_section = $_POST['section'];
        $e_sem     = $_POST['sem'];
		$e_ay_start  = date("Y");
		$e_ay_end    = date("Y") + 1;
		
		$sel_val_stud = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id='$shsid' AND strand='$strandid' AND grade='$grade' AND sem='$sem'");
		$fetch_val_stud = mysqli_num_rows($sel_val_stud);
		
		if($fetch_val_stud > 0){
			?>
			<script type="text/javascript">
				alert("Duplicate Student Register");
				window.location = "student_search.php";
			</script>
			<?php
		}else{
			$sql_ins = mysqli_query($con,"INSERT INTO tblstudent_enrolled(advise_id,shs_id,lname,fname,mname,student_type,reg_status,strand,major,section,grade,semester,yr_start,yr_end,date_enrolled,stats)
						 VALUES('$e_adv_id','$e_shsid','$e_lname','$e_fname','$e_mname','$e_type','$status','$e_strand','$e_major','$e_section','$e_grade','$e_sem','$e_ay_start','$e_ay_end','".date("m/d/Y")."',1)");
	
			if($sql_ins == true){
				?>
			<script type="text/javascript">
				alert("Student Enrolled Successfully");
				window.location = "student_enrolled.php";
			</script>
			<?php
			}
		}
	}
?> 

         
              
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
  </body>
</html>