<?php
  require_once('../process/db_connect.php');

  $id = $_POST['id']; //sign up.html에서 지정한 변수이름으로 교체해야.
  $pw = $_POST['pw'];
  $name = $_POST['user_name'];
  $birthday = $_POST['birth'];

  //check id and password 
  if(!isset($id) || !isset($pw) || !isset($name) || !isset($birthday)){
        echo "<script>alert('유효하지 않는 정보입니다!');history.back();</script>";
        exit;
  }

  //make query
  $sql = "INSERT INTO user_info VALUES ('$id', '$name', '$pw', '$birthday')";
  $result = mysqli_query($conn,$sql);

  if($result){
    session_start(); 
		$_SESSION['user_id'] = $id;
    echo "<script>alert(\"회원가입이 성공적으로 처리되었습니다.\");location.href='../src/main.html';</script>";
  }
  else{
      echo"<script>alert(\"Database Error\");history.back()</script>";
  }

  mysqli_close($link);
?>

