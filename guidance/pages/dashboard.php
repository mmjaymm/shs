<?php include "../templates/templates.php"; 
include "connect.php";
headertemplate('Dashboard | Guidance'); ?>

<body class="skin-green">
    <div class="wrapper">
      
		<?php navbar('dashboard'); ?>

      <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
        </section>

		<section class="content">
			<div class="row">
				<div class="col-md-12">
			  
					<div class="col-md-12">
						<div class="box box-primary">
							<div class="box-header">
								<i class="ion ion-clipboard"></i>
								<h3 class="box-title"></h3>
							</div><!-- /.box-header -->
							
							<!-- Main content -->
								<section class="content">
								  <!-- Small boxes (Stat box) -->
								  <div class="row">
									<div class="col-lg-3 col-xs-6">
									  <!-- small box -->
									  <?php 
										$sql_newapp = mysqli_query($con,"SELECT * FROM tblapplicant WHERE status = 0 ");
										$num_newapp = mysqli_num_rows($sql_newapp);
									  ?>
									  <div class="small-box bg-aqua">
										<div class="inner">
										  <h3><?php echo $num_newapp; ?></h3>

										  <p>New Applicant</p>
										</div>
										<div class="icon">
										  <a href="tblapplicant.php" ><i class="ion ion-ios-compose"></i></a>
										</div>
										<a href="tblapplicant.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
									  </div>
									</div>
									<!-- ./col -->
									<div class="col-lg-3 col-xs-6">
									  <!-- small box -->
									  <?php
										$res=mysqli_query($con,"select * from tblapplicant_validate");
										$num_res=mysqli_num_rows($res);
									  ?>
									  <div class="small-box bg-green">
										<div class="inner">
										  <h3><?php echo $num_res; ?></h3>

										  <p>Valid Applicant</p>
										</div>
										<div class="icon">
										  <i class="ion ion-android-checkbox-outline"></i>
										</div>
										<a href="tblapplicantvalid.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
									  </div>
									</div>
									<!-- ./col -->
									<div class="col-lg-3 col-xs-6">
									  <!-- small box -->
									  <?php
										$current_date = date("m/d/Y");	
											$sql_num=mysqli_query($con,"SELECT * FROM tblapplicant_schedule WHERE date >= '$current_date' AND status='0'");
											$sql_num_row = mysqli_num_rows($sql_num);
									  ?>
									  <div class="small-box bg-yellow">
										<div class="inner">
										  <h3><?php echo $sql_num_row; ?></h3>

										  <p>Available Schedule</p>
										</div>
										<div class="icon">
										  <i class="ion ion-calendar"></i>
										</div>
										<a href="applicant_schedule.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
									  </div>
									</div>
									
								  </div>
								  </section>
			
							<div class="box-footer clearfix no-border">
							</div>
						</div><!-- /.box -->
					</div>

				</div>
			</div>
       </section>   
    </div><!-- /.content-wrapper -->

     <?php footertemplate();?>

</body>
</html>