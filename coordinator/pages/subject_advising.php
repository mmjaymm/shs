<?php include "../templates/templates.php"; 
    headertemplate('Info | Student'); 
	include "connect.php"; 
	
	if(isset($_GET['shsid']))
    $shsid=$_GET['shsid'];
	
	if(isset($_GET['stats']))
		$stats = $_GET['stats'];
	
	
	$sql_stud_reg   = mysqli_query($con,"SELECT * FROM tblstudent_register WHERE shs_id = $shsid");
	$fetch_stud_reg = mysqli_fetch_array($sql_stud_reg);
	$num_stud_reg   = mysqli_num_rows($sql_stud_reg);
					
	$lname 	= $fetch_stud_reg['lname'];
	$fname	= $fetch_stud_reg['fname'];
	$mname 	= $fetch_stud_reg['mname'];
	
	$strand = $_POST['strandid'];
	$major 	= $_POST['major'];
	$grade 	= $_POST['grade'];
	$sem 	= $_POST['sem'];
?>
  <body class="skin-yellow">
    <div class="wrapper">
      
     <?php navbar('teachers'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
             Advising Student
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="color:white; background-color: #f39c12;">
              <h3 class="box-title"> Student Information</h3>
            </div>
		
		<?php if($stats == "new"){ ?>
		<div class="box-body">
			<div class="container-fluid">
				<div class="row">
					<form method="post" target="_blank" action="subject_enrolled.php?stats=<?php echo $stats;?>&shsid=<?php echo $shsid;?>">
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group">
									<label for="shsidtxt" class="control-label col-lg-3">Student ID:</label>
									<div class="col-lg-9">
										<label class="control-label" name="shsid"><u>CCT-SHS-<?php echo $shsid;?></u></label>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">Name:</label>
									<div class="col-lg-9">
										<label class="control-label"><u><?php echo strtoupper($fetch_stud_reg['lname']." , ".$fetch_stud_reg['fname']."  ".$fetch_stud_reg['mname']);?></u></label>
									</div>
								</div>
								<div class="form-group">
									<label id="strandtxt" class="control-label col-lg-3">Strand:</label>
									<div class="col-lg-3">
										<input type="text" class="form-control" name="strandid" id="strandid" value="<?php echo $strand;?>" readonly/>
									</div>
									<label for="major" class="control-label col-lg-2">Major:</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" name="major" id="major" value="<?php echo $major;?>" readonly/>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" name="grade" id="grade" value="<?php echo $grade;?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="sem" class="control-label col-lg-3">Semester:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" name="sem" id="sem" value="<?php echo $sem;?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="sytxt" class="control-label col-lg-3">A. Y. :</label>
										<?php 
											$ay_start = date('Y');
											$ay_end = date('Y') + 1;
										?>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="ay" name="ay" value="<?php echo $ay_start."-".$ay_end;?>" readonly/>
									</div>
								</div>
							</div>
							<div class=" col-lg-12 with-border" style="color:white;">
							</div>
							
							<div class="col-lg-6"><br/>
								<div class="col-lg-12">
									<table style = "width:95%;border-collapse:collapse;">
										<thead>
											<th colspan = "4" style = "text-align:center;border: 1px solid black;padding:3px; background-color:yellow;">Subjects TAKEN Last Semester:</th>
										</thead>
										<tr>
											<th style = "width:20%;border: 1px solid black;padding:3px;">Subject Code</th>
											<th style = "width:60%;border: 1px solid black;padding:3px;">Subject Description</th>
											<th style = "width:20%;border: 1px solid black;padding:3px;">Hours</th>
										</tr>
										<tr>
											<td colspan="3" style = "border: 1px solid black;text-align:center;padding:3px;">No Subjects</td>
										</tr>
									</table>
								</div>
							</div>
						
							<div class="col-lg-6"><br/>
								<div class="col-lg-12">
									<table style = "width:95%;border-collapse:collapse;">
										<thead>
											<th colspan = "4" style = "text-align:center;border: 1px solid black;padding:3px; background-color:yellow;">Subjects to ENROLL this Semester:</th>
										</thead>
										<tr>
											<th style = "width:20%;border: 1px solid black;padding:3px;">Subject Code</th>
											<th style = "width:60%;border: 1px solid black;padding:3px;">Subject Description</th>
											<th style = "width:20%;border: 1px solid black;padding:3px;">Hours</th>
										</tr>
									<?php
										$sql_sub = mysqli_query($con, "SELECT * FROM tblsubject WHERE strandcode = '$strand' AND grade='$grade' AND semester='$sem'");
										
										while($row_sub = mysqli_fetch_array($sql_sub)){ ?>
										<tr>
											<td style = "border: 1px solid black;text-align:center;padding:3px;"><?php// echo strtoupper($row3["subject_code"]);?></td>
											<td style = "border: 1px solid black;padding:3px;"><?php echo strtoupper($row_sub["subdesc"]);?></td>
											<td style = "border: 1px solid black;text-align:center;padding:3px;"><?php echo strtoupper($row_sub["subhours"]);?> hours</td>
										</tr>
									<?php } ?>
										
									</table>
								</div>
							</div>
							<div class="col-lg-12"><br/><br/>
								<div class="form-group">
									<input type="submit" name="btn_save" value="SAVE" class="btn btn-success col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
									<a href="student_search.php" name="btn_cancel" class="btn btn-danger col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2">Cancel</a>
								</div>
							</div>
						</div>	
					</form>	
				</div>
			</div><!-- /.box-body -->
		</div>
		<!--==========================================//
		//    para sa old student n magpapa advised //
		//==========================================-->
		<?php }else{
				$advid = $_GET['advid'];
			
				$sql_stud_adv   = mysqli_query($con,"SELECT * FROM tblstudent_advised WHERE shs_id = '$shsid' AND strand='$strand' AND major='$major' AND grade='$grade' AND semester='$sem'");
				$fetch_stud_adv = mysqli_fetch_array($sql_stud_adv);
				$num_stud_adv   = mysqli_num_rows($sql_stud_adv);
				
				if($num_stud_adv > 0){
					?>
					<script type="text/javascript">
						alert("DUPLICATE RECORD");
						window.location = "student_advising1.php?stats=old&shsid=<?php echo $shsid;?>";
					</script>
					<?php
				}
		?>
		<div class="box-body">
			<div class="container-fluid">
				<div class="row">
					<form method="post" target="_blank" action="subject_enrolled.php?lstadvid=<?php echo $advid;?>&stats=<?php echo $stats;?>&shsid=<?php echo $shsid;?>">
						<div class="row">
							<div class="col-lg-8">
								<div class="form-group">
									<label for="shsidtxt" class="control-label col-lg-3">Student ID:</label>
									<div class="col-lg-9">
										<label class="control-label" name="shsid"><u>CCT-SHS-<?php echo $shsid;?></u></label>
									</div>
								</div>
								<div class="form-group">
									<label for="fnametxt" class="control-label col-lg-3">Name:</label>
									<div class="col-lg-9">
										<label class="control-label"><u><?php echo strtoupper($fetch_stud_reg['lname']." , ".$fetch_stud_reg['fname']."  ".$fetch_stud_reg['mname']);?></u></label>
									</div>
								</div>
								<div class="form-group">
									<label id="strandtxt" class="control-label col-lg-3">Strand:</label>
									<div class="col-lg-3">
										<input type="text" class="form-control" name="strandid" id="strandid" value="<?php echo $strand;?>" readonly/>
									</div>
									<label for="major" class="control-label col-lg-2">Major:</label>
									<div class="col-lg-4">
										<input type="text" class="form-control" name="major" id="major" value="<?php echo $major;?>" readonly/>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="form-group">
									<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" name="grade" id="grade" value="<?php echo $grade;?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="sem" class="control-label col-lg-3">Semester:</label>
									<div class="col-lg-9">
										<input type="text" class="form-control" name="sem" id="sem" value="<?php echo $sem;?>" readonly/>
									</div>
								</div>
								<div class="form-group">
									<label for="sytxt" class="control-label col-lg-3">A. Y. :</label>
										<?php 
											$ay_start = date('Y');
											$ay_end = date('Y') + 1;
										?>
									<div class="col-lg-9">
										<input type="text" class="form-control" id="ay" name="ay" value="<?php echo $ay_start."-".$ay_end;?>" readonly/>
									</div>
								</div>
							</div>
							<div class=" col-lg-12 with-border" style="color:white;">
							</div>
							
							<div class="col-lg-6"><br/>
								<div class="col-lg-12">
									<table style = "width:95%;border-collapse:collapse;">
										<thead>
											<th colspan = "4" style = "text-align:center;border: 1px solid black;padding:3px;">Subjects TAKEN Last Semester:</th>
										</thead>
										<tr>
											<th style = "width:20%;border: 1px solid black;padding:3px;">Subject Code</th>
											<th style = "width:60%;border: 1px solid black;padding:3px;">Subject Description</th>
											<th style = "width:20%;border: 1px solid black;padding:3px;">Grades</th>
										</tr>
										<?php
										$sql_max_enid   = mysqli_query($con, "SELECT max(advise_id) FROM tblstudent_enrolled WHERE shs_id='$shsid'");
										$fetch_max_anid = mysqli_fetch_array($sql_max_enid);
										$result_max_enid= $fetch_max_anid[0];
										
										$sql_sub_taken = mysqli_query($con, "SELECT * FROM tblsubject_enrolled WHERE advise_id='$result_max_enid' AND shs_id='$shsid'");
										$num_sub_taken = mysqli_num_rows($sql_sub_taken);
										
										
										////========================================================////
										////========================================================////
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
											
										////========================================================////
										////========================================================////
										if($gen_ave == 0){
											?>
												<script>
													alert("Grades not available");
													window.location = "student_search.php";
												</script>
											<?php
										}
										while($row_sub_taken = mysqli_fetch_array($sql_sub_taken)){ ?>
										<tr>
											<td style = "border: 1px solid black;text-align:center;padding:3px;"></td>
											<td style = "border: 1px solid black;padding:3px;"><?php echo strtoupper($row_sub_taken["subdesc"]);?></td>
											<td style = "border: 1px solid black;text-align:center;padding:3px;"><?php echo $row_sub_taken["grades"];?></td>

											<?php if($row_sub_taken["grades"] == 0){ ?>
													<script>
														alert("Enrty of Grades not Available.");
														window.location = "student_search.php";
													</script>
											<?php	} ?>
										</tr>
										<?php } ?>
										
										<tr>
											<td style = "border: 1px solid black;text-align:center;padding:3px;"></td>
											<td style = "height:10px;border: 1px solid black;text-align:right;padding:3px;"><b>Gen. Average</b></td>
											<td style = "border: 1px solid black;text-align:center;padding:3px;"><b><?php echo round($gen_ave);?></b></td>
										</tr>
									</table>
								</div>
							</div>
						
							<div class="col-lg-6"><br/>
								<div class="col-lg-12">
									<table style = "width:95%;border-collapse:collapse;">
										<thead>
											<th colspan = "4" style = "text-align:center;border: 1px solid black;padding:3px;">Subjects to ENROLL this Semester:</th>
										</thead>
										<tr>
											<th style = "width:20%;border: 1px solid black;padding:3px;">Subject Code</th>
											<th style = "width:60%;border: 1px solid black;padding:3px;">Subject Description</th>
											<th style = "width:20%;border: 1px solid black;padding:3px;">Hours</th>
										</tr>
									<?php
										$sql_sub = mysqli_query($con, "SELECT * FROM tblsubject WHERE strandcode = '$strand' AND grade='$grade' AND semester='$sem'");
										
										while($row_sub = mysqli_fetch_array($sql_sub)){ ?>
										<tr>
											<td style = "border: 1px solid black;text-align:center;padding:3px;"><?php// echo strtoupper($row3["subject_code"]);?></td>
											<td style = "border: 1px solid black;padding:3px;"><?php echo strtoupper($row_sub["subdesc"]);?></td>
											<td style = "border: 1px solid black;text-align:center;padding:3px;"><?php echo strtoupper($row_sub["subhours"]);?> hours</td>
										</tr>
									<?php } ?>
										
									</table>
								</div>
							</div>
							<div class="col-lg-12"><br/><br/>
								<div class="form-group">
									<input type="submit" name="btn_save_old" value="SAVE" class="btn btn-success col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
									<input type="reset" name="btn_cancel" value="CANCEL" class="btn btn-danger col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
								</div>
							</div>
						</div>	
					</form>	
				</div>
			</div><!-- /.box-body -->
		</div>
		<?php }?>
						
		
        </div><!-- /.box -->
    </section>   
              
    
      </div><!-- /.content-wrapper -->
	</div><!-- /.content-wrapper -->
     <?php footertemplate();?>
  </body>
</html>