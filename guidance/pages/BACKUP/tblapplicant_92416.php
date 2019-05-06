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
			
			<div class="container-fluid" id="applicant_table">
					<?php	include("applicant_table.php");?>
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
	$(document).ready(function(){
		setInterval(function(){
			$("#applicant_table").load("applicant_table.php");
		},10000);
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