<?php
session_start();
$id =$_SESSION['id'];
$pg =$_GET['page'];
$search = $_GET['searchcontent'];

if(empty($pg))$pg =0;

if(empty($id)){
echo "<script>alert('권한이 없습니다.')</script>";
	echo '<script>location.href="/main.php"</script>';
}
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="theme-corol" content="gray">
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<title>정시방[자유게시판-검색]</title>
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
}
else {
echo '<li><a href="/login.php">로그인</a></li>';
echo '<li><a href="/signup.php">회원가입</a></li>';
echo '<li><a href="/findpswd.php">비번찾기</a></li>';
}
?>
	</ul>
	</br>

 <form method="POST" action="./search.php" name="main">
	   <div style="float:right;" >
	    <table>
				<tr>
					<td>글 검색<input type="text" name="searchcontent"/></td>
					<td><input type="submit" name="serch" value="검색"/></td>
				</tr>		
	   </table>
  </div>
 </form>
 
 <div style="border:3px solid black; width:80%;" >
	    <table border="1" width="80%" align="center" name="table">
		<tr>
		<td width="10%">글 번호</td><td width="20%">작성자</td><td width="50%">제목</td><td width="20%">조회수</td>
		</tr>
		
		</table>
 </div>
 

  <div style="border:3px solid black; width:80%;" >
	    <table border="1" width="80%" align="center" name="table">


<?php
$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysql_connect($dbHost,$dbId,$dbPw);
$a = mysql_select_db($dbName,$conn);

mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");
	
	$res = mysql_query('select kn,nickname,contentname,secret from hpcontent WHERE contentname LIKE "%'.$search.'%" order by kn desc');
	
	while($row=mysql_fetch_array($res)){
			
		echo "<tr>";
	    echo "<td width='10%'>";
		echo $row['kn'];
		echo "</td>";
	
		echo "<td width='20%'>";
		echo $row['nickname'];
		echo "</td>";
		
		echo "<td width='50%'>";
		echo "<a href = 'http:///~unknown/homepage/read.php?kn=".$row['kn']."'>".$row['contentname'];
		if($row['secret']){
		echo "[비밀글]</a>";
		}else{
		echo "</a>";
		}
		echo "</td>";
		
		echo "<td width='20%'>";
		echo "";
		echo "</td>";
		
	echo "</tr>";
	}
	
	mysql_close($conn);
	
?>
		
	   </table>
  </div>
</body>

</html>
