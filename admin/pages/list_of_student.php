<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Student | Registrar'); ?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('listofstudent'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            List of Student
		  <h1>
            <?php include('time.php'); 
			
			$res=mysqli_query($con,"select * from tblapplicant INNER JOIN tblstudent_enrolled ON tblapplicant.shs_id = tblstudent_enrolled.shs_id WHERE enrolled_id != ''");

			$num_res = mysqli_num_rows($res);
			$a = 1;
			?>
			
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #00a65a; color:white;">
				<h3 class="box-title">List of Student <small class="label bg-blue" id="num_app"> <?php echo $num_res;?></small></h3>
            </div>
            <br/><br/>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="applicantschedule" class="table table-bordered table-hover">
					<thead>
						<th>No.</th>
						<th>Student ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Middle Name</th>
						<th>Action</th>
						<!--th></th-->
					</thead>
					<tbody>
						<?php
						while($row=mysqli_fetch_array($res)){
							
						?>
							<tr>
								<td><?php echo $a;?></td>
								<td><?php echo $row['shs_id'];?></td>
								<td><?php echo $row['fname'];?></td>
								<td><?php echo $row['lname'];?></td>
								<td><?php echo $row['mname'];?></td>
								<td><center><a class="btn btn-flat btn-primary" href="student_details.php?shsid=<?php echo $row['shs_id'];?>" 
									data-toggle="tooltip" title="View Information"><i class="glyphicon glyphicon-pencil"></i> View Details</a></center></td>
								
							</tr>
						<?php  
						$a++;
						}
						?>
					</tbody>
				  </table><br/>
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