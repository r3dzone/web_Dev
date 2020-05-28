<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>정신과 시간의 방</title>
	</head>
	<header>
		<h1 font-family="ITCBLKAD"><a href="/main.php"><img src="/images/logo.png" alt="정신과시간의방"></a>
		<nav id="menubar" >
			<ul>
				<li><a class="sel" href="/freeboard.php">FreeBoard</a></li>
				<li>|</li>
				<li><a class="sel" href="/mypage.php">MyPage</a></li>
				<li>|</li>
				<li><a class="sel" href="/chat.php">Chat</a></li>
				<li>|</li>
				<li><a class="sel" href="">Secret</a></li>
				<li>|</li>
				<li><a class="sel" href="">Secret</a></li>
			</ul>
		</nav>
			<label for="menubtn" onclick><span class="material-icons">menu</span></label>
			<input type="checkbox" id="menubtn"/>
	</header>
<body>	
	<ul id = "menu">
<?php
 session_start();
if(isset($_SESSION['id'])){
echo '<li><a href="/logout.php">로그아웃</a></li>';
echo '<li><a href="/mypage.php">마이페이지</a></li>';
}
else {
echo '<li><a href="/login.php">로그인</a></li>';
echo '<li><a href="/signup.php">회원가입</a></li>';
echo '<li><a href="/findpswd.php">비번찾기</a></li>';
}
?>
	</ul>
	</br>
<p>
<img src="/images/welcome.png">
</p>
</body>

</html>
