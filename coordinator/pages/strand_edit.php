<?php include "../templates/templates.php"; 
    headertemplate('Strand'); 
	include "connect.php"; 
	
	if(isset($_POST['btn_save'])){
		$strand = $_POST['strand'];
		$stranddesc   = $_POST['sdesc'];
		
		$result =mysqli_query($con,"SELECT * FROM tblstrand_major WHERE strandcode = '$strand' AND major ='$stranddesc'");
		$num_rows_result = mysqli_num_rows($result);
		
		if ($num_rows_result > 0){
		?>   
			<script type="text/javascript">
				alert("DUPLICATE MAJOR INPUTTED...!!");
			</script>
		<?php
		}else{
			$sql_insert=mysqli_query($con,"INSERT INTO tblstrand_major(major_id,strandcode,major)VALUES('','$strand','$stranddesc')");
			if($sql_insert==true) {
					?>
					<script type="text/javascript">
						alert("Add Strand Successfully");
						window.location = "strand.php";
					</script>
					<?php
			}
		}
		
	}

?>
  <body class="skin-yellow">
    <div class="wrapper">
		 <?php navbar('teachers'); ?>
		 
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Adding Major
          </h1>
        </section>

       <section class="content" style="width: 600px;">
        <div class="box">
            <div class="box-header with-border" style="background-color: #f39c12;color:white;">
              <h3 class="box-title">Strand Major</h3>
            </div>
			
           <div class="login-box-body">
				<form role="form" data-toggle="validator" method="POST" class="form-horizontal">
					<br/>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group col-lg-4 col-md-4 col-sm-11">
								<label for="strandcode">Strand Code: </label>
							</div>
							<div class="form-group col-lg-8 col-sm-11">
								<select class="form-control" name="strand" id="strand" required>
									<option></option>
									<?php
										$res=mysqli_query($con,"select * from tblstrand");
										while($row=mysqli_fetch_array($res)){?>
												<option><?php echo $row['strandcode'];?></option>
									<?php	}
									?>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="form-group col-lg-4 col-md-4 col-sm-11">
								<label for="school">Input Major : </label>
							</div>
							<div class="form-group col-lg-8 col-sm-11">
								<textarea class="form-control" rows="3" id="sdesc" name="sdesc" placeholder="Input Major Description.." required></textarea>
							</div>
						</div>
					</div>
				</div>
					<div class="container">
							<div class="form-group col-md-4 col-sm-11">
								<input type="submit" value="Save" name="btn_save" class="btn btn-primary col-md-offset-4 col-lg-3"/>
								<input type="reset"  value="Cancel" class="btn btn-danger col-md-offset-2 col-lg-3"/>
							</div>
					</div>
					
				</form>
			</div><!-- /.login-box-body -->
            
        </div><!-- /.box -->
    </section>   
              
    
      </div><!-- /.content-wrapper -->

     <?php footertemplate();?>
  </body>
</html>