<?php
  require_once('../process/db_connect.php');

  $id = $_POST['ID']; 
  $pw = $_POST['Password'];
  $name = $_POST['Name'];
  $birthday = $_POST['Date'];
  $tel = $_POST['Tel'];
  $mail = $_POST['InputEmail'];
  //check id and password
  $overlap = "SELECT Id FROM user_info where Id Like '$id'";
  $checking = mysqli_fetch_row(mysqli_query($conn,$overlap));

  if($checking){
    echo "<script>alert('이미 존재하는 아이디입니다. 다시 입력해주세요.');history.back();</script>";
  } 
  else if($pw != $_POST['AgainPassword']){
      echo "<script>alert('비밀번호가 일치하지 않습니다 다시입력해주세요.');history.back();</script>";
  }
  else{
    if(!isset($id) || !isset($pw) || !isset($name) || !isset($birthday)) {
        echo "<script>alert('필수 정보는 꼭 채워주세요!');history.back();</script>";
        exit;
    }

    //make query
    $sql = "INSERT INTO user_info VALUES ('$id', '$name', '$pw', '$birthday', '$tel', '$mail')";
    $result = mysqli_query($conn,$sql);

    if($result){
      session_start(); 
      $_SESSION['user_id'] = $id;
      echo "<script>alert(\"회원가입이 성공적으로 처리되었습니다.\");location.href='../src/login.html';</script>";
    }
    else{
      echo"<script>alert(\"Database Error\". 등록하지 못하였습니다.);history.back()</script>";
    }
  } 
  mysqli_close($conn);
?>  