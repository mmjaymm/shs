<?php 	
	include "../templates/templates.php"; 
	include "connect.php"; 
	headertemplate('Advising'); 
	
	if(isset($_POST['btnsearch']) == true){
		$shsid_txt = $_POST['search_text'];
		
		if(empty($shsid_txt)){
		?>			
		<script type="text/javascript">
				alert("Input Student Number");
		</script>
		<?php
		}else{
			$sql_stud_reg = mysqli_query($con,"SELECT * FROM tblstudent_register WHERE shs_id=$shsid_txt");
			$num_stud_reg = mysqli_num_rows($sql_stud_reg);
		
			if($num_stud_reg == 0){
			?>			
			<script type="text/javascript">
					alert("Invalid Student Number");
				</script>
			<?php	
			}else{
				$sql_stud_adv   = mysqli_query($con,"SELECT * FROM tblstudent_advised WHERE shs_id = $shsid_txt");
				$fetch_stud_adv = mysqli_fetch_array($sql_stud_adv);
				$max_stud_adv     = $fetch_stud_adv[0];
				
				$num_stud_adv   = mysqli_num_rows($sql_stud_adv);
				
				if($num_stud_adv == 0){
				?>			
					<script type="text/javascript">
						alert("Record Found !<?php echo $max_stud_adv;?>");
						window.location = "student_advising1.php?stats=new&shsid=<?php echo $shsid_txt;?>";
					</script>
				<?php	
				}else{
				?>				
					<script type="text/javascript">
						alert("Record Found !");
						window.location = "student_advising1.php?stats=old&shsid=<?php echo $shsid_txt;?>";
					</script>
				<?php				
				}
			}
		}
		
	}
?>
  <body class="skin-yellow">
    <div class="wrapper">
      
     <?php navbar('student_search'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            Student's Advising
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content" style="width:600px;">
        <div class="box">
            <div class="box-header with-border" style="color:white; background-color: #f39c12;">
				<h3 class="box-title">CCT-SHS Student ID Search</h3>
            </div>
            <br/><br/>
		<form method="POST" >
			<div class="container-fluid">
				<div class="row">
					<div class="form-group">
						<div class="col-lg-10 col-md-3">
							<label for="shsidtxt" class="control-label col-lg-3">Student Number :</label>
							<div class="input-group col-lg-9">
								<a class="input-group-addon" id="sel"><b>CCT-SHS-</b></a>
								<input type="text" name="search_text" id="search_text" placeholder="Input Student Number.." class="form-control" />
							</div>
						</div>
						<div class="col-lg-2">
							<input type="submit" name="btnsearch" id="btnsearch" value="Search" class="btn btn-primary"/>
						</div>
					</div>
				</div>
            </div><br/><br/>
		</form>
		
          </div><!-- /.box -->
       </section>   
 
      </div><!-- /.content-wrapper -->
     <?php footertemplate();?>
  </body>
</html>