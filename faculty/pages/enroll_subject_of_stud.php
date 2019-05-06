<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Students'); 
		
		$ay = $_GET['ay'];
		$end = $_GET['end'];
		$sem = $_GET['sem'];
		$strand = $_GET['strand'];
		$major = $_GET['major'];
		$grade = $_GET['grade'];
		$sec = $_GET['sec'];
						
		?>

  <!--body class="skin-green" -->
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('listof_subject'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Subject
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
		<?php
			$sub    = $_GET['sub'];
			$ay     = $_GET['ay'];
			$end    = $_GET['end'];
			$sem    = $_GET['sem'];
			$strand = $_GET['strand'];
			$major  = $_GET['major'];
			$grade  = $_GET['grade'];
			$sec    = $_GET['sec'];
		?>
       <section class="content">
        <div class="box">
			<div class="box-header with-border" style="background-color: #555555;color:white;">
				<div class="col-lg-6">
					<h3 class="box-title"><?php echo $sub;?></h3>
				</div>
            </div>
			<br/>
			<div class="container-fluid">
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label for="gradetxt" class="control-label col-lg-3 col-md-4">Strand :</label>
						<label for="gradetxt" class="control-label col-lg-9 col-md-8"><i><?php echo $strand;?></i></label>
					</div>
					<div class="form-group">
						<label for="gradetxt" class="control-label col-lg-3 col-md-4">Major :</label>
						<label for="gradetxt" class="control-label col-lg-9 col-md-8"><i><?php echo $major;?></i></label>
					</div>
					<div class="form-group">
						<label for="gradetxt" class="control-label col-lg-3 col-md-4">Grade :</label>
						<label for="gradetxt" class="control-label col-lg-9 col-md-8"><i><?php echo $grade;?></i></label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<div class="form-group">
						<label for="gradetxt" class="control-label col-lg-3 col-md-4">Section :</label>
						<label for="gradetxt" class="control-label col-lg-9 col-md-8"><i><?php echo $sec;?></i></label>
					</div>
					<div class="form-group">
						<label for="gradetxt" class="control-label col-lg-3 col-md-4">Semester :</label>
						<label for="gradetxt" class="control-label col-lg-9 col-md-8"><i><?php echo $sem;?></i></label>
					</div>
					<div class="form-group">
						<label for="gradetxt" class="control-label col-lg-3 col-md-4">A. Y. :</label>
						<label for="gradetxt" class="control-label col-lg-9 col-md-8"><i><?php echo $ay."-".$end;?></i></label>
					</div>
				</div>
			</div>
			<br/>
            <div class="box-header with-border" style="background-color: #555555;color:white;">
				<div class="col-lg-6">
					<a href="print_stud_class.php?ay=<?php echo $ay;?>&end=<?php echo $end;?>
											&sem=<?php echo $sem;?>&sub=<?php echo $sub;?>
											&strand=<?php echo $strand;?>&major=<?php echo $major;?>
											&grade=<?php echo $grade;?>&sec=<?php echo $sec;?>" target="_blank" class="btn btn-flat btn-info" name="btnreport" id="btnreport" ><i class="glyphicon glyphicon-print"></i> Print Class List</a>
				</div>
            </div>
            <br/><br/>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="tblusers" class="table table-bordered table-hover">
					<thead>
						<th>Student ID</th>
						<th>Name</th>
						<th>Grades</th>
						<th>Remarks</th>
						<th>Input Grades</th>
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
							if($fetch_class_record['remarks'] == "failed"){
									echo '<tr style="background-color: #dd4b39;color:white">';	
								}else{
									echo '<tr>';
								}
							?>
								<td>CCT-SHS-<?php echo $fetch_class_record['shs_id'];?></td>
								<td><?php echo strtoupper($fetch_class_record['lname']." , ". $fetch_class_record['fname']." ".$fetch_class_record['mname']);?></td>
								<td><?php echo $fetch_class_record['grades'];?></td>
								<td><?php echo $fetch_class_record['remarks'];?></td>
								<td>
									<input class="form-control" type="text" name="grades" id="<?php echo $fetch_class_record['advise_id'];?>" onchange="getgrade()" />
									<input type ="text" id="subject" value="<?php echo $fetch_class_record["subdesc"];?>" hidden>
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
       </div><!-- /.box -->  
    </div><!-- /.content-wrapper -->
	
	<script type = "text/javascript">
		function getgrade(){
			var grades = window.event.srcElement.value;
			
			if(grades >= 75){
				var remarks = "passed";
			}
			if(grades < 75){
				var remarks = "failed";
			}
			
			var advid = window.event.srcElement.id;
            var subject = document.getElementById("subject").value;
					
			document.location = "input_grades.php?grades="+grades+"&advid="+advid+"&subject="+subject+"&rem="+remarks+
                        "&section=<?php echo $sec;?>&sem=<?php echo $sem;?>&ay=<?php echo $ay;?>&end=<?php echo $end;?>&strand=<?php echo $strand;?>&major=<?php echo $major;?>&grade=<?php echo $grade;?>"; 
			
        }
	</script>

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
           var table = $("#tblusers").DataTable();
     </script>
  </body>
</html>