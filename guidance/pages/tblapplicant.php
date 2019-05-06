
<?php 	include "../templates/templates.php"; 

		include "connect.php"; 
		
        headertemplate('New Applicants | Guidance'); 
        $sql_num_app = mysqli_query($con,"SELECT * FROM tblapplicant WHERE status = 0 ");
        $num_app = mysqli_num_rows($sql_num_app);?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('tblapplicant'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            New Applicants
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #4aab69;color:white;">
				<form method="POST">
				<div class="col-lg-4">
					<h3 class="box-title">Number of New Applicants  <small class="label bg-yellow" id="num_app"><?php echo $num_app;?></small></h3>
				</div>
				<!--div class="pull-right">
					<div class="col-lg-2 col-md-offset-7">
									<select class="form-control" name="search_option" id="search_option" onchange="searchOption()">
										<option>Applicant Number</option>
										<option>Last Name</option>
										<option>First Name</option>
									</select> 
					</div>
					<div class="input-group pull-right col-lg-3">
						<div class="icon-addon addon-lg">
							<input type="text" name="search_text" id="search_text" placeholder="Input text.." class="form-control" />
						</div>
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">Search</button>
						</span>
					</div>
				</div-->
				</form>
            </div>
            <br/><br/>
			
			<div class="container-fluid" id="applicant_table">
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
								<td><center><a class="btn btn-flat btn-primary" href="applicant_validate.php?opt=view&id=<?php echo $row['appid'];?>" data-toggle="tooltip" title="View Information"><i class="glyphicon glyphicon-eye-open"></i> View Information</a></center></td>
								<td><center><a class="btn btn-flat btn-primary" href="applicant_validate.php?opt=val&id=<?php echo $row['appid'];?>" data-toggle="tooltip" title="Validate"><i class="glyphicon glyphicon-list-alt"></i> Validate</a></center></td>
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
       </section>
    </div><!-- /.content-wrapper -->
     <?php footertemplate();?>
	 
		 <script>
		 
		$(document).ready(function(){
			setInterval(function(){
				$("#applicantrecord").load("applicant_table.php");
			},15000);
		});
		</script>
	 
	<script>
	function searchOption() {
    var x = document.getElementById("search_option").value;
    
		if(x == "Last Name"){
			$("#search_text").on("keyup", function() {
			var value = $(this).val();

			$("table tr").each(function(index) {
				if (index !== 0) {

					$row = $(this);
					//var id = $row.find("td:first").text();
					var id = $row.find("td:nth-child(2)").text();
					
						if (id.indexOf(value) !== 0) {
							$row.hide();
						}
						else {
							$row.show();
						}
					}
				});
			});
		}
		if(x == "First Name"){
			$("#search_text").on("keyup", function() {
			var value = $(this).val();

			$("table tr").each(function(index) {
				if (index !== 0) {

					$row = $(this);
					//var id = $row.find("td:first").text();
					var id = $row.find("td:nth-child(3)").text();
					
						if (id.indexOf(value) !== 0) {
							$row.hide();
						}
						else {
							$row.show();
						}
					}
				});
			});
		}
		if(x == "Applicant Number"){
			$("#search_text").on("keyup", function() {
			var value = $(this).val();

			$("table tr").each(function(index) {
				if (index !== 0) {

					$row = $(this);
					//var id = $row.find("td:first").text();
					var id = $row.find("td:first").text();
					
						if (id.indexOf(value) !== 0) {
							$row.hide();
						}
						else {
							$row.show();
						}
					}
				});
			});
		}
	}

	$("#search_text").on("keyup", function() {
			var value = $(this).val();

			$("table tr").each(function(index) {
				if (index !== 0) {

					$row = $(this);
					//var id = $row.find("td:first").text();
					var id = $row.find("td:first").text();
					
						if (id.indexOf(value) !== 0) {
							$row.hide();
						}
						else {
							$row.show();
						}
					}
				});
			});
	
	
	</script>

    <script type="text/javascript">
           var table = $("#applicantrecord").DataTable();
	</script>
</body>
 
</html>