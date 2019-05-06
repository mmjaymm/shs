<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Coordinator || Strand'); ?>

  <body class="skin-yellow">
    <div class="wrapper">
      
     <?php navbar('strand'); ?>
		<?php
				if(isset($_GET['id']))
				$strandcode=$_GET['id'];
	
				$sql_strand = mysqli_query($con,"SELECT * FROM tblstrand WHERE strandcode ='$strandcode'");
				$fetch_strand =mysqli_fetch_array($sql_strand);
			?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            <?php  echo $fetch_strand['stranddesc']; ?> Information
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
			
            <div class="box-header with-border" style="background-color: #f39c12;">
              <h3 class="box-title"><?php  echo $fetch_strand['stranddesc']; ?> (<?php echo $strandcode; ?>)</h3>
			  
				<div class="input-group pull-right col-lg-4 col-md-6 col-sm-7">
                    <div class="box-tools pull-right">
                        <a class="btn btn-flat btn-primary"  href="subject_add.php?str=<?php echo $strandcode;?>" data-toggle="tooltip" title="Add New Record" id="add"><i class="glyphicon glyphicon-plus"></i>ADD SUBJECT</a>
                        <a class="btn btn-flat btn-primary"  href="strand.php" data-toggle="tooltip" title="Return" id="back"><i class="glyphicon glyphicon-return"></i> Back</a>
                    </div>
                </div> 
            </div>
            <br/><br/>
			<div class="container-fluid">
				<div class="col-lg-6">
					<div class="col-lg-3">
						<h4><label>Grade 11</label></h4>
					</div>
					<div>
						<h4><label>First Semester</label></h4>
					</div>
					<div class="table-responsive">
					  <table id="applicantvalidrecord" class="table table-bordered table-hover">
						<thead>
							<th class = "danger">Subject Description</th>
							<th class = "danger">Hours</th>
						</thead>
						<tbody>
						<?php
							$sql_sub = mysqli_query($con,"SELECT * FROM tblsubject WHERE grade='Grade 11' AND semester='First' AND strandcode ='$strandcode'");
							while($fetch_sub =mysqli_fetch_array($sql_sub)){
						?>
							<tr>
								<td class = "success"><?php echo $fetch_sub['subdesc'];?></td>
								<td class = "success"><?php echo $fetch_sub['subhours'];?></td>
							</tr>
						<?php  
						}
						?>
						</tbody>
					  </table>
					</div><!-- /.box-body -->
				</div>
				
				<div class="col-lg-6">
					<div class="col-lg-3">
						<h4><label>Grade 11</label></h4>
					</div>
					<div>
						<h4><label>Second Semester</label></h4>
					</div>
					<div class="table-responsive">
					  <table id="applicantvalidrecord" class="table table-bordered table-hover">
						<thead>
							<th class = "danger">Subject Description</th>
							<th class = "danger">Hours</th>
						</thead>
						<tbody>
							<?php
							$sql_sub = mysqli_query($con,"SELECT * FROM tblsubject WHERE grade='Grade 11' AND semester='Second' AND strandcode ='$strandcode'");
							while($fetch_sub =mysqli_fetch_array($sql_sub)){
						?>
							<tr>
								<td class = "success"><?php echo $fetch_sub['subdesc'];?></td>
								<td class = "success"><?php echo $fetch_sub['subhours'];?></td>
							</tr>
						<?php  
						}
						?>
						</tbody>
					  </table>
					</div><!-- /.box-body -->

				</div>
				
            </div>
			
			<div class="container-fluid">
				<div class="col-lg-6">
					<div class="col-lg-3">
						<h4><label>Grade 12</label></h4>
					</div>
					<div>
						<h4><label>First Semester</label></h4>
					</div>
					<div class="table-responsive">
					  <table id="applicantvalidrecord" class="table table-bordered table-hover">
						<thead>
							<th class = "danger">Subject Description</th>
							<th class = "danger">Hours</th>
						</thead>
						<tbody>
						<?php
							$sql_sub = mysqli_query($con,"SELECT * FROM tblsubject WHERE grade='Grade 12' AND semester='First' AND strandcode ='$strandcode'");
							while($fetch_sub =mysqli_fetch_array($sql_sub)){
						?>
							<tr>
								<td class = "success"><?php echo $fetch_sub['subdesc'];?></td>
								<td class = "success"><?php echo $fetch_sub['subhours'];?></td>
							</tr>
						<?php  
						}
						?>
						</tbody>
					  </table>
					</div><!-- /.box-body -->
				</div>
				
				<div class="col-lg-6">
					<div class="col-lg-3">
						<h4><label>Grade 12</label></h4>
					</div>
					<div>
						<h4><label>Second Semester</label></h4>
					</div>
					<div class="table-responsive">
					  <table id="applicantvalidrecord" class="table table-bordered table-hover">
						<thead>
							<th class = "danger">Subject Description</th>
							<th class = "danger">Hours</th>
						</thead>
						<tbody>
							<?php
							$sql_sub = mysqli_query($con,"SELECT * FROM tblsubject WHERE grade='Grade 12' AND semester='Second' AND strandcode ='$strandcode'");
							while($fetch_sub =mysqli_fetch_array($sql_sub)){
						?>
							<tr>
								<td class = "success"><?php echo $fetch_sub['subdesc'];?></td>
								<td class = "success"><?php echo $fetch_sub['subhours'];?></td>
							</tr>
						<?php  
						}
						?>
						</tbody>
					  </table>
					</div><!-- /.box-body -->

				</div>
				
            </div>
          </div><!-- /.box -->
       </section>   
    </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
	 
	<script type="text/javascript">
           //var table = $("#applicantvalidrecord").DataTable();
     </script>
  </body>
</html>