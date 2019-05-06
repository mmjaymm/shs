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
		
		$sql_del = mysqli_query("DELETE FROM tblapplicant WHERE appid=$id");
		
		?>
		<script type="text/javascript">
			alert("Registration Successful");
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

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('teachers'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Applicant Validation
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #4aab69;">
				<h3 class="box-title">List of New Applicants</h3>
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
								<label for="roll_no" class="control-label col-sm-3">Applicant Number:</label>
								<div class="col-sm-8">
									<input  type="text" class="form-control only-number" id="roll_no" name="roll_no" value="<?php echo $id;?>" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="fnametxt" class="control-label col-sm-3">First Name:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $app_row['fname'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="lnametxt" class="control-label col-sm-3">Last Name:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $app_row['lname'];?>"/>
								</div>
							</div>
							 <div class="form-group">
								<label for="mnametxt" class="control-label col-sm-3">Middle Name:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $app_row['mname'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="gender" class="control-label col-sm-3">Gender:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $app_row['gender'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label for="phonetxt" class="control-label col-sm-3">Contact Number:</label>
								<div class="col-sm-8">
									<input type="text" class="form-control only-number" id="phonetxt" name="phonetxt" value="<?php echo $app_row['contact'];?>">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							<div class="form-group">
								<label for="bday" class="control-label col-sm-3">Date of Birth :</label>
								<div class="col-sm-8">
									<input type="text" class="form-control datepicker" name="bday" value="<?php echo $app_row['bday'];?>" data-date-format="yyyy-mm-dd" readonly/>
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-sm-3">Street:</label>
								<div class="col-sm-8">
									<input class="form-control" name="addrtxt" cols="8" rows="3" value="<?php echo $app_row['street'];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-sm-3">City:</label>
								<div class="col-sm-8">
									<input class="form-control" name="addrtxt" cols="8" rows="3" value="<?php echo $app_row['city'];?>">
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-sm-3">Province:</label>
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
					
					$sql_reg=mysqli_query($con,"SELECT * FROM tblapplicant_info WHERE appid=$id");
					$rows_reg=mysqli_fetch_array($sql_reg);
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
                            <input type="text" class="form-control" id="fnametxt" name="fnametxt" value="<?php echo $rows_reg['fname'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lnametxt" class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lnametxt" name="lnametxt" value="<?php echo $rows_reg['lname'];?>"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="mnametxt" class="control-label col-sm-3">Middle Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mnametxt" name="mnametxt" value="<?php echo $rows_reg['mname'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                    <label for="gendertxt" class="control-label col-sm-3">Gender:</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="gender">
                            <option <?php if($rows_reg['gender']=="Male") echo "selected";?>>Male</option>
                            <option <?php if($rows_reg['gender']=="Female") echo "selected";?>>Female</option>
                        </select>
                    </div>
                </div>
				 <div class="form-group">
                        <label for="bday" class="control-label col-sm-3">Date of Birth :</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control datepicker" name="bday" value="<?php echo $rows_reg['bday'];?>" data-date-format="yyyy-mm-dd"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="agetxt" class="control-label col-sm-3">Age:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="age" name="age" value="<?php echo $rows_reg['age'];?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phonetxt" class="control-label col-sm-3">Contact:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control only-number" id="phonetxt" name="phonetxt" value="<?php echo $rows_reg['contact'];?>">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="street" class="control-label col-sm-3">Street:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="street" name="street" value="<?php echo $rows_reg['street'];?>"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="city" class="control-label col-sm-3">City:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="city" name="city" value="<?php echo $rows_reg['city'];?>"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="province" class="control-label col-sm-3">Province:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="province" name="province" value="<?php echo $rows_reg['province'];?>"/>
                        </div>
                    </div>
					
					<div class="form-group">
                        <label for="guardian" class="control-label col-sm-3">Guardian:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="guardian" name="guardian" value="<?php echo $rows_reg['guardian'];?>"/>
                        </div>
                    </div>
					<div class="form-group">
                        <label for="gcontact" class="control-label col-sm-3">Contact Guardian:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="gcontact" name="gcontact" value="<?php echo $rows_reg['gcontact'];?>"/>
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

     <?php footertemplate();?>
  </body>
</html>