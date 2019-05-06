<?php include "../templates/templates.php"; 
        headertemplate('Schedule | Administrator'); ?>

  <body class="skin-green">
    <div class="wrapper">
      
     <?php navbar('subjectschedule'); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Schedule
          </h1>
        </section>

       <section class="content">
        <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
              <div class="box-tools pull-right">
                <button class="btn btn-flat btn-primary"  data-toggle="tooltip" title="Create Schedule" id="create">Create Schedule</button>
                 <button class="btn btn-flat btn-success"  data-toggle="tooltip" title="View Schedule" id="view">View Schedule</button>
                 <button class="btn btn-flat btn-default"  data-toggle="tooltip" title="Cancel Create Schedule" id="cancel" style="display:none">Cancel</button>
                  <button  id="print-sched" data-toggle="tooltip" title="Print Schedule" class="btn btn-default"><i class="fa fa-print"></i> Print</a>  
              </div>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-12">
                  <div class="col-xs-2">
                    <label>School Year</label>
                    <input type="text" class="form-control" id="sy" placeholder="Input year eg.2014">
                  </div>
                  <div class="col-xs-2">
                    <h3 id="sy2"></h3>
                  </div>
                  <div class="col-xs-4">
                    <label>Year Level</label>
                    <select class="form-control" id="year_level"></select>
                  </div>
                  <div class="col-xs-3" id="createsched" style="display:none">
                    <label>Room</label>
                    <div class="input-group input-group-sm">
                    <input type="text" class="form-control" id="room" placeholder="input room">
                    <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="button" id="generateschedule">Generate Schedule</button>
                    </span>
                  </div>
                  </div>
                </div>
                <br><br><br><br>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="col-xs-12">
                      <div id="results"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- /.box-body -->
            
          </div><!-- /.box -->
       </section>   
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
     <script type="text/javascript">


      $(document).ready(function(){
        var datastring = 'action=dropdown&tablename=year_level';

        $.ajax({
          type:"POST",
          url: "../php/crud.php",
          data: datastring,
          success: function(data){
            $("#year_level").html(data);
          }
        });

        return false;
      });
     $("#sy").forceNumeric();

     $("#sy").keyup(function(){
        var sy1 =  $("#sy").val();
        var sy2 = sy1 *2/2+1;
        var schoolyear = sy1+'-'+sy2;

        if(sy1==''){
          $("#sy2").html('');
        }
        else{
          $("#sy2").html('-'+sy2);
        }
        
        return false;
     });

     $("#create").click(function(){
        var sy1 =  $("#sy").val();
        var sy2 = sy1 *2/2+1;
        var schoolyear = sy1+'-'+sy2;
        var year = $("#year_level").val();


        if(sy1==''){
          alert('School Year Required');
        }
        else if(year==0){
          alert('Year Level Required');
        }
        else{
          $("#createsched").show();
          $("#create").hide();
          $("#view").hide();
          $("#cancel").show();
          $("#print-sched").hide();
        }

     });

     $("#generateschedule").click(function(){
        var sy1 =  $("#sy").val();
        var sy2 = sy1 *2/2+1;
        var schoolyear = sy1+'-'+sy2;
        var year = $("#year_level").val();
        var room = $("#room").val();
        var datastring = 'action=generate-schedule&sy='+schoolyear+'&year='+year+'&room='+room;
         if(sy1==''){
          alert('School Year Required');
        }
        else if(year==0){
          alert('Year Level Required');
        }
        else if(room==''){
          alert("Room Required");
        }
        else{
          $.ajax({
          type:"POST",
          url: "../php/crud.php",
          data: datastring,
          success: function(result){
            $("#results").html(result);
          }
        });
        }
        

        return false;
     });

      $("#cancel").click(function(){
          $("#createsched").hide();
          $("#create").show();
          $("#view").show();
          $("#cancel").hide();
          $("#print-sched").show();

     });

      function updateteacher(sched_id){
        var teach_id = $('#selteacher option:selected').val();
        alert(sched_id+' '+teach_id);

        e.preventDefault();
      }



     </script>
  </body>
</html>