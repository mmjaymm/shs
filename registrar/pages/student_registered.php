<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Student | Registrar'); ?>

  <body class="skin-red">
    <div class="wrapper">
      
     <?php navbar('student_registered'); 
		$sql_sel=mysqli_query($con,"SELECT * FROM tblstudent_register");
		$num_row = mysqli_num_rows($sql_sel);
	 ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="col-md-10">
            Registered Students
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #dd4b39; color:white;">
				<h3 class="box-title">Number of Student Registered<small class="label bg-blue" id="num_app"> <?php echo $num_row;?></small></h3>
            </div>
            <br/><br/>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="applicantschedule" class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Student ID</th>
							<th>LastName</th>
							<th>FirstName</th>
							<th>MiddleName</th>
							<th>Operation</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql_sel=mysqli_query($con,"SELECT * FROM tblstudent_register");
							
							
						while($row=mysqli_fetch_array($sql_sel)){
						?>
						  <tr>
								<td><b>CCT-SHS-<?php echo $row['shs_id'];?></b></td>
								<td><?php echo $row['lname'];?></td>
								<td><?php echo $row['fname'];?></td>
								<td><?php echo $row['mname'];?></td>
								<td><a class="btn btn-flat btn-primary" href="student_view_info.php?opt=view&id=<?php echo $row['shs_id'];?>" data-toggle="tooltip" title="View Information"><i class="glyphicon glyphicon-eye-open"></i>  View</a></td>
							</tr>
						<?php	
						}
						?>
					</tbody>
				  </table>
          <br/>
				</div><!-- /.box-body -->
            </div>
			
          </div><!-- /.box -->
       </section>   
 
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
	 
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
	
<script type="text/javascript">
         var table = $("#applicantschedule").DataTable();
