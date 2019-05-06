<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Student | Registrar'); 
		?>

  <body class="skin-red">
    <div class="wrapper">
      
     <?php navbar('student_advised'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            Advised Students
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
		<?php
		$sql_sel=mysqli_query($con,"SELECT * FROM tblstudent_advised");
		$num_row = mysqli_num_rows($sql_sel);
		?>
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #dd4b39; color:white;">
				<h3 class="box-title">Advised Student <small class="label bg-blue" id="num_app"> <?php echo $num_row;?></small></h3>
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
							<th>MiddleName</th>
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

						$res=mysqli_query($con,"select * from tblstudent_advised order by shs_id desc");
						while($row=mysqli_fetch_array($res)){
						?>
						  <tr>
							<td><b><i>CCT-SHS-<?php echo $row['shs_id'];?></i></b></td>
							<td><?php echo $row['lname'];?></td>
							<td><?php echo $row['fname'];?></td>
							<td><?php echo $row['mname'];?></td>
							<td><?php echo $row['strand'];?></td>
							<td><?php echo $row['major'];?></td>
							<td><?php echo $row['grade'];?></td>
							<td>Section-<?php echo $row['section'];?></td>
							<td><?php echo $row['semester'];?></td>
							<td><?php echo $row['yr_start']." - ".$row['yr_end'];?></td>
							<td><a class="btn btn-flat btn-primary" target="_blank" href="fpdf/thesis.php?id=<?php echo $row['shs_id'];?>" data-toggle="tooltip" title="Print Registration"><i class="glyphicon glyphicon-print"></i>  Print</a></td>
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
	
<script type="text/javascript">
           var table = $("#applicantschedule").DataTable();
     </script>
  </body>
</html>