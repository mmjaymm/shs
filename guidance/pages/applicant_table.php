<?php include "connect.php"; ?>
<div class="table-responsive">
				  <table id="applicantrecord" class="table table-bordered table-hover">
					<thead>
						<th>App No.</th>
						<th>LRN-Number</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Sex</th>
						<th>Street</th>
						<th>City</th>
						<th>Province</th>
						<th>Applied Date</th>
						<th>Action</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
						$res=mysqli_query($con,"select * from tblapplicant WHERE status=0 order by date desc, appid desc");
						while($row=mysqli_fetch_array($res)){
						?>
							<tr>
								<td><?php echo $row['appid'];?></td>
								<td><?php echo $row['lrn_no'];?></td>
								<td><?php echo $row['lname'];?></td>
								<td><?php echo $row['fname'];?></td>
								<td><?php echo $row['mname'];?></td>
								<td><?php echo $row['gender'];?></td>
								<td><?php echo $row['street'];?></td>
								<td><?php echo $row['city'];?></td>	
								<td><?php echo $row['province'];?></td>
								<td><?php echo $row['date'];?></td>									
								<td><center><a class="btn btn-flat btn-info" href="applicant_validate.php?opt=view&id=<?php echo $row['appid'];?>" data-toggle="tooltip" title="View Information"><i class="glyphicon glyphicon-eye-open"></i> View Information</a></center></td>
								<td><center><a class="btn btn-flat btn-info" href="applicant_validate.php?opt=val&id=<?php echo $row['appid'];?>" data-toggle="tooltip" title="Validate"><i class="glyphicon glyphicon-list-alt"></i> Validate</a></center></td>
							</tr>
						<?php  
						}
						?>
					</tbody>
				  </table>
				  
				</div><!-- /.box-body -->
	<script type="text/javascript">
		var table = $("#applicantrecord").DataTable();
	</script>