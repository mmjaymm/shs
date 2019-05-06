<?php include "../templates/templates.php"; 
    headertemplate('Info | Student'); 
	include "connect.php"; 
	
	$id="";
	if(isset($_GET['id']))
    	$id=$_GET['id'];
	
		
	$shs = $_POST['roll_no'];
	$fname = $_POST['fnameid'];
	$lname = $_POST['lnameid'];
	$mname = $_POST['mnameid'];
	$type = $_POST['type'];
	$status = $_POST['status'];
	$strand = $_POST['strandid'];
	$major = $_POST['major'];
	$grade = $_POST['grade'];
	$sem = $_POST['semtxt'];

	if(isset($_POST['btn_save'])){
	//$shs = $_POST['roll_no'];
	$fname = $_POST['fnameid'];
	$lname = $_POST['lnameid'];
	$mname = $_POST['mnameid'];
	$type = $_POST['typeid'];
	$status = $_POST['statusid'];
	$strand = $_POST['strandid'];
	$major = $_POST['major'];
	$grade = $_POST['gradeid'];
	$sem = $_POST['semid'];
	$ay_start = $_POST['ay_start'];
	$ay_end = $_POST['ay_end'];
	
	$sql_select_enrolled="SELECT * FROM tblstudent_advise WHERE shs_id = '$id'";
	$result=mysqli_query($con,$sql_select_enrolled);
	$num_rows_result = mysqli_num_rows($result);
	
	if ($num_rows_result > 0){
    ?>   
		<script type="text/javascript">
			alert("Student is already enrolled...!!");
			window.location = "student_advising.php?id=<?php echo $id; ?>";
        </script>
	<?php
	}else{
		///SAVING Advising Student
	$sql_advise_save = mysqli_query($con,"INSERT INTO tblstudent_advise(shs_id,fname,lname,mname,student_type,reg_status,strand,major,grade,semester,ay_start,ay_end)
							VALUES('$id','$fname','$lname','$mname','$type','$status','$strand','$major','$grade','$sem','$ay_start','$ay_end')");
	 ?>   
		<script type="text/javascript">
			alert("Successfully Student Advised...!!");
			window.location = "student_advised.php";
        </script>
	<?php
	}
}
?>

  <body class="skin-green">
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
							<input type="text" class="form-control" id="ay_start" name="ay_start" value="<?php echo date('Y');?>" readonly/>
						</div>
						<div class="col-sm-2">
							<input type="text" class="form-control" id="ay_end" name="ay_end" value="<?php echo date('Y') +1;?>"readonly/>
						</div>
				  </div>
					</br>
					
					<div class="container-fluid">
						<div class="table-responsive col-md-8">
							<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th>Subject Description</th>
									<th>Hours</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$subject = mysqli_query($con,"SELECT * FROM tblsubject WHERE strandcode = '$strand' AND grade = '$grade' AND semester = '$sem'");
									while($row_subject=mysqli_fetch_array($subject)){?>
								  <tr>
									<td><?php echo $row_subject['subdesc'];?></td>
										<td><?php echo $row_subject['subhours'];?></td>
								  </tr>
								<?php	
								}
								?>
							</tbody>
							</table>
						</div><!-- /.box-body -->
					</div>

                    <div class="form-group">
                        <input type="submit" name="btn_save" value="Save" class="btn btn-success col-md-offset-4 col-sm-offset-4 col-xs-offset-2"/>
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