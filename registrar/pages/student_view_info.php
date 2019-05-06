<?php include "../templates/templates.php"; 
    headertemplate('Info | Student'); 
	include "connect.php"; 
	
	$id="";
	$opt="";
	
	if(isset($_GET['opt']))
    	$option=$_GET['opt'];
	
	if(isset($_GET['id']))
    	$id=$_GET['id'];
	
	$sql_sel=mysqli_query($con,"SELECT * FROM tblapplicant_info WHERE appid=$id");
	$app_row=mysqli_fetch_array($sql_sel);
	
	if(isset($_POST['btn_save'])){
		$shsid = $_POST['shsid'];
    	$f_name  = $_POST['fnametxt'];
    	$l_name  = $_POST['lnametxt'];
        $m_name  = $_POST['mnametxt'];
    	$gender  = $_POST['gender'];
        $bday     = $_POST['bday'];
        $age   = $_POST['age'];
        $contact    = $_POST['phonetxt'];
        $street    = $_POST['street'];
        $city    = $_POST['city'];
        $province    = $_POST['province'];
        $guardian    = $_POST['guardian'];
        $gcontact    = $_POST['gcontact'];
		
		
		$sql_select = mysqli_query($con,"SELECT * FROM tblstudent_register WHERE appid='$id'");
	if($sql_result = mysqli_num_rows($sql_select)){
		?>
		<script type="text/javascript">
			alert("Applicant Already Register as Student");
			window.location = "tblapplicantvalid.php";
		</script>
		<?php
		
	}else{
		$sql_ins=mysqli_query($con,"INSERT INTO tblstudent_register(appid,lname,fname,mname,gender,bday,age,contact,street,city,province,guardian,gcontact)
					VALUES('$id','$l_name','$f_name','$m_name','$gender','$bday','$age','$contact','$street','$city','$province','$guardian','$gcontact')");
		
		$sql_del = mysqli_query($con,"DELETE FROM tblapplicant WHERE appid=$id");
		
			
		header('Location: everyone.php?tag=view_student_registered');
	}

}

//------------------applicant validation----------
if(isset($_POST['btn_validate'])){
	
	$val_lname = $app_row['lname'];
	$val_fname = $app_row['fname'];
	$val_mname = $app_row['mname'];
	
	$sql_insert=mysqli_query($con,"INSERT INTO tblapplicant_validate (appid,lname,fname,mname,remarks,date_val)VALUES('$id','$val_lname','$val_fname','$val_mname','Validated','".date("Y-m-d")."')");
	
	$sql_del=mysqli_query($con,"DELETE FROM tblapplicant WHERE appid='$id'");
	
	
	
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
          <h1>
            Registered Student
          </h1>
        </section>

       <section class="content">
        <div class="box">
			<div class="box-header with-border" style="color:white; background-color: #dd4b39;">
					<h3 class="box-title">Student Information</h3>
					<div class="pull-right">
						<a href="student_registered.php" class="btn btn-warning">Back</a> 
					</div>
			</div>
			
			<?php if($option=="view"){
					$sql_sel=mysqli_query($con,"SELECT * FROM tblstudent_register INNER JOIN tblapplicant_validate 
											ON tblstudent_register.appid = tblapplicant_validate.appid 
											INNER JOIN tblapplicant ON tblstudent_register.appid = tblapplicant.appid WHERE tblstudent_register.shs_id='$id'");
					$stud_row=mysqli_fetch_array($sql_sel);
			?>
				
			<div class="box-body">
				<div class="container-fluid">
					<div class="row">
						<form method="post" class="form-horizontal">
						<br/>
							<div class="col-lg-6">
								<div class="form-group">
			                        <label for="shsidtxt" class="control-label col-lg-3">Student ID:</label>
			                       	<div class="col-lg-9">
			                           	<input  type="text" class="form-control only-number" id="shsid" name="shsid" value="CCT-SHS-<?php echo $id;?>" readonly/>
			                        </div>
			                    </div>
								<div class="form-group">
			                        <label for="shsidtxt" class="control-label col-lg-3">Strand:</label>
			                       	<div class="col-lg-9">
			                           	<input  type="text" class="form-control only-number" id="shsid" name="shsid" value="<?php echo $stud_row['strand'];?>" readonly/>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="fnametxt" class="control-label col-lg-3">First Name:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $stud_row['fname'];?>" readonly/>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="lnametxt" class="control-label col-lg-3">Last Name:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $stud_row['lname'];?>" readonly/>
			                        </div>
			                    </div>
								<div class="form-group">
			                        <label for="mnametxt" class="control-label col-lg-3">Middle Name:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $stud_row['mname'];?>" readonly/>
			                        </div>
			                    </div>
			                    <div class="form-group">
			                        <label for="phonetxt" class="control-label col-lg-3">Requirements Status:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control only-number" id="statstxt" name="statstxt" value="<?php echo $stud_row['status'];?>" readonly>
			                            <div class="help-block with-errors"></div>
			                        </div>
			                    </div>
								<div class="form-group">
			                        <label for="contact" class="control-label col-lg-3">Mobile Number:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="mnumtxt" name="mnumtxt" value="<?php echo $stud_row['contact'];?>" readonly/>
			                        </div>
			                    </div>
							</div> 
							<div class="col-lg-6">
								<div class="form-group">
									 <label for="schooltxt" class="control-label col-lg-3">School:</label>
									<div class="col-lg-9">
										<textarea class="form-control" rows="3" id="school" name="school"placeholder="Name of School.." required><?php echo $stud_row['school'];?></textarea>
									</div>
								</div>
								
								<div class="form-group">
									 <label for="addtxt" class="control-label col-lg-3">Address:</label>
									<div class="col-lg-9">
										<textarea class="form-control" rows="3" id="addtxt" name="addtxt" placeholder="Address.." required><?php echo $stud_row['street']." ".$stud_row['city']." , ".$stud_row['province'];?></textarea>
									</div>
								</div>
								<div class="form-group">
			                        <label for="gnametxt" class="control-label col-lg-3">Guardian:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="gnametxt" name="gnametxt" value="<?php echo $stud_row['guardian'];?>" readonly/>
			                        </div>
			                    </div>
								<div class="form-group">
			                        <label for="gcontact" class="control-label col-lg-3">Contact Number:</label>
			                        <div class="col-lg-9">
			                            <input type="text" class="form-control" id="gcontact" name="gcontact" value="<?php echo $stud_row['gcontact'];?>" readonly/>
			                        </div>
			                    </div>
							</div>
							
							<div class="col-lg-6">
							</div>
							
							<!--div class="col-lg-12"><br/><br/>
								<div class="form-group">
			                        <input type="submit" name="btn_save" value="SAVE" class="btn btn-success col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
									<input type="reset" name="btn_cancel" value="CANCEL" class="btn btn-danger col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
			                    </div>
							</div-->
			                    
						</form>
						
					</div>
		            </div><!-- /.box-body -->
				</div>
			<?php }else{ 
					$sql_select=mysqli_query($con,"SELECT MAX(shs_id) FROM tblstudent_register");
					$rows_student=mysqli_fetch_array($sql_select);
					$shs_id = $rows_student[0] + 1;
					
					$sql_reg=mysqli_query($con,"SELECT * FROM tblapplicant_info WHERE appid=$id");
					$stud_row=mysqli_fetch_array($sql_reg);
			?>
			
				<div class="container">
				<div class="col-md-10">
					<form method="post" class="form-horizontal">
						<div class="row">
							 <div class="form-group">
                        <label for="shsidtxt" class="control-label col-sm-3">SHS Student ID:</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control only-number" id="shsid" name="shsid" value="<?php echo $shs_id;?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fnametxt" class="control-label col-sm-3">First Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $stud_row['fname'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lnametxt" class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $stud_row['lname'];?>"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="mnametxt" class="control-label col-sm-3">Middle Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $stud_row['mname'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="gendertxt" class="control-label col-sm-3">Gender:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="gender">
                            <option <?php if($stud_row['gender']=="Male") echo "selected";?>>Male</option>
                            <option <?php if($stud_row['gender']=="Female") echo "selected";?>>Female</option>
                        </select>
                    </div>
                </div>
				 <div class="form-group">
                        <label for="bday" class="control-label col-sm-3">Date of Birth :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" name="bday" value="<?php echo $stud_row['bday'];?>" data-date-format="yyyy-mm-dd"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="agetxt" class="control-label col-sm-3">Age:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="age" name="age" value="<?php echo $stud_row['age'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phonetxt" class="control-label col-sm-3">Contact:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control only-number" id="phonetxt" name="phonetxt" value="<?php echo $stud_row['contact'];?>">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="street" class="control-label col-sm-3">Street:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="street" name="street" value="<?php echo $stud_row['street'];?>"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="city" class="control-label col-sm-3">City:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $stud_row['city'];?>"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="province" class="control-label col-sm-3">Province:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="province" name="province" value="<?php echo $stud_row['province'];?>"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="guardian" class="control-label col-sm-3">Guardian:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="guardian" name="guardian" value="<?php echo $stud_row['guardian'];?>"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="gcontact" class="control-label col-sm-3">Contact Guardian:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="gcontact" name="gcontact" value="<?php echo $stud_row['gcontact'];?>"/>
                        </div>
                    </div>
                   
                    <div class="form-group">
					
                        <input type="submit" name="btn_save" value="Save" class="btn btn-success col-md-offset-10 col-sm-offset-3 col-xs-offset-1"/>
                    </div>
						</div>
					</form>
				</div>
            </div><!-- /.box-body -->
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