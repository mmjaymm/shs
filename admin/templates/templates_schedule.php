<?php  
function headertemplate($title){ 
  include "../php/session.php";
        ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
     <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="../../bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../bootstrap/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../bootstrap/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
     <!-- Theme style -->
    <link href="../../bootstrap/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
      
	  <script>
      $(document).ready(function(){
        setInterval(function(){
          $("#num_app").load("num_applicant.php");
        },5000);
      });
     </script>

  </head>
<?php function navbar($active){?>

        <header class="main-header">
        <!-- Logo -->
        <a href="dashboard.php" class="logo"><i class="glyphicon glyphicon-home"></i> Guidance Office</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
		  
					
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">			
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../../bootstrap/dist/img/avatar.png" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">Guidance</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../bootstrap/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      Guidance
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="username.php">Change Username</a>
                    </div>
                    <div class="col-xs-4 text-center pull-right">
                      <a href="password.php">Change Password</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
                <a href="../php/logout.php">
                  <i class="glyphicon glyphicon-log-out" data-toggle="tooltip" title="Logout" ></i>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../../bootstrap/dist/img/avatar.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>Guidance</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>
            <?php if($active=="dashboard"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="dashboard.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>

             <?php if($active=="tblapplicant"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            include "../pages/connect.php";

            $sql_val_app = mysqli_query($con,"SELECT * FROM tblapplicant_validate");
            $num_val_app = mysqli_num_rows($sql_val_app);
            ?>

              <a href="tblapplicant.php">
                <i class="glyphicon glyphicon-th-list"></i> <span>New Applicants</span>
                <small class="label pull-right bg-green" id="num_app"><?php include("num_applicant.php");?></small>
              </a>
            </li>

            <?php if($active=="tblapplicantvalid"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="tblapplicantvalid.php">
                <i class="glyphicon glyphicon-th-list"></i> <span>Valid Applicant</span>
                <small class="label pull-right bg-green"><?php echo $num_val_app; ?></small>
              </a>
            </li>

             <?php if($active=="applicant_schedule"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="applicant_schedule.php">
                <i class="glyphicon glyphicon-list-alt"></i> <span>Applicant Schedule</span>
              </a>
            </li>
			
			<?php if($active=="reports"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="reports.php">
                <i class="glyphicon glyphicon-list-alt"></i> <span>Reports</span>
              </a>
            </li>
			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

<?php } ?>




 <?php } 
 
  function footertemplate(){
  ?>
  <footer>
  <!-- jQuery 2.1.3 -->
    <script src="../../bootstrap/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS --> 
    <script src="../../bootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>  
    <!-- AdminLTE App -->
    <script src="../../bootstrap/dist/js/app.min.js" type="text/javascript"></script>
    </footer>
    <?php }?>