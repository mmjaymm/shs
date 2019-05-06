<?php 	include "../templates/templates.php"; 

		include "connect.php"; 
		
        headertemplate('New Applicants | Guidance'); ?>

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
            <div class="box-header with-border" style="background-color: #4aab69;">
				<h3 class="box-title">List of New Applicants</h3>
				<div class="input-group pull-right col-md-4">
					   <a class="input-group-addon btn btn-primary">Search</a>  
                        <input type="text" name="search_text" id="search_text" placeholder="Input Applicant Number.." class="form-control " /> 
				</div>
            </div>
            <br/><br/>
			<div class="container-fluid">
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
						$statement = "tblapplicant order by date desc"; //you have to pass your query over here

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
				}
				else {
					$row.show();
				}
			}
		});
	});
	</script>
	
	 <script>
    $(<script>
    $(document).ready(function()
    {
        $("#search_text").on('change',function()
        {		
            var keyword = $(this).val();
           
			$.ajax(
            {
                url:'applicant_search.php',
                type:'POST',
                data:{keyword:keyword},
                
                beforeSend:function()
                {$("#table-responsive").html('Working...');},
				
                success:function(data)
                {$("#table-responsive").html(data);},
            });
        });
    });
    
</script>
 
</html>