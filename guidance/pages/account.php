<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Account'); 
		
		$s_id = $_SESSION['id'];
		
		$sql_user = mysqli_query($con,"SELECT * FROM users_tbl WHERE u_id = '$s_id'");
		$fetch_user = mysqli_fetch_array($sql_user);
		$s_lname = $fetch_user['lname'];
		$s_fname = $fetch_user['fname'];
		$s_uname = $fetch_user['username'];
		$s_pass  = $fetch_user['password'] ;
		$s_type = $fetch_user['type'];

	?>
  <!--body class="skin-green" -->
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('users'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Account Settings
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>

			<section class="content">
			<div class="box">
				<div class="box-header with-border" style="background-color: #555555;color:white;">
				  <h3 class="box-title">Users Information</h3>
				  </div>
				<br/><br/>
				<div class="box-body">
					<div class="container-fluid">
						<form method="post" class="form-horizontal" >
							<div class="col-lg-8">
								<div class="form-group">
									<label for="shsidtxt" class="control-label col-lg-3">Last Name:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="lname" name="lname" value="<?php echo $s_lname;?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">First Name:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $s_fname;?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">Username:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="uname" name="uname" value="<?php echo $s_uname;?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">Password:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="password" name="password" value="<?php echo $s_pass;?>" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">User Type:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="type" name="type" value="<?php echo $s_type;?>" required readonly/>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<input type="submit" name="btnupdate" value="Update User Account" class="btn btn-success btn-md btn-block" />
								<input type="reset" name="btncancel" value="Cancel" class="btn btn-primary btn-md btn-block"/>
							</div>
						</form>
					</div>
				</div>
				
			  </div><!-- /.box -->
		   </section> 
         
    </div><!-- /.content-wrapper -->
	</div>
	<?php

		if(isset($_POST['btnupdate'])){
			$lname = $_POST['lname'];
			$fname = $_POST['fname'];
			$uname = $_POST['uname'];
			$pass = $_POST['password'];
			$type = $_POST['type'];
			
			$sql_upd = mysqli_query($con,"UPDATE users_tbl SET lname='$lname',fname='$fname',username='$uname',password='$pass',type='$type' WHERE u_id='$s_id'");
			if($sql_upd == true){
				?>
					<script>
						alert("Updated Users Information Successfully.");
						window.location = "dashboard.php";
					</script>
				<?php	
			}
		}
	?>
     <?php footertemplate();?>
  </body>
</html>