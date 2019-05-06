<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Student | Registrar'); ?>

  <body class="skin-red">
    <div class="wrapper">
      
     <?php navbar('student_enrolled'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            Enrolled Students
		  <h1>
            <?php include('time.php'); 
			$sql_sel=mysqli_query($con,"SELECT * FROM tblstudent_enrolled");
			$num_row = mysqli_num_rows($sql_sel);
	 ?>
			
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #dd4b39; color:white;">
				<h3 class="box-title">Enrolled Student <small class="label bg-blue" id="num_app"> <?php echo $num_row;?></small></h3>
				<!--div class="input-group pull-right col-md-4">
					   <a class="input-group-addon btn btn-primary">Search</a>  
                        <input type="text" name="search_text" id="search_text" placeholder="Input Applicant Number.." class="form-control " /> 
				</div-->
            </div>
            <br/><br/>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="applicantschedule" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Student ID</th>
							<th>LastName</th>
							<th>FirstName</th>
							<th>Strand</th>
							<th>Major</th>
							<th>Grade</th>
							<th>Section</th>
							<th>Semester</th>
							<th>A.Y.</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql_sel=mysqli_query($con,"SELECT * FROM tblstudent_enrolled");
							
							
						while($row=mysqli_fetch_array($sql_sel)){
						?>
						  <tr>
							<td><b>CCT-SHS-<?php echo $row['shs_id'];?></b></td>
							<td><?php echo $row['lname'];?></td>
							<td><?php echo $row['fname'];?></td>
							<td><?php echo $row['strand'];?></td>
							<td><?php echo $row['major'];?></td>
							<td><?php echo $row['grade'];?></td>
							<td>Secion - <?php echo $row['section'];?></td>
							<td><?php echo $row['semester'];?></td>
							<td><?php echo $row['yr_start']." - ".$row['yr_end'];?></td>
							<td><center><a class="btn btn-flat btn-primary" target="_blank" href="fpdf/print_regform.php?shsid=<?php echo $row['shs_id'];?>&advid=<?php echo $row['advise_id'];?>&en_id=<?php echo $row['enrolled_id'];?>" data-toggle="tooltip" title="Print Registration"><i class="glyphicon glyphicon-print"></i>  Print</a></center></td>
						  </tr>
						<?php	
						}
						?>
					</tbody>
				  </table>
				</div><!-- /.box-body -->
            </div>
			
          </div><!-- /.box -->
       </section>   
 
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
	
	<script type="text/javascript">
           var table = $("#applicantschedule").DataTable();
    </script>
  </body>
</html>