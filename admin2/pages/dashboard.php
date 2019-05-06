<?php include "../templates/templates.php"; 

headertemplate('Dashboard | Administrator'); ?>

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
								<h3 class="box-title">Schedule for School Year 2015-2016</h3>
							</div><!-- /.box-header -->
			
							<div class="box-body">
								<table class="table table-bordered">
									<thead>
										<tr>
										<th class="text-center">Grade 1</th>
										<th class="text-center">Monday</th>
										<th class="text-center">Tuesday</th>
										<th class="text-center">Wendsday</th>
										<th class="text-center">Thursday</th>
										<th class="text-center">Friday</th>
										<th class="text-center">Time</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr>
										  <td></td>
										  <td>TLE<br>Mrs.Angela Angel<br>Room c4-12</td>
										  <td>English<br>Mrs.A B<br>Room c4-9</td>
										  <td>TLE<br>Mrs.Angela Angel<br>Room c4-12</td>
										  <td>TLE<br>Mrs.Angela Angel<br>Room c4-12</td>
										  <td>TLE<br>Mrs.Angela Angel<br>Room c4-12</td>
										  <td>7:30 - 8:30 AM</td>
										</tr>
									</tbody>
								</table>
							</div><!-- /.box-body -->
			
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