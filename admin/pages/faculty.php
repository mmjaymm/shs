<?php 	include "../templates/templates.php"; 
		include "connect.php"; 
		
        headertemplate('Admin | Users'); 
		?>
	<?php
		$sql_fac_staff = mysqli_query($con,"select * from users_tbl WHERE type = 'Faculty'");
		$num_fac = mysqli_num_rows($sql_fac_staff);
	?>
  <!--body class="skin-green" -->
  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('faculty'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
		<section class="content-header">
          <h1 class="col-md-10">
            Faculty
          </h1>
		  <h1>
            <?php include('time.php'); ?>
          </h1>
        </section>
  
       <section class="content">
        <div class="box">
            <div class="box-header with-border" style="background-color: #555555;color:white;">
              <h3 class="box-title">List of Faculty <small class="label bg-yellow" id="num_app"> <?php echo $num_fac;?></small></h3>
			  <a class="btn btn-flat btn-primary pull-right" href="faculty_add_edit_del.php?opt=add" data-toggle="tooltip" title="Delete User"><i class="glyphicon glyphicon-plus"></i>Add</a>
            </div>
            <br/><br/>
			<div class="container-fluid">
				<div class="table-responsive">
				  <table id="tblusers" class="table table-bordered table-hover">
					<thead>
						<th>No.</th>
						<th>Username</th>
						<th>FName</th>
						<th>LName</th>
						<th>User Type</th>
						<th></th>
						<th></th>
					</thead>
					<tbody>
						<?php
						while($fetch_staff = mysqli_fetch_array($sql_fac_staff)){
							
						?>
							<tr>
								<td>#<?php echo $fetch_staff['u_id'];?></td>
								<td><?php echo $fetch_staff['username'];?></td>
								<td><?php echo $fetch_staff['fname'];?></td>
								<td><?php echo $fetch_staff['lname'];?></td>
								<td><?php echo $fetch_staff['type'];?></td>
								<td><a class="btn btn-flat btn-primary" href="faculty_add_edit_del.php?opt=edit&id=<?php echo $fetch_staff['u_id'];?>" data-toggle="tooltip" title="Modify User"><i class="glyphicon glyphicon-pencil"></i> Edit</a></td>
								<td><a class="btn btn-flat btn-danger" href="print_certificate_admission.php?id=<?php echo $fetch_staff['u_id'];?>" data-toggle="tooltip" title="Delete User"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
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
/*
      $('#applicantvalidrecord tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            
        }
        else {
            //table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        } );

      $(document).ready(function(){
        var datastring = 'action=load&tablename=tblapplicant_validate';

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

      $("#delete").click(function(){
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