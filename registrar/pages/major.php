
<?php  
 include "connect.php";  
 $output = '';  
 $sql = "SELECT * FROM tblstrand_major where strandcode = '".$_POST['keyword']."'";  
 $result = mysqli_query($con, $sql);  
 $num = mysqli_num_rows($result);

	$output = '<option value=""></option>';
	
	if($_POST['keyword'] == ""){
		$output = '<option value=""></option>';
	}else if($num == 0){
		$output = '<option value="null">NULL</option>'; 
	}else{
		while($row = mysqli_fetch_array($result))  
			 {  
				  $output .= '<option value="'.$row["major"].'">'.$row["major"].'</option>';  
			 }
	}
   
 echo $output;  
 ?> 