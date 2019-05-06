<?php 
	include "../templates/templates.php"; 
    headertemplate('Registration'); 
	include "connect.php"; 
	
	if(isset($_GET['shsid'])){
		$shsid = $_GET['shsid'];
	}
	
	if(isset($_POST['btnsearch'])){
		$sql_max_stud = mysqli_query($con,"SELECT MAX(advise_id) FROM tblstudent_advised WHERE shs_id='$shsid'");
		$fetch_max_stud = mysqli_fetch_array($sql_max_stud);
		$max_reg_id = $fetch_max_stud[0];
					
		$sql_sel_stud = mysqli_query($con,"SELECT * FROM tblstudent_advised WHERE shs_id='$shsid' AND advise_id='$max_reg_id'");
		$fetch_stud = mysqli_fetch_array($sql_sel_stud);
		$num_stud = mysqli_num_rows($sql_sel_stud);
		
					
		$sql_info_stud = mysqli_query($con,"SELECT * FROM tblstudent_info WHERE shs_id='$shsid'");
		$fetch_info_stud = mysqli_fetch_array($sql_info_stud);
		$app_id    = $fetch_info_stud['appid'];
					
		if($num_stud == 0){
		?>
			<script type="text/javascript">
				alert("No DATA found");
				window.location = "student_search.php";
			</script>
		<?php
		}else{
		?>
			<script type="text/javascript">
				alert("Record found");
			</script>
		<?php
		}
	}
	
			/*$searchtxt = $_POST['search_text'];
		$searchoption = $_POST['search_option'];
		
		$_SESSION['id'] = $searchtxt;
		
			
			}else{
				$sql_max_stud = mysqli_query($con,"SELECT MAX(advise_id) FROM tblstudent_advised WHERE shs_id='$searchtxt'");
				$fetch_max_stud = mysqli_fetch_array($sql_max_stud);
				$max_reg_id = $fetch_max_stud[0];
				
				$sql_sel_stud = mysqli_query($con,"SELECT * FROM tblstudent_advised WHERE shs_id='$searchtxt' AND advise_id='$max_reg_id'");
				$fetch_stud = mysqli_fetch_array($sql_sel_stud);
				$num_stud = mysqli_num_rows($sql_sel_stud);
				
				$sql_info_stud = mysqli_query($con,"SELECT * FROM tblstudent_info WHERE shs_id='$searchtxt'");
				$fetch_info_stud = mysqli_fetch_array($sql_info_stud);
				$app_id    = $fetch_info_stud['appid'];
				
				if($num_stud != 1){}
			}*/
