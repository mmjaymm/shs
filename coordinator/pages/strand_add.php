<?php include "../templates/templates.php"; 
    headertemplate('Appointment | Guidance'); 
	include "connect.php"; 
	
	if(isset($_POST['btn_save'])){
		$strand = $_POST['strandcode'];
		$stranddesc   = $_POST['sdesc'];
		$stranddept   = $_POST['dept'];
		
		$result =mysqli_query($con,"SELECT * FROM tblstrand WHERE strandcode = '$strand' AND stranddesc='$stranddesc' AND stranddept='$stranddept'");
		$num_rows_result = mysqli_num_rows($result);
		
		if ($num_rows_result > 0){
		?>   
			<script type="text/javascript">
				alert("DUPLICATE STRAND INPUTTED...!!");
			</script>
		<?php
		}else{
			$sql_insert=mysqli_query($con,"INSERT INTO tblstrand(strand_id,strandcode,stranddesc,duration,stranddept)VALUES('','$strand','$stranddesc','2','$stranddept')");
			if($sql_insert==true) {
					?>
					<script type="text/javascript">
						alert("Add Strand Successfully");
						window.location = "strand.php";
					</script>
					<?php
			}
		}
		
	}
	if(isset($_POST['btn_cancel'])){
		?>
			<script type="text/javascript">
				window.location = "strand.php";
			</script>
		<?php
	}

?>
  <body class="skin-yellow">
    <div class="wrapper">
		 <?php navbar('teachers'); ?>
	
	<?php
		if($_GET['opt'] == "add"){
	?>
	<!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			  <h1>
				Adding Strand
			  </h1>
			</section>

		   <section class="content" style="width: 600px;">
			<div class="box">
				<div class="box-header with-border" style="background-color: #f39c12;color:white;">
				  <h3 class="box-title">Strand </h3>
				</div>
				
			   <div class="login-box-body">
					<form role="form" data-toggle="validator" method="POST" class="form-horizontal">
						<br/>
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group col-lg-4 col-md-4 col-sm-11">
									<label for="strandcode">Strand Code: </label>
								</div>
								<div class="form-group col-lg-8 col-sm-11">
									<input type="text" class="form-control" id="strandcode" name="strandcode" placeholder="Input Strand Code.." required>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group col-lg-4 col-md-4 col-sm-11">
									<label for="school">Strand Description : </label>
								</div>
								<div class="form-group col-lg-8 col-sm-11">
									<textarea class="form-control" rows="3" id="sdesc" name="sdesc" placeholder="Input Strand Description.." required></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group col-lg-4 col-md-4 col-sm-11">
									<label for="school">Department : </label>
								</div>
								<div class="form-group col-lg-8">
									<select class="form-control" name="dept" id="dept" required>
										<option></option>
										<option>School of Teachers Education</option>
										<option>School of Arts and Sciences</option>
										<option>School of Computer Studies</option>
										<option>School of Hospitality and Tourism Management</option>
										<option>School of Business Management</option>
									</select>
								</div>
							</div>
						</div>
					</div>
						<div class="container">
								<div class="form-group col-md-4 col-sm-11">
									<input type="submit" value="Save" name="btn_save" class="btn btn-primary col-md-offset-4 col-lg-3"/>
									<input type="reset"  name="btn_cancel" value="Cancel" class="btn btn-danger col-md-offset-2 col-lg-3"/>
								</div>
						</div>
						
					</form>
				</div><!-- /.login-box-body -->
				
			</div><!-- /.box -->
		</section>   
				  
		
		  </div><!-- /.content-wrapper -->
	<?php
		}
		
		if($_GET['opt'] == "edit"){
			$id = $_GET['id'];
			
			$sql_strand = mysqli_query($con,"SELECT * FROM tblstrand WHERE strand_id = '$id'");
			$fetch_strand = mysqli_fetch_array($sql_strand);
	?>
		<!-- Content Wrapper. Contains page content -->
		  <div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
			  <h1>
				Editing Strand
			  </h1>
			</section>

		   <section class="content" style="width: 600px;">
			<div class="box">
				<div class="box-header with-border" style="background-color: #f39c12;color:white;">
				  <h3 class="box-title">Strand </h3>
				</div>
				
			   <div class="login-box-body">
					<form role="form" data-toggle="validator" method="POST" class="form-horizontal">
						<br/>
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group col-lg-4 col-md-4 col-sm-11">
									<label for="strandcode">Strand Code: </label>
								</div>
								<div class="form-group col-lg-8 col-sm-11">
									<input type="text" class="form-control" name="strand" value="<?php echo $fetch_strand['strandcode'];?>" id="strand" required/>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group col-lg-4 col-md-4 col-sm-11">
									<label for="school">Strand Description : </label>
								</div>
								<div class="form-group col-lg-8 col-sm-11">
									<textarea class="form-control" rows="3" id="sdesc" name="sdesc" placeholder="Input Strand Description.." required><?php echo $fetch_strand['stranddesc'];?></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group col-lg-4 col-md-4 col-sm-11">
									<label for="school">Department : </label>
								</div>
								<div class="form-group col-lg-8">
									<select class="form-control" name="dept" id="dept" required>
										<option><?php echo $fetch_strand['stranddept'];?></option>
										<option>School of Teachers Education</option>
										<option>School of Arts and Sciences</option>
										<option>School of Computer Studies</option>
										<option>School of Hospitality and Tourism Management</option>
										<option>School of Business Management</option>
									</select>
								</div>
							</div>
						</div>
					</div>
						<div class="container">
								<div class="form-group col-md-4 col-sm-11">
									<input type="submit" value="Save" name="btn_save" class="btn btn-primary col-md-offset-4 col-lg-3"/>
									<input type="submit"  name="btn_cancel" value="Cancel" class="btn btn-danger col-md-offset-2 col-lg-3"/>
								</div>
						</div>
						
					</form>
				</div><!-- /.login-box-body -->
				
			</div><!-- /.box -->
		</section>   
				  
		
		  </div><!-- /.content-wrapper -->
	<?php
		}
	?>
      

     <?php footertemplate();?>
  </body>
</html>