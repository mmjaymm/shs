<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Classes'); ?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('listof_subject'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            List of Classes
			</h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
			
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					  <div class="panel panel-default">
						<div class="panel-heading box-header with-border" style="background-color: #00a65a;color:white;" role="tab" id="headingOne">
						  <h4 class="panel-title">
							<a class="btn btn-flat btn-info" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<i class="glyphicon glyphicon-search"></i> Filter Search
							</a>
							<!--a class="btn btn-flat btn-primary pull-right" target="_blank" href="fpdf/thesis.php?id=<?php //echo $row['shs_id'];?>" data-toggle="tooltip" title="Print Report"><i class="glyphicon glyphicon-print"></i>  Print Report</a-->
						  </h4>
						</div>
						
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<div class="container-fluid">
									<div class="row">
										<form class="form-horizontal" form method = "POST" action = "class_table.php" id = "fil" target="frme">
											<div class="col-lg-8">
												<div class="col-lg-12">
													<?php
																$sql_sub=mysqli_query($con,"SELECT DISTINCT subdesc FROM tblsubject_enrolled");
																$num_sub = mysqli_num_rows($sql_sub);
														?>
														<div class="form-group">
															<label for="semtxt" class="control-label col-lg-2">Subjects :</label>
															<div class="col-lg-10">
																<select class="form-control" name="subject" id="subject">
																	<option></option>
																	<?php while ($fetch_sub = mysqli_fetch_assoc($sql_sub)) { ?>
																	<option value = "<?php echo $fetch_sub["subdesc"];?>"><?php echo $fetch_sub["subdesc"];?></option>
																	<?php    } ?>
																</select>
															</div>
														</div>
												</div>
												<div class="col-lg-6">
													<?php 
													$sql_fac = mysqli_query($con,"SELECT * FROM users_tbl WHERE type = 'Faculty'");
													$num_fac = mysqli_num_rows($sql_fac);
												?>
													<div class="form-group">
														<label for="factxt" class="control-label col-lg-4">Faculty ID :</label>
														<div class="col-lg-8">
															<select class="form-control" name="fac" id="fac">
																<option></option>
															<?php while ($fetch_fac = mysqli_fetch_assoc($sql_fac)) { ?>
																<option value="<?php echo $fetch_fac['u_id'];?>"><?php echo $fetch_fac['u_id'];?></option>
															<?php }?>
															</select>
														</div>
													</div>
													
													<div class="form-group">
														<label for="gradetxt" class="control-label col-lg-4">A . Y . :</label>
														<div class="col-lg-4">
															<select class="form-control" id="ay_start" name="ay_start">
																<option></option>
																<?php 
																$yr = date('Y');
																	for ($x = 2010; $x <= 2030; $x++) {
																		echo "<option>$x</option>";
																}
																?>
																
															</select>
														</div>
														<div class="col-lg-4">
															<label for="gradetxt" class="control-label col-lg-4" id="ay_end" name="ay_end"></label>
														 </div>
														
													</div>
													
													<div class="form-group">
														<label for="semtxt" class="control-label col-lg-4">Semester :</label>
														<div class="col-lg-8">
															<select class="form-control" name="sem" id="sem">
																<option></option>
																<option>First</option>
																<option>Second</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="form-group">
														<label for="gradetxt" class="control-label col-lg-4">Strand :</label>
														<div class="col-lg-8">
															<select class="form-control" name="strand" id="strand">
																<option></option>
																<?php  
																	$sql_strand = mysqli_query($con,"SELECT * FROM tblstrand");
																	
																	while($fetch_strand = mysqli_fetch_array($sql_strand)){?>
																		<option><?php echo $fetch_strand['strandcode'];?></option>
																<?php }?>
																
															</select>
														</div>
													</div>
													
													<div class="form-group">
													<label for="gradetxt" class="control-label col-lg-4">Major :</label>
													<div class="col-lg-8">
														<select class="form-control" name="major" id="major"/>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="gradetxt" class="control-label col-lg-4">Grade :</label>
													<div class="col-lg-8">
														<select class="form-control" name="grade" id="grade">
															<option></option>
															<option>Grade 11</option>
															<option>Grade 12</option>
														</select>
													</div>
												</div>
												</div>
											</div>
											
											<div class="col-lg-4">
												<div class="form-group">
													<label for="gradetxt" class="control-label col-lg-4">Section :</label>
													<div class="col-lg-8">
														<select class="form-control" name="section" id="section">
															<option></option>
															<?php 
																$sql_sec = "SELECT DISTINCT section FROM tblstudent_enrolled";
																$resultsc=mysqli_query($con,$sql_sec);
																while ($rowsc=mysqli_fetch_assoc($resultsc)) {
															?>
															<option value = "<?php echo $rowsc["section"];?>"><?php echo $rowsc["section"];?></option>
														<?php    } ?>
														</select>
													</div>
												</div>
												<br/><br/>
												<input type="submit" name="btn_filter" value="Apply Filter" formtarget = "frme" class="btn btn-success btn-md btn-block"/>
												<input type="submit" onclick ="refresh()" name="btn_cancel" formtarget = "frme" value="Refresh" class="btn btn-primary btn-md btn-block"/>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
						
					  </div>
					</div>
					
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="applicantschedule" class="table table-bordered table-hover">
					<iframe name = "frme" src = "class_table.php" style = "width:100%;height:450px;border:solid 2px #7c1010;"></iframe>
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
	<script>  
	 $(document).ready(function(){  
		  $('#strand').change(function(){  
			   var keyword = $(this).val();  
			   $.ajax({  
					url:"major.php",  
					method:"POST",  
					data:{keyword:keyword},  
					dataType:"text",  
					success:function(data)  
					{  
						 $('#major').html(data);  
					}  
			   });  
		  });  
	 });  
	 </script>
	<script>
		$( "#ay_start" ).change(function() {
			var sy = $("#ay_start").val();
			var sy2 = sy * 2/2+1;
			if(sy == ""){
				$("#ay_end").html('');
			}else{
				$("#ay_end").html('-'+sy2);
			}
			
		});
	</script>
	
	<script type="text/javascript">
           var table = $("#applicantschedule").DataTable();
     </script>
	</div>
  </body>
</html>