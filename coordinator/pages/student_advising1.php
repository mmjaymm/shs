<?php 
	include "../templates/templates.php"; 
    headertemplate('Info | Student'); 
	include "connect.php"; 
	
	if(isset($_GET['shsid']))
		$shsid = $_GET['shsid'];
	
	if(isset($_GET['stats']))
		$stats = $_GET['stats'];
	
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

<script>
	//var strand = document.getElementById('strandid').value;
	//alert(strand);
</script>
 
<body class="skin-yellow">
    <div class="wrapper">
      
     <?php navbar('teachers'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
				<section class="content-header">
					<h1 class="col-md-10">Advising Student</h1>
					<h1><?php include('time.php'); ?></h1>
				</section>
<?php
	//==================================//
	//   TYPE === NEW				    //
	//==================================//
	if($stats == "new"){
		$sql_stud_reg   = mysqli_query($con,"SELECT * FROM tblstudent_register WHERE shs_id='$shsid'");
			$fetch_stud_reg = mysqli_fetch_array($sql_stud_reg);
			$num_stud_reg   = mysqli_num_rows($sql_stud_reg);


			$sql_str = mysqli_query($con,"SELECT * FROM tblapplicant_validate WHERE appid='".$fetch_stud_reg['appid']."'");
			$fetch_str = mysqli_fetch_array($sql_str);
		
			?>	<section class="content">
					<div class="box">
						<div class="box-header with-border" style="color:white; background-color: #f39c12;">
						  <h3 class="box-title"> Student Information</h3>
						</div>
						<div class="box-body">
							<div class="container-fluid">
								<div class="row">
									<form method="post" class="form-horizontal" action="subject_advising.php?stats=new&shsid=<?php echo $shsid;?>">
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
														<!--input type="text" class="form-control" id="strand" name="strand" value="<?php // echo $stud_row['strand'];?>" readonly/-->
													<select id="strandid" name="strandid" class="form-control" required>
														<!--option></option-->	
														<option value="<?php echo $fetch_str['strandcode'];?>"><?php echo $fetch_str['strandcode'];?></option>
													</select>
												</div>
												<label for="major" class="control-label col-lg-2">Major:</label>
												<div class="col-lg-4">
													<select class="form-control" name="major" id="major" required/>
												<?php
												//if($fetch_str['strandcode'] == "ICT"){
													$sql_str1 = mysqli_query($con,"SELECT * FROM tblstrand_major WHERE strandcode='".$fetch_str['strandcode']."'");
													$sql_num1 = mysqli_num_rows($sql_str1);
												if($sql_num1 == 0){
												?>
													<option value="null">----</option>
												<?php
												}else{
													while($fetch_str1 = mysqli_fetch_array($sql_str1)){
												?>
													<option><?php echo $fetch_str1['major']; ?></option>
												<?php	
													}
												}
													
												//}

												?>
												
													</select>
												</div>
											</div>
										</div>
											<div class="col-lg-4">
												<div class="form-group">
													<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
													<div class="col-lg-9">
														<select class="form-control" name="grade" id="grade" readonly>
															<option></option>
															<option selected>Grade 11</option>
															<option>Grade 12</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="sem" class="control-label col-lg-3">Semester:</label>
													<div class="col-lg-9">
														<select class="form-control" name="sem" id="sem" readonly>
															<option></option>
															<option selected>First</option>
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
											<div class=" col-lg-12 with-border" style="color:white;">
												<input type="submit" name="btn_view_sub" value="View Subjects" class="btn btn-link"/>
											</div>
									</form>
								</div>
							</div><!-- /.box-body -->
						</div>
					</div><!-- /.box -->
				</section> 
<?php	
	}else{	
			
			$sql_stud_en_max   = mysqli_query($con,"SELECT MAX(enrolled_id) FROM tblstudent_enrolled WHERE shs_id='$shsid'");
			$fetch_stud_en_max = mysqli_fetch_array($sql_stud_en_max);
			$enrolled_id   = $fetch_stud_en_max[0];
			
			$sql_stud_en   = mysqli_query($con,"SELECT * FROM tblstudent_enrolled WHERE shs_id='$shsid' AND enrolled_id='$enrolled_id'");
			$fetch_stud_en = mysqli_fetch_array($sql_stud_en);
			$num_stud_en   = mysqli_num_rows($sql_stud_en);
			$adv_id        = $fetch_stud_en['advise_id'];
			
			if($num_stud_en == 0){
			?>
				<script type="text/javascript">
						alert("Your not Enrolled.");
						window.location = "student_search.php";
				</script>
			<?php
			}else{
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
										<form method="post" class="form-horizontal" action="subject_advising.php?stats=old&shsid=<?php echo $shsid;?>&advid=<?php echo $adv_id;?>" >
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
														<label class="control-label"><u><?php echo strtoupper($fetch_stud_en['lname']." , ".$fetch_stud_en['fname']."  ".$fetch_stud_en['mname']);?></u></label>
													</div>
												</div>
												<div class="form-group">
													<label id="strandtxt" class="control-label col-lg-3">Strand:</label>
													<div class="col-lg-3">
															<!--input type="text" class="form-control" id="strand" name="strand" value="<?php // echo $stud_row['strand'];?>" readonly/-->
														<select id="strandid" name="strandid" class="form-control" required>
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
														<select class="form-control" name="major" id="major" required/>
															<option value="<?php echo $fetch_stud_en['major'];?>"><?php echo $fetch_stud_en['major'];?></option>
														</select>
													</div>
												</div>
											</div>
												<div class="col-lg-4">
													<div class="form-group">
														<label for="gradetxt" class="control-label col-lg-3">Grade:</label>
														<div class="col-lg-9">
															<select class="form-control" name="grade" id="grade" required>
																<option value="<?php echo $fetch_stud_en['grade'];?>"><?php echo $fetch_stud_en['grade'];?></option>
																<option>Grade 11</option>
																<option>Grade 12</option>
															</select>
														</div>
													</div>
													<div class="form-group">
														<label for="sem" class="control-label col-lg-3">Semester:</label>
														<div class="col-lg-9">
															<select class="form-control" name="sem" id="sem" required>
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
															<input type="text" class="form-control" id="ay" name="ay" value="<?php echo $ay_start."-".$ay_end;?>"/>
														</div>
													</div>
												</div>
												<div class=" col-lg-12 with-border" style="color:white;">
													<input type="submit" name="btn_view_sub" value="View Subjects" class="btn btn-link"/>
												</div>
										</form>
									</div>
								</div><!-- /.box-body -->
							</div>
						</div><!-- /.box -->
					</section>
			<?php
			}
			?>	
				<?php
	}
?> 

      </div><!-- /.content-wrapper -->
	
     <?php footertemplate();?>
  </body>
</html>