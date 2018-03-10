<?php  
require_once('../process/db_connect.php');
require_once('../process/authentication.php');
extract($_REQUEST);
$query= "SELECT * FROM imagedb WHERE Id= $id" ;
$result=mysql_query($query,$conn);
$row=mysql_fetch_array($result);
Header("Content-type: image/jpg");
echo $row['image'];
mysql_close();
?>