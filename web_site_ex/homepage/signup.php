<?php
$id =$_POST['id'];
$pswd =$_POST['password'];
$nick=$_POST['nickname'];
$by =$_POST['생년'];
$bm =$_POST['월'];
$bd =$_POST['일'];
$cnt =$_POST['cnt'];
$birth = $_POST['생년'].$_POST['월'].$_POST['일'];
$err = 0;

$dbHost = 'localhost';
$dbId = 'unknown';
$dbPw = 'redzone';
$dbName = 'unknown';
$conn = mysql_connect($dbHost,$dbId,$dbPw);
$a = mysql_select_db($dbName,$conn);

mysql_query("set session character_set_connection=utf8;");

mysql_query("set session character_set_results=utf8;");

mysql_query("set session character_set_client=utf8;");
	

if($cnt!=0){
if(ereg("^[[:alnum:]]{6,20}$",$id)){
	}else{
		echo "<script>alert('id가 6~20자 사이의 문자나 숫자의 조합이 아닙니다. ')</script>";
		$err++;
	}
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

if(ereg("^[[:digit:]]{4,4}$",$by)){
	}else{
		echo "<script>alert('생년이 4자리로 되어있지 않습니다. ')</script>";
		$err++;
	}
if($bm!='00'){
	}else{
		echo "<script>alert('탄생월이 표기되지 않았습니다')</script>";
		$err++;
	}

	if($bd!='00'){
	}else{
		echo "<script>alert('탄생일이 표기되지 않았습니다')</script>";
		$err++;
	}
}
if($cnt!=0&&$err == 0){
	
		$res = mysql_query('select count(*) as total from pinfo where id="'.$id.'";');
	$row=mysql_fetch_assoc($res);
    $res1 = $row['total'];
		
		$res = mysql_query('select count(*) as total from pinfo where nickname="'.$nick.'";');
		$row=mysql_fetch_assoc($res);
		$res2 = $row['total'];
	
if(!$res1&&!$res2){
$query = "insert into pinfo(id,password,birthdate,nickname) values('".$id."','".$pswd."','".$birth."','".$nick."')";
$result = mysql_query($query, $conn);
	echo "<script>alert('회원가입 성공!!')</script>";
	echo '<script>location.href="http:///~unknown/homepage/main.php"</script>';
}else{
	if($res1)echo "<script>alert('이미 존재하는 id 입니다!!')</script>";
	if($res2)echo "<script>alert('이미 존재하는 닉네임 입니다!!')</script>";
	
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
		background-image:url('c.png');
		background-repeat:no-repeat;
		background-position:50% 50%;
		
		}
		 </style>
	</head>
	<body>
	   <h1 align="center" font-family="ITCBLKAD"> sign-in
	 <form method="POST" action="" name="form">
	<div style="border:3px solid skyblue ;width:550px;" >
	<table border="1" width="550px" height="100px" align="center" name="table">
	   <tr>
	   <td>아이디</td>
	   <td><input type="text" name="id" value="<?=$id?>"/></td>
	   </tr>
	   <tr>
	   <td>비밀번호</td>
	   <td><input type="password" name="password"/></td>
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
	   <td>생일</td>
	   <td><input type="text" name="생년"/>년</td>
	   <td><select name="월">
	         <option value="00">none</option>
	         <option value="01">1</option>
			  <option value="02">2</option>
			  <option value="03">3</option>
			  <option value="04">4</option>
			  <option value="05">5</option>
			  <option value="06">6</option>
			  <option value="07">7</option>
			  <option value="08">8</option>
			  <option value="09">9</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			  </select>월</td>
			  
	   <td><select name="일">
	   <option value="00">none</option>
	         <option value="01">1</option>
			  <option value="02">2</option>
			  <option value="03">3</option>
			  <option value="04">4</option>
			  <option value="05">5</option>
			  <option value="06">6</option>
			  <option value="07">7</option>
			  <option value="08">8</option>
			  <option value="09">9</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			  <option value="13">13</option>
			  <option value="14">14</option>
			  <option value="15">15</option>
			  <option value="16">16</option>
			  <option value="17">17</option>
			  <option value="18">18</option>
			  <option value="19">19</option>
			  <option value="21">21</option>
			  <option value="22">22</option>
			  <option value="23">23</option>
			  <option value="24">24</option>
			  <option value="25">25</option>
			  <option value="26">26</option>
			  <option value="27">27</option>
			  <option value="28">28</option>
			  <option value="29">29</option>
			  <option value="30">30</option>
			  <option value="31">31</option>
			  </select>일</td>
	   </tr>
	   </table>
	   </div>
	   <br/>
	   <input type="hidden" name="cnt" value ="<?=$cnt?>">
	   <div style="border:3px solid skyblue ;width:550px;" >
	 <table border="1" width="550px" height="20px" align="center" name="table">
	   <tr>
	   <td colspan="4" align ="center"><input type="submit" name="가입하기" value="V 가입하기"/</td>
	   </tr>
	   </table>
	   </div>
        </form>
	</body>

</html>

			 
