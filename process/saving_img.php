<?php 
  require_once("../process/authentication.php");
  require_once('../process/db_connect.php');

  $id = $_SESSION['user_id'];

 extract($_REQUEST);
 $filename = $_FILES['images'];
 $handle = fopen($filename,"rb");
 $size = GetImageSize($_FILES['images']);
 $width = $size[0];
 $height = $size[1];
 $imageblob = addslashes(fread($handle, filesize($filename)));
$filesize = $filename;
fclose($handle);
 //메모리 오류 방지
ini_set("memory_limit" , -1);
 $query= "INSERT INTO imagedb (Image,Width,Height, File_size) VALUES ('$imageblob','$width','$height','$filesize')" ;
 $result=mysqli_query($query,$connect );
 echo "<script>location.href='../src/images_list.php';</script>";
?>