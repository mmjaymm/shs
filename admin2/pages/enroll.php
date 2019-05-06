<?php include "../templates/templates.php"; 
        headertemplate('Enroll Students | Administrator'); ?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('enroll'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Enroll Students
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <div class="row">
                <div class="col-xs-12">
                  <div class="col-xs-2">
                    <input type="text" class="form-control" name="sy" id="sy" style="width:110%" placeholder="Input School Year">
                  </div>
                  <div class="col-xs-1">
                   <h4 id="sy2"></h4>
                  </div>
                  <div class="col-xs-3" id="yr" style="display:none">
                    <select class="form-control" id='year'>
                      </select>
                  </div>
                  <div class="col-xs-2">
                    <button class="btn btn-flat btn-primary" data-toggle="tooltip" title="Search Students" id="ok">OK</button>
                    <button class="btn btn-flat btn-danger" data-toggle="tooltip" title="Cancel" id="x" style="display:none"><i class="glyphicon glyphicon-remove"></i></button>
                  </div>
                </div>
              </div>
              <div class="box-tools pull-right">
                <button class="btn btn-flat btn-primary" data-toggle="tooltip" title="Add Students to Year Level" id="add">Enroll Student(s)</button>
                 <button class="btn btn-flat btn-success" data-toggle="tooltip" title="View Enroll Students" id="view">View Enrolled Student</button>
              </div>
            </div>
            <div class="box-body">
              <table id="studenttable" class="table table-bordered table-hover">
                <thead>
                  <th>Select/Grade</th>
                  <th>Student ID Number</th>
                  <th>Name</th>
                </thead>
                <tbody></tbody>
              </table>
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->
       </section>   


              <div class="view-modal">
                  <div class="modal fade" id="view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">View Enrolled Students</h4>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-xs-12">
                              <div class="col-xs-2">
                                <input type="text" class="form-control" name="sy" id="sy3" style="width:110%" placeholder="Input School Year">
                              </div>
                              <div class="col-xs-2">
                               <h4 id="sy4"></h4>
                              </div>
                              <div class="col-xs-3">
                                <select class="form-control" id='year1'>
                                  </select>
                              </div>
                              <div class="col-xs-2">
                                <button class="btn btn-flat btn-primary" data-toggle="tooltip" title="Search Students" id="search">Search</button>
                              </div>
                              <div class="col-xs-12">
                                <table id="studenttable2" class="table table-bordered table-hover">
                                  <thead>
                                    <th>Select</th>
                                    <th>Student ID Number</th>
                                    <th>Name</th>
                                    <th>Grade</th>
                                  </thead>
                                  <tbody></tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger pull-left" data-toggle="tooltip" title="Remove Student" id="delete"><i class="glyphicon glyphicon-remove" ></i></button>
                          <button  id="print-student" class="btn btn-default"><i class="fa fa-print"></i> Print</a>                
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                </div><!-- /.example-modal -->
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
     <script type="text/javascript">

      var table = $("#studenttable").DataTable();
      var table2 = $("#studenttable2").DataTable();

      $('#studenttable2 tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            
        }
        else {
            //table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        } );

      $(document).ready(function(){
        var datastring = 'action=dropdown&tablename=year_level';

        $.ajax({
              type: "POST",
              data:datastring,
              url:"../php/crud.php",
              success: function(result){
                $("#year, #year1").html(result);
              }
            });
      });

      $("#sy").keyup(function(){
        var sy = $("#sy").val();
        var sy2 = sy * 2/2+1;
        var schoolyear = sy+'-'+sy2;
        if(sy==''){
          $("#sy2").html('');
        }
        else{
          $("#sy2").html('- '+sy2);
        }
        
      });

      $("#sy3").keyup(function(){
        var sy = $("#sy3").val();
        var sy2 = sy * 2/2+1;
        var schoolyear = sy+'-'+sy2;
        if(sy==''){
          $("#sy4").html('');
        }
        else{
          $("#sy4").html('- '+sy2);
        }
        
      });

      $("#ok").click(function(){
        var sy = $("#sy").val();
        var sy2 = sy * 2/2+1;
        var schoolyear = sy+'-'+sy2;
        var datastring = 'action=getstudentbyyear&sy='+schoolyear;
        if(sy==''){

        }
        else{
          $.ajax({
              type: "POST",
              data:datastring,
              url:"../php/crud.php",
              dataType: "json",
              success: function(result){
                table.rows().remove().draw();
                table.rows.add(result).draw();
                $("#yr").show();
                $("#x").show();
              }
            });
        }

        
        return false;
      });

      $("#x").click(function(){
        $("#yr").hide();
        $("#x").hide();
        table.rows().remove().draw();
        document.getElementById('sy').value='';
        $("#sy2").html('');
      });

      $("#sy, #sy3").forceNumeric();

      $("#add").click(function(){
        var year = $("#year").val();
        var sy = $("#sy").val();
        var sy2 = sy * 2/2+1;
        var schoolyear = sy+'-'+sy2;
        var id = $('#stud_id[type="checkbox"]:checked').map(function(){
                return this.value;
            }).get();
        var datastring = {'action':'enroll-student','sy':schoolyear,'year':year,'stud_id':id};
        if(year==0){
          alert("Year Level is required");
        }
        else if(id==null){
          alert("Please select at least one student to enroll");
        }
        else{
          $.ajax({
            type: "POST",
            url:"../php/crud.php",
            data: datastring,
            dataType:'json',
            success:function(result){
              table.rows().remove().draw();
              table.rows.add(result).draw();
            }
          });
        }
        return false;
      });


      $("#view").click(function(){
        $("#view-modal").modal('show');
      });

      $("#search").click(function(){
        var year = $("#year1").val();
        var sy = $("#sy3").val();
        var sy2 = sy * 2/2+1;
        var schoolyear = sy+'-'+sy2;
        var datastring = 'action=getstudentbyyearsy&sy='+schoolyear+'&year='+year;
        if(sy=='' && year ==0){

        }
        else{
          table2.rows().remove().draw();
          $.ajax({
              type: "POST",
              data:datastring,
              url:"../php/crud.php",
              dataType: "json",
              success: function(result){
                
                table2.rows.add(result).draw();
              }
            });
        }

        
        return false;
      });

      $("#delete").click(function(){
        var id = $('#stud_id[type="checkbox"]:checked').map(function(){
                return this.value;
            }).get();
        var datastring = {'action':'delete','tablename':'student_year_level','id':id,'fieldnameid':'syl_id'};
        var con = confirm("Are you sure you want to delete this item(s)?");
        if(con==true){
          $.ajax({
          type:"POST",
          url:"../php/crud.php",
          data: datastring,
          success: function(result){
            if(result=="success"){
              table2.rows('.selected').remove().draw();
            }
            else{
              alert("Some items is not deleted");
            }
          }
        });
        }
        
        return false;
      });

        $("#print-student").click(function(){
        var year = $("#year1").val();
         var sy = $("#sy3").val();
        var sy2 = sy * 2/2+1;
        var schoolyear = sy+'-'+sy2;
        window.open('student-print.php?year_id='+year+'&sy='+schoolyear);
      });

     </script>
  </body>
</html>