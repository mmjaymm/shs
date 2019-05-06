<!DOCTYPE html>
<?php
  include "connect.php";
  session_start();
  
  $result = '';
  if(isset($_POST['login'])){
    $username = ($_POST['username']);
    $password = ($_POST['password']);
	$type     = ($_POST['type']);
	
	$sql_user   = mysqli_query($con,"SELECT * FROM users_tbl WHERE username='$username' AND password='$password' AND type='$type'");
	$count_user = mysqli_num_rows($sql_user);
	$row_user   = mysqli_fetch_array($sql_user);
	
    if($count_user == 1){
		$_SESSION['lname'] = $row_user['lname'];
		$_SESSION['fname'] = $row_user['fname'];
		$_SESSION['username'] = $row_user['username'];
		$_SESSION['password'] = $row_user['password'];
		$_SESSION['type'] 	= $row_user['type'];
		$_SESSION['id'] 	= $row_user['u_id'];
		
		$_SESSION['department'] 	= $row_user['department'];
		
		if($row_user['type'] == "Guidance"){
			 header('Location: guidance/pages/dashboard.php');
			 
		}else if($row_user['type'] == "Registrar"){
			 header('Location: registrar/pages/student_search.php');
			 
		}else if($row_user['type'] == "Coordinator"){
			 header('Location: coordinator/pages/student_search.php');
			 
		}else if($row_user['type'] == "Admin"){
			 header('Location: admin/pages/users.php');
		
		}else if($row_user['type'] == "Faculty"){
			 header('Location: faculty/pages/listof_subject.php');
		}
		
	} else{
    ?>
		<script>
			alert("Incorrect Username or Password");
		</script>
	<?php
    }
  }

?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SHS | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
	<link href="bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="bootstrap/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
	<link href="bootstrap/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
	 <!-- Font Awesome -->
	<link href="css/font-awesome.css" rel="stylesheet" media="screen">
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	
	<script>
		alert("If you are an APPLICANT click the Application Form Button.");
	</script>
  </head>
  <body class="login-page">
  
		<div class="login-box">
			<div class="">
				<div class="login-logo">
					<!--img src="images/logo.png" width="100px" class="img-fluid" alt="Responsive image"-->
					<a href="index.php"><b>Enrollment System<br/> for <br/>Senior High School of<br/> City College of Tagaytay</b></a>
				</div><!-- /.login-logo -->
			</div>
			
			<div class="">
				<div class="login-box-body">
                    <h2 class="login-box-msg"><b>LOGIN</b></h2>
					<!--div class="alert alert-success alert-dismissible" role="alert">
						<strong>Note :</strong> &nbsp;&nbsp;Take Note your <strong>Applicant Number</strong>.
					</div-->

					<p>Please fill out with your login credentials.</p>
					
					<form role="form" data-toggle="validator" method="post" class="login_form">
						<div class="form-group">
							<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<select class="form-control" name="type" id="type">
											<option>-- Please Select User Type --</option>
											<option value="Admin">Admin</option>
											<option value="Guidance">Guidance</option>
											<option value="Registrar">Registrar</option>
											<option value="Coordinator">Coordinator</option>
											<option value="Faculty">Faculty</option>
										</select>
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" id="username" name="username"  placeholder="Your Username..." required>
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-key"></i></span>
									<input type="password" class="form-control" id="password" name="password"  placeholder="Password" required>
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<a href="forgot_pass.php" class="btn btn-link btn-block" name="app_form" id="app_form">Forgot Password <i class="fa fa-key"></i></a>  
						</div>
						<br/>
					  <div class="row">
						<div class="col-xs-8">
							<a href="application_form.php" class="btn btn-primary btn-block" name="app_form" id="app_form">Application Form<i class="glyphicon glyphicon-book"></i></a>                            
						</div><!-- /.col -->
						<div class="col-xs-4">
						  <button type="submit" class="btn btn-primary btn-block " name="login" id="login">Login <i class="glyphicon glyphicon-log-in"></i></button>
						 </div><!-- /.col -->
					  </div>
					  
					  <div class="clearfix"></div>
					</form>
				
				</div><!-- /.login-box-body -->
			</div>
			
			
		</div><!-- /.login-box -->
	
    <!-- jQuery 2.1.3 -->
    <script src="bootstrap/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	
	 <!-- SA SANG INDEX -->
	<script src="js/jquery-2.1.3.min.js"></script>
	<script src="js/validator.js"></script>
	
  </body>
</html>