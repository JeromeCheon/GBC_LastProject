<?php 
/*This is login php. To do this process, have to connect with MySQL*/
// in local host
	require_once('../process/db_connect.php');
  $id = $_POST['userID'];
  $pw = $_POST['userPassword'];


/* check ID and Password*/
	if(!isset($id) || !isset($id)){
		echo "<script>alert('아이디와 비밀번호가 유효하지 않습니다.'<br> '정확히 입력해주세요.');history.back();</script>";
		exit;
	}
  //make query
  	$sql = "SELECT * FROM user_info WHERE Id = '$id' AND Password = '$pw'";
  	$result = mysqli_query($conn,$sql);

  	if($result){
      //Login fail
      	if(mysqli_num_rows($result) == 0){
   			echo "<script>alert(\"아이디와 비밀번호 정보가 일치하지 않습니다.\");history.back()</script>";
      	}
      //Login success
      	else{
           session_start(); 
			    $_SESSION['user_id'] = $id;
			    echo"<script>location.href='../src/main.php';</script>";
      	}
  	}
  	else{
      echo"<script>alert(\"Database Error\");history.back()</script>";
  	}

  	mysqli_close($link);
?>
