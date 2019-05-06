<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Student | Registrar'); 
		$shsid = $_GET['shsid'];
		$advid = $_GET['adv_id'];
		
		$sql_sub_en = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id='$shsid' AND advise_id='$advid'");
		$fetch_sub_en = mysqli_fetch_array($sql_sub_en);
		
		$lname    = strtoupper($fetch_sub_en['lname']);
		$fname    = strtoupper($fetch_sub_en['fname']);
		$mname    = strtoupper($fetch_sub_en['mname']);
		$strand   = strtoupper($fetch_sub_en['strand']);
		$major     = strtoupper($fetch_sub_en['major']);
		$section   = strtoupper($fetch_sub_en['section']);
		$grade     = strtoupper($fetch_sub_en['grade']);
		$sem   = strtoupper($fetch_sub_en['semester']);
		$yr_start     = strtoupper($fetch_sub_en['yr_start']);
		$yr_end     = strtoupper($fetch_sub_en['yr_end']);
?>

  <body class="skin-yellow">
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
			<div class="box-header with-border" style="background-color: #f39c12; color:white;">
				<h3 class="box-title">Student Information</h3>

				<a href="rog.php?shsid=<?php echo $shsid;?>&advid=<?php echo $advid;?>" class="btn btn-flat btn-primary pull-right" name="btnprint" data-toggle="tooltip"  title="Print Report">Print Report ROG</a>
            </div>
            

			<div class="container-fluid"><br/>
					<form>
						<div class="col-lg-12">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-4 col-md-4 col-sm-6">Student ID :</label>
									<label for="gradetxt" class="control-label col-lg-8 col-md-8 col-sm-6"><i>CCT-SHS-<?php echo $shsid;?></i></label>
								</div>
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-4 col-md-4 col-sm-6">Name :</label>
									<label for="gradetxt" class="control-label col-lg-8 col-md-8 col-sm-6"><i><?php echo $lname.", ".$fname." ".$mname;?></i></label>
								</div>
								<div class="form-group">	
									<label for="gradetxt" class="control-label col-lg-4 col-md-4 col-sm-6">Strand :</label>
									<label for="gradetxt" class="control-label col-lg-8 col-md-8 col-sm-6"><i><?php echo $strand;?></i></label>
								</div>
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-4 col-md-4 col-sm-6">Major :</label>
									<label for="gradetxt" class="control-label col-lg-8 col-md-8 col-sm-6"><i><?php echo $major;?></i></label>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-4 col-md-4 col-sm-6">Section :</label>
									<label for="gradetxt" class="control-label col-lg-8 col-md-8 col-sm-6"><i><?php echo $section;?></i></label>
								</div>
								<div class="form-group">		
									<label for="gradetxt" class="control-label col-lg-4 col-md-4 col-sm-6">Grade :</label>
									<label for="gradetxt" class="control-label col-lg-8 col-md-8 col-sm-6"><i><?php echo $grade;?></i></label>	
								</div>
								<div class="form-group">	
									<label for="gradetxt" class="control-label col-lg-4 col-md-4 col-sm-6">Semester :</label>
									<label for="gradetxt" class="control-label col-lg-8 col-md-8 col-sm-6"><i><?php echo $sem;?></i></label>
								</div>
								<div class="form-group">	
									<label for="gradetxt" class="control-label col-lg-4 col-md-4 col-sm-6">A . Y . :</label>
									<label for="gradetxt" class="control-label col-lg-8 col-md-8 col-sm-6"><i><?php echo $yr_start."-".$yr_end;?></i></label>	
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="container-fluid"><br/>
					<div class="col-lg-12">
							<div class="table-responsive">
								<table id="applicantschedule" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>Subject</th>
											<th>Hours</th>
											<th>Grade</th>
										</tr>
									</thead>
									<tbody>
										<?php  
											$sql_en_record = mysqli_query($con,"select * from tblsubject_enrolled WHERE shs_id='$shsid' AND advise_id='$advid'");

											$sql_com_grade = mysqli_query($con,"SELECT 
																	SUM(grades)
																	FROM tblsubject_enrolled
																	INNER JOIN tblstudent_enrolled
																	ON tblsubject_enrolled.shs_id = tblstudent_enrolled.shs_id
																	WHERE tblsubject_enrolled.advise_id = '$advid'
																	AND tblsubject_enrolled.shs_id = '$shsid'");						
											$fetch_com_grade = mysqli_fetch_array($sql_com_grade);
																$dividend = $fetch_com_grade[0];
																
											
											$sql_com_grades = mysqli_query($con,"SELECT 
																	grades
																	FROM tblsubject_enrolled
																	INNER JOIN tblstudent_enrolled
																	ON tblsubject_enrolled.shs_id = tblstudent_enrolled.shs_id
																	WHERE tblsubject_enrolled.advise_id = '$advid'
																	AND tblsubject_enrolled.shs_id = '$shsid'
																	AND grades != ''");	

											$fetch_com_grades = mysqli_num_rows($sql_com_grades);
																
											$gen_ave = $dividend/$fetch_com_grades;

											while($fetch_en_record = mysqli_fetch_array($sql_en_record)){
										?>
											<tr>
												<td><i><?php echo $fetch_en_record['subdesc'];?></i></td>
												<td><?php echo $fetch_en_record['hours'];?></td>
												<td><?php echo $fetch_en_record['grades'];?></td>
											</tr>
										<?php	
											}
										?>
										<tr style="background-color:  #f39c12;color:white">
											<td style="text-align: right"><b>General Average :</b></td>
											<td></td>
											<td><b><?php echo round($gen_ave);?></b></td>
										</tr>
									</tbody>
								</table>
							</div><!-- /.box-body -->
						</div>
				</div>
			</br>
			
        </div><!-- /.box -->
       </section> 
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
	<script type="text/javascript">
           //var table = $("#applicantschedule").DataTable();
     </script>
	</div>
  </body>
</html>