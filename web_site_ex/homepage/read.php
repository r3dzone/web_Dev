<html>
	<head>
	<meta charset="UTF-8">
		<title>Utack's board</title>
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
		background-image:url('d.png');
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
		echo '<script>location.href="http:///~unknown/homepage/freeboard.php"</script>';
	}else{	
	$res1 = mysql_query('select count(*) as total from contentinfo where visitor="'.$nick.'" AND kn="'.$kn.'";');
	$row1=mysql_fetch_assoc($res1);
    $total = $row1['total'];
	if($total == 0){
	mysql_query('insert into contentinfo(kn,visitor) values("'.$kn.'","'.$nick.'");'); 
		}
	}
	echo "<tr>";
	    echo "<td width='10%'>";
		echo $row['kn'];
		echo "</td>";
	
		echo "<td width='70%'>";
		$str = $row['contentname'];
		echo htmlentities($str);
		echo "</td>";
		
		echo '<form method="POST" action="./rewrite.php?kn='.$kn.'" name="">';
		
		echo "<td width='10%'>";
		echo "<input type='submit' name='adjust' value='수정'/>";
		echo "</td>";
		
		echo '</form>';
	
		echo '<form method="POST" action="./delete.php?kn='.$kn.'" name="">';
		
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
		echo "<a href = 'http:///~unknown/homepage/freeboarddownload.php?filename=".$row['download']."'>".$row['download']."</a>";
		echo "</td>";
		
	echo "</tr>";
	
	echo '<table border="1" width="200px" align="center" name="table">
		<tr>';
	echo '<form method="POST" action="./goodandbad.php" name="">';
	echo '<td><input type="submit" name="submit" value="좋아요"/>';
		$res1 = mysql_query('select count(*) as total from contentinfo where kn="'.$row['kn'].'" AND good = "1";');
		$row1=mysql_fetch_assoc($res1);
		$total = $row1['total'];
	echo $total.'</td>';
	echo '<input type="hidden" name="kn" value ="'.$kn.'">';
	echo '</form>';	
	echo '<form method="POST" action="./goodandbad.php" name="">';
	echo '<td><input type="submit" name="submit" value="싫어요"/>';
	$res1 = mysql_query('select count(*) as total from contentinfo where kn="'.$row['kn'].'" AND good = "2";');
		$row1=mysql_fetch_assoc($res1);
		$total = $row1['total'];
	echo $total.'</td>';
	echo '<input type="hidden" name="kn" value ="'.$kn.'">';
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
		<?
		$res = mysql_query('select replyn,reply,secret,writer,rereply from reply where contentn ='.$kn.' order by rereply asc,replyn asc');
	while($row=mysql_fetch_array($res)){
	
	
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
		echo '<form method="POST" action="./rereply.php?replyn='.$row['replyn'].'&kn='.$kn.'" name="">';
		
		echo "<td width='5%'>";
		echo "<input type='submit' name='rereply' value='답글'/>";
		echo "</td>";
		
		echo '</form>';
		
		echo '<form method="POST" action="./replyrewrite.php?replyn='.$row['replyn'].'&kn='.$kn.'" name="">';
		
		echo "<td width='5%'>";
		echo "<input type='submit' name='adjust' value='수정'/>";
		echo "</td>";
		
		echo '</form>';
	
		echo '<form method="POST" action="./delete.php?replyn='.$row['replyn'].'&kn='.$kn.'" name="">';
		
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
	
	mysql_close($conn);
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
				<input type="hidden" name="kn" value ="<?=$kn?>">
				<tr>
					<td colspan="1"><input type="checkbox" name="secret" value="1">비밀 댓글</td>	
					<td colspan="1"><input type="submit" name="submit" value="댓글 작성"/></td>
				</tr>		
	   </table>
  </div>
 </form>

</body>

</html>