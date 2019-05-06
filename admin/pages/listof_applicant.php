<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('List of Applicants'); ?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('listof_apllicant'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            List of Applicants
			</h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
				<form class="form-horizontal" form method = "POST" action ="app_table.php" id = "fil" target="frme">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
						<div class="panel-heading box-header with-border" style="background-color: #4aab69;color:white;" role="tab" id="headingOne">
						  <h4 class="panel-title">
							<a class="btn btn-flat btn-info" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<i class="glyphicon glyphicon-search"></i> Filter Search
							</a>
							
							<button type="submit" class="btn btn-flat btn-info pull-right" name="btnreport" id="btnreport" ><i class="glyphicon glyphicon-print"></i> Print Report</button>
						  </h4>
						</div>
						
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<div class="container-fluid">
									<div class="row">
										
												<div class="col-lg-4">
													<div class="form-group">
														<label for="school" class="control-label col-lg-4">Strand : </label>
														<div class="col-lg-8">
															<select class="form-control" name="strand" id="strand">
																<option></option>
																<?php  
																	$sql_strand = mysqli_query($con,"SELECT DISTINCT strand FROM tblapplicant_validate");
																	while($fetch_strand = mysqli_fetch_array($sql_strand)){?>
																		<option value="<?php echo $fetch_strand['strand'];?>"><?php echo $fetch_strand['strand'];?></option>
																<?php }?>
															</select>
														</div>
													</div>
												</div>
												
												<div class="col-lg-4">
													<div class="form-group">
														<label for="gradetxt" class="control-label col-lg-4">Date Validated :</label>
														<div class="col-lg-8">
															<input class="form-control" type="date" name="date_app" id="date_app">
														</div>
													</div>
												</div>
											
											<div class="col-lg-4">
												<input type="submit" name="btn_filter" value="Apply Filter" formtarget = "frme" class="btn btn-success btn-md btn-block"/>
												<input type="submit" onclick ="refresh()" name="btn_cancel" formtarget = "frme" value="Refresh" class="btn btn-primary btn-md btn-block"/>
											</div>
									</div>
								</div>
							</div>
						</div>
						
					  </div>
					</div>
					</form>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="applicantschedule" class="table table-bordered table-hover">
					<iframe name = "frme" src = "app_table.php" style = "width:100%;height:450px;border:solid 2px #7c1010;"></iframe>
				  </table>
				</div><!-- /.box-body -->
            </div>
			</br>
        </div><!-- /.box -->
       </section> 
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
	 <script> 
        function refresh(){
            location.reload();
        }
    </script>
	</div>
  </body>
</html>