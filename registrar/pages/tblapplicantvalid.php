<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Valid Applicants | Registrar'); ?>

  <body class="skin-red">
    <div class="wrapper">
      
     <?php navbar('tblapplicantvalid'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
		<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            Valid Applicants
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
		
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="color:white; background-color: #dd4b39;">
              <h3 class="box-title">List of Valid Applicants</h3>
				<div class="pull-right input-group col-md-4">
					<a class="input-group-addon btn btn-primary">Search</a>  
                    <input type="text" name="search_text" id="search_text" placeholder="Input Applicant Number.." class="form-control " /> 
				</div>
            </div>
            <br/><br/>
			<div class="container-fluid" id="applicant_tblvalid">
				<?php	include("applicant_tblvalid.php");?>
            </div>
			
          </div><!-- /.box -->
       </section>   
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
	 <script>
	$(document).ready(function(){
		setInterval(function(){
			$("#applicant_tblvalid").load("applicant_tblvalid.php");
		},3000);
	});
	</script>
	
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
  </body>
</html>