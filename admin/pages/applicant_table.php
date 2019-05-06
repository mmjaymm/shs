<?php include "connect.php"; ?>
<div class="table-responsive">
				  <table id="applicantrecord" class="table table-bordered table-hover">
					<thead>
						<th>App No.</th>
						<th>LName</th>
						<th>FName</th>
						<th>MName</th>
						<th>Sex</th>
						<th>Street</th>
						<th>City</th>
						<th>Province</th>
						<th>Applied Date</th>
						<th colspan="2">Action</th>
					</thead>
					<tbody>
						<?php
						include("pagination/paging.php");
						
						$page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
						$limit = 10; //if you want to dispaly 10 records per page then you have to change here
						$startpoint = ($page * $limit) - $limit;
						$statement = "tblapplicant order by date desc, appid desc"; //you have to pass your query over here

						$res=mysqli_query($con,"select * from ".$statement." LIMIT ".$startpoint." , ".$limit."");
						while($row=mysqli_fetch_array($res)){
						?>
							<tr>
								<td><?php echo $row['appid'];?></td>
								<td><?php echo $row['lname'];?></td>
								<td><?php echo $row['fname'];?></td>
								<td><?php echo $row['mname'];?></td>
								<td><?php echo $row['gender'];?></td>
								<td><?php echo $row['street'];?></td>
								<td><?php echo $row['city'];?></td>	
								<td><?php echo $row['province'];?></td>
								<td><?php echo $row['date'];?></td>									
								<td><a class="btn btn-link" href="applicant_validate.php?opt=view&id=<?php echo $row['appid'];?>">View</a></td>
								<td><a class="btn btn-link" href="applicant_validate.php?opt=val&id=<?php echo $row['appid'];?>">Validate</a></td> 
							</tr>
						<?php  
						}
						?>
					</tbody>
				  </table>
				  
				</div><!-- /.box-body -->
				<?php
					echo "<div id='pagingg' >";
					echo pagination($statement,$limit,$page);
					echo "</div>";
					?>
					
	<script type="text/javascript">
		var table = $("#applicantrecord").DataTable();
	</script>