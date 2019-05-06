<html>
    <head>
		 <script>
        function addfac(){
           
            var fc = window.event.srcElement.value;
            var en = window.event.srcElement.id;
            var sc = window.event.srcElement.name;
            document.location = "facASS.php?emp="+fc+"&enrID="+en+"&scd="+sc; 
        }
        </script>
    </head>

<?php
include "connect.php";
session_start();

	if(isset($_POST["ay_start"]) AND ($_POST["ay_start"] != "")){
        $qay = "AND tblstudent_enrolled.yr_start = '".$_POST["ay_start"]."'";
    }else { $qay = "";}
	
     if(isset($_POST["sem"]) AND ($_POST["sem"] != "")){
        $qsem = "AND tblstudent_enrolled.semester = '".$_POST["sem"]."'";
    }else { $qsem = "";}
	
     if(isset($_POST["grade"]) AND ($_POST["grade"] != "")){
        $qlev = "AND tblstudent_enrolled.grade = '".$_POST["grade"]."'";
    }else { $qlev = "";}
	
     if(isset($_POST["strand"]) AND ($_POST["strand"] != "")){
        $qcrs = "AND tblstudent_enrolled.strand = '".$_POST["strand"]."'";
    }else { $qcrs = "";}
	
     if(isset($_POST["section"]) AND ($_POST["section"] != "")){
        $qsec = "AND tblstudent_enrolled.section = '".$_POST["section"]."'";
    }else { $qsec = "";}
	
     if(isset($_POST["fac"]) AND ($_POST["fac"] != "")){
        $qemp = "AND tblsubject_enrolled.fac_id = '".$_POST["fac"]."'";
    }else { $qemp = "";}
	
    if(isset($_POST["subject"]) AND ($_POST["subject"] != "")){
        $qsub = "AND tblsubject_enrolled.subdesc = '".$_POST["subject"]."'";
    }else { $qsub = "";}

  if (!isset($_POST["ay_start"]) or !isset($_POST["sem"])
     or!isset($_POST["strand"]) or !isset($_POST["grade"])
     or !isset($_POST["section"]) or !isset($_POST["search"]) 
	 or !isset($_POST["fac"]) or !isset($_POST["subject"])
     ){
      
      $ay_start="";
      $sem="";
      $strand="";
      $grade="";
      $section="";
      $search="";
      $fac="";
      $subject="";
  }
       
else{      
        $ay_start = $_POST["ay_start"];
        $sem      = $_POST["sem"];
        $strand   = $_POST["strand"];
        $section  = $_POST["section"];
        $grade =$_POST["grade"];
        $search =$_POST["search"];
        $fac =$_POST["fac"];
        $subject =$_POST["subject"];
}

$sql="SELECT DISTINCT 		tblsubject_enrolled.subdesc,
							tblsubject_enrolled.fac_id,
							
							tblsubject_enrolled.csection,
                            tblstudent_enrolled.semester,
                            tblstudent_enrolled.yr_start,
							tblstudent_enrolled.yr_end,
							tblstudent_enrolled.strand,
                            tblstudent_enrolled.major,
                            tblstudent_enrolled.section,
                            tblstudent_enrolled.grade,
                            tblsubject.subdesc
							
                       FROM tblstudent_enrolled
                 INNER JOIN tblsubject_enrolled 
                        ON  tblstudent_enrolled.advise_id = tblsubject_enrolled.advise_id
				 INNER JOIN tblsubject
                        ON  tblsubject_enrolled.subdesc = tblsubject.subdesc
						AND tblstudent_enrolled.strand = tblsubject.strandcode
					  WHERE tblsubject_enrolled.subdesc IS NOT NULL ".$qemp." ".$qsub." ".$qay." ".$qsem." ".$qcrs." ".$qlev." ".$qsec;

$result=mysqli_query($con,$sql);
$trows = mysqli_num_rows($result);
?>

<center>
<p><?php echo $trows;?> record found</p>
            
    <?php
    if ($trows > 0) {
	$row = null;
    ?>
    
    
<table class = "studrec" cellspacing = "0" width = "97%" border = "1">
  <tr>
		<th scope="col">Subject Code</th>
		<th scope="col">Strand</th>
		<th scope="col">Major</th>
		<th scope="col">Grade</th>
		<th scope="col">Section</th>
		<th scope="col">A.Y.</th>
		<th scope="col">Semester</th>
		<th scope="col">Instructor</th>
		<th scope="col">Assigning</th>
  </tr>

	
<?php  while ($row=mysqli_fetch_assoc($result)) { ?> 
  <tr>
    <td style = "text-align:center;"><b><?php printf ("%s",strtoupper ($row["subdesc"]));?></b></td>
    <td style = "text-align:center;"><?php printf ("%s",strtoupper ($row["strand"]));?></td>
	 <td style = "text-align:center;"><?php printf ("%s",strtoupper ($row["major"]));?></td>
    <td style = "text-align:center;"><?php printf ("%s",strtoupper ($row["grade"]));?></td>
    <td style = "text-align:center;" ><?php printf ("%s",strtoupper ($row["section"]));?></td>
    <td style = "text-align:center;"><?php echo $row["yr_start"]."-".$row["yr_end"];?></td>
    <td style = "text-align:center;"><?php printf ("%s",strtoupper ($row["semester"]));?></td>
    <?php
      $sql_facname = mysqli_query($con,"SELECT * FROM users_tbl WHERE u_id='".$row['fac_id']."'");
      $fetch_facname = mysqli_fetch_assoc($sql_facname);

      if(($row['fac_id']) == 0){
    ?>
      <td style = "text-align:center;"><a target="_blank" href="fac_stud_handle.php?fac=<?php echo $row["fac_id"];?>&ay=<?php echo $row["yr_start"];?>&end=<?php echo $row["yr_end"];?>&sem=<?php echo $row["semester"];?>&sub=<?php echo $row["subdesc"];?>&sec=<?php echo $row["section"];?>">No Instructor</a></td>
    <?php   
      }else{
    ?>
      <td style = "text-align:center;"><a target="_blank" href="fac_stud_handle.php?fac=<?php echo $row["fac_id"];?>&ay=<?php echo $row["yr_start"];?>&end=<?php echo $row["yr_end"];?>&sem=<?php echo $row["semester"];?>&sub=<?php echo $row["subdesc"];?>&sec=<?php echo $row["section"];?>"><?php echo $fetch_facname["fname"].' '.$fetch_facname["lname"];?></a></td>
    <?php   
      }
    ?>
    <td style = "text-align:center;"><a target="_blank" href="enroll_subject_of_stud.php?ay=<?php echo $row["yr_start"];?>&end=<?php echo $row["yr_end"];?>&sem=<?php echo $row["semester"];?>&sub=<?php echo $row["subdesc"];?>&strand=<?php echo $row["strand"];?>&major=<?php echo $row["major"];?>&grade=<?php echo $row["grade"];?>&sec=<?php echo $row["section"];?>">Click Here..To Assign Instructor<a></td>
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