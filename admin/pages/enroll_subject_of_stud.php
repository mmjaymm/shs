<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Assigning Instructor'); 
		
		$ay = $_GET['ay'];
		$end = $_GET['end'];
		$sem = $_GET['sem'];
		$strand = $_GET['strand'];
		$major = $_GET['major'];
		$grade = $_GET['grade'];
		$sec = $_GET['sec'];
		
		?>
	<script>
        function addfac(){
            var _facid = window.event.srcElement.value;
            var _advid = window.event.srcElement.id;
            var _sub = window.event.srcElement.name;
            document.location = "faculty_ass.php?facid="+_facid+"&advid="+_advid+"&sub="+_sub+
				"&ay=<?php echo $ay;?>&end=<?php echo $end;?>&sem=<?php echo $sem;?>&strand=<?php echo $strand;?>&major=<?php echo $major;?>&sec=<?php echo $sec;?>&grade=<?php echo $grade;?>"; 
        }
    </script>
		
  <!--body class="skin-green" -->
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('listof_subject'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Assigning of Instructor
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
		<?php
			$sub = $_GET['sub'];
		
		?>
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #555555;color:white;">
				<div class="col-lg-12">
					<center><h3 class="box-title">SUBJECT : <?php echo $sub;?></h3></center>
				</div>
            </div>
            <br/><br/>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="tblusers" class="table table-bordered table-hover">
					<thead>
						<th>Student ID</th>
						<th>Name</th>
						<th>Strand</th>
						<th>Major</th>
						<th>Grade</th>
						<th>Semester</th>
						<th>Assigned Instructor</th>
					</thead>
					<tbody>
						<?php
																						
						$sql_class_record = mysqli_query($con,"SELECT * FROM tblsubject_enrolled
																		INNER JOIN tblstudent_enrolled
																		ON tblstudent_enrolled.advise_id = tblsubject_enrolled.advise_id
																		AND tblstudent_enrolled.shs_id = tblsubject_enrolled.shs_id
																		WHERE subdesc = '$sub'
																		AND strand = '$strand'
																		AND grade = '$grade'
																		AND major = '$major'
																		AND semester = '$sem'
																		AND yr_start = '$ay'
																		AND yr_end = '$end'
																		AND csection = '$sec'");
																		
						while($fetch_class_record = mysqli_fetch_array($sql_class_record)){
						?>
							<tr>
								<td><b>CCT-SHS-<?php echo $fetch_class_record['shs_id'];?></b></td>
								<td><?php echo $fetch_class_record['lname']." , ". $fetch_class_record['fname']." ".$fetch_class_record['mname'];?></td>
								<td><?php echo $fetch_class_record['strand'];?></td>
								<td><?php echo $fetch_class_record['major'];?></td>
								<td><?php echo $fetch_class_record['grade'];?></td>
								<td><?php echo $fetch_class_record['semester'];?></td>
								<td>
									<?php 
										$fac_id_name = $fetch_class_record["fac_id"];
										
										$sql_fac1 = mysqli_query($con,"SELECT * FROM users_tbl WHERE type = 'Faculty' AND u_id='$fac_id_name'");
										$fetch_fac1 = mysqli_fetch_assoc($sql_fac1);
										
										$sql_fac = mysqli_query($con,"SELECT * FROM users_tbl WHERE type = 'Faculty'");
										$num_fac = mysqli_num_rows($sql_fac);
									?>
									<select class="form-control" name="<?php echo $sub;?>" id="<?php echo $fetch_class_record["advise_id"] ;?>" onblur ="addfac()">
										<option value="<?php echo $fac_id_name;?>" <?php if($fac_id_name==$fac_id_name) echo 'selected="selected"'; ?>><?php echo strtoupper($fetch_fac1['fname']." ".$fetch_fac1['lname']);?></option>
									<?php while ($fetch_fac = mysqli_fetch_assoc($sql_fac)) { ?>
										<option value="<?php echo $fetch_fac['u_id'];?>"><?php echo strtoupper($fetch_fac['fname']." ".$fetch_fac['lname']);?></option>
									<?php }?>
								</select>
								</td>
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
			window.location.href='users_add.php?opt=del&id='+id;
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
           //var table = $("#tblusers").DataTable();
     </script>
  </body>
</html>