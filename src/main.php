<?php 
  require_once("../process/authentication.php");
  require_once('../process/db_connect.php');

  $id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width = device - width", initial - scale = "1">
	<title>Joeun</title>
	<link rel = "stylesheet" href = "../css/bootstrap.css">
	<link rel = "stylesheet" href = "../css/codingbooster.css">

</head>
<body>

	<style type = "text/css">
	body
	{
		background-color: #FAFAFA;

	}

	img
	{
		width : 80px;
		height: 80px;
	}
	.navbar-brand{
		background-image: url('../images/off.png'); 
		background-size: cover;
	
		
	}

	.navbar-right
	{
		background-image: url('../images/logout.png'); 
		background-size: auto;


	}
	.btn-image
	{
		background-image: url('../images/off.png'); 
		background-size: auto;


	}

#logoutbutton
   {
      margin:8px 0px 0px 96%;
   }

	#left
	{
		color : black;
		border: white;
		float : left;
		border : lightgray;
	}

	#right
	{
		color : black;
		border: white;
		float : right;
		border : lightgray;

	}
	button{
	  background:#7D7D7D;
	  color:#fff;
	  border:none;
	  position:relative;
	  height:30px;
	  font-size:1em;
	  padding:0.2em;
	  cursor:pointer;
	  transition:800ms ease all;
	  outline:none;
	}
	button:hover{
	  background:#fff;
	  color:#7D7D7D;
	}
	button:before,button:after{
	  content:'';
	  position:absolute;
	  top:0;
	  right:0;
	  height:2px;
	  width:0;
	  background: #7D7D7D;
	  transition:400ms ease all;
	}
	button:after{
	  right:inherit;
	  top:inherit;
	  left:0;
	  bottom:0;
	}
	button:hover:before,button:hover:after{
	  width:100%;
	  transition:800ms ease all;
	}

</style>
<nav class = "navbar navbar-default">
	<div class = "container-fluid">
	<dlv class = "collapsed navbar-brand-collapse" id = "bs-example-navbar-collapse-1">
      <ul class = "nav navbar-nav">
         <li class = "active"><a href = "../src/main.php">&nbsp; TIMELINE &nbsp; <span class = "sr-only"></span></a></li>
         <li><a href= "../src/photo.html">&nbsp; PHOTOS &nbsp;</a></li>
         <li><a href= "../src/map.html">&nbsp; MAP &nbsp;</a></li>
         <li><a href= "../src/callender.html" >&nbsp; CALLENDAR &nbsp;</a></li>  
         <li class = "dropdown"></li>
      </ul>
      <div id="logoutbutton">
         <form name="logout" action="../process/logout.php" method="post">
            <input type="image" src="../images/off.png" alt="logout button" width="35" height="35">
         </form>
      </div>
   </dlv>
   </div>
</nav>
<!--여기까지 네비게이션 바 끝-->

<div class ="row" text-align :left">
	<div class = "col-md-6">
		<section id="cd-timeline">
			<div class="cd-timeline-block" style="vertical-align :middle; text-align :right">                    
				<div class="cd-timeline-img">
					<img src="../images/logo.png" alt="Picture">
				</div> <!-- cd-timeline-img -->
				<div class="cd-timeline-content" style="vertical-align :middle;
                     text-align     :left">
                    <?php
                     require_once("../process/db_connect.php");
                     $sql = 'select title, content, w_date from userPlan';
                     $result = mysqli_query($sql, $db); 
                     $row = mysqli_fetch_assoc($result);

                    ?> <!--여기까지가 수정한 부분... 그 이상 다시 해봐야.-->	
					<h2>Title of section 1</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
					<a href="#" class="cd-read-more">Read more</a>
					<span class="cd-date">Jan 14</span>
				</div> <!-- cd-timeline-content -->
			</div> <!-- cd-timeline-block -->
			<div class="cd-timeline-block"></div>
		<!-- ... -->
		</section>
	</div>

	<!-- timeline에서 오른쪽 반 페이지에 해당하는 부분-->
	<div class = "col-md-6">
		<table  width="400" border="0" cellspacing="0">
    		<div class = "container">
   				<div class = "form-group text-center" name = "right">
    				<form name = "saving" action ="../process/save_plan.php" method = "post">
    				<tr>
    					<th scope="row"><label for="uTitle">제목</label></th>
    					<td class="title"><input type="text" style="border:none" name="uTitle" id="uTitle"></td>
    				</tr>
        			<tr>
        				<th scope="row"><label for="uContent">내용 &nbsp;</label></th>
        				<td><textarea style="border: none" name="uContent" cols="70" rows="40" id="uContent"></textarea></td>
        			</tr>
					<button type = "submit" name = "save" value = "Save" border = "0">Save </button>
					</form>
    				<form enctype="multipart/form-data" accept = "image/jpg, image/gif" method="POST" action = "../process/save_img.php">
    					<input type=hidden name=mode value=insert>
						<table>
						<tr> <td>올릴 이미지: </td>
						<td><button type="file" name="images" accept = "image/jpg, image/gif">파일 선택</button></td></tr>
						<tr> <td colspan = 2>
						<input type='submit' value='이미지 전송 '></td></tr>
						</table>
    					<!--<button type = "file" accept = "image/jpg, image/gif">파일 선택</button>-->
    				</form>
				</div>
			</div>
		</table>
	</div>
</div>

<footer style = "background-color:  #DAD9D9; color: #000000">
	<div class = "row">
		<div class = "col-sm-2" style ="text-align: center;"><h5>Copyright &copy; 2018</h5>
			<h5>GHOST 24 </h5></div>
		<div class = "col-sm-4"><h4>developer</h4><p>김수용 유진주 정혜진 천재홍</p></div>
		<div class = "col-sm-30" style = "text-align: center;"><h5>Joeun, for schedule </h5>
		</div>
	</div>
</div>
</footer>

<script src = "http://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src = "js/bootstrap.js"></script> 
</body>
</html>






