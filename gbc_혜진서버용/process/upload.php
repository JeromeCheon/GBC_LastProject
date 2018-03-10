<?php

session_start(); // 세션


if($_SESSION['Id']==null) { // 로그인 하지 않았다면
	echo "<script>window.alert('login please');</script>"; // 잘못된 아이디 또는 비빌번호 입니다
   echo "<script>location.href='../src/login.html';</script>";


}else{ // 로그인 했다면

require_once("db_connect.php");


$content = $_POST['content'];
$id = $_SESSION['Id'];
$date = date("Y-m-d");



if($content==NULL){
	$empty2 = "내용을 입력해주세요.";
	?>

	<script>
		alert("<?php echo $empty2 ?>");
		history.back();
	</script>

<?php

}

else{


$qry = "INSERT INTO board VALUES (NULL,'$content', '$date', '$id')";


$result = mysqli_query($con,$qry);





	if($result) { // query가 정상실행 되었다면,
		$msg = "정상적으로 글이 등록되었습니다.";
		$replaceURL = '../src/main.php';
	} else {
		$msg = "글을 등록하지 못했습니다.";
?>
	
	<script>
		alert("<?php echo $msg ?>");
		history.back();
	</script>

<?php
	}

?>

<script>
	alert("<?php echo $msg?>");
	location.replace("<?php echo $replaceURL ?>");
</script>

<?php
}
}
?>