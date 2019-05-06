<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Coordinator || Strand'); ?>

  <body class="skin-yellow">
    <div class="wrapper">
      
     <?php navbar('strand'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Strand / Tracks
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #f39c12;color:white;">
              <h3 class="box-title">Strands/Tracks Information</h3>
            
			<div class="input-group pull-right col-lg-4 col-md-6 col-sm-7">
                     <div class="box-tools pull-right">
						<a class="btn btn-flat btn-success"  href="strand_edit.php" data-toggle="tooltip" title="Add Major" id="major"><i class="glyphicon glyphicon-plus"></i> ADD MAJOR</a>
                        <a class="btn btn-flat btn-primary"  href="strand_add.php?opt=add" data-toggle="tooltip" title="Add New Record" id="add"><i class="glyphicon glyphicon-plus"></i>ADD STRAND</a>
                      </div>
                  </div>  
			</div>
			
            <br/><br/>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="applicantvalidrecord" class="table table-bordered table-hover">
					<thead>
						<th>Strand Code</th>
						<th>Description</th>
						<th>Department</th>
						<th>Action</th>
						<th></th>
					</thead>
					<tbody>
						<?php
						$res=mysqli_query($con,"select * from tblstrand");
						while($row=mysqli_fetch_array($res)){
							
						?>
							<tr>
								<td><?php echo $row['strandcode'];?></td>
								<td><?php echo $row['stranddesc'];?></td>
								<td><?php echo $row['stranddept'];?></td>
								<td><center><a class="btn btn-flat btn-primary"  href="strand_add.php?opt=edit&id=<?php echo $row['strand_id'];?>" data-toggle="tooltip" title="Edit Record" id="edit"><i class="glyphicon glyphicon-edit"></i> EDIT</a></center></td>
								<td><a class="btn btn-flat btn-primary" data-toggle="tooltip" title="View Subjects" href="strand_info.php?id=<?php echo $row['strandcode'];?>">View Subjects</a></td>
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
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:first").text();
			
				if (id.indexOf(value) !== 0) {
					$row.hide();
					alert("No record Found");
				}
				else {
					$row.show();
				}
			}
		});
	});
	</script>
	
	<script type="text/javascript">
           var table = $("#applicantvalidrecord").DataTable();
     </script>
  </body>
</html>