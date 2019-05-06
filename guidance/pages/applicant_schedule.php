<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Schedule | Guidance'); 
		
	$current_date = date("m/d/Y");	
	//$sel_del =mysqli_query($con,"DELETE FROM tblapplicant_schedule WHERE date < DATE_SUB(now(), INTERVAL 2 DAY)");
    
    //sql_sel = "DELETE FROM tblapplicant_schedule WHERE date < '$current_date'";
    $fetch_sql = mysqli_query($con,"UPDATE tblapplicant_schedule SET time = 'EXPIRED' WHERE date < '$current_date'");
	
    //--------------SELECT STATUS 0 IN AVAILABLE SCHEDULE----------//
    $sql_num=mysqli_query($con,"SELECT * FROM tblapplicant_schedule WHERE date >= '$current_date' AND status='0'");
    $sql_num_row = mysqli_num_rows($sql_num);
    ?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('applicant_schedule'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            Applicant Schedules
          </h1>
			<h1>
            <?php include('time.php'); ?>
          </h1>
        </section>

  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #4aab69;color:white;">
                <h3 class="box-title">Schedules of Applicants</h3>
                <div class="input-group pull-right col-lg-4 col-md-6 col-sm-7">
                     <div class="box-tools pull-right">
                        <a class="btn btn-flat btn-primary"  href="schedule_add.php" data-toggle="tooltip" title="Add New Record" id="add"><i class="glyphicon glyphicon-plus-sign"></i> ADD SCHEDULE</a>
                      </div>
                  </div>  
            </div>

            <div class="container">
              <label class="col-lg-10 col-md-10 col-sm-10 col-xs-10">Available Schedule : <small class="label bg-green" id="num_app"><?php echo $sql_num_row;?></small></label> 
            </div>

            <br/><br/>
			<div class="container-fluid" id="applicant_table">
				<div class="table-responsive">
				  <table id="applicantrecord" class="table table-bordered table-hover">
					<thead>
						<th>App No.</th>
						<th>Date</th>
						<th>Time</th>
						<th>Status</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						<?php
						$res=mysqli_query($con,"select * from tblapplicant_schedule order by status desc");
						while($row=mysqli_fetch_array($res)){
						?>
							<tr>
								<td><?php echo $row['appid'];?></td>
								<td><?php echo $row['date'];?></td>
								<td><?php echo $row['time'];?></td>
								<td><?php echo $row['status'];?></td>
								<td><center><a class="btn btn-flat btn-success"  href="schedule_edit.php?id=<?php echo $row['schedule_id'];?>" data-toggle="tooltip" title="Edit Record" id="edit"><i class="glyphicon glyphicon-edit"></i> EDIT</a></center></td>
								<td><center><a class="btn btn-flat btn-danger"  onclick="ConfirmDelete()"  data-toggle="tooltip" title="Delete Record" id="delete"><i class="glyphicon glyphicon-trash"></i> DELETE</a></center></td>
								
								<script type="text/javascript">
								  function ConfirmDelete()
								  {
										if (confirm("Are you sure you want to delete?"))
											 window.location = "schedule_delete.php?id=<?php echo $row['schedule_id'];?>";
								  }
								</script>
							</tr>
						<?php  
						}
						?>
					</tbody>
					<?php	//include("applicant_table.php");?>
				</table>
				 <br/>
            </div>
			
          </div><!-- /.box -->
			
          </div><!-- /.box -->
       </section>   
      </div><!-- /.content-wrapper -->
     <?php footertemplate();?>
	 <script type="text/javascript">
           var table = $("#applicantrecord").DataTable();
	</script>
  </body>
</html>