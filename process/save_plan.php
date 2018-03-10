<?php 
// 지금 만드는 파일은 save를 눌렀을 때 플랜이 디비에 저장되도록 하는 php 파일. "save_plan.php"
  require_once("../process/authentication.php");
  require_once('../process/db_connect.php');

  $id = $_SESSION['user_id'];
  $title = $_POST['uTitle'];
  $content = $_POST['uContent'];
  $date = date('Y-m-d H:i:s');
  $sql = 'insert into userPlan (writer, title, content, w_date) values("' . $id .'", "'. $title .'", "'. $content .'","' . $date . '")';
  // $result = $db->query($sql);
  $result = mysqli_query($sql, $db);
  if($result){ // 정상 등록 되었으면
  	$reflect = '../src/main.php';
 ?>
  	<script>
  		location.replace("<?php echo $reflect ?>");
  	</script>
  	<?php
  }else{
  		$msg = "등록에 실패하였습니다. ";
  	?>
  		<script>
  			alert("<?php echo $msg ?>");
  			history.back();
  		</script>
  	<?php	
  	}
	?>