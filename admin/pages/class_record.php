<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Student | Registrar'); 
		$shsid = $_GET['shsid'];
		
		$sql_stud_en = mysqli_query($con,"SELECT * FROM tblstudent_info WHERE shs_id='$shsid'");
		$fetch_stud_en = mysqli_fetch_array($sql_stud_en);
		$lname    = strtoupper($fetch_stud_en['lname']);
		$fname    = strtoupper($fetch_stud_en['fname']);
		$mname    = strtoupper($fetch_stud_en['mname']);
		$gender   = strtoupper($fetch_stud_en['gender']);
		$bday     = strtoupper($fetch_stud_en['bday']);
		$street   = strtoupper($fetch_stud_en['street']);
		$city     = strtoupper($fetch_stud_en['city']);
		$province = strtoupper($fetch_stud_en['province']);
		$school   = strtoupper($fetch_stud_en['school']);
		$guardian = strtoupper($fetch_stud_en['guardian']);
?>

  <body class="skin-red">
    <div class="wrapper">
      
     <?php navbar('list_student'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            Student Information
			</h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
			<div class="box-header with-border" style="background-color: #dd4b39; color:white;">
				<h3 class="box-title">Student Information</h3>
            </div>
			<div class="container-fluid">
				<div class="row"><br/>
					<form>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="gradetxt" class="control-label col-lg-4">Student ID :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i>CCT-SHS-<?php echo $shsid;?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">Name :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $lname.", ".$fname." ".$mname;?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">Gender :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $gender;?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">Birth Date :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $bday;?></i></label>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="form-group">
								<label for="gradetxt" class="control-label col-lg-4">Street :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $street;?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">City :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $city;?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">Province :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $province;?></i></label>
								<label for="gradetxt" class="control-label col-lg-4">School :</label>
								<label for="gradetxt" class="control-label col-lg-8"><i><?php echo $school;?></i></label>								
							</div>
						</div>
						<div class="col-lg-4">
						</div>
					</form>
				</div>
            </div>
			</br>
			
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading box-header with-border" style="background-color: #dd4b39;color:white;" role="tab" id="headingOne">
						<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Enrollment Record
						</a></h4>
					</div>
					
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							<!----2ND TAB----->
							<div class="container-fluid">
									<div class="row">
										<form class="form-horizontal" form method = "POST" action = "student_table.php" id = "fil" target="frme">
											<div class="col-lg-12">
												<div class="table-responsive">
													<table id="applicantschedule" class="table table-bordered table-hover">
														<thead>
															<tr>
																<th>Student ID</th>
																<th>Type</th>
																<th>Status</th>
																<th>Strand</th>
																<th>Major</th>
																<th>Grade</th>
																<th>Section</th>
																<th>Semester</th>
																<th>A.Y.</th>
																<th></th>
															</tr>
														</thead>
														<tbody>
														<?php  
															$sql_en_record = mysqli_query($con,"select * from tblstudent_enrolled WHERE shs_id='$shsid'");
															while($fetch_en_record = mysqli_fetch_array($sql_en_record)){
															?>
															  <tr>
																<td><b><i>CCT-SHS-<?php echo $fetch_en_record['shs_id'];?></i></b></td>
																<td><?php echo $fetch_en_record['student_type'];?></td>
																<td><?php echo $fetch_en_record['reg_status'];?></td>
																<td><?php echo $fetch_en_record['strand'];?></td>
																<td><?php echo $fetch_en_record['major'];?></td>
																<td><?php echo $fetch_en_record['grade'];?></td>
																<td>Section-<?php echo $fetch_en_record['section'];?></td>
																<td><?php echo $fetch_en_record['semester'];?></td>
																<td><?php echo $fetch_en_record['yr_start']." - ".$fetch_en_record['yr_end'];?></td>
																<td><a class="btn btn-flat btn-primary" href="student_subjects_details.php
																												?shsid=<?php echo $fetch_en_record['shs_id'];?>
																												&adv_id=<?php echo $fetch_en_record['advise_id'];?>" data-toggle="tooltip" title="View Subjects">View Subjects</a></td>
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

     <?php footertemplate();?>
	 <script> 
        function refresh(){
            location.reload();
        }
    </script>
	
	 <script>
	$("#search_text").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        //if (index !== 0) {
		 table.draw();
        //   $row = $(this);

        //    var id = $row.find("td:first").text();
			
		//		if (id.indexOf(value) !== 0) {
		//			$row.hide();
		//		}
		//		else {
		//			$row.show();
		//		}
			}
		});
	});
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
           //var table = $("#applicantschedule").DataTable();
     </script>
	</div>
  </body>
</html>