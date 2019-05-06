<!DOCTYPE html>
<html>
	<head>
	<?php include "header.php";?>
	<!---Calendar-->
	<link href="css/jquery-ui.css" rel="Stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js" ></script>

	<script language="javascript">
	$(document).ready(function () {
		$("#txtdate").datepicker({
			minDate: 0, 
			beforeShowDay: $.datepicker.noWeekends 
		});
	});
	</script>

	<?php
 	 	include "connect.php";

		$sql_select = mysqli_query($con,"SELECT MAX(appid) FROM tblapplicant_info");
		$rows_student = mysqli_fetch_array($sql_select);
		$app_id = $rows_student[0] + 1;
	?>

	<script type="text/javascript" language="javascript">
		function calcAge(dtFrom, dtTo)
		{
			var a = dtTo.getDate() + (dtTo.getMonth() + (dtTo.getFullYear() - 1700) * 16) * 32;
			var b = dtFrom.getDate() + (dtFrom.getMonth() + (dtFrom.getFullYear() - 1700) * 16) * 32;
			var x = Math.floor((a - b) / 32 / 16);
			return x < 0 ? null : x;
		}
		function calc(){
			var dtTo = new Date(document.getElementById('current_date').value);
			var dtFrom = new Date(document.getElementById('bday').value);
			document.getElementById('age').value = calcAge(dtFrom, dtTo);

		var age = document.getElementById('age').value;

		/*if(age <= 15){
				alert("Under Age");
				document.getElementById("bday").value = "";
				document.getElementById("age").value = "";
			}
			return false;*/
		}

	</script>
	<!-- Javascript -->
    <script>
          function maxLengthCheck(object)
			  {
			    if (object.value.length > object.maxLength)
			      object.value = object.value.slice(0, object.maxLength)
			  }
    </script>
     <script>
          $(function() {
            $( "#bday" ).datepicker();
         });
    </script>
	  
	</head>
	
	<body class="login-page">
		<div class="container">
			<div class="login-logo">
				<img src="images/logo.png" width="150px" class="img-fluid" alt="Responsive image">
				<a href="index.php"><b>Application Form</b></a>
			</div><!-- /.login-logo -->
		 
		  <form role="form" data-toggle="validator" method="POST" class="" action="applicant_save.php">
		  	<div class="row">
			<div class="login-box-body">
				<div class="box-header with-border" style="color:white; background-color: #dd4b39;">
				  <h3 class="box-title"><b>Applicant Information :</b></h3>
				</div>
				<br/>
				
					<div class="container">
						<div class="form-group col-md-4 col-sm-11">
							<label for="lname">LAST NAME : </label>
							<input type="text" class="form-control" id="lname" name="lname" placeholder="Input Last Name.." required>
						</div>
						
						<div class="form-group col-md-4 col-sm-11">
							<label class="label-control" for="fname">FIRST NAME : </label>
							<input type="text" class="form-control" id="fname" name="fname" placeholder="Input First Name.." required>
						</div>
						
						<div class="form-group col-md-4 col-sm-11">
							<label for="mname">MIDDLE NAME : </label>
							<input type="text" class="form-control" id="mname" name="mname" placeholder="Input Middle Name.." required>
						</div>
					</div>
					
					<div class="container">
						<div class="form-group col-md-1">
							<label for="gender">GENDER:</label>
						</div>
						<label class="col-md-1"><input type="radio" name="sex" value="female" required>Female</label>
						<label class="col-md-1"><input type="radio" name="sex" value="male" required>Male</label>
					</div>
					
					<div class="container">
						<div class="form-group col-md-4 col-sm-11">
							<label for="bday">BIRTH DATE : </label>
							<input type='text' id='current_date' value='<?php echo date("m/d/Y"); ?>' hidden/>
							<input type="date" class="form-control" id="bday" onchange="calc();" name="bday" data-date-format="mm-dd-yyyy" required/>
						</div>
						
						<div class="form-group col-md-4 col-sm-11">
							<label for="age">AGE : </label>
							<input type="number" class="form-control" id="age" name="age" placeholder="Age.." readonly required>
							<div class="help-block with-errors"></div>
						</div>
						
						<div class="form-group col-md-4 col-sm-11">
							<label for="contact">MOBILE NUMBER : </label>
							<input type="number" class="form-control" oninput="maxLengthCheck(this)" data-minlength="11"  maxlength="11" data-error="Enter Valid 11 Digit Phone Number" id="contact" name="contact" placeholder="e.g: 09161234567" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					
					<div class="container">
						<div class="form-group col-md-4 col-sm-11">
							<label for="street">STREET ADDRESS : </label>
							<input type="text" class="form-control" id="street" name="street" placeholder="Input Street.." required>
						</div>
						
						<div class="form-group col-md-4 col-sm-11">
							<label for="city">CITY : </label>
							<input type="text" class="form-control" id="city" name="city" placeholder="Input City.." required>
						</div>
						
						<div class="form-group col-md-4 col-sm-11">
							<label for="province">PROVINCE : </label>
							<input type="text" class="form-control" id="province" name="province" placeholder="Input Province.." required>
						</div>
						
						<div class="form-group col-md-4 col-sm-11">
							<label for="school">SCHOOL NAME (Junior High School): </label>
							<textarea class="form-control" rows="3" id="school" name="school"  required></textarea>
						</div>

						<div class="form-group col-md-4 col-sm-11">
							<label for="s_type">SCHOOL TYPE (Private/Public): </label>
							<select class="form-control" id="s_type" name="s_type" required>
								<option></option>
								<option value="Public">Public</option>
								<option value="Private">Private</option>
							</select>
						</div>
						<div class="form-group col-md-4 col-sm-11">
							<label for="lrn">LRN-Number : </label>
							<input type="number" class="form-control" oninput="maxLengthCheck(this)" data-minlength="12"  maxlength="12" data-error="Enter Valid 12 Digit LRN Number" id="lrn" name="lrn" placeholder="e.g: 136850050028" required>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					
					<div class="box-header with-border" style="color:white; background-color: #dd4b39;">
					  <h3 class="box-title"><b>Guardian Information :</b></h3>
					</div>
					<br/>
					<div class="container">
						<div class="form-group col-md-4 col-sm-11">
							<label for="gname">GUARDIAN FULL NAME : </label>
							<input type="text" class="form-control" id="gname" name="gname" placeholder="Input Full Name.." required>
						</div>
						
						<div class="form-group col-md-4 col-sm-11">
							<label for="gcontact">MOBILE NUMBER : </label>
							<input type="number" class="form-control" oninput="maxLengthCheck(this)" data-minlength="11"  maxlength="11" data-error="Enter Valid 11 Digit Phone Number" id="gcontact" name="gcontact" placeholder="e.g: 09161234567" required>

							<div class="help-block with-errors"></div>
						</div>
					</div>
					<br/>
					
					<div class="container">
							<div class="form-group col-md-4 col-sm-11">
								<input type="submit" name="btn_submit" class="btn btn-primary"/>
								<a href="index.php" class="btn btn-danger col-md-offset-4">Cancel</a>
							</div>
					</div>
					
				</form>
			</div><!-- /.login-box-body -->
			</div>
		</div><!-- /.login-box --><br/><br/>
	<?php include "footer.php";?>
	<br/><br/>

	<script>
		$(".only-number").keydown(function (e) {
		// Allow: backspace, delete, tab, escape, enter and .
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
			// Allow: Ctrl+A, Command+A
			(e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) ||
			 // Allow: home, end, left, right, down, up
			(e.keyCode >= 35 && e.keyCode <= 40)) {
			// let it happen, don't do anything
			return;
		}
		// Ensure that it is a number and stop the keypress
			if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
				e.preventDefault();
			}
		});
	</script>
  </body>
</html>