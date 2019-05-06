<?php
	require("connect.php");
  
	$request=$_POST['keyword'];
	  
	$query_date="select * from tblapplicant_schedule where date='$request' AND status='0'";
	$output_date = mysqli_query($con,$query_date);
	
	$query_val = mysqli_query($con,"select * from tblapplicant_schedule where date='$request' AND status='0'");
	$fetch_val = mysqli_num_rows($query_val);
	
	if($fetch_val == false){ ?>
		<script type="text/javascript">
			alert("No available schedule");
			document.getElementById("date").value = "";
		</script>
	<?php 
		echo "<h4 style='text-align: center;'>NO AVAILABLE SCHEDULE TRY THE OTHER DATE</h4>";
	}else{
		echo "<h4 style='text-align: center;'>AVAILABLE SCHEDULE</h4>";
		while($fetch = mysqli_fetch_array($output_date))
		{
		?>
			<div class="radio col-md-2 col-sm-4 col-xs-4">
				<label><input type="radio" name="time" class="control-radio" value="<?php echo $fetch['time'];?>"><?php echo $fetch['time'];?></label>
			</div>
		<?php						
		}
	}
 ?>