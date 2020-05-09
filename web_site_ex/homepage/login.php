<?php
session_start();
$pswd = $_POST['password'];
$id = $_POST['id'];
$cnt = $_POST['cnt'];
$correctpswd;

$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
$conn = mysqli_connect($dbHost,$dbId,$dbPw);
$a = mysqli_select_db($dbName,$conn);

mysqli_query("set session character_set_connection=utf8;");

mysqli_query("set session character_set_results=utf8;");

mysqli_query("set session character_set_client=utf8;");
	
	$res = mysqli_query('select id,password,nickname from user_info');
	while($row=mysqli_fetch_array($res)){
	if($row['id'] == $id){
		$correctpswd = $row['password'];
		$nick = $row['nickname'];
		break;
	}
	}
	
	mysqli_close($conn);

if($cnt!=0 && empty($correctpswd)){
	echo "존재하지 않는 id입니다.";
}

if(!($id == '')&&$cnt!=0 && $pswd == $correctpswd){
	echo "logined!";
	$_SESSION['id'] = $id;
	$_SESSION['nick'] = $nick;
	echo '<script>location.href="http://hypertime.tk/main.php"</script>';
}else if($cnt != 0){
	echo "wrong Password</br>";
}
$cnt ++;
?>

<html>
	<head>
	<meta charset="UTF-8">
		<title>LOG-IN</title>
	<style>
	div{
		margin:auto;
	}
		table{
			border: 0px solid black;
			text-align: center;
		    color: hotpink;
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
		 </style>
	</head>
	<body>
	<div style="border:3px solid skyblue ;width:550px;" >
	<table border="1" width="550px" height="100px" align="center" name="table">
	 <form method="POST" action="" name="form">
	 <input type="hidden" name="cnt" value="<?=$cnt?>">
		<tr>
		<td>LOG-IN</td>
		</tr>
		<tr>	
		<td><input type="text" name="id" align="center"/></td>
		</tr>
	  <tr>	
	  <td><input type="password" name="password"align="center"/></td>
	  </tr>
	  <tr>
	  <td><input type="submit" name="itext" value="log in" align="center"/></td>
	  </tr>
        </form>
		</table>
		</div>
	</body>

</html>
