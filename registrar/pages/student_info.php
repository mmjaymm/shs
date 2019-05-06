<?php include "../templates/templates.php"; 
    headertemplate('Info | Student'); 
	include "connect.php"; 
	
	$id="";
	if(isset($_GET['id']))
    	$id=$_GET['id'];
	
	$sql_sel=mysqli_query($con,"SELECT * FROM tblstudent_advise where shs_id='$id'");	
	$sql_row=mysqli_fetch_array($sql_sel);
	
	$shs = $sql_row['shs_id'];
	$fname = $sql_row['fname'];
	$lname = $sql_row['lname'];
	$mname = $sql_row['mname'];
	$type = $sql_row['student_type'];
	$status = $sql_row['reg_status'];
	$strand = $sql_row['strand'];
	$major = $sql_row['major'];
	$grade = $sql_row['grade'];
	$sem = $sql_row['semester'];
	$ay_start = $sql_row['ay_start'];
	$ay_end = $sql_row['ay_end'];

	
	if(isset($_POST['btn_enroll'])== true){
		$shs = $id;
		$fname = $_POST['fnameid'];
		$lname = $_POST['lnameid'];
		$mname = $_POST['mnameid'];
		$type = $_POST['typeid'];
		$status = $_POST['statusid'];
		$strand = $_POST['strandid'];
		$major = $_POST['major'];
		$grade = $_POST['gradeid'];
		$semid = $_POST['semid'];
		$ay_start = $_POST['ay_start'];
		$ay_end = $_POST['ay_end'];
		
		$sql = "SELECT * FROM tblstudent_enrolled WHERE shs_id = '" .$id. "'";
		$result = mysqli_query($con,$sql);
		$rowcount=mysqli_num_rows($result);
		
			if ($rowcount > 0) {
				?>
				<script type="text/javascript">
						alert("Student number <?php echo $id;?> already enrolled. \n Enrolled another.");
						window.location = "student_advised.php";
				</script>
				<?php
			}else{
				$sql_insert=mysqli_query($con,"INSERT INTO tblstudent_enrolled(shs_id,lname,fname,mname,student_type,reg_status,strand,major,section,grade,semester,yr_start,yr_end)
												values('$id','$lname','$fname','$mname','$type','$status','$strand','$major','','$grade','$semid','$ay_start','$ay_end')");
				?>
				<script type="text/javascript">
						alert("Student number <?php echo $id; ?> Successfuly enrolled.");
						window.location = "student_enrolled.php";
				</script>
				<?php
				
				$select = mysqli_query($con,"SELECT max(section) FROM tblstudent_enrolled where strand = '$strand' AND grade='$grade' AND semester='$semid' AND yr_start='$ay_start' order by section");
				$fetch = mysqli_fetch_array($select);
				$sectioning = $fetch['max(section)'];
					
				$sql_same = mysqli_query($con,"SELECT * FROM tblstudent_enrolled where section = '$sectioning' AND strand = '$strand' AND grade='$grade' AND semester='$semid' AND yr_start='$ay_start'");
				$fetch_same = mysqli_num_rows($sql_same);
					
					if($sectioning == ""){
						$sectioning1 = '1';
						
					}else if($fetch_same < 2){
						$sectioning1 = $sectioning;
						
					}else{
						$sectioning1 = $sectioning+1;
					}
					
					$qsql_upd = mysqli_query($con,"update tblstudent_enrolled set section='$sectioning1' where shs_id='$id'");
					
			}
	}
?>

  <body class="skin-red">
    <div class="wrapper">
      
     <?php navbar('teachers'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Registered Student
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"> Student Information</h3>
            </div>
			
			<div class="container">
				<div class="col-md-12 form-style">
					<form role="form" data-toggle="validator" method="POST" action="" class="form-horizontal">
                <div class="row">
                    <div class="form-group">
                        <label for="roll_no" class="control-label col-sm-3">Student No:</label>
                        <div class="col-sm-8">
                            <input  type="text" class="form-control only-number" id="roll_no" name="roll_no" value="SHS-<?php echo $id; ?>" readonly/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="fnametxt" class="control-label col-sm-3">First Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="fnameid" name="fnameid" value="<?php echo $fname; ?>"readonly/>
						</div>
                    </div>
                    <div class="form-group">
                        <label for="lnametxt" class="control-label col-sm-3">Last Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="lnameid" name="lnameid" value="<?php echo $lname; ?>"readonly/>
						</div>
                    </div>
					<div class="form-group">
                        <label for="mnametxt" class="control-label col-sm-3">Middle Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="mnameid" name="mnameid" value="<?php echo $mname;?>"readonly/>
						</div>
                    </div>
					<div class="form-group">
                         <label for="typetxt" class="control-label col-sm-3">Student Type:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="typeid" name="typeid" value="<?php  echo $type; ?>"readonly/>
						</div>
                    </div>
					<div class="form-group">
                         <label for="statustxt" class="control-label col-sm-3">Registration Status:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="statusid" name="statusid" value="<?php echo $status; ?>"readonly/>
						</div>
                    </div>
					<div class="form-group">
						<label id="strandtxt" class="control-label col-sm-3">Strand/Tracks:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="strandid" name="strandid" value="<?php echo $strand; ?>"readonly/>
						</div>
					</div>
					<div class="form-group">
						<label id="majortxt" class="control-label col-sm-3">Major:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="major" name="major" value="<?php echo $major; ?>" readonly/>
						</div>
					</div>
					<div class="form-group">
                         <label for="gradetxt" class="control-label col-sm-3">Grade:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="gradeid" name="gradeid" value="<?php echo $grade; ?>"readonly/>
						</div>
                    </div>
					
					<div class="form-group">
                         <label for="semtxt" class="control-label col-sm-3">Semester:</label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="semid" name="semid" value="<?php echo $sem; ?>"readonly/>
						</div>
                    </div>
					
					<div class="form-group">
                         <label for="sytxt" class="control-label col-sm-3">Academic Year:</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="ay_start" name="ay_start" value="<?php echo $ay_start;?>" readonly/>
						</div>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="ay_end" name="ay_end" value="<?php echo $ay_end;?>"readonly/>
						</div>
				  </div>
					</br>

                    <div class="form-group">
                        <input type="submit" name="btn_enroll" value="Enroll" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
                        <input type="reset" value="Cancel" class="btn btn-primary col-md-offset-3 col-sm-offset-3 col-xs-offset-3"/>
                    </div-->
                </div>
            </form>
				</div>
            </div><!-- /.box-body -->
            
            
        </div><!-- /.box -->
    </section>   
              
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
  </body>
</html>