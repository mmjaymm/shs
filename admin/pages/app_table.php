	<html>
	<?php
	include "connect.php";
	session_start();

		//	clicking reports 
		if(isset($_POST['btnreport'])){
			if(empty($_POST['date_app']) AND empty($_POST['strand'])){
				?>
					<script>
						window.location = "print_preview_app.php?opt=all";
					</script>
				<?php
			}else if(empty($_POST['strand'])){
				$ndate_app = date("m/d/Y", strtotime($_POST["date_app"]));
				?>
					<script>
						window.location = "print_preview_app.php?opt=date_val&date=<?php echo $ndate_app;?>";
					</script>
				<?php
			}else if(empty($_POST['date_app'])){
				$strand = $_POST['strand'];
				?>
					<script>
						window.location = "print_preview_app.php?opt=strand&strand=<?php echo $strand;?>";
					</script>
				<?php
			}else{
				?>
					<script>
						alert("Invalid 2 Fields Selected");
						window.location = "app_table.php";
					</script>
				<?php
			}
		}
		
		
		if(isset($_POST["date_app"]) AND ($_POST["date_app"] != "")){
			$ndate_app = date("m/d/Y", strtotime($_POST["date_app"]));
			$qay = "AND tblapplicant_validate.date_val = '".$ndate_app."'";
		}else { $qay = "";}
		
		if(isset($_POST["strand"]) AND ($_POST["strand"] != "")){
			$qstrand = "AND tblapplicant_validate.strand = '".$_POST["strand"]."'";
		}else { $qstrand = "";}
		
		 if(isset($_POST["remarks"]) AND ($_POST["remarks"] != "")){
			$qsem = "AND tblapplicant_validate.remarks = '".$_POST["remarks"]."'";
		}else { $qsem = "";}
		

	  if (!isset($_POST["date_app"]) or !isset($_POST["remarks"])
		  or !isset($_POST["strand"])){
		  
		  $date_app="";
		  $remarks="";
		  $strand="";
	  }
		   
	else{      
			$date_app = $_POST["date_app"];
			$remarks      = $_POST["remarks"];
			$strand      = $_POST["strand"];
	}
	
	$order = "ORDER BY tblapplicant.lname ASC";
	
	$sql="SELECT * FROM tblapplicant INNER JOIN tblapplicant_validate
			ON tblapplicant.appid = tblapplicant_validate.appid WHERE tblapplicant_validate.appid IS NOT NULL ".$qay."".$qsem."".$qstrand."".$order;

	//$sql="SELECT * FROM tblapplicant INNER JOIN tblapplicant_validate
	//		ON tblapplicant.appid = tblapplicant_validate.appid".$qay."".$qsem;
	
	$result=mysqli_query($con,$sql);
	$trows = mysqli_num_rows($result);
	?>

	<center>
		<h3 style='color:red;'><?php echo $trows;?> record found</h3>
				
		<?php
		if ($trows > 0) {
		$row = null;
		?>
		<table class = "studrec" cellspacing = "0" width = "97%" border = "1">
		  <tr>
				<th scope="col">APP. NO.</th>
				<th scope="col">NAME</th>
				<th scope="col">STRAND</th>
				<th scope="col">SCHOOL</th>
				<th scope="col">TYPE</th>
				<th scope="col">ADDRESS</th>
				<th scope="col">MOBILE NUMBER</th>
				<th scope="col">DATE VALIDATED</th>
		  </tr>

			
		<?php  while ($row=mysqli_fetch_assoc($result)) { ?> 
		  <tr>
			<td style = "text-align:center;"><?php echo $row["appid"];?></td>
			<td style = "text-align:left;"><b><?php echo strtoupper($row["lname"]."</b>, ".$row["fname"]." ".$row["mname"]);?></td>
			<td style = "text-align:left;" ><?php echo $row["strand"];?></td>
			<td style = "text-align:left;" ><?php echo $row["school"];?></td>
			<td style = "text-align:left;" ><?php echo $row["school_type"];?></td>
			<td style = "text-align:left;" ><?php echo strtoupper($row["city"].", ". $row["province"]);?></td>
			<td style = "text-align:center;" ><?php echo $row["contact"];?></td>
			<td style = "text-align:center;" ><?php echo $row["date_val"];?></td>
		  </tr>
		<?php	} ?>
		</table>
	</center>
	<?php 
	}
	// Free result set
	mysqli_free_result($result);

	mysqli_close($con);
?>