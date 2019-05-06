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
$id = $_SESSION['id'];

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
	   
      if(isset($_POST["major"]) AND ($_POST["major"] != "")){
        $qmajor = "AND tblstudent_enrolled.major = '".$_POST["major"]."'";
    }else { $qmajor = "";}

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
/*$sql = 	"SELECT DISTINCT tblsubject_enrolled.subdesc, tblstudent_enrolled.strand, tblstudent_enrolled.major, 
			tblstudent_enrolled.grade, tblstudent_enrolled.semester,  tblstudent_enrolled.yr_start,
			FROM tblsubject_enrolled 
			INNER JOIN tblsubject_enrolled ON 
			tblsubject_enrolled.advise_id = tblstudent_enrolled.advise_id 
			AND tblsubject_enrolled.shs_id = tblstudent_enrolled.shs_id 
			AND tblsubject_enrolled.csection = tblstudent_enrolled.section WHERE stats = 1";
			*/
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
					  WHERE tblsubject_enrolled.subdesc IS NOT NULL AND tblsubject_enrolled.fac_id='$id'"
						 .$qemp." ".$qsub." ".$qay." ".$qsem." ".$qcrs." ".$qlev." ".$qsec." ".$qmajor;

//-=========================================================================//
//             NUMBER OF STUDENT
//-=========================================================================//
$result1=mysqli_query($con,$sql);
$row4=mysqli_fetch_assoc($result1);

$sql_class_record = mysqli_query($con,"SELECT * FROM tblsubject_enrolled
                                    INNER JOIN tblstudent_enrolled
                                    ON tblstudent_enrolled.advise_id = tblsubject_enrolled.advise_id
                                    AND tblstudent_enrolled.shs_id = tblsubject_enrolled.shs_id
                                    WHERE subdesc = '".$row4["subdesc"]."'
                                    AND strand = '".$row4["strand"]."'
                                    AND grade = '".$row4["grade"]."'
                                    AND major = '".$row4["major"]."'
                                    AND semester = '".$row4["semester"]."'
                                    AND yr_start = '".$row4["yr_start"]."'
                                    AND yr_end = '".$row4["yr_end"]."'
                                    AND csection = '".$row4["section"]."'");
$row_num=mysqli_num_rows($sql_class_record);
//-=========================================================================//
//             NUMBER OF STUDENT
//-=========================================================================//


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
    <!--th scope="col">No. of Student</th-->
		<th scope="col">Action</th>
  </tr>

	
<?php  while ($row=mysqli_fetch_assoc($result)) { ?> 
  <tr>
    <td style = "text-align:center;">
																						<?php printf ("%s",strtoupper ($row["subdesc"]));?></td>
    <td style = "text-align:center;"><?php printf ("%s",strtoupper ($row["strand"]));?></td>
	<td style = "text-align:center;"><?php printf ("%s",strtoupper ($row["major"]));?></td>
    <td style = "text-align:center;"><?php printf ("%s",strtoupper ($row["grade"]));?></td>
    <td style = "text-align:center;" ><?php printf ("%s",strtoupper ($row["section"]));?></td>
    <td style = "text-align:center;"><?php echo $row["yr_start"]."-".$row["yr_end"];?></td>
    <td style = "text-align:center;"><?php printf ("%s",strtoupper ($row["semester"]));?></td>
    <!--td style = "text-align:center;"><?php //echo  $row_num;?></td-->
	<td style = "text-align:center;"><a target="_blank" href="enroll_subject_of_stud.php?ay=<?php echo $row["yr_start"];?>
																							&end=<?php echo $row["yr_end"];?>
																							&sem=<?php echo $row["semester"];?>
																							&sub=<?php echo $row["subdesc"];?>
																							&strand=<?php echo $row["strand"];?>
																							&major=<?php echo $row["major"];?>
																							&grade=<?php echo $row["grade"];?>
																							&sec=<?php echo $row["section"];?>">View Students</a></td>
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