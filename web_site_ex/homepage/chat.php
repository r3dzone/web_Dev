<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];

if(empty($id)){
	$id = "익명";
}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="theme-color" content="gray">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">	
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
				
		<title>정신과 시간의 방</title>
	</head>
	<header>
		<h1 font-family="ITCBLKAD"><a href="/main.php"><img id="main_logo" src="/images/logo.png" alt="정신과시간의방"></a>		
		<label for="menubtn" onclick><span class="material-icons">menu</span>Menu</label>
		<input type="checkbox" id="menubtn"/>
		<nav id="menubar" >
			<ul>
				<li><a class="sel" href="/freeboard.php">FreeBoard</a></li>
				<li><a class="sel" href="/mypage.php">MyPage</a></li>
				<li><a class="sel" href="/chat.php">Chat</a></li>
				<li><a class="sel" href="">Secret</a></li>
				<li><a class="sel" href="">Secret</a></li>
			</ul>
		</nav>
	</header>
	<body>
	
	<ul id = "menu">
		<?php
		session_start();
		if(isset($_SESSION['id'])){
			echo '<li><a href="/logout.php">로그아웃</a></li>';
			echo '<li><a href="/mypage.php">마이페이지</a></li>';
		}else {
			echo '<li><a href="/login.php">로그인</a></li>';
			echo '<li><a href="/signup.php">회원가입</a></li>';
			echo '<li><a href="/findpswd.php">비번찾기</a></li>';
		}
		?>
	</ul>
	<br>
	<br>
			
 <form method="POST" action="./chat_upload.php" name="reply">
	   <div style="border:3px solid gray; width:90%;" >
	    <table border="1" width="100%" align="center" class="table">
				<tr>
					<td>
					<iframe src="/chat_read.php" width="100%" scrolling="yes" align="center" name="chat_read" ></iframe>
					</td>
				</tr>
				<tr>
					<td colspan="5"><textarea style="width:100%;" name="mesg"></textarea>
					</td>
				</tr>		
				<tr>
					<td colspan="1"><input type="submit" name="submit" value="보내기"/></td>
				</tr>		
	   </table>
  </div>
 </form>

</body>

	 <script>
   function chat_refresh(){     
   chat_read.location.href="/chat_read.php";
   }
		 timer = setInterval(function(){
			chat_refresh();
		 }, 3000);
	 </script>
</html>