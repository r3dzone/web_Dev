<?php
session_start();
$id =$_SESSION['id'];
$pswd =$_POST['password'];
$nick=$_POST['nickname'];
$nicks=$_POST['nickname'];
$cnt =$_POST['cnt'];
$birth = $_POST['생년월일'];
$err = 0;

$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query("set session character_set_connection=utf8;");

mysqli_query("set session character_set_results=utf8;");

mysqli_query("set session character_set_client=utf8;");
	

if(empty($id)){
echo "<script>alert('권한이 없습니다.')</script>";
	echo '<script>location.href="http://hypertime.tk/main.php"</script>';
}

if($cnt!=0){
if(ereg("^[[:alnum:]]{6,20}$",$pswd)){
	}else{
		echo "<script>alert('비밀번호가 6~20자 사이의 문자나 숫자의 조합이 아닙니다. ')</script>";
		$err++;
	}
	
if(ereg("^[[:alnum:]]{6,20}$",$pswd)){
	}else{
		echo "<script>alert('비밀번호가 6~20자 사이의 영문자나 숫자의 조합이 아닙니다. ')</script>";
		$err++;
	}
	
if(ereg("^[[:alnum:]]{3,20}$",$nick)){
	}else{
		echo "<script>alert('닉네임이 3~20자 사이의 영문자나 숫자의 조합이 아닙니다. ')</script>";
		$err++;
	}

if(ereg("^[[:digit:]]{8,8}$",$birth)){
	}else{
		echo "<script>alert('생년월일이 8자리로 되어있지 않습니다.')</script>";
		$err++;
	}
}

if($cnt!=0&&$err == 0){
	
	$res = mysqli_query($conn,'select count(*) as total from user_info where nickname="'.$nicks.'";');
	$row=mysqli_fetch_assoc($res);
    $total = $row['total'];
	
	echo "<script>alert('".$birth."')</script>";
	
		$query = "update user_info set birthdate = '".$birth."' where id ='".$id."';";
		$result = mysqli_query($conn,$query);
		
		$query = "update user_info set password = '".$pswd."' where id ='".$id."';";
		$result = mysqli_query($conn,$query);
	
	if(!$total){
		
		$query = "update user_info set nickname = '".$nicks."' where id ='".$id."';";
		$result = mysqli_query($conn, $query);

	}else if($nick!=$nicks){
 		echo "<script>alert('이미 있는 닉네임입니다!!')</script>";
		echo '<script>location.href="http://hypertime.tk/mypage.php"</script>';
	}
	
	echo "<script>alert('정보수정 성공!!')</script>";
	echo '<script>location.href="http://hypertime.tk/main.php"</script>';
}

	$res = mysqli_query($conn,'select password,birthdate,nickname from user_info where id="'.$id.'"');
	while($row=mysqli_fetch_array($res)){
		$pswd = $row['password'];
		$birth = $row['birthdate'];
		$nick = $row['nickname'];
	}
	
$cnt++;
?>



<html>
	<head>
	<meta charset="UTF-8">
		<title> 회원가입</title>
		
		<style>
		div{
			margin: auto;
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
	   <h1 align="center" font-family="ITCBLKAD">회원정보
	 <form method="POST" action="" name="form">
	<div style="border:3px solid skyblue; width:550px;" >
	<table border="1" width="550px" height="100px" align="center" name="table">
	   <tr>
	   <td>아이디</td>
	   <td><?echo $id;?></td>
	   </tr>
	   <tr>
	   <td>비밀번호</td>
	   <td><input type="password" name="password" value="<?=$pswd?>"/></td>
	   </tr>
    </table>
	</div>
	</br>
	<div style="border:3px solid skyblue ;width:550px;" >
	 <table border="1" width="550px" height="100px" align="center" name="table">
	   <tr>
	   <td colspan="2">닉네임</td>
	   <td colspan="2"><input type="text" name="nickname" value="<?=$nick?>"/></td>
	   </tr>
	    
		 <tr>
	   <td colspan="2">생년월일</td>
	   <td colspan="2"><input type="text" name="생년월일" value="<?=$birth?>"/></td>
	   </tr>
	   </table>
	   </div>
	   <br/>
	   <input type="hidden" name="cnt" value ="<?=$cnt?>">
	   <div style="border:3px solid skyblue ;width:550px;" >
	 <table border="1" width="550px" height="20px" align="center" name="table">
	   <tr>
	   <td colspan="4" align ="center"><input type="submit" name="수정하기" value="V수정하기"/</td>
	   </tr>
	   </table>
	   </div>
        </form>
		
		<form method="POST" action="./signout.php" name="form">
	<div style="border:3px solid skyblue ;width:550px;" >
	<table border="1" width="550px" height="20px" align="center" name="table">
	   <tr>
	   <td colspan="4" align ="center"><input type="submit" name="탈퇴하기" value="회원 탈퇴하기"/</td>
	   </tr>
    </table>
	</form>
	
	</body>

</html>