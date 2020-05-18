<?php
$cnt =$_GET['cnt'];
$id = $_GET['id'];
$birth = $_GET['생년월일'];
$err = 0;
$iderr =0;

$dbHost = '';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");
	
	$res = mysqli_query($conn,'select password,birthdate from user_info where id="'.$id.'"');
	while($row=mysqli_fetch_array($res)){
		if($birth == $row['birthdate']){
	echo '<div style="border:3px solid skyblue ;width:550px;" >
	<table border="1" width="550px" height="100px" align="center" name="table">
	   <tr>
	   <td>비밀번호</td>
	   <td>'.$row['password'].'</td></tr>';
	   $iderr++;
		}
	}
	
if($cnt != 0 && $iderr == 0){
			echo "일치하는 정보가 없습니다.!";
	}

if($cnt!=0){
if(ereg("^[[:alnum:]]{6,20}$",$id)){
	}else{
		echo "<script>alert('ID가 6~20자 사이의 문자나 숫자의 조합이 아닙니다. ')</script>";
		$err++;
	}
if(ereg("^[[:digit:]]{8,8}$",$birth)){
	}else{
		echo "<script>alert('생년월일이 8자리로 되어있지 않습니다. ')</script>";
		$err++;
	}
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
		background-image:url('back_grond.png');
		background-repeat:no-repeat;
		background-position:50% 50%;
		
		}
		 </style>
	</head>
	<body>
	   <h1 align="center" font-family="ITCBLKAD">비밀번호 찾기
	 <form method="GET" action="" name="form">
	<div style="border:3px solid skyblue ;width:550px;" >
	<table border="1" width="550px" height="100px" align="center" name="table">
	   <tr>
	   <td colspan="2">아이디</td>
	   <td colspan="2"><input type="text" name="id"/></td>
	   </tr>
	   <tr>
	   <td colspan="2">생년월일</td>
	   <td colspan="2"><input type="text" name="생년월일"/></td>
	   </tr>
    </table>
	</div>
	</br>
	   <input type="hidden" name="cnt" value ="<?=$cnt?>">
	   <div style="border:3px solid skyblue ;width:550px;" >
	 <table border="1" width="550px" height="20px" align="center" name="table">
	   <tr>
	   <td colspan="4" align ="center"><input type="submit" name="비번찾기" value="비밀번호 찾기"/</td>
	   </tr>
	   </table>
	   </div>
        </form>
	</body>

</html>

			 
