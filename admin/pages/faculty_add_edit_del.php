<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Admin | Users'); 
		
	?>
  <!--body class="skin-green" -->
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('faculty'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Faculty Staff
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
		<?php
			$opt = $_GET['opt'];
			
			if($opt == "add"){
		?>
			<section class="content">
			<div class="box">
				<div class="box-header with-border" style="background-color: #555555;color:white;">
				  <h3 class="box-title">Entry Faculty Staff</h3>
				  </div>
				<br/><br/>
				<div class="box-body">
					<div class="container-fluid">
						<form method="post" class="form-horizontal" >
							<div class="col-lg-8">
								<div class="form-group">
									<label for="shsidtxt" class="control-label col-lg-3">Last Name:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="lname" name="lname" value="" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">First Name:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="fname" name="fname" value="" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">Username:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="uname" name="uname" value="" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">Password:</label>
									<div class="col-lg-9">
										<input type="password" class="form-control" id="password" name="password" value="" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">User Type:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="type" name="type" value="Faculty" required readonly/>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<input type="submit" name="btnsave" value="Save faculty Account" class="btn btn-success btn-md btn-block" />
								<a  href="faculty.php" name="btncancel"class="btn btn-primary btn-md btn-block"/>Cancel</a>
							</div>
						</form>
					</div>
				</div>
				
			  </div><!-- /.box -->
		   </section> 
		
		<?php
			}
			
			if($opt == "edit"){
				$id = $_GET['id'];
				$sql_user = mysqli_query($con,"SELECT * FROM users_tbl WHERE u_id='$id'");
				$fetch_user = mysqli_fetch_array($sql_user);
				
		?>
			<section class="content">
			<div class="box">
				<div class="box-header with-border" style="background-color: #555555;color:white;">
				  <h3 class="box-title">Modify Faculty Account</h3>
				  </div>
				<br/><br/>
				<div class="box-body">
					<div class="container-fluid">
						<form method="post" class="form-horizontal" >
							<div class="col-lg-8">
								<div class="form-group">
									<label for="shsidtxt" class="control-label col-lg-3">Last Name:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $fetch_user['lname'];?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">First Name:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fetch_user['fname'];?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">Username:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="uname" name="uname" value="<?php echo $fetch_user['username'];?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">User Type:</label>
									<div class="col-lg-9">
										<select class="form-control" name="type" id="type" required>
											<option><?php echo $fetch_user['type'];?></option>
											<option>Admin</option>
											<option>Guidance</option>
											<option>Registrar</option>
											<option>Coordinator</option>
											<option>Faculty</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<input type="submit" name="btnupdate" value="Update User Account" class="btn btn-success btn-md btn-block" />
								<input type="submit" name="btncancel" value="Cancel" class="btn btn-primary btn-md btn-block"/>
							</div>
						</form>
					</div>
				</div>
				
			  </div><!-- /.box -->
		   </section> 
		
		<?php
			}
		?>
         
    </div><!-- /.content-wrapper -->
	</div>
	<?php 
		if(isset($_POST['btnsave'])){
			$lname = $_POST['lname'];
			$fname = $_POST['fname'];
			$uname = $_POST['uname'];
			$pass = $_POST['password'];
			$type = $_POST['type'];
			
			// VALIDATE IF HAVE DUPLICATE USER
			$sel = mysqli_query($con,"SELECT * FROM users_tbl WHERE username='$uname' AND password='$pass'");
			$fetch_sel = mysqli_num_rows($sel);
			
			if($fetch_sel == 1){
				?>
					<script>
						alert("Duplicate Username and Paasword try another");
						window.location = "faculty.php";
					</script>
				<?php
			}else{
				$sql_ins = mysqli_query($con,"INSERT INTO users_tbl(fname,lname,username,password,type) VALUES ('$fname','$lname','$uname','$pass','$type')");
				if($sql_ins == true){
					?>
						<script>
							alert("Successfully Add Users");
							window.location = "faculty.php";
						</script>
					<?php	
				}
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
						alert("Modify Faculty Information Successfully");
						window.location = "faculty.php";
					</script>
				<?php	
			}
		}
		if(isset($_POST['btncancel'])){
			?>
				<script>
					window.location = "faculty.php";
				</script>
			<?php	
		}
	?>
     <?php footertemplate();?>
  </body>
</html>