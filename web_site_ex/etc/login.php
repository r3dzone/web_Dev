<?php
$pswd = $_POST['password'];
$id = $_POST['id'];
$cnt = $_POST['cnt'];
session_start();
if(ereg($id,"admin")){
	echo "<script>alert('your ip : ".$_SERVER['REMOTE_ADDR']." you\'re not admin');</script>";
}

if($cnt > 0){
	if(empty($_POST['id'])||empty($_POST['password'])){
echo "공백이 있습니다.";}else
if(isset($_POST['id'])&&isset($_POST['password'])){
if(ereg("^[[:alnum:]]{8,11}$",$id)){
			
		}else{
			echo "id가 양식에 맞지 않습니다.</br>";
			}
if(ereg("^[[:alnum:]]{8,11}$",$pswd)){
			
		}else{
			echo "비밀번호가 양식에 맞지 않습니다.</br>";
}
}
}
$cnt ++;
if($pswd == "catsecurity"){
	$_SESSION['your id']= $id;
	echo "hello  ".$_SESSION['your id'];
}else{
	echo "wrong Password</br>";
}
?>

<html>
	<head>
		<title> 회원가입</title>
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
		background-image:url('d.png');
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
		<td>CAT-login</td>
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
