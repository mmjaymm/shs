<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Admin | Students'); 

		$shsid = $_GET['shsid'];
		$sql_stud = mysqli_query($con,"select * from tblapplicant WHERE shs_id= '$shsid'");
		$fetch_stud = mysqli_fetch_array($sql_stud);

	?>
  <!--body class="skin-green" -->
<body class="skin-green">
    <div class="wrapper">
      
     	<?php navbar('listofstudent'); ?>
      <!-- Content Wrapper. Contains page content -->
     	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
			<section class="content-header">
	          	<h1 class="col-md-10"> Student Information</h1>
			  	<h1> <?php include('time.php'); ?></h1>
	        </section>

		<section class="content">
			<div class="box">
				<div class="box-header with-border" style="background-color: #555555;text-align:center;color:white;">
				  <h3 class="box-title">Student Information</h3>
				  </div>
				<br/>
				<div class="box-body">
					<div class="container-fluid">
						<form method="post" class="form-horizontal" >
							<div class="col-lg-6">
								<div class="form-group">
									<label for="shsidtxt" class="control-label col-lg-3">Student ID:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="shsid" name="shsid" value="<?php echo $shsid;?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="lnametxt" class="control-label col-lg-3">Last Name:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $fetch_stud['lname'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">First Name:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fetch_stud['fname'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="mnametxt" class="control-label col-lg-3">Middle Name:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="mname" name="mname" value="<?php echo $fetch_stud['mname'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="gentxt" class="control-label col-lg-3">Gender:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="gender" name="gender" value="<?php echo $fetch_stud['gender'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="dbaytxt" class="control-label col-lg-3">Birth Date:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="bday" name="bday" value="<?php echo $fetch_stud['bday'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="agetxt" class="control-label col-lg-3">Age:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="age" name="age" value="<?php echo $fetch_stud['age'];?>" readonly/>
									</div>
								</div>
							</div>

							<div class="col-lg-6">
								<div class="form-group">
									<label for="agetxt" class="control-label col-lg-3">Contact Number:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="contact" name="contact" value="<?php echo $fetch_stud['contact'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="streettxt" class="control-label col-lg-3">Street:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="street" name="street" value="<?php echo $fetch_stud['street'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="citytxt" class="control-label col-lg-3">City:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="city" name="city" value="<?php echo $fetch_stud['city'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="provtxt" class="control-label col-lg-3">Province:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="prov" name="prov" value="<?php echo $fetch_stud['province'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="schooltxt" class="control-label col-lg-3">School(High School):</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="school" name="school" value="<?php echo $fetch_stud['school'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="typetxt" class="control-label col-lg-3">School Type:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="type" name="type" value="<?php echo $fetch_stud['school_type'];?>" readonly/>
									</div>
								</div>
							</div>
							</form>
						</div>
					</div>

					<div class="box-header with-border" style="background-color: #555555; text-align:center;color:white;">
					 	<h3 class="box-title">Enrollments Records</h3>
				  	</div>
				  	<div class="box-body">
						<div class="container-fluid">
							<div class="table-responsive">
				  				<table id="tblusers" class="table table-bordered table-hover">
									<thead>
										<th>Strand</th>
										<th>Major</th>
										<th>Grade</th>
										<th>Section</th>
										<th>Semester</th>
										<th>A.Y.</th>
										<th></th>
									</thead>
									<tbody>
										<?php
										$sql_stud_en = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id='$shsid'");
										while($fetch_stud_en=mysqli_fetch_array($sql_stud_en)){
											
										?>
											<tr>
												<td><?php echo $fetch_stud_en['strand'];?></td>
												<td><?php echo $fetch_stud_en['major'];?></td>
												<td><?php echo $fetch_stud_en['grade'];?></td>
												<td><?php echo $fetch_stud_en['section'];?></td>
												<td><?php echo $fetch_stud_en['semester'];?></td>
												<td><?php echo $fetch_stud_en['yr_start']."-".$fetch_stud_en['yr_end'];?></td>
												<td><a class="btn btn-flat btn-primary" href="student_subjects_details.php?shsid=<?php echo $shsid;?>
													&advid=<?php echo $fetch_stud_en['advise_id'];?>" data-toggle="tooltip" target = "_blank" 
													title="Click to View Subjects"><i class="glyphicon glyphicon-pencil"></i> View Details</a>
												</td>
											</tr>
										<?php  
										}
										?>
								</tbody>
				 				</table>
							</div><!-- /.box-body -->
     					</div>
					</div>

			 	</div><!-- /.box -->
		   </section> 
  	 	</div><!-- /.content-wrapper -->
	</div>

	<?php 
		if(isset($_POST['btnsave'])){
			$lname = $_POST['lname'];
			$fname = $_POST['fname'];
			$uname = $_POST['uname'];
			$pass = $_POST['password'];
			$type = $_POST['type'];
			
			$sql_ins = mysqli_query($con,"INSERT INTO users_tbl(fname,lname,username,password,type) VALUES ('$lname','$fname','$uname','$pass','$type')");
			if($sql_ins == true){
				?>
					<script>
						alert("Successfully Add Users");
						window.location = "users.php";
					</script>
				<?php	
			}
		}
		if(isset($_POST['btnupdate'])){
			$lname = $_POST['lname'];
			$fname = $_POST['fname'];
			$uname = $_POST['uname'];
			$pass = $_POST['password'];
			$type = $_POST['type'];
			
			$sql_upd = mysqli_query($con,"UPDATE users_tbl SET lname='$lname',fname='$fname',username='$uname',password='$pass',type='$type' WHERE u_id='$id'");
			if($sql_upd == true){
				?>
					<script>
						alert("Modify Users Information Successfully");
						window.location = "users.php";
					</script>
				<?php	
			}
		}
	?>

     <?php footertemplate();?>
  </body>
</html>