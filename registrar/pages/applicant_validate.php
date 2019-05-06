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
            <div class="box-header with-border">
              <h3 class="box-title"> Applicant Information</h3>
            </div>
			
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
			<?php }else{ ?>
				<div class="container">
				<div class="col-md-10">
					<form method="post" class="form-horizontal">
						<div class="row">
							<div class="form-group">
								<label for="roll_no" class="control-label col-sm-3">Applicant Number:</label>
								<div class="col-sm-8">
									<input  type="text" class="form-control only-number" id="roll_no" name="roll_no" value="<?php echo $id;?>"/>
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
									<input type="text" class="form-control datepicker" name="bday" value="<?php echo $app_row['bday'];?>" data-date-format="yyyy-mm-dd"/>
								</div>
							</div>
							<div class="form-group">
								<label for="addrtxt" class="control-label col-sm-3">Address:</label>
								<div class="col-sm-8">
									<textarea class="form-control" name="addrtxt" cols="8" rows="3" required><?php echo $app_row['street'];?>, <?php echo $app_row['city'];?>, <?php echo $app_row['province'];?></textarea>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" name="btn_validate" value="Proceed >>" class="btn btn-success col-md-offset-10 col-sm-offset-3 col-xs-offset-1"/>
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