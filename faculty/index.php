<!DOCTYPE html>
<?php
  include "../connect.php";

  session_start();
  $result = '';
  if(isset($_POST['login'])){
    $username = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);

    $auth = mysql_query("SELECT * from admin where adm_username='$username' and adm_password='$password' ");
    $num = mysql_num_rows($auth);
    $row = mysql_fetch_assoc($auth);
	
    if($num==1){

      $_SESSION['username'] = $row['adm_username'];
      $_SESSION['password'] = $row['adm_password'];
      $_SESSION['adm_id'] = $row['adm_id'];
      header('Location:pages/dashboard.php');
    }
    else{
      $result  = 'Username or Password is incorrect.';
    }
  }

?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Administrator | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../bootstrap/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="../bootstrap/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b>Administrator</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">LOGIN</p>
        <em class="text-danger"><?php echo $result; ?></em>
        <form method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" id="username" required placeholder="Username"/>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" id="password" required placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
                                       
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat" name="login" id="login">Login <i class="glyphicon glyphicon-log-in"></i></button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="../bootstrap/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../bootstrap/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
  </body>
</html>