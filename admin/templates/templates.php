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
    <!-- Morris chart -->
    <link href="../../bootstrap/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="../../bootstrap/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
     <!-- DATA TABLES -->
    <link href="../../bootstrap/plugins//DataTables-1.10.5/media/css/jquery.dataTables.css" rel="stylesheet" type="text/css" /-->
	<!---------------------------------------------------->
	<!--link rel="stylesheet" type="text/css" href="../../bootstrap/plugins//DataTables-1.10.5/media/css/datatables.min.css"/>
	<!---------------------------------------------------->
    <!-- Daterange picker -->
    <link href="../../bootstrap/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="../../bootstrap/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="../../bootstrap/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="../../bootstrap/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
     <!-- Theme style -->
    <link href="../../bootstrap/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />

    <!------------PAGINATION----------------------->
	<link href="pagination/pagination.css" rel="stylesheet" type="text/css" />
	<link href="pagination/A_green.css" rel="stylesheet" type="text/css" />
  


     <link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
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
        <a href="dashboard.php" class="logo"><i class="glyphicon glyphicon-home"></i> Administrator</a>
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
                  <span class="hidden-xs">Administrator</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../../bootstrap/dist/img/avatar.png" class="img-circle" alt="User Image" />
                    <p>
                      Administrator
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="account.php">Account Settings</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
                <a href="../php/logout.php">
                  Logout <i class="glyphicon glyphicon-log-out" data-toggle="tooltip" title="Logout" ></i>
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
              <p>Administrator</p>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">NAVIGATION</li>

             <?php if($active=="faculty"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            include "../pages/connect.php";

            $sql_val_app = mysqli_query($con,"SELECT * FROM tblapplicant_validate");
            $num_val_app = mysqli_num_rows($sql_val_app);
            ?>

              <a href="faculty.php">
                <i class="glyphicon glyphicon-th-list"></i> <span>Faculty</span>
                <small class="label pull-right bg-green" id="num_app"><?php //include("num_applicant.php");?></small>
              </a>
            </li>

            <?php if($active=="users"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="users.php">
                <i class="glyphicon glyphicon-th-list"></i> <span>Users</span>
                <small class="label pull-right bg-green"><?php// echo $num_val_app; ?></small>
              </a>
            </li>
          
          <?php if($active=="assignatory"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="assignatory.php">
                <i class="glyphicon glyphicon-th-list"></i> <span>Assignatory</span>
                <small class="label pull-right bg-green"><?php// echo $num_val_app; ?></small>
              </a>
            </li>
    
			
			<?php if($active=="listof_apllicant"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="listof_applicant.php">
                <i class="glyphicon glyphicon-th-list"></i> <span>List of Applicant</span>
              </a>
            </li>


      <?php if($active=="listofstudent"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="list_of_student.php">
                <i class="glyphicon glyphicon-th-list"></i> <span>List of Student</span>
              </a>
            </li>
      
			
			<?php if($active=="listof_subject"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="listof_subject.php">
                <i class="glyphicon glyphicon-th-list"></i> <span>List of Classes</span>
              </a>
            </li>
			
			<?php if($active=="list_student"){ 
              echo '<li class="active">';
            }
            else{
              echo '<li>';
            }
            ?>
              <a href="listof_student.php">
                <i class="glyphicon glyphicon-th-list"></i> <span>Reports of Enrolled Student</span>
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
    <!-- DATA TABES SCRIPT-->
    <script src="../../bootstrap/plugins//DataTables-1.10.5/media/js/jquery.js" type="text/javascript"></script>
    <script src="../../bootstrap/plugins//DataTables-1.10.5/media/js/jquery.dataTables.js" type="text/javascript"></script-->
	<!--script type="text/javascript" src="../../bootstrap/plugins//DataTables-1.10.5/media/js/datatables.min.js"></script>
    <!-- Bootstrap 3.3.2 JS --> 
    <script src="../../bootstrap/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>  
    <!-- FastClick -->
    <script src='../../bootstrap/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="../../bootstrap/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Force Numeric -->
     <script src="../../bootstrap/dist/js/forcenumeric.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../bootstrap/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../../bootstrap/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../../bootstrap/raphael/raphael-min.js"></script>
    <script src="../../bootstrap/morrisjs/morris.min.js"></script>
    <!-- datepicker -->
    <script src="../../bootstrap/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
      <!-- daterangepicker -->
    <script src="../../bootstrap/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
     <!-- jQuery Knob Chart -->
    <script src="../../bootstrap/plugins/knob/jquery.knob.js" type="text/javascript"></script>
    </footer>
    <?php }?>