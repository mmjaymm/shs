<?php  
	include "../pages/connect.php";

             $sql_num_app = mysqli_query($con,"SELECT * FROM tblapplicant");
            $num_app = mysqli_num_rows($sql_num_app);

             echo $num_app;
?>