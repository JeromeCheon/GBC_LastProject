<?php  
//photo.html -> photo.php
require_once('../process/db_connect.php');
require_once('../process/authentication.php');
$query= "SELECT Id, Width, Height FROM imagedb order by Id DESC";
$result=mysqli_query($query,$conn);
$row=mysql_fetch_array($result);
echo( "<table bordr=1 width=90% align=center>
<tr> <td>이미지</td></tr>");
 
while($row){
echo("<tr><td><a href=../process/img_view.php?id=$row['Id']<img src=../process/img_view.php?id=$row['Id'] 
width=$row['Width'] height=$row['Height']></a></td>");
$row=mysqli_fetch_array($result);
}
echo("</table>");
?>