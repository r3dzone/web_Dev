 <?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$replyn = $_GET['replyn'];
$idx = $_GET['idx'];

$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");
	
	$res = mysqli_query($conn,'select replyn,reply,secret,writer from fboard_reply where replyn ='.$replyn.' order by rereply asc,replyn asc');
	
	while($row=mysqli_fetch_array($res)){
	if($row['secret'] == 1 && $row['writer'] != $_SESSION['id'] ){
		echo "<script>alert('권한이 없습니다.')</script>";
		echo '<script>location.href="/read.php?idx='.$idx.'"</script>';
	}
	if($row['writer'] != $_SESSION['id'] ){
		echo "<script>alert('권한이 없습니다.')</script>";
		echo '<script>location.href="/read.php?idx='.$idx.'"</script>';
	} 
	$reply = $row['reply'];
	}
	
?>
 <html>
	<head>
	<meta charset="UTF-8">
		<title>HTC board</title>
		<style>
		div{
		margin: auto;
		text-align: left;
		}
		
		table{
			border: 0px; solid black;
			text-align: center;
		}
		h1{
		font-family: Cursive;
		color:skyblue;
		}

		body{
		background-image:url('back_ground.png');
		background-repeat:no-repeat;
		background-position:50% 50%;
		}
	
	div#condiv table{
			text-align: left;
		}
		 </style>
	</head>
	<body>
	
 <form method="POST" action="./replydbreupload.php" name="reply">
	   <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" height="100px" align="center" name="table">
  
				<tr>
					<td colspan="5"><textarea rows = '7' cols = '100' name="reply"><?php echo $reply;?></textarea>
					</td>
				</tr>		
				<input type="hidden" name="kn" value ="<?=$kn?>">
				<input type="hidden" name="replyn" value ="<?=$replyn?>">
				<tr>
					<td colspan="1"><input type="checkbox" name="secret" value="1">비밀 댓글</td>	
					<td colspan="1"><input type="submit" name="submit" value="댓글 작성"/></td>
				</tr>		
	   </table>
  </div>
 </form>

</body>

</html>