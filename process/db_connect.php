<?php 
/* Database connection php file */
$db_host = "localhost";
$db_id = "root";
$db_passwd= "security";
$db_name = "gbc_planner";
$conn = mysqli_connect($db_host, $db_id, $db_passwd, $db_name);
if(mysqli_connect_errno($conn)){
	echo "Database connection failed: ". mysqli_connect_error();
}

?>