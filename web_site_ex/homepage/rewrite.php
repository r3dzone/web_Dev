<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$kn = $_GET['kn'];

$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
$conn = mysql_connect($dbHost,$dbId,$dbPw);
$a = mysql_select_db($dbName,$conn);

mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");
	
	$res = mysql_query('select kn,contentname,content,nickname,download,secret from hpcontent where kn='.$kn);
	while($row=mysql_fetch_array($res)){
	if($row['secret'] == 1 && $row['nickname'] != $_SESSION['nick'] ){
		echo "<script>alert('권한이 없습니다.')</script>";
		echo '<script>location.href="http://junior.catsecurity.net/~unknown/homepage/freeboard.php"</script>';
	}
	if($row['nickname'] != $_SESSION['nick'] ){
		echo "<script>alert('권한이 없습니다.')</script>";
		echo '<script>location.href="http://junior.catsecurity.net/~unknown/homepage/freeboard.php"</script>';
	}
	$contentname = $row['contentname'];
	$content = $row['content'];
	}
	
?>

<html>
	<head>
	<meta charset="UTF-8">
		<title>글 수정하기</title>
		<style>
		
		div{
		margin: auto;
		}
		
		table{
			border: 0px; solid black;
			text-align: center;
		}
		h1{
		font-family: Serif;
		color:skyblue;
		}

		body{
		background-image:url('d.png');
		background-repeat:no-repeat;
		background-position:50% 50%;
		}
		 </style>
	</head>
			<script>
			function check(){
				form = document.write;
				if(form.contentname.value == ""){
					alert("제목이 지정되지 않았습니다.");
				return form.contentname.focus();
				}
				if(form.content.value == ""){
					alert("내용이 비어있습니다.");
				return form.content.focus();
				}
				form.submit();
			}
			</script>
	<body>
		<h1 align="center" font-family="ITCBLKAD"> 글 수정하기
	 
	 <form method="POST" action="./freeboarddbreupload.php" name="write" enctype="multipart/form-data">
	   
	   <div style="border:3px solid skyblue ;width:1000px;" >
	    <table border="1" width="1000px" height="500px" align="center" name="table">
				<tr>
				<td colspan="6">제목 :<input type="text" name="contentname"  value = "<?=$contentname?>" style = 'width:700px'/></td>
				<td colspan="1"><input type="checkbox" name="secret" value="1">비밀글</td>				
				<td colspan="1"><input type="submit" name="submit" value="글쓰기" onclick="check()"/></td>
				</tr>
				<input type="hidden" name="kn" value="<?=$kn?>">
				<tr>
					<td colspan="8"><textarea rows = '30' cols = '130' name="content"><?echo $content;?></textarea>
					</td>
				</tr>				
	   </table>
  </div>
 </form> 
</body>

</html>
