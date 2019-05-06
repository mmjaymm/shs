<?php include "../templates/templates.php"; 
    headertemplate('Subjects'); 
	include "connect.php"; 
	
	if(isset($_POST['btn_save'])){
		$subject = $_POST['subj'];
		$strand  = $_POST['strand'];
		$hours   = $_POST['hours'];
		$grade   = $_POST['grade'];
		$sem   = $_POST['sem'];
		
		$result =mysqli_query($con,"SELECT * FROM tblsubject WHERE subdesc = '$subject' AND subhours='$hours' AND strandcode='$strand' AND semester='$sem' AND grade='$grade'");
		$num_rows_result = mysqli_num_rows($result);
		
		if ($num_rows_result > 0){
		?>   
			<script type="text/javascript">
				alert("DUPLICATE Subject INPUTTED...!!");
			</script>
		<?php
		}else{
			$sql_insert=mysqli_query($con,"INSERT INTO tblsubject(sub_id,subdesc,subhours,strandcode,semester,grade)VALUES('','$subject','$hours','$strand','$sem','$grade')");
			if($sql_insert==true) {
					?>
					<script type="text/javascript">
						alert("Add Subject Successfully");
						window.location = "strand_info.php?id=<?php echo $strand;?>";
					</script>
					<?php
			}
		}
		
	}

?>
  <body class="skin-yellow">
    <div class="wrapper">
		 <?php navbar('teachers'); ?>
		 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Adding Subjects
          </h1>
        </section>

       <section class="content" style="width: 600px;">
        <div class="box">
            <div class="box-header with-border" style="background-color: #f39c12;color:white;">
              <h3 class="box-title">Subject </h3>
			  <div class="input-group pull-right col-lg-4 col-md-6 col-sm-7">
                    <div class="box-tools pull-right">
                        <a class="btn btn-flat btn-primary"  href="strand_info.php?str=<?php echo $strandcode;?>" data-toggle="tooltip" title="Add New Record" id="add"><i class="glyphicon glyphicon-return"></i> Back</a>
                    </div>
                </div>
            </div>
			
           <div class="login-box-body">
				<form role="form" data-toggle="validator" method="POST" class="form-horizontal">
					<br/>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group col-lg-4 col-md-4 col-sm-11">
								<label for="school">Subject Description : </label>
							</div>
							<div class="form-group col-lg-8 col-sm-11">
								<textarea class="form-control" rows="3" id="subj" name="subj" placeholder="Input Subject Description.." required></textarea>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-4 col-md-4 col-sm-11">
								<label for="school">Strand : </label>
							</div>
							<div class="form-group col-lg-8">
								<select class="form-control" name="strand" id="strand" required>
									<option></option>
									<?php  
										$sql_strand = mysqli_query($con,"SELECT * FROM tblstrand");
										while($fetch_strand = mysqli_fetch_array($sql_strand)){?>
											<option value="<?php echo $fetch_strand['strandcode'];?>"><?php echo $fetch_strand['strandcode'];?></option>
									<?php }?>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-4 col-md-4 col-sm-11">
								<label for="school">Given Hours : </label>
							</div>
							<div class="form-group col-lg-8">
								<select class="form-control" name="hours" id="hours" required>
									<option></option>
									<option>80</option>
									<option>20</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-4 col-md-4 col-sm-11">
								<label for="school">Select Grade : </label>
							</div>
							<div class="form-group col-lg-8">
								<select class="form-control" name="grade" id="grade" required>
									<option></option>
									<option value="Grade 11">Grade 11</option>
									<option value="Grade 12">Grade 12</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-4 col-md-4 col-sm-11">
								<label for="school">Select Semester : </label>
							</div>
							<div class="form-group col-lg-8">
								<select class="form-control" name="sem" id="sem" required>
									<option></option>
									<option value="First">First</option>
									<option value="Second">Second</option>
								</select>
							</div>
						</div>
					</div>
				</div>
					<div class="container">
							<div class="form-group col-md-4 col-sm-11">
								<input type="submit" value="Save" name="btn_save" class="btn btn-primary col-md-offset-4 col-lg-3"/>
								<a href="strand.php" class="btn btn-danger col-md-offset-2 col-lg-3">Cancel</a>
							</div>
					</div>
					
				</form>
			</div><!-- /.login-box-body -->
            
        </div><!-- /.box -->
    </section>   
              
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
  </body>
</html>