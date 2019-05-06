<!DOCTYPE html>
<?php
  include "connect.php";
  session_start();

  if(isset($_POST['btngetpass'])){
  	$type = $_POST['type'];
  	$uname = $_POST['username'];
  	$fname = $_POST['fname'];
  	$lname = $_POST['lname'];

  	$sql_pass = mysqli_query($con,"SELECT * FROM users_tbl WHERE type='$type' AND username='$uname' AND fname='$fname' AND lname='$lname'");
  	$fetch_pass = mysqli_fetch_array($sql_pass);
  	$num_pass = mysqli_num_rows($sql_pass);

  	if($num_pass == 1){
  		?>
  		<script>
  			alert("Your Password is : <?php echo $fetch_pass['password']?>");
  		</script>
		<?php
  	}else{
  		?>
  		<script>
  			alert("No Data Found.");
  		</script>
		<?php
  	}

  }
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SHS | Forgot Password</title>
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
	
  </head>
  <body class="login-page">
  
		<div class="login-box">
			<div class="">
				<div class="login-logo">
					<img src="images/logo.png" width="100px" class="img-fluid" alt="Responsive image">
					<a href="index.php"><b>Password Recovery</b></a>
				</div><!-- /.login-logo -->
			</div>
			
			<div class="">
				<div class="login-box-body">
					<h5 class="login-box-msg"></h5>
					
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
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" id="lname" name="lname"  placeholder="Your Lastname..." required>
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" id="fname" name="fname"  placeholder="Your Firstname..." required>
							</div>
							<div class="help-block with-errors"></div>
						</div>
						<br/>
					  <div class="row">
						<div class="col-xs-8">
							<input type="submit" value="Get Password" class="btn btn-primary btn-block" name="btngetpass" id="btngetpass"/>                          
						</div><!-- /.col -->
						<div class="col-xs-4">
							<a href="index.php" class="btn btn-primary btn-block" name="return" id="return">Back <i class="glyphicon glyphicon-share-alt"></i></a>                            
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