<?php include "../templates/templates.php"; 
        headertemplate('Year Level | Administrator'); ?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('yearlevel'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Year Level
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">List of Year Level</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-flat btn-primary"  data-toggle="tooltip" title="Add New Record" id="add"><i class="glyphicon glyphicon-plus"></i></button>
                 <button class="btn btn-flat btn-success" data-toggle="tooltip" title="Edit Record" id="edit"><i class="glyphicon glyphicon-edit"></i></button>
                <button class="btn btn-flat btn-danger"  data-toggle="tooltip" title="Delete Record" id="delete"><i class="glyphicon glyphicon-remove"></i></button>
              </div>
            </div>
            <div class="box-body">
              <table id="yearlevel" class="table table-bordered table-hover">
                <thead>
                  <th>Select</th>
                  <th>Year Level</th>
                  <th>Section</th>
                </thead>
                <tbody></tbody>
              </table>
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->
       </section>   
        
          <div class="add-modal">
                  <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Add Year Level</h4>
                        </div>
                        <div class="modal-body">

                          <div id="reqsection" class="form-group">
                            <label class="control-label" for="inputSuccess">Year Level<br><div id="warning-section"></div></label>
                            <input type="text" class="form-control" id="year" placeholder="Input Year level" style="width:50%">
                          </div>
                           <div id="hasclass" class="form-group">
                            <label class="control-label" for="inputSuccess">Section<br><div id="validate-add-year" ></div></label>
                            <input type="text" class="form-control" id="section" placeholder="Input Section">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary pull-left disabled" data-toggle="tooltip" title="Save" id="save"><i class="glyphicon glyphicon-floppy-saved" ></i></button>               
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                </div><!-- /.example-modal -->

                <div class="edit-modal">
                  <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Year Level</h4>
                        </div>
                        <div class="modal-body">

                          <div id="reqdesc" class="form-group">
                            <label class="control-label" for="inputSuccess">Year Level<br><div id="warning-section-edit"></div></label>
                            <input type="text" class="form-control" name="edityear" id="edityear" style="width:50%">
                          </div>
                           <div id="hasclass-edit"  class="form-group">
                            <label class="control-label" for="inputSuccess">Section<br><div id="validate-edit-year" ></div></label>
                            <input type="text" class="form-control" name="editsection" id="editsection">
                            <input type="hidden" class="form-control" name="edityrid" id="edityrid">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-success pull-left" data-toggle="tooltip" title="Save Changes" id="save-changes"><i class="glyphicon glyphicon-floppy-saved" ></i></button>
                          <button type="button" class="btn btn-default pull-left" data-toggle="tooltip" title="Close" id="close"><i class="glyphicon glyphicon-remove" ></i></button>                              
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                </div><!-- /.example-modal -->





      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
     <script type="text/javascript">

      var table = $("#yearlevel").DataTable();


      $('#yearlevel tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            
        }
        else {
            //table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        } );

      $(document).ready(function(){
        var datastring = 'action=load&tablename=year_level';

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

      $("#add").click(function(){
        $("#add-modal").modal('show');
      });

      $("#year, #section").keyup(function(){
        var yr = $("#year").val();
        var sect = $("#section").val();

        if(yr !='' && sect !=''){
           $("#save").removeClass("disabled");
        }
        else{
          $("#save").addClass("disabled");
        }
        return false;
      });

      $("#section").keyup(function(){
        var section = $("#section").val();
        var grade = $("#year").val();
        var datastring = 'action=validate-section&section='+section+'&grade='+grade;
        if(section==""){
          $("#hasclass").removeClass("has-success");
          $("#hasclass").removeClass("has-error");
          $("#validate-add-year").html(' ');
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
                $("#validate-add-year").html('<i class="glyphicon glyphicon-ok"></i> available');

              }
              else{
                $("#hasclass").addClass("has-error");
                $("#hasclass").removeClass("has-success");
                $("#validate-add-year").html('<i class="glyphicon glyphicon-remove"></i> not available');
                $("#save").addClass("disabled");
              }
            }
          });

        }
        return false;
      });

      $("#save").click(function(){
        var year = $("#year").val();
        var sect = $("#section").val();
        var datastring = 'action=add-year-level&year='+year+'&section='+sect;

        $.ajax({
          type: "POST",
          url: "../php/crud.php",
          data: datastring,
          success: function(result){
            var string = ['<input type="checkbox" name="year_id" id="year_id" value='+result+'>',year,sect];
            var rownode = table.row.add(string).draw().node();
            $(rownode).css('background-color','#00FF7F');
            $("#add-modal").modal('hide');
            document.getElementById('year').value='';
            document.getElementById('section').value='';
            $("#save").addClass("disabled");
             $("#hasclass").removeClass("has-success");
            $("#validate-add-year").html(' ');
          }
        });
        return false;
      });

      $("#edit").click(function(e){
        var id = $('#year_id[type="checkbox"]:checked').val();
        var datastring = 'action=get-content&id='+id+'&tablename=year_level&fieldname=year_id';
        if(id==null){
          alert("Select a year level");
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
              document.getElementById('edityrid').value=data.year_id;
              document.getElementById('edityear').value=data.year_level;
              document.getElementById('editsection').value=data.section;
            }
          });
        }
        e.preventDefault();
      });

      $("#close").click(function(){
        $("#edit-modal").modal('hide');
        return false;
      });

      $("#edityear, #editsection").keyup(function(){
        var year = $("#edityear").val();
        var section = $("#editsection").val();
        var id = $("#edityrid").val();

        if(year !='' && section !='' && id !=''){
          $("#save-changes").removeClass("disabled");

        }
        else{
          $("#save-changes").addClass("disabled");
        }
        return false;
      });

      $("#editsection").keyup(function(){
        var grade = $("#edityear").val();
        var section = $("#editsection").val();
        var id = $("#edityrid").val();
        var datastring = 'action=validate-edit&section='+section+'&id='+id+'&grade='+grade;

        if(section==''){
          $("#hasclass-edit").removeClass("has-success");
          $("#hasclass-edit").removeClass("has-error");
          $("#validate-edit-year").html(' ');
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
                $("#validate-edit-year").html('<i class="glyphicon glyphicon-ok"></i> available');

              }
              else{
                $("#hasclass-edit").addClass("has-error");
                $("#hasclass-edit").removeClass("has-success");
                $("#validate-edit-year").html('<i class="glyphicon glyphicon-remove"></i> not available');
                $("#save-changes").addClass("disabled");
              }
          }
        });
        }
        return false;
      });

      $("#save-changes").click(function(e){
        var year = $("#edityear").val();
        var section = $("#editsection").val();
        var id = $("#edityrid").val();
        var datastring = 'action=edit-year-level&id='+id+'&year='+year+'&section='+section;

        $.ajax({
          type: "POST",
          url: "../php/crud.php",
          data: datastring,
          success: function(result){
            if(result=="success"){
              table.row('.selected').remove().draw(false);
              var string = ['<input type="checkbox" name="year_id" id="year_id" value='+id+'>',year,section];
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
        var id = $('#year_id[type="checkbox"]:checked').map(function(){
                return this.value;
            }).get();
        var datastring = {'action':'delete','id':id,'fieldnameid':'year_id','tablename':'year_level'};
        if(id==''){
          alert("Select at least one year level");
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
      });

     </script>
  </body>
</html>