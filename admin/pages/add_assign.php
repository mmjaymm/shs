<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Admin | Assignatory'); 
		
	?>
  <!--body class="skin-green" -->
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('assignatory'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Assignatory
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
				  <h3 class="box-title">Information Entry</h3>
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
									<label for="fnametxt" class="control-label col-lg-3">Middle Initial:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="mname" name="mname" value="" required/>
									</div>
								</div>
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">Position:</label>
									<div class="col-lg-9">
										<select class="form-control" name="position" id="position" required>
											<option>Guidance Councilor</option>
											<option>VP Administrative</option>
											<option>Registrar</option>
											<option>Coordinator</option>	
										</select>
									</div>
								</div>
                                
							</div>
							<div class="col-lg-4">
								<input type="submit" name="btnsave" value="Save User" class="btn btn-success btn-md btn-block" />
								<input type="cancel" name="btncancel" value="Cancel" class="btn btn-primary btn-md btn-block"/>
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
				$sql_user = mysqli_query($con,"SELECT * FROM tblassignatory WHERE id='$id'");
				$fetch_user = mysqli_fetch_array($sql_user);
				
		?>
			<section class="content">
			<div class="box">
				<div class="box-header with-border" style="background-color: #555555;color:white;">
				  <h3 class="box-title">Modify Account</h3>
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
									<label for="fnametxt" class="control-label col-lg-3">Middle Initial:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="mname" name="mname" value="<?php echo $fetch_user['mname'];?>" required/>
									</div>
								</div>
                                <div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">Position:</label>
									<div class="col-lg-9">
										<select class="form-control" name="position" id="position" required>
											<option><?php echo $fetch_user['position'];?></option>
											<option>Guidance Councilor</option>
											<option>VP Administrative</option>
											<option>Registrar</option>
											<option>Coordinator</option>
										</select>
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
		
		<?php
			}
			
			if($opt == "del"){
				$id = $_GET['id'];
				$sql_del = mysqli_query($con,"DELETE FROM tblassignatory WHERE id='$id'");
				?>
					<script>
						alert("Record deleted!");
						window.location = "assignatory.php";
					</script>
				<?php	
			}
		?>
         
    </div><!-- /.content-wrapper -->
	</div>
      
	<?php 
		if(isset($_POST['btnsave'])){
			$lname = $_POST['lname'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$position = $_POST['position'];
			
			$sql_ins = mysqli_query($con,"INSERT INTO tblassignatory(fname,lname,mname,position) VALUES ('$lname','$fname','$mname','$position')");
			if($sql_ins == true){
				?>
					<script>
						alert("Successfully Add Users");
						window.location = "assignatory.php";
					</script>
				<?php	
			}
		}
		if(isset($_POST['btnupdate'])){
			$lname = $_POST['lname'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$position = $_POST['position'];
			
			$sql_upd = mysqli_query($con,"UPDATE tblassignatory SET lname='$lname',fname='$fname',mname='$mname',position='$position' WHERE id='$id'");
			if($sql_upd == true){
				?>
					<script>
						alert("Modify Users Information Successfully");
						window.location = "assignatory.php";
					</script>
				<?php	
			}
		}
	?>
     <?php footertemplate();?>
  </body>
</html>