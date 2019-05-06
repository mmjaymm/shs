<?php 
	include "../templates/templates.php"; 
    headertemplate('Info | Student'); 
	include "connect.php"; 
	
	if(isset($_GET['shsid']))
	$shsid = $_GET['shsid'];
	$adv_id = $_GET['advid'];
	
?>
<script src="jquery.js"></script>
<script>  
	 $(document).ready(function(){  
		  $('#strandid').change(function(){  
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
	 
<body class="skin-yellow">
    <div class="wrapper">
      
     <?php navbar('teachers'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
				<section class="content-header">
					<h1 class="col-md-10">Student Information</h1>
					<h1><?php include('time.php'); ?></h1>
				</section>
<?php
	//==================================//
	//   TYPE === NEW				    //
	//==================================//
			$sql_stud_en   = mysqli_query($con,"SELECT * FROM tblstudent_advised WHERE shs_id='$shsid' AND advise_id='$adv_id'");
			$fetch_stud_en = mysqli_fetch_array($sql_stud_en);
			$num_stud_en   = mysqli_num_rows($sql_stud_en);
			?>
				<section class="content">
						<div class="box">
							<div class="box-header with-border" style="color:white; background-color: #f39c12;">
							  <h3 class="box-title"> Student Information</h3>
							  <!--a class="btn btn-primary pull-right" href="print_preview.php?shsid=<?php //echo $id;?>" target="_blank">Print Preview</a-->
							</div>
							<div class="box-body">
								<div class="container-fluid">
									<div class="row">
										<form method="post" class="form-horizontal" action="advising_modify.php?shsid=<?php echo $shsid;?>&adv=<?php echo $adv_id;?>" >
											<div class="col-lg-8">
												<div class="form-group">
													<label for="shsidtxt" class="control-label col-lg-3">Student ID:</label>
													<div class="col-lg-9">
														<label class="control-label" name="shsid"><u>CCT-SHS-<?php echo $shsid;?></u></label>
													</div>
												</div>
												<div class="form-group">
													<label for="fnametxt" class="control-label col-lg-3">Name:</label>
													<div class="col-lg-3">
														<label class="control-label"><u><?php echo strtoupper($fetch_stud_en['lname']." , ".$fetch_stud_en['fname']."  ".$fetch_stud_en['mname']);?></u></label>
													</div>
													<label for="section" class="control-label col-lg-2">Section:</label>
													<div class="col-lg-4">
														<input type="text" class="form-control" id="section" name="section" value="<?php echo $fetch_stud_en['section'];?>" readonly/>
													</div>
												</div>
												
												<div class="form-group">
													<label id="strandtxt" class="control-label col-lg-3">Strand:</label>
													<div class="col-lg-3">
															<!--input type="text" class="form-control" id="strand" name="strand" value="<?php // echo $stud_row['strand'];?>" readonly/-->
														<select id="strandid" name="strandid" class="form-control" required readonly>
															<option value="<?php echo $fetch_stud_en['strand'];?>"><?php echo $fetch_stud_en['strand'];?></option>
																<?php
																	$sql_strand = mysqli_query($con,"SELECT * FROM tblstrand");
																	
																	while($fetch_strand = mysqli_fetch_array($sql_strand)){
																		echo "<option value=".$fetch_strand['strandcode'].">".$fetch_strand['strandcode']."</option>";
																	}
																?>
														</select>
													</div>
													<label for="major" class="control-label col-lg-2">Major:</label>
													<div class="col-lg-4">
														<select class="form-control" name="major" id="major" required readonly/>
															<option value="<?php echo $fetch_stud_en['major'];?>"><?php echo $fetch_stud_en['major'];?></option>
														</select>
													</div>
												</div>
											</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
														<div class="col-lg-9">
															<select class="form-control" name="grade" id="grade" required readonly>
																<option value="<?php echo $fetch_stud_en['grade'];?>"><?php echo $fetch_stud_en['grade'];?></option>
																<option>Grade 11</option>
																<option>Grade 12</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label for="sem" class="control-label col-lg-3">Semester:</label>
														<div class="col-lg-9">
															<select class="form-control" name="sem" id="sem" required readonly>
																<option value="<?php echo $fetch_stud_en['semester'];?>"><?php echo $fetch_stud_en['semester'];?></option>
																<option >First</option>
																<option >Second</option>
															</select>
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
														$sql_sub = mysqli_query($con, "SELECT * FROM tblsubject_enrolled WHERE advise_id = '$adv_id' AND shs_id='$shsid'");
														
														while($row_sub = mysqli_fetch_array($sql_sub)){ ?>
														<tr>
															<td style = "border: 1px solid black;text-align:center;padding:3px;"><?php// echo strtoupper($row3["subject_code"]);?></td>
															<td style = "border: 1px solid black;padding:3px;"><?php echo strtoupper($row_sub["subdesc"]);?></td>
															<td style = "border: 1px solid black;text-align:center;padding:3px;"><?php echo strtoupper($row_sub["hours"]);?> hours</td>
														</tr>
													<?php } ?>
														
													</table>
												</div>
											</div>
											<div class="col-lg-6"><br/>
												<div class="col-lg-12">
													<br/><br/>
													<div class="form-group">
														<input type="submit" name="btn_save" value="EDIT RECORD" class="btn btn-success col-lg-offset-2 col-md-offset-3 col-sm-offset-3 col-xs-offset-2"/>
														<a href="student_advised.php" name="btn_cancel" class="btn btn-danger col-lg-offset-1 col-md-offset-3 col-sm-offset-3 col-xs-offset-2">CANCEL</a>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div><!-- /.box-body -->
							</div>
						</div><!-- /.box -->
					</section>

      </div><!-- /.content-wrapper -->
	
     <?php footertemplate();?>
  </body>
</html>