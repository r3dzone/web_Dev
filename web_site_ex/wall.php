<html>
	<head>
	<meta charset="UTF-8">
		<title>방명록</title>
		<style>
		div{
		margin: auto;
		
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
		 </style>
	</head>
	<body>
	   <h1 align="center" font-family="ITCBLKAD">TACK'S WALL
	 
	 
	 <form method="POST" action="./walldbupload.php" name="wall" enctype="multipart/form-data">
	   
	   
	   <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" height="100px" align="center" name="table">
				
				
				<tr>
					<td colspan="5">이름 :<input type="text" name="name"/></td>	
				</tr>
				<tr>
					<td colspan="5"><textarea rows = '10' cols = '80' name="content"></textarea>
					</td>
				</tr>
				
				<tr>				
				<td><input type="file" name="uploadfile"/></td>
				</tr>			
				
				<tr>
					<td colspan="1"><input type="submit" name="submit" value="submit"/></td>
				</tr>		
	   </table>
  </div>
 </form>

 <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" align="center" name="table">
		<tr>
		<td width="10%">순번</td><td width="20%">이름</td><td width="50%">내용</td><td width="20%">파일</td>
		</tr>
		
		</table>
 </div>
 

  <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" align="center" name="table">


<?php
$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
$conn = mysql_connect($dbHost,$dbId,$dbPw);
$a = mysql_select_db($dbName,$conn);

mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");
	
	$res = mysql_query('select kn,name,content,download from wall');
	while($row=mysql_fetch_array($res)){
	
	echo "<tr>";
	    echo "<td width='10%'>";
		echo $row['kn'];
		echo "</td>";
	
		echo "<td width='20%'>";
		echo $row['name'];
		echo "</td>";
		
		echo "<td width='50%'>";
		echo $row['content'];
		echo "</td>";
		
		echo "<td width='20%'>";
		echo "<a href = 'http:///~unknown/walldownload.php?filename=".$row['download']."'>".$row['download']."</a>";
		echo "</td>";
		
	echo "</tr>";
	}
	
	mysql_close($conn);
	
?>
		
	   </table>
  </div>
 
</body>

</html>
