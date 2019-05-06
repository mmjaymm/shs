<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Admin | Users'); 
		
	?>
  <!--body class="skin-green" -->
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('subjects'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Users Entry
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #555555;color:white;">
              <h3 class="box-title">Users Entry</h3>
			  </div>
            <br/><br/>
			<div class="box-body">
				<div class="container-fluid">
					<form method="post" class="form-horizontal" >
						<div class="col-lg-8">
							<div class="form-group">
								<label for="shsidtxt" class="control-label col-lg-3">Subjects :</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" id="lname" name="lname" value="" required/>
								</div>
							</div>
							<div class="form-group">
								<label for="fnametxt" class="control-label col-lg-3">Strand :</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" id="fname" name="fname" value="" required/>
								</div>
							</div>
							<div class="form-group">
								<label for="gradetxt" class="control-label col-lg-3">Major :</label>
								<div class="col-lg-9">
									<select class="form-control" name="type" id="type" required>
										<option></option>
										<option>Admin</option>
										<option>Guidance</option>
										<option>Registrar</option>
										<option>Coordinator</option>
										<option>Faculty</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="fnametxt" class="control-label col-lg-3">Grade :</label>
								<div class="col-lg-9">
									<select class="form-control" name="grade" id="grade" required>
										<option></option>
										<option>Grade 11</option>
										<option>Grade 12</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="fnametxt" class="control-label col-lg-3">Section :</label>
								<div class="col-lg-9">
									<input type="text" class="form-control" id="password" name="password" value="" required/>
								</div>
							</div>
							<div class="form-group">
								<label for="gradetxt" class="control-label col-lg-3">Semester:</label>
								<div class="col-lg-9">
									<select class="form-control" name="type" id="type" required>
										<option></option>
										<option>First</option>
										<option>Second</option>
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
	?>
     <?php footertemplate();?>
  </body>
</html>