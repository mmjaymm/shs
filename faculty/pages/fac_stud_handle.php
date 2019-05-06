<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Admin | Users'); 
		
		?>
  <!--body class="skin-green" -->
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('listof_subject'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Handle Student
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
		<?php
			$fac_id = $_GET['fac'];
			$ay = $_GET['ay'];
			$end = $_GET['end'];
			$sem = $_GET['sem'];
			$subject = $_GET['sub'];
			$sec = $_GET['sec'];
			$sql_fac = mysqli_query($con,"SELECT * FROM users_tbl WHERE u_id='$fac_id'");
			$fetch_fac = mysqli_fetch_array($sql_fac);
			$lname = $fetch_fac['lname'];
			$fname = $fetch_fac['fname'];
			
			//if($fac_id == 0){
			?>
				<script>
					//lert("No Assigned Instructor");
					//window.location = "listof_subject.php";
				</script>
			<?php
			//}
		?>
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #555555;color:white;">
              <h3 class="box-title">Class Record</h3>
			  </div>
			<div class="container-fluid">
				<div class="row"><br/>
					<form>
						<div class="col-lg-8">
							<div class="form-group">
								<label for="gradetxt" class="control-label col-lg-4">Faculty ID :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $fac_id;?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">Name of Instructor :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo strtoupper($fname." , ".$lname);?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">Academic Year :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $ay."-".$end;?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">Semester :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $sem;?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">Subject :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo strtoupper($subject);?></i></label>
							</div>
						</div>
					</form>
				</div>
            </div>
			</br>
			
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading box-header with-border" style="background-color: #555555;color:white;" role="tab" id="headingOne">
						<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Class List ----> (<?php echo strtoupper($subject);?>)
						</a></h4>
					</div>
					
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<div class="container-fluid">
									<div class="row">
										<form class="form-horizontal" form method = "POST" action = "student_table.php" id = "fil" target="frme">
											<div class="col-lg-12">
												<div class="table-responsive">
													<table id="applicantschedule" class="table table-bordered table-hover">
														<thead>
															<tr>
																<th>Student ID</th>
																<th>Name</th>
																<th>Strand</th>
																<th>Major</th>
																<th>Grade</th>
																<th>Section</th>
																<th>Grades</th>
																<th>Remarks</th>
																<th></th>
															</tr>
														</thead>
														<tbody>
														<?php 
															/////			PARA TO SA HANDLE NG TEACHERS      ////
															$sql_class_record = mysqli_query($con,"SELECT * 
																										FROM tblsubject_enrolled
																										INNER JOIN tblstudent_enrolled
																										ON tblstudent_enrolled.advise_id = tblsubject_enrolled.advise_id
																										AND tblstudent_enrolled.shs_id = tblsubject_enrolled.shs_id
																										WHERE subdesc = '$subject'
																										AND csection = '$sec'
																										AND semester = '$sem'
																										AND yr_start = '$ay'
																										AND yr_end = '$end'
																										AND fac_id='$fac_id'
																										AND csection = '$sec'");
																			
															while($fetch_class_record = mysqli_fetch_array($sql_class_record)){
															?>
															  <tr>
																<td><b><i>CCT-SHS-<?php echo $fetch_class_record['shs_id'];?></i></b></td>
																<td><?php echo $fetch_class_record['lname'];?></td>
																<td><?php echo $fetch_class_record['strand'];?></td>
																<td><?php echo $fetch_class_record['major'];?></td>
																<td><?php echo $fetch_class_record['grade'];?></td>
																<td>Section-<?php echo $fetch_class_record['section'];?></td>
															  </tr>
															<?php	
															}
														?>
														</tbody>
													</table>
												</div><!-- /.box-body -->
											</div>
										</form>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
			
          </div><!-- /.box -->
       </section>   
    </div><!-- /.content-wrapper -->
	
	<script type="text/javascript">
	function delete_id(id)
	{
		 if(confirm('Sure To Delete This Record ?'))
		 {
			window.location.href='users_add.php?opt=del&id='+id;
		 }
	}
	</script>

     <?php footertemplate();?>
	 <script>
	$("#search_text").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:first").text();
			
				if (id.indexOf(value) !== 0) {
					$row.hide();
					alert("No record Found");
				}
				else {
					$row.show();
				}
			}
		});
	});
	</script>
	
<script type="text/javascript">

           var table = $("#applicantschedule").DataTable();
     </script>
  </body>
</html>