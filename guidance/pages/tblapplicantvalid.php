<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Approved Applicants | Guidance'); 
		?>
	<?php
		$res = mysqli_query($con,"select * from tblapplicant_validate WHERE yr='".date("Y")."'");
		$num_res=mysqli_num_rows($res);
		
		//$res1=mysqli_query($con,"select * from tblapplicant_validate ORDER BY date_val DESC");
		//$row_fetch=mysqli_fetch_array($res1);
	?>
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('tblapplicantvalid'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Approved Applicants
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #4aab69;color:white;">
              <h3 class="box-title"><small class="label bg-yellow" id="num_app"><?php echo $num_res;?></small> Number of Approved Applicants </h3>
            </div>
            <br/><br/>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="applicantvalidrecord" class="table table-bordered table-hover">
					<thead>
						<th>App No.</th>
						<th>LName</th>
						<th>FName</th>
						<th>MName</th>
						<th>Remarks</th>
						<th>Action</th>
						<th>Certificate of Admission</th>
					</thead>
					<tbody>
						<?php
						while($row=mysqli_fetch_array($res)){
							
						?>
							<tr>
								<td><?php echo $row['appid'];?></td>
								<td><?php echo $row['lname'];?></td>
								<td><?php echo $row['fname'];?></td>
								<td><?php echo $row['mname'];?></td>
								<td><?php echo $row['remarks'];?></td>
								<td><center><a class="btn btn-flat btn-primary"  id="view" href="applicant_info.php?id=<?php echo $row['appid'];?>" data-toggle="tooltip" title="View Applicant Information"><i class="glyphicon glyphicon-eye-open"></i>  View Information</a></center></td>
								<td><center><a class="btn btn-flat btn-primary"  target="_blank" href="print_certificate_admission.php?id=<?php echo $row['appid'];?>" data-toggle="tooltip" title="Print Certificate"><i class="glyphicon glyphicon-print"></i>  Print Cert. of Admission</a></center></td>
							</tr>
						<?php  
						}
						?>
					</tbody>
				  </table>
				   <br/>
				</div><!-- /.box-body -->
            </div>
			
          </div><!-- /.box -->
       </section>   
    </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
	
	<script type="text/javascript">

           var table = $("#applicantvalidrecord").DataTable();

     </script>
  </body>
</html>