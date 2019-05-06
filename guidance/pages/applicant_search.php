<?php  
 include "connect.php"; 
 
 <?php
  
  $request=$_POST['keyword'];
  
  $query = "SELECT * FROM tblapplicant WHERE appid LIKE '%"$request"%'";
  $output=mysqli_query($con,$query);

  
	echo '<table id="applicantrecord" class="table table-bordered table-hover">';
	echo '<thead>';
	echo '<th>App No.</th>';
	echo '<th>LName</th>';
	echo '<th>FName</th>';
	echo '<th>MName</th>';
	echo '<th>Sex</th>';
	echo '<th>Street</th>';
	echo '<th>City</th>';
	echo '<th>Applied Date</th>';
	echo '<th colspan="2">Action</th>';
	echo '</thead>';
	
	echo '<tbody>';

	while($row=mysqli_fetch_array($sql_sel)){
	echo '<tr>';
	echo '<td>'.$row['apid'].'</td>';
	echo '<td>'.$row['lname'].'</td>';	
	echo '<td>'.$row['fname'].'</td>';	
	echo '<td>'.$row['mname'].'</td>';	
	echo '<td>'.$row['gender'].'</td>';	
	echo '<td>'.$row['street'].'</td>';	
	echo '<td>'.$row['city'].'</td>';	
	echo '<td>'.$row['province'].'</td>';	
	echo '<td>'.$row['date'].'</td>';
	echo '<td><a class="btn btn-link" href="applicant_validate.php?opt=view&id='.$row['appid'].'">View</a></td>';
	echo '<td><a class="btn btn-link" href="applicant_validate.php?opt=val&id='.$row['appid'].'">Validate</a></td>';
	echo '</tr>'; 
	};
	
	echo '</tbody>';
	echo '</table>';
				  
 ?>  