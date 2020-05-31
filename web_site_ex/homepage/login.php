<?php
session_start();
$pswd = $_POST['password'];
$id = $_POST['id'];
$cnt = $_POST['cnt'];
$correctpswd;

if(!empty($id)){
echo "<script>alert('이미 로그인 되어있습니다.')</script>";
	echo '<script>location.href="/main.php"</script>';
}

$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query("set session character_set_connection=utf8;");

mysqli_query("set session character_set_results=utf8;");

mysqli_query("set session character_set_client=utf8;");
	
	$res = mysqli_query($conn,'select id,password,nickname from user_info where id = "'.$id.'";');
	while($row=mysqli_fetch_array($res)){
		$correctpswd = $row['password'];
		$nick = $row['nickname'];
		break;
	}
	
	mysqli_close($conn);

if($cnt!=0 && empty($correctpswd)){
	echo "존재하지 않는 id입니다.";
}else if(!($id == '')&&$cnt!=0 && hash("sha256",$pswd) == $correctpswd){
	echo "logined!";
	$_SESSION['id'] = $id;
	$_SESSION['nick'] = $nick;
	echo '<script>location.href="/main.php"</script>';
}else if($cnt != 0){
	echo "wrong Password</br>";
}
$cnt ++;
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
		<title>[로그인]정신과 시간의 방</title>
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
			echo '<li><a href="/signup.php">회원가입</a></li>';
			echo '<li><a href="/findpswd.php">비번찾기</a></li>';
		}
		?>
	</ul>
	<br>
	<br>
	<div style="width:550px;" >
	<table border="1" width="550px" height="100px" align="center" class="table">
	 <form method="POST" action="" name="form">
	 <input type="hidden" name="cnt" value="<?=$cnt?>">
		<tr>
		<td>LOG-IN</td>
		</tr>
		<tr>	
		<td><input type="text" name="id" align="center"/></td>
		</tr>
	  <tr>	
	  <td><input type="password" name="password"align="center"/></td>
	  </tr>
	  <tr>
	  <td><input type="submit" name="itext" value="log in" align="center"/></td>
	  </tr>
        </form>
		</table>
		</div>
	</body>

</html>
