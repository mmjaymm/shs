<?php include "../templates/templates.php"; 
    headertemplate('Info | Applicant'); 
	include "connect.php"; 
	
	$id="";
	$opt="";
	
	if(isset($_GET['opt']))
    	$option=$_GET['opt'];
	
	if(isset($_GET['id']))
    	$id=$_GET['id'];
	
	$sql_sel=mysqli_query($con,"SELECT * FROM tblapplicant_info WHERE appid=$id");
	$app_row=mysqli_fetch_array($sql_sel);
	
	//==================================//
	//===SAVING STUDENT REGISTRATION========//
	if(isset($_POST['btn_save'])){
		$shsid   = $_POST['shsid'];
		$lname   = $_POST['lnametxt'];
    	$fname   = $_POST['fnametxt'];
        $mname   = $_POST['mnametxt'];
		$gender  = $_POST['gender'];
        $contact = $_POST['phonetxt'];
		$type    = $_POST['type'];
    	$status  = $_POST['status'];
        $strandid= $_POST['strandid'];
		$major   = $_POST['major'];
        $grade   = $_POST['grade'];
		$sem     = $_POST['sem'];
		$ay_start= $_POST['ay_start'];
        $ay_end  = $_POST['ay_end'];
		
	$sql_select = mysqli_query($con,"SELECT * FROM tblstudent_register WHERE appid='$id'");
	
	if($sql_result = mysqli_num_rows($sql_select)){
		?>
		<script type="text/javascript">
			alert("Applicant Already Register as Student");
			window.location = "tblapplicantvalid.php";
		</script>
		<?php
		
	}else{
		$sql_ins = mysqli_query($con,"INSERT INTO tblstudent_register(shs_id,appid,lname,fname,mname,gender,contact,type,status,strand,major,grade,sem,ay_start,ay_end)
					 VALUES('$shsid','$id','$lname','$fname','$mname','$gender','$contact','$type','$status','$strandid','$major','$grade','$sem','$ay_start','$ay_end')");
		
		//$sql_del = mysqli_query($con,"DELETE FROM tblapplicant_validate WHERE appid=$id");
		
		?>
		<script type="text/javascript">
			alert("Successfully Registered.");
			window.location = "student_registered.php";
		</script>
		<?php	
	}

}

//------------------applicant validation----------
if(isset($_POST['btn_validate'])){
	
	$val_lname = $app_row['lname'];
	$val_fname = $app_row['fname'];
	$val_mname = $app_row['mname'];
	
	$sql_insert=mysqli_query($con,"INSERT INTO tblapplicant_validate (appid,lname,fname,mname,remarks,date_val)VALUES('$id','$val_lname','$val_fname','$val_mname','Validated','".date("Y-m-d")."')");
	
	$sql_del=mysqli_query("DELETE FROM tblapplicant WHERE appid='$id'");
	
		if($sql_insert==true) {
				?>
				<script type="text/javascript">
					alert("Successfully");
					window.location = "tblapplicantvalid.php";
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
          <h1 class="col-md-10">
             Student Registration
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="color:white; background-color: #dd4b39;">
				<h3 class="box-title">Registration</h3>
				<div class="pull-right">
                    <a href="tblapplicantvalid.php" class="btn btn-warning">Back</a> 
				</div>
            </div>

			</br>
			
			
<?php if($option=="view"){?>
			<div class="container">
				<div class="col-md-10">
					<form method="post" action="applicant_edit_delete.php" class="form-horizontal">
						<div class="row">
							<div class="form-group">
								<label for="roll_no" class="control-label col-lg-3">Applicant Number:</label>
								<div class="col-sm-8">
									<input  type="text" class="form-control only-number" id="roll_no" name="roll_no" value="<?php echo $id;?>" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="fnametxt" class="control-label col-lg-3">First Name:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $app_row['fname'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="lnametxt" class="control-label col-lg-3">Last Name:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $app_row['lname'];?>"/>
								</div>
							</div>
							 <div class="form-group">
								<label for="mnametxt" class="control-label col-lg-3">Middle Name:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $app_row['mname'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="gender" class="control-label col-lg-3">Gender:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $app_row['gender'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="phonetxt" class="control-label col-lg-3">Contact Number:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control only-number" id="phonetxt" name="phonetxt" value="<?php echo $app_row['contact'];?>">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="bday" class="control-label col-lg-3">Date of Birth :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control datepicker" name="bday" value="<?php echo $app_row['bday'];?>" data-date-format="yyyy-mm-dd" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-lg-3">Street:</label>
								<div class="col-sm-8">
									<input class="form-control" name="addrtxt" cols="8" rows="3" value="<?php echo $app_row['street'];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-lg-3">City:</label>
								<div class="col-sm-8">
									<input class="form-control" name="addrtxt" cols="8" rows="3" value="<?php echo $app_row['city'];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-lg-3">Province:</label>
								<div class="col-sm-8">
									<input class="form-control" name="addrtxt" cols="8" rows="3" value="<?php echo $app_row['province'];?>"></textarea>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" name="btn_upd" value="Update" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
								<input type="submit" onclick="confirm('Are you sure you want to delete?')" name="btn_del"value="Delete" class="btn btn-danger col-md-offset-3 col-sm-offset-3 col-xs-offset-3"/>
							</div>
						</div>
					</form>
				</div>
            </div><!-- /.box-body -->
<?php }else{ 
			$sql_select=mysqli_query($con,"SELECT MAX(shs_id) FROM tblstudent_register");
			$rows_student=mysqli_fetch_array($sql_select);
			$shs_id = $rows_student[0] + 1;
					
			$sql_reg  = mysqli_query($con,"SELECT * FROM tblapplicant_info WHERE appid=$id");
			$rows_reg = mysqli_fetch_array($sql_reg);
			?>
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
			                            <input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $rows_reg['fname'];?>"/>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="lnametxt" class="control-label col-lg-3">Last Name:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $rows_reg['lname'];?>"/>
			                        </div>
			                    </div>
								<div class="form-group">
			                        <label for="mnametxt" class="control-label col-lg-3">Middle Name:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $rows_reg['mname'];?>"/>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                    <label for="gendertxt" class="control-label col-lg-3">Gender:</label>
			                    <div class="col-lg-9">
			                        <select class="form-control" name="gender">
			                            <option <?php if($rows_reg['gender']=="Male") echo "selected";?>>Male</option>
			                            <option <?php if($rows_reg['gender']=="Female") echo "selected";?>>Female</option>
			                        </select>
			                    </div>
			                	</div>
			                    <div class="form-group">
			                        <label for="phonetxt" class="control-label col-lg-3">Contact:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control only-number" id="phonetxt" name="phonetxt" value="<?php echo $rows_reg['contact'];?>">
			                            <div class="help-block with-errors"></div>
			                        </div>
			                    </div>
							</div> 
							
							<div class="col-lg-6">
								<div class="form-group">
									<label for="type" class="control-label col-lg-3">Stdent Type:</label>
									<div class="col-lg-3">
										<select class="form-control" name="type" id="type" required>
											<option></option>
											<option>NEW</option>
											<option>OLD</option>
											<option>TRANSFEREE</option>
										</select>
									</div>
									<label for="status" class="control-label col-lg-3">Status:</label>
									<div class="col-lg-3">
										<select class="form-control" name="status" id="status" required>
											<option></option>
											<option>REGULAR</option>
											<option>IRREGULAR</option>
											<option>TEMPORARY</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label id="strandtxt" class="control-label col-lg-3">Strand:</label>
									<div class="col-lg-9">
										<select id="strandid" name="strandid" class="form-control" onchange="get_strand()" required>
											<option value=""></option>
											<?php echo fill_strand($con);?>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="major" class="control-label col-lg-3">Major:</label>
									<div class="col-lg-9">
										<select class="form-control" name="major" id="major" required>
											<option></option>
											<option>Grade 11</option>
											<option>Grade 12</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
									<div class="col-lg-9">
										<select class="form-control" name="grade" id="grade" required>
											<option></option>
											<option>Grade 11</option>
											<option>Grade 12</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="sem" class="control-label col-lg-3">Semester:</label>
									<div class="col-lg-9">
										<select class="form-control" name="sem" id="sem" required>
											<option></option>
											<option>First</option>
											<option>Second</option>
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
			                        <input type="submit" name="btn_save" value="SAVE" class="btn btn-success col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
									<input type="reset" name="btn_cancel" value="CANCEL" class="btn btn-danger col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
			                    </div>
							</div>
			                    
						</form>
						
					</div>
		            </div><!-- /.box-body -->
				</div>
				
			</div>
			
			<?php }	?>
            
            
        </div><!-- /.box -->
    </section>   
              
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();
	 
	function fill_strand($con){
		$output = '';
		$strand=mysqli_query($con,"SELECT * FROM tblstrand");
								
		while($row=mysqli_fetch_array($strand)){
			$output .='<option value="'.$row['strandcode'].'">'.$row['strandcode'].'</option>'; 
		}
		
		return $output;
	}
	?>
  </body>
</html>