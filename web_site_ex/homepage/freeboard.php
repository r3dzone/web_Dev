
<?php
session_start();
$id =$_SESSION['id'];
$pg =$_GET['page'];

if(empty($pg))$pg =0;

if(empty($id)){
echo "<script>alert('권한이 없습니다.')</script>";
	echo '<script>location.href="/main.php"</script>';
}
?>
<html>
	<head>
	<meta charset="UTF-8">
		<title>정시방[자유게시판]</title>
		<style>
		a{
			color:black;
			text-decoration: none;
            }
		ul#menu{
			float:right;
			padding: 0;
		}
		ul#menu li{
			display:inline;
		}
		ul#menu li a{ 
	    font-size:18px;
            background-color: black;
            color: white;
			text-decoration: none;
            }
	ul#menu li a:hover {
	background-color: white;
	color: black;
		}
	
		div{
			margin: auto;
		}		
		table{
			border: 0px; solid black;
			text-align: center;
		}
		h1{
		font-family: default;
		}

		body{
		background-image:url('back_ground.png');
		background-repeat:no-repeat;
		background-position:50% 50%;
		}
		
	#menubar {
                        height: 40px;
                        width: 1200px;
                }

                #menubar ul li {
                        list-style: none;
                        color: white;
                        background-color: skyblue;
                        float: left;
                        line-height: 40px;
                        vertical-align: middle;
                        text-align: center;
                }

                #menubar .sel {
                        text-decoration:none;
                        color: white;
                        display: block;
                        width: 200px;
                        font-size: 17px;
                        font-weight: bold;
                        font-family: "default";
                }
                #menubar .sel:hover {
                        color: black;
                        background-color: white;
                }
				
				p{
					text-align: center;
				}
				
				p#dat{
					color:blue;
				}
				
				ul {
　　　				overflow: auto;
                    text-align: center;
					list-style-type: none;
					}

				li {
					display:inline-block;
					}

		 </style>
	</head>
	<body>
	  <h1 font-family="ITCBLKAD"><a href="/main.php">HTC BOARD</a>
<nav id="menubar" >
		<ul>
			<li><a class="sel" href="/freeboard.php">FreeBoard</a></li>
			<li>|</li>
			<li><a class="sel" href="/mypage.php">MyPage</a></li>
			<li>|</li>
			<li><a class="sel" href="">Secret</a></li>
			<li>|</li>
			<li><a class="sel" href="">Secret</a></li>
			<li>|</li>
			<li><a class="sel" href="">Secret</a></li>
		</ul>
	</nav>
<ul id = "menu">
<?php
	session_start();
if(isset($_SESSION['id'])){
	echo '<li><a href="/logout.php">로그아웃</a></li>';
	echo '<li><a href="/write.php">글 쓰기</a></li>';
}
else {
	echo '<li><a href="/login.php">로그인</a></li>';
	echo ' <li><a href="/signup.php">회원가입</a></li>';
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
 
 <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" align="center" name="table">
		<tr>
		<td width="10%">글 번호</td><td width="20%">작성자</td><td width="50%">제목</td><td width="20%">조회수</td>
		</tr>
		
		</table>
 </div>
 

  <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" align="center" name="table">


<?php
$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");
	
	$res = mysqli_query($conn,'select idx,nickname,contentname,secret from freeboard_content order by idx desc limit '.(15*$pg).',15');
	while($row=mysqli_fetch_array($res)){
	
	    if($_SESSION['maxidx'] < $row['idx']){
			$_SESSION['maxidx'] = $row['idx'];
		}
		
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
		$res1 = mysqli_query('select count(*) as total from reply where contentn="'.$row['idx'].'";');
		$row1=mysql_fetch_assoc($res1);
		$total = $row1['total'];
		echo "<font color='blue'>(".$total.")</font>";
		
		echo "</td>";
		
		#echo "<td width='20%'>";
		#$res1 = mysqli_query('select count(*) as total from contentinfo where kn="'.$row['kn'].'";');
		#$row1=mysql_fetch_assoc($res1);
		#$total = $row1['total'];		
		#echo "<font color='blue'>".$total."</font>";
		#echo "</td>";
		
	echo "</tr>";
	}
	
	mysqli_close($conn);
	
?>
		
	   </table>
  </div>
		<p>
		<ul><h6>
			<li><a href="/freeboard.php?page=0">1</a></li>
			
			<?
			$tmp = ($_SESSION['maxidx']/15);
			if($tmp > 1){
			$tcnt = 2;
			while($tmp > 1){
			echo '<li>|</li>';
			if(($tcnt-1)== $pg)echo "<font color:blue>";	
			echo '<li><a href="/freeboard.php?page='.($tcnt-1).'">'.$tcnt.'</a></li>';
			if(($tcnt-1)== $pg)echo "</font>";	
			$tcnt++;
			$tmp--;
				}
			}
			?>
		</ul>
		</p> 
</body>

</html>