?> 
<body class="skin-red">
    <div class="wrapper">
      
     <?php navbar('teachers'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
             Student Requirements
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="color:white; background-color: #dd4b39;">
				<h3 class="box-title">Student Requirements</h3>
				<div class="pull-right">
                    <a href="tblapplicantvalid.php" class="btn btn-warning">Back</a> 
				</div>
            </div>

			<?php
				//$sql_stud_enrolled = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id='$shsid'");
				//$fetch_stud_enrolled = mysqli_fetch_array($sql_stud_enrolled);
				//$num_stud_enrolled = mysqli_num_rows($fetch_stud_enrolled);
				
			?>
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
			                        </div>
			                    </div>
								<div class="form-group">
			                        <label for="regid" class="control-label col-lg-3">Reg ID:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="regid" name="regid" value="<?php echo $fetch_stud['advise_id'];?>"/>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="fnametxt" class="control-label col-lg-3">First Name:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $fetch_stud['fname'];?>"/>
			                        </div>
			                    </div>
								
			                    <div class="form-group">
			                        <label for="lnametxt" class="control-label col-lg-3">Last Name:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $fetch_stud['lname'];?>"/>
			                        </div>
			                    </div>
								<div class="form-group">
			                        <label for="mnametxt" class="control-label col-lg-3">Middle Name:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $fetch_stud['mname'];?>"/>
			                        </div>
			                    </div>
			                    <div class="form-group">
									<label id="strandtxt" class="control-label col-lg-3">Strand:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="strand" name="strand" value="<?php echo $fetch_stud['strand'];?>"/>
									</div>
								</div>
								<div class="form-group">
									<label for="major" class="control-label col-lg-3">Major:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="major" name="major" value="<?php echo $fetch_stud['major'];?>"/>
									</div>
								</div>
							</div> 
							
							<div class="col-lg-6">
								<div class="form-group">
									<label for="type" class="control-label col-lg-3">Stdent Type:</label>
									<div class="col-lg-9">
										<select class="form-control" name="type" id="type" required>
											<option >Select type</option>
											<option value="NEW">NEW</option>
											<option value="OLD">OLD</option>
											<option value="TRANSFEREE">TRANSFEREE</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="status" class="control-label col-lg-3">Status:</label>
									<div class="col-lg-9">
										<select class="form-control" name="status" id="status" required>
											<option >Select status</option>
											<option value="REGULAR">REGULAR</option>
											<option value="IRREGULAR">IRREGULAR</option>
											<option value="TEMPORARY">TEMPORARY</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
									<div class="col-lg-9">
										<select class="form-control" name="grade" id="grade" required>
											<option <?php if($fetch_stud['grade']=="Grade 11") echo "selected";?>>Grade 11</option>
											<option <?php if($fetch_stud['grade']=="Grade 12") echo "selected";?>>Grade 12</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="section" class="control-label col-lg-3">Section:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="section" name="section" value="<?php echo $fetch_stud['section'];?>"/>
									</div>
								</div>
								<div class="form-group">
									<label for="sem" class="control-label col-lg-3">Semester:</label>
									<div class="col-lg-9">
										<select class="form-control" name="sem" id="sem" required>
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
			                        <input type="submit" name="btn_save_stud" value="SAVE" class="btn btn-success col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
									<input type="reset" name="btn_cancel_stud" value="CANCEL" class="btn btn-danger col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
			                    </div>
							</div>
						</form>
					</div>
		            </div><!-- /.box-body -->
				</div>
			<?php
		/*else if($_POST['search_option'] == "Student ID"){
			if(empty($searchtxt)){
			?>
				<script type="text/javascript">
					alert("Input SHS ID / Applicant Number");
					window.location = "student_search.php";
				</script>
			<?php
			}else{ 
			
			}
		}*/
	//==================================//
	//===SAVING STUDENT REGISTRATION++==//
	//==================================//
	
	if(isset($_POST['btn_save_stud'])){
		$adv_id  = $fetch_stud['advise_id'];
		$app_id  = $_POST['app_id'];
		$shsid   = $_POST['shsid'];			
		$lname   = $_POST['lnametxt'];
    	$fname   = $_POST['fnametxt'];
        $mname   = $_POST['mnametxt'];
		$strand  = $_POST['strand'];
		$major   = $_POST['major'];
    	$type    = $_POST['type'];
        $status  = $_POST['status'];
		$grade   = $_POST['grade'];
		$section = $_POST['section'];
        $sem     = $_POST['sem'];
		$grade   = $_POST['grade'];
		ay_start == date("Y");
		ay_end   == date("Y") + 1;
		
		/*$sel_val_stud = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id='$shsid' AND strand='$strandid' AND grade='$grade' AND sem='$sem'");
		$fetch_val_stud = mysqli_num_rows($sel_val_stud);
		
		if($fetch_val_stud > 0){
			?>
			<script type="text/javascript">
				alert("Duplicate Student Register");
				window.location = "student_search.php";
			</script>
			<?php
		}else{*/
			$sql_ins = mysqli_query($con,"INSERT INTO tblstudent_enrolled(advise_id,shs_id,lname,fname,mname,student_type,reg_status,strand,major,section,grade,semester,yr_start,yr_end,date_enrolled)
						 VALUES('$adv_id','$shsid','$lname','$fname','$mname','$type','$status','$strand','$major','$section','$grade','$sem','$ay_start','$ay_and','".date("m/d/Y")."'");
	
			?>
			<script type="text/javascript">
				alert("Registration Student Successful<?php echo $adv_id;?>");
				window.location = "student_registered.php";
			</script>
			<?php
	}
	

?>
 

			
				
			</div>
        </div><!-- /.box -->
    </section>   
              
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
  </body>
</html>