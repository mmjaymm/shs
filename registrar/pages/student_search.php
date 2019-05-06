<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Registration'); 

?>	
  <body class="skin-red">
    <div class="wrapper">
      
     <?php navbar('registration'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            Applicants Registration / Students Enrollees
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="color:white; background-color: #dd4b39;">
				<h3 class="box-title">SHS Student ID / Applicant Number Search</h3>
            </div>
            <br/><br/>
			<?php //action="app_stud_registration.php"?>
		<form method="POST" >
			<div class="container-fluid"><center>
				<div class="row">
					<div class="form-group">
						<div class="col-lg-3 col-md-3">
								<select class="form-control" name="search_option" id="search_option" onchange="searchOption()">
									<option>Applicant Number</option>
									<option>Student ID</option>
								</select>
						</div>			
						<div class="col-lg-3 col-md-6 col-xs-9">
							<div class="input-group">
								<a class="input-group-addon" id="sel"></a>
								<input type="text" name="search_text" id="search_text" placeholder="Input Applicant Number.." class="form-control" />
							</div>
						</div>
							<div class="col-lg-2">
								<input type="submit" name="btnsearch" value="Search" class="btn btn-primary"/>
						</div>
					</div>
				</div></center>
            </div><br/><br/>
		</form>
		
          </div><!-- /.box -->
       </section>   
 
      </div><!-- /.content-wrapper -->
    <?php footertemplate();?>
	<?php
		if(isset($_POST['btnsearch'])){
			$search_txt = $_POST['search_text'];
			$search_option = $_POST['search_option'];
			//=============================//
			// PAG Applicant id ANG PINILI //
			//=============================//
			if($search_option == "Applicant Number"){
				if(empty($search_txt)){ ?>
					<script type="text/javascript">
						alert("Input Applicant ID");
					</script> <?php
				}else{ ?>
					<script type="text/javascript">
						window.location = "app_stud_registration.php?type=new&appid=<?php echo $search_txt;?>";
					</script> <?php
				}
			//=============================//
			// PAG STUDENT id ANG PINILI   //
			//=============================//
			}else{
				if(empty($search_txt)){ ?>
					<script type="text/javascript">
						alert("Input Student ID");
					</script> <?php
				}else{ ?>
					<script type="text/javascript">
						window.location = "app_stud_registration.php?type=old&shsid=<?php echo $search_txt;?>";
					</script> <?php
				}
			}
		}
	
	?>
	<script>
	function searchOption() {
		var x = document.getElementById("search_option").value;
    
		if(x == "Student ID"){
			document.getElementById("sel").innerHTML = "<b>CCT-SHS-</b>";
			document.getElementById("search_text").placeholder = "Input SHS ID Number..";
		}else{
			document.getElementById("sel").innerHTML = "";
			document.getElementById("search_text").placeholder = "Input Applicant Number..";
		}
	}
	</script>
  </body>
</html>