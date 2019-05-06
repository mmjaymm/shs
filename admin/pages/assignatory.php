<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Admin | Assignatory'); 
		?>
	<?php
		
		$sel_q_assign = mysqli_query($con,"select * from tblassignatory");
		$num_result = mysqli_num_rows($sel_q_assign);
	?>
  <!--body class="skin-green" -->
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('assignatory'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
           Assignatory
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #555555;color:white;">
              <h3 class="box-title">List of Assignatory <small class="label bg-yellow" id="num_app"> <?php echo $num_result;?></small></h3>
			  <a class="btn btn-flat btn-primary pull-right" href="add_assign.php?opt=add" data-toggle="tooltip" title="Delete User"><i class="glyphicon glyphicon-plus"></i>Add Assignatory</a>
            </div>
            <br/><br/>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="tblusers" class="table table-bordered table-hover">
					<thead>
						<th>ID</th>
						<th>FirstName</th>
						<th>M.I.</th>
						<th>LastName</th>
						<th>Position</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						<?php
						while($row = mysqli_fetch_array($sel_q_assign)){
							
						?>
							<tr>
								<td>#<?php echo $row['id'];?></td>
								<td><?php echo $row['fname'];?></td>
								<td><?php echo $row['mname'];?></td>
								<td><?php echo $row['lname'];?></td>
								<td><?php echo $row['position'];?></td>
								<td><a class="btn btn-flat btn-primary" href="add_assign.php?opt=edit&id=<?php echo $row['id'];?>" data-toggle="tooltip" title="Modify User"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
								<td><a class="btn btn-flat btn-danger" href="javascript:delete_id(<?php echo $row['id']; ?>)" data-toggle="tooltip" title="Delete User"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
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
	
	<script type="text/javascript">
	function delete_id(id)
	{
		 if(confirm('Sure To Delete This Record ?'))
		 {
			window.location.href='add_assign.php?opt=del&id='+id;
		 }
	}
	</script>

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

           var table = $("#tblusers").DataTable();

     </script>
  </body>
</html>