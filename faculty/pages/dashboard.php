<?php include "../templates/templates.php"; 

headertemplate('Dashboard | Registrar'); ?>

<body class="skin-red">
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
			
							<div class="box-body">
								<table class="table table-bordered">
									
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