/*
      $('#applicantschedule tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            
        }
        else {
            //table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        } );

      $(document).ready(function(){
        var datastring = 'action=load&tablename=tblapplicant_schedule';

        $.ajax({
          type: "POST",
          data: datastring,
          url: "../php/crud.php",
          dataType: 'json',
          success: function(data){
            table.rows.add(data).draw();
          }
        });
        return false;
      });
/*
      $("#add").click(function(){
        $("#add-modal").modal('show');
      });

      $("#subjcode, #subjdesc,#units ").keyup(function(){
        var code = $("#subjcode").val();
        var desc = $("#subjdesc").val();
        var units = $("#units").val();
        if(code!='' && desc!='' && units!=''){
           $("#save").removeClass("disabled");
        }
        else{
          $("#save").addClass("disabled");
        }
        return false;
      });

      $("#subjdesc").keyup(function(){
        var desc = $("#subjdesc").val();
        var datastring = 'action=validate&string='+desc+'&fieldname=subj_desc&tablename=subjects';
        if(desc==""){
          $("#hasclass").removeClass("has-success");
          $("#hasclass").removeClass("has-error");
          $("#validate-add-subject").html(' ');
        }
        else{

          $.ajax({
          type: "POST",
          url: "../php/crud.php",
          data: datastring,
          success: function(result){
              if(result=="available"){
                $("#hasclass").addClass("has-success");
                $("#hasclass").removeClass("has-error");
                $("#validate-add-subject").html('<i class="glyphicon glyphicon-ok"></i> available');

              }
              else{
                $("#hasclass").addClass("has-error");
                $("#hasclass").removeClass("has-success");
                $("#validate-add-subject").html('<i class="glyphicon glyphicon-remove"></i> not available');
                $("#save").addClass("disabled");
              }
            }
          });

        }
        return false;
      });

      $("#save").click(function(){
        var code = $("#subjcode").val();
        var desc = $("#subjdesc").val();
        var units = $("#units").val();
        var datastring = 'action=add-subject&code='+code+'&desc='+desc+'&units='+units;

        $.ajax({
          type: "POST",
          url: "../php/crud.php",
          data: datastring,
          success: function(result){
            var string = ['<input type="checkbox" name="subj_id" id="subj_id" value='+result+'>',code,desc,units];
            var rownode = table.row.add(string).draw().node();
            $(rownode).css('background-color','#00FF7F');
            $("#add-modal").modal('hide');
            document.getElementById('subjcode').value='';
            document.getElementById('subjdesc').value='';
            document.getElementById('units').value='';
            $("#save").addClass("disabled");
             $("#hasclass").removeClass("has-success");
            $("#validate-add-subject").html(' ');
          }
        });
        return false;
      });

      $("#edit").click(function(e){
        var id = $('#subj_id[type="checkbox"]:checked').val();
        var datastring = 'action=get-content&id='+id+'&tablename=subjects&fieldname=subj_id';
        if(id==null){
          alert("Select a subject");
        }
        else{
          $('#edit-modal').modal({
            backdrop: 'static',
            keyboard: false
          });

          $.ajax({
            type: "POST",
            url: "../php/crud.php",
            data: datastring,
            dataType: 'json',
            success: function(data){
              document.getElementById('editsubjid').value=data.subj_id;
              document.getElementById('editsubjcode').value=data.subj_code;
              document.getElementById('editsubjdesc').value=data.subj_desc;
               document.getElementById('editunits').value=data.units;
            }
          });
        }
        e.preventDefault();
      });

      $("#close").click(function(){
        $("#edit-modal").modal('hide');
        return false;
      });

      $("#editsubjcode, #editsubjdesc, #editunits").keyup(function(){
        var code = $("#editsubjcode").val();
        var desc = $("#editsubjdesc").val();
        var units = $("#editunits").val();
        var id = $("#editsubjid").val();

        if(code !='' && desc !='' && id !='' && units!=''){
          $("#save-changes").removeClass("disabled");

        }
        else{
          $("#save-changes").addClass("disabled");
        }
        return false;
      });

      $("#editsubjdesc").keyup(function(){
        var desc = $("#editsubjdesc").val();
        var id = $("#editsubjid").val();
        var datastring = 'action=validate-edit&string='+desc+'&id='+id+'&tablename=subjects&fieldnameid=subj_id&fieldname=subj_desc';

        if(desc==''){
          $("#hasclass-edit").removeClass("has-success");
          $("#hasclass-edit").removeClass("has-error");
          $("#validate-edit-subject").html(' ');
        }
        else{
          $.ajax({
          type: "POST",
          url:"../php/crud.php",
          data: datastring,
          success: function(result){
            if(result=="available"){
                $("#hasclass-edit").addClass("has-success");
                $("#hasclass-edit").removeClass("has-error");
                $("#validate-edit-subject").html('<i class="glyphicon glyphicon-ok"></i> available');

              }
              else{
                $("#hasclass-edit").addClass("has-error");
                $("#hasclass-edit").removeClass("has-success");
                $("#validate-edit-subject").html('<i class="glyphicon glyphicon-remove"></i> not available');
                $("#save-changes").addClass("disabled");
              }
          }
        });
        }
        return false;
      });

      $("#save-changes").click(function(e){
        var code = $("#editsubjcode").val();
        var desc = $("#editsubjdesc").val();
        var id = $("#editsubjid").val();
        var units = $("#editunits").val();
        var datastring = 'action=edit-subject&id='+id+'&code='+code+'&desc='+desc+'&units='+units;

        $.ajax({
          type: "POST",
          url: "../php/crud.php",
          data: datastring,
          success: function(result){
            if(result=="success"){
              table.row('.selected').remove().draw(false);
              var string = ['<input type="checkbox" name="subj_id" id="subj_id" value='+id+'>',code,desc,units];
              var rownode = table.row.add(string).draw(false).node();
               $(rownode).css('background-color','#00FF7F');
               $("#edit-modal").modal('hide');
            }
            else{
              alert("Error to update");
            }
          }
        });
        e.preventDefault();
      });

/*      $("#delete").click(function(){
        var id = $('#subj_id[type="checkbox"]:checked').map(function(){
                return this.value;
            }).get();
        var datastring = {'action':'delete','id':id,'fieldnameid':'subj_id','tablename':'subjects'};
        if(id==''){
          alert("Select at least one subject");
        }
        else{
          var con = confirm('Are you sure you want to delete this items(s)?');

          if(con==true){
            $.ajax({
            type: "POST",
            url: "../php/crud.php",
            data: datastring,
            success: function(result){
              if(result=="success"){
                table.rows('.selected').remove().draw(false);
              }
              else{
                alert("There's an error in deleting some items");
              }
            }
          });
          }
        }
          
        return false;
      });*/
     </script>
  </body>
</html>