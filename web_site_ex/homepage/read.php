<html>
	<head>
	<meta charset="UTF-8">
		<title>HTC board</title>
		<style>
		p{
			color: gray;
		}
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
  <div id = "condiv" style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" align="center" name="table">
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
		
	$res = mysqli_query($conn,'select idx,contentname,content,nickname,attach,secret from fboard_content where idx="'.$idx.'";');
	while($row=mysqli_fetch_array($res)){
	if($row['secret'] == 1 && $row['nickname'] != $_SESSION['nick'] ){
		echo "<script>alert('권한이 없습니다.')</script>";
		echo '<script>location.href="/freeboard.php"</script>';
	}else{	
	$res1 = mysqli_query($conn,'select count(*) as total from fboard_contentinfo where contentn="'.$idx.'" AND visitor="'.$id.'";');
	$row1 = mysqli_fetch_assoc($res1);
    $total = $row1['total'];
	if($total == 0){
		mysqli_query($conn,'insert into fboard_contentinfo(contentn,visitor) values("'.$idx.'","'.$id.'");'); 
		}
	}
	echo "<tr>";
	    echo "<td width='10%'>";
		echo $row['idx'];
		echo "</td>";
	
		echo "<td width='70%'>";
		$str = $row['contentname'];
		echo htmlentities($str);
		echo "</td>";
		
		echo '<form method="POST" action="./rewrite.php?idx='.$idx.'" name="">';
		
		echo "<td width='10%'>";
		echo "<input type='submit' name='adjust' value='수정'/>";
		echo "</td>";
		
		echo '</form>';
	
		echo '<form method="POST" action="./delete.php?idx='.$idx.'" name="">';
		
		if($nick==$row['nickname']){
		echo "<td width='10%'>";
		echo "<input type='submit' name='delete' value='삭제'/>";
		echo "</td>";
		}else{
		echo "<td width='10%'>";
		echo "<td>";
		}		
		echo '</form>';
	
	
	echo "</tr>";
	
	echo "<tr>";
		echo "<td colspan='4' width='100%' j>";
		echo "작성자 : ".$row['nickname'];
		echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td colspan='4' width='100%' nowrap height='400'>";
		$str = $row['content'];
		echo htmlentities($str);
		echo "</td>";
	echo "</tr>";
	
	echo "<tr>";
		echo "<td colspan='4' width='100%'>";
		echo "<a href = '/freeboarddownload.php?filename=".$row['attach']."'>".$row['attach']."</a>";
		echo "</td>";
		
	echo "</tr>";
	
	echo '<table border="1" width="200px" align="center" name="table">
		<tr>';
	echo '<form method="POST" action="./likey.php" name="">';
	echo '<td><input type="submit" name="submit" value="좋아요"/>';
		$res1 = mysqli_query($conn,'select count(*) as total from fboard_contentinfo where contentn="'.$row['idx'].'" AND likey = "1";');
		$row1=mysqli_fetch_assoc($res1);
		$total = $row1['total'];
		echo $total.'</td>';
	echo '<input type="hidden" name="idx" value ="'.$idx.'">';
	echo '</form>';	
	echo '<form method="POST" action="./likey.php" name="">';
	echo '<td><input type="submit" name="submit" value="싫어요"/>';
	$res1 = mysqli_query($conn,'select count(*) as total from fboard_contentinfo where contentn="'.$row['idx'].'" AND likey = "2";');
		$row1=mysqli_fetch_assoc($res1);
		$total = $row1['total'];
		echo $total.'</td>';
	echo '<input type="hidden" name="idx" value ="'.$idx.'">';
	echo '</form>';	
	echo'</tr>
		</table>
		';
	}
	
?>
	   </table>
  </div>
 </br>
 
 <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" align="center" name="table">
		<tr>
		<td width="10%">댓글</td><td width="90%"></td>
		</tr>
		</table>
 </div>
 
	   <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" height="100px" align="center" name="table">
		<?php
			
		$res = mysqli_query($conn,'select replyn,reply,secret,writer,rereply from fboard_reply where contentn ='.$idx.' order by rereply asc,replyn asc');
	while($row=mysqli_fetch_array($res)){
		
	echo "<tr>";
	    echo "<td width='15%'>";
		echo $row['writer'];
		echo "</td>";
		
		echo "<td colspan = '2' width='70%'>";
		
	if($row['secret'] == 1 && $row['writer'] == $_SESSION['nick']){	
	echo "[비밀댓글]";
	}
	if($row['secret'] == 1 && $row['writer'] != $_SESSION['nick']){	
		echo "비밀댓글 입니다.";
	}else{
		if($row['replyn']!=$row['rereply'])echo "<p>┗";
		$str = $row['reply'];
		echo htmlentities($str);
		echo "</td>";
		if($row['replyn']!=$row['rereply'])echo "</p>";
	}
		echo '<form method="POST" action="./rereply.php?replyn='.$row['replyn'].'&idx='.$idx.'" name="">';
		
		echo "<td width='5%'>";
		echo "<input type='submit' name='rereply' value='답글'/>";
		echo "</td>";
		
		echo '</form>';
		
		echo '<form method="POST" action="./replyrewrite.php?replyn='.$row['replyn'].'&idx='.$idx.'" name="">';
		
		echo "<td width='5%'>";
		echo "<input type='submit' name='adjust' value='수정'/>";
		echo "</td>";
		
		echo '</form>';
	
		echo '<form method="POST" action="./delete.php?replyn='.$row['replyn'].'&idx='.$idx.'" name="">';
		
		if($nick==$row['writer']){
		echo "<td width='5%'>";
		echo "<input type='submit' name='delete' value='삭제'/>";
		echo "</td>";
		}else{
			echo "<td width='5%'>";
			echo "<td>";
		}
		echo '</form>';
		
	echo "</tr>";
	}
	mysqli_close($conn);
		?>
		 </table>
  </div>
  
   <form method="POST" action="./replydbupload.php" name="reply">
	   <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" height="100px" align="center" name="table">
  
				<tr>
					<td colspan="5"><textarea rows = '7' cols = '100' name="reply"></textarea>
					</td>
				</tr>		
				<input type="hidden" name="idx" value ="<?=$idx?>">
				<tr>
					<td colspan="1"><input type="checkbox" name="secret" value="1">비밀 댓글</td>	
					<td colspan="1"><input type="submit" name="submit" value="댓글 작성"/></td>
				</tr>		
	   </table>
  </div>
 </form>

</body>

</html>