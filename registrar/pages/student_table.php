<?php include "connect.php";;?>
<html>
    <head>
        
    </head>
<?php
    if(isset($_POST['btnprint'])){

		if(isset($_POST["strand"]) AND ($_POST["strand"] != "")){
	        $sql_strand = $_POST["strand"];
	    }else { $sql_strand = "nulls";}

		if(isset($_POST["ay_start"]) AND ($_POST["ay_start"] != "")){
       			 $sql_ay = $_POST["ay_start"];
	    }else { $sql_ay = "nulls";}
		
		if(isset($_POST["shsid"]) AND ($_POST["shsid"] != "")){
	        $sql_id = $_POST["shsid"];
	    }else { $sql_id = "nulls";}
		
	     if(isset($_POST["sem"]) AND ($_POST["sem"] != "")){
	        $sql_sem = $_POST["sem"];
	    }else { $sql_sem = "nulls";}
		
	     if(isset($_POST["grade"]) AND ($_POST["grade"] != "")){
	        $sql_grade = $_POST["grade"];
	    }else { $sql_grade = "nulls";}
		
	     
		
		if(isset($_POST["major"]) AND ($_POST["major"] != "")){
	        $sql_major = $_POST["major"];
	    }else { $sql_major = "nulls";}
		
	     if(isset($_POST["section"]) AND ($_POST["section"] != "")){
	        $sql_section = $_POST["section"];
	    }else { $sql_section = "nulls";}


				?>
					<script>
						window.location = "print_preview.php?ay=<?php echo $sql_ay;?>&shsid=<?php echo $sql_id;?>&sem=<?php echo $sql_sem;?>&grade=<?php echo $sql_grade;?>&strand=<?php echo $sql_strand;?>&major=<?php echo $sql_major;?>&section=<?php echo $sql_section;?>";
					</script>
				<?php
		}
?>

<?php

session_start();
    
    if(isset($_POST["ay_start"]) AND ($_POST["ay_start"] != "")){
        $sql_ay = "AND yr_start = '".$_POST["ay_start"]."'";
    }else { $sql_ay = "";}
	
	if(isset($_POST["shsid"]) AND ($_POST["shsid"] != "")){
        $sql_id = "AND tblstudent_enrolled.shs_id = '".$_POST["shsid"]."'";
    }else { $sql_id = "";}
	
     if(isset($_POST["sem"]) AND ($_POST["sem"] != "")){
        $sql_sem = "AND semester = '".$_POST["sem"]."'";
    }else { $sql_sem = "";}
	
     if(isset($_POST["grade"]) AND ($_POST["grade"] != "")){
        $sql_grade = "AND grade = '".$_POST["grade"]."'";
    }else { $sql_grade = "";}
	
     if(isset($_POST["strand"]) AND ($_POST["strand"] != "")){
        $sql_strand = "AND strand = '".$_POST["strand"]."'";
    }else { $sql_strand = "";}
	
	if(isset($_POST["major"]) AND ($_POST["major"] != "")){
        $sql_major = "AND major = '".$_POST["major"]."'";
    }else { $sql_major = "";}
	
     if(isset($_POST["section"]) AND ($_POST["section"] != "")){
        $sql_section = "AND section = '".$_POST["section"]."'";
    }else { $sql_section = "";}
    
    if (isset($_POST["search"]) && ($_POST["search"] != "") ){
        $qsearch = "AND lastname LIKE '".$_POST["search"]."%'";
    }else { $qsearch = "";}
    
    
    
	if (!isset($_POST["ay_start"]) or !isset($_POST["sem"])
     or!isset($_POST["strand"]) or !isset($_POST["grade"])
     or !isset($_POST["section"]) or !isset($_POST["major"])
	 or !isset($_POST["search"]) or !isset($_POST["shsid"])){
      
      $yr_start ="";
      $sem		="";
      $strand   ="";
	  $major    ="";
      $grade    ="";
      $section  ="";
      $shsid   ="";
	}else{      
        $yr_start = $_POST["ay_start"];
        $sem      = $_POST["sem"];
        $strand   = $_POST["strand"];
		$major    = $_POST["major"];
        $section  = $_POST["section"];
        $grade    = $_POST["grade"];
        $shsid   = $_POST["shsid"];   
	}
  

$quer = "SELECT * FROM tblstudent_enrolled 
        INNER JOIN tblapplicant
        ON tblstudent_enrolled.shs_id = tblapplicant.shs_id
        WHERE stats = 1 ".$sql_ay."".$sql_sem."".$sql_strand."".$sql_major."". $sql_grade."".$sql_section."".$sql_id; 
		
		$resultstud = mysqli_query($con,$quer);
		$trowstud   = mysqli_num_rows($resultstud);
		$rowstud    = mysqli_fetch_assoc($resultstud);    

$query = "SELECT * FROM tblstudent_enrolled";
		$result=mysqli_query($con,$query);
		$trow = mysqli_num_rows($result);
		$row=mysqli_fetch_assoc($result); 
?>
	<body>
		<center>  
			<?php  echo "<h3>$trowstud Record Found</h3>"; ?>
  
				<table class = "studrec" cellspacing = "0" width = "90%" border= "1">
					<tr>
						<th>Student ID</th>
						<th scope="col">Name</th>
						<th scope="col">Strand</th>
						<th scope="col">Major</th>
						<th scope="col">Grade</th>
						<th scope="col">Section</th>
						<th scope="col">Semester</th>
						<th scope="col">Status</th>
						<th scope="col">A.Y.</th>
					</tr>
	<?php 
		$ind = 0;
		if ($trowstud > 0) do{
			$ind++;
    ?>
					<tr>
						<td style = "text-align:center;"><b>CCT-SHS-<?php printf ("%s",strtoupper ($rowstud["shs_id"]));?></b></td>
						<td style = "text-align:center;"><?php printf ("%s",strtoupper ($rowstud["lname"]. ", ".$rowstud["fname"]." ".$rowstud["mname"]));?></td>
						<td style = "text-align:center;"><?php printf ("%s",strtoupper ($rowstud["strand"]));?></td>
						<td style = "text-align:center;"><?php printf ("%s",strtoupper ($rowstud["major"]));?></td>
						<td style = "text-align:center;"><?php printf ("%s",strtoupper ($rowstud["grade"]));?></td>
						<td style = "text-align:center;"><?php printf ("%s",strtoupper ($rowstud["section"]));?></td>
						<td style = "text-align:center;"><?php printf ("%s",strtoupper ($rowstud["semester"]));?></td>
						<td style = "text-align:center;"><?php printf ("%s",strtoupper ($rowstud["reg_status"]));?></td>
						<td style = "text-align:center;"><?php printf ("%s",strtoupper ($rowstud["yr_start"])."-".strtoupper ($rowstud["yr_end"]));?></td>
						<td style = "text-align:center;"><a href="student_subjects_details.php?shsid=<?php echo $rowstud['shs_id'];?>
																						&adv_id=<?php echo $rowstud['advise_id'];?>" target = "_blank">details</a></td>
					</tr>
	<?php	} while ($rowstud=mysqli_fetch_assoc($resultstud)) ?>
				</table>
		</center>
	</body>
</html>