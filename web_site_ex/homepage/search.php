<?php
session_start();
$id =$_SESSION['id'];
$pg =$_GET['page'];
$search = $_GET['searchcontent'];

if(empty($pg))$pg =0;
/*
if(empty($id)){
echo "<script>alert('권한이 없습니다.')</script>";
	echo '<script>location.href="/main.php"</script>';
}*/
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
	</br>

 <form method="GET" action="./search.php" name="main">
	   <div style="float:right;" >
	    <table>
				<tr>
					<td>글 검색<input type="text" name="searchcontent"/></td>
					<td><input type="submit" name="serch" value="검색"/></td>
				</tr>		
	   </table>
  </div>
 </form>
 
 <div style="width:80%;" >
	    <table border="1" width="100%" align="center" name="table" class="table table-striped">
		<thead>
			<tr>
			<th width="10%">글 번호</th><th width="20%">작성자</th><th width="50%">제목</th><th width="20%">조회수</th>
			</tr>
		</thead>
		<tbody>
<?php
$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");
mysqli_query($conn,"set session character_set_results=utf8;");
mysqli_query($conn,"set session character_set_client=utf8;");
	
	$res = mysqli_query($conn,'select idx,nickname,contentname,secret from fboard_content WHERE contentname LIKE "%'.$search.'%" order by kn desc');
	
	while($row=mysqli_fetch_array($res)){
			
		echo "<tr>";
	    echo "<td width='10%'>";
		echo $row['idx'];
		echo "</td>";
	
		echo "<td width='20%'>";
		echo $row['nickname'];
		echo "</td>";
		
		echo "<td width='50%'>";
		echo "<a href = '/read.php?kn=".$row['idx']."'>".$row['contentname'];
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
	mysqli_close($conn);
?>
			</tbody>
		</table>
		</div>
</body>

</html>
