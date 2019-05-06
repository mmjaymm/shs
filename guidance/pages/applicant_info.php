<?php include "../templates/templates.php"; 
    headertemplate('Info | Applicant'); 
	include "connect.php"; 
	
	$id="";
	
	if(isset($_GET['id']))
    	$id=$_GET['id'];
	
	$sql_sel=mysqli_query($con,"SELECT * FROM tblapplicant WHERE appid=$id");
	$app_row=mysqli_fetch_array($sql_sel);

	if(isset($_POST['btn_update'])){
		$strandcode = $_POST['strandcode'];
		//$strand = $_POST['strand'];
		$sql_str = mysqli_query($con,"SELECT * FROM tblstrand WHERE strandcode='$strandcode'");
		$fetch_str = mysqli_fetch_array($sql_str);
		$desc = $fetch_str['stranddesc'];

		$sql_up_strand = mysqli_query($con,"UPDATE tblapplicant_validate SET strandcode = '$strandcode' , strand='$desc' WHERE appid='$id'");

		if($sql_up_strand == true){
	?>
		<script>
			alert("Applicant's Information Successfully Updated.");
			window.location = "tblapplicantvalid.php";
		</script>
	<?php
		}
	}

?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('tblapplicantvalid'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
             Applicant Validation
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border"  style="background-color: #4aab69; color:white;">
              <h3 class="box-title">Applicant Information</h3>
			  <div class="pull-right">
                    <a href="tblapplicant.php" class="btn btn-warning">Back</a> 
				</div>
            </div>
			<br/>
			
			<?php
				
				$sql_app = mysqli_query($con,"SELECT * FROM tblapplicant INNER JOIN tblapplicant_validate ON tblapplicant.appid = tblapplicant_validate.appid WHERE tblapplicant_validate.appid ='$id'");

				$app_row = mysqli_fetch_array($sql_app);
			?>
				
			<div class="content">
				<div class="row">
					<div class="col-lg-12">
						<form method="post" action="" class="form-horizontal">
							<div class="col-lg-6">
								<div class="form-group">
									<label for="roll_no" class="control-label col-md-3">Applicant Number:</label>
									<div class="col-md-8">
										<input  type="text" class="form-control only-number" id="roll_no" name="roll_no" value="<?php echo $id;?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-md-3">Full Name:</label>
									<div class="col-md-8">
										<label class="control-label"><?php echo strtoupper($app_row['lname'])."  , ".strtoupper($app_row['fname'])."   ".strtoupper($app_row['mname']);?></label>
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
										<input type="text" class="form-control only-number" id="phonetxt" name="phonetxt" value="<?php echo $app_row['contact'];?>" readonly>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<label for="addrtxt" class="control-label col-md-3">School:</label>
									<div class="col-md-8">
										<textarea class="form-control" rows="3" id="school" name="school"placeholder="Input Name of School Attainment.." required readonly><?php echo $app_row['school'];?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label for="addrtxt" class="control-label col-md-3">Street:</label>
									<div class="col-md-8">
										<input class="form-control" name="addrtxt" cols="8" rows="3" value="<?php echo $app_row['street'];?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="addrtxt" class="control-label col-md-3">City:</label>
									<div class="col-md-8">
										<input class="form-control" name="addrtxt" cols="8" rows="3" value="<?php echo $app_row['city'];?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="addrtxt" class="control-label col-md-3">Province:</label>
									<div class="col-md-8">
										<input class="form-control" name="addrtxt" cols="8" rows="3" value="<?php echo $app_row['province'];?>" readonly>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
									<div class="col-lg-8">
										<input class="form-control" name="grade" id="grade" cols="8" rows="3" value="Grade 11" readonly>
									</div>
								</div>
								<div class="form-group">
									<label for="strandtxt" class="control-label col-lg-3">Strand Code :</label>
									<div class="col-lg-8">
										<select class="form-control" name="strandcode" id="strandcode" onchange="changestrand()" required>
											<?php
												$sql_str = mysqli_query($con,"SELECT * FROM tblstrand");
												while($fetch_str = mysqli_fetch_array($sql_str)){
											?>
												<option value="<?php echo $fetch_str['strandcode'];?>" 
												<?php
												if($fetch_str['strandcode'] == $app_row['strandcode']){
														echo "selected";
													} ?> ><?php echo $fetch_str['strandcode'];?></option>
											<?php
												}
											?>
										</select>
									</div>
								</div>

							<!--div class="form-group">
								<label for="strandtxt" class="control-label col-lg-3">Strand/Tracks :</label>
								<div class="col-lg-8">
									<select class="form-control" name="strand" id="strand" required>
										<option><?php //echo $app_row['strand'];?></option>
										<?php
												//$sql_str = mysqli_query($con,"SELECT * FROM tblstrand");
												//while($fetch_str = mysqli_fetch_array($sql_str)){
											?>
												<option><?php //echo $fetch_str['stranddesc'];?></option>
											<?php
												//}
											?>
									</select>
								</div>
							</div-->

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
								<input type="submit" name="btn_update" value="UPDATE INFORMATION" class="btn btn-success col-md-offset-9 col-sm-offset-3 col-xs-offset-1"/>
							</div>
						</div>
							</div>
						</form>
					</div>
				</div>
            </div><!-- /.box-body -->
            
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
     <script>
     	function changestrand(){
     		
     	}
     </script>

    
  </body>
</html>