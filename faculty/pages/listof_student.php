<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Student | Registrar'); 
		
		$id = $_SESSION['id'];
?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('list_student'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            List of Students
			</h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
			<div class="box">
				<div class="box-header with-border" style="background-color: #4aab69;">
					<h3 class="box-title">List of Registered Student</h3>
				</div>
            <br/><br/>
				<div class="container-fluid">
					<div class="table-responsive">
					  <table id="applicantschedule" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Subject</th>
								<th>Strand</th>
								<th>Major</th>
								<th>Grade</th>
								<th>Section</th>
								<th>Semester</th>
								<th>A.Y.</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$sql = "SELECT * FROM tblsubject_enrolled 
									INNER JOIN tblstudent_enrolled ON 
									tblsubject_enrolled.advise_id = tblstudent_enrolled.advise_id
									WHERE fac_id='$id'";
							$result=mysqli_query($con,$sql);
							$trows = mysqli_num_rows($result);
							$row = null;
							if ($trows > 0) {
	
							while ($row = mysqli_fetch_array($result)){
							 ?>
								<tr>
									<td><?php echo $row['subdesc'];?></td>
									<td><?php echo $row['strand'];?></td>
									<td><?php echo $row['major'];?></td>
									<td><?php echo $row['grade'];?></td>
									<td><?php echo $row['section'];?></td>
									<td><?php echo $row['semester'];?></td>
									<td><?php echo $row['yr_start']."-".$row['yr_end'];?></td>
								</tr>
							<?php }
							}
						?>
						
						</tbody>
					  </table>
					</div><!-- /.box-body -->
				</div>
			</br>
        </div><!-- /.box -->
       </section> 
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
	 <script> 
        function refresh(){
            location.reload();
        }
    </script>
	
	 <script>
	$("#search_text").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        //if (index !== 0) {
		 table.draw();
        //   $row = $(this);

        //    var id = $row.find("td:first").text();
			
		//		if (id.indexOf(value) !== 0) {
		//			$row.hide();
		//		}
		//		else {
		//			$row.show();
		//		}
			}
		});
	});
	</script>
	<script>  
	 $(document).ready(function(){  
		  $('#strand').change(function(){  
			   var keyword = $(this).val();  
			   $.ajax({  
					url:"major.php",  
					method:"POST",  
					data:{keyword:keyword},  
					dataType:"text",  
					success:function(data)  
					{  
						 $('#major').html(data);  
					}  
			   });  
		  });  
	 });  
	 </script>
	<script>
		$( "#ay_start" ).change(function() {
			var sy = $("#ay_start").val();
			var sy2 = sy * 2/2+1;
			$("#ay_end").html('-'+sy2);
		});
	</script>
	
	<script type="text/javascript">
           var table = $("#applicantschedule").DataTable();
     </script>
	</div>
  </body>
</html>