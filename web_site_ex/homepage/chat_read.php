<html>
	<head>
	<meta charset="UTF-8">
		<title>HTC chat</title>
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

#인코딩셋
mysqli_query($conn,"set session character_set_connection=utf8;");
mysqli_query($conn,"set session character_set_results=utf8;");
mysqli_query($conn,"set session character_set_client=utf8;");
		
	$res = mysqli_query($conn,'select mesg,nick from chat order by chatn desc;');
while($row = mysqli_fetch_array($res)){	
	echo "<tr>";
		echo "<td colspan='4' width='100%' j>";
		echo $row['nick'].":";
		$str = $row['mesg'];
		echo htmlentities($str);
		echo "</td>";
	echo "</tr>";
	}
?>
	   </table>
  </div>
 </br>
	</body>

</html>