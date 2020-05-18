<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$idx = $_GET['idx'];

$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");
	
	$res = mysqli_query($conn,'select idx,contentname,content,id,attach,secret from fboard_content where idx='.$idx.';');
	while($row=mysqli_fetch_array($res)){
	if($row['id'] != $_SESSION['id'] ){
		echo "<script>alert('권한이 없습니다.')</script>";
		echo '<script>location.href="/freeboard.php"</script>';
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
		background-image:url('back_ground.png');
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
				<input type="hidden" name="idx" value="<?=$idx?>">
				<tr>
					<td colspan="8"><textarea rows = '30' cols = '130' name="content"><?php=echo $content;?></textarea>
					</td>
				</tr>				
	   </table>
  </div>
 </form> 
</body>

</html>
