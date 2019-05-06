<?php
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db= "database";
	
	$connection = mysqli_connect($host,$user,$pwd,$db) or die ("Error Connecting to Database");
	
	/*$host = "localhost";
    $user = "root";
    $password = "";
    $db = "db_records";

    $con = mysql_connect($host,$user,$password) or die ("Error selecting database");

    $seldb = mysql_select_db($db) or die ("Error selecting Database");*/

?>