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
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

mysqli_query($conn,"set session character_set_connection=utf8;");

mysqli_query($conn,"set session character_set_results=utf8;");

mysqli_query($conn,"set session character_set_client=utf8;");
	

if($cnt!=0){
if(preg_match("/^[[:alnum:]]{8,30}$/",$id)){
	}else{
		echo "<script>alert('id가 8~30자 사이의 문자나 숫자의 조합이 아닙니다. ')</script>";
		$err++;
	}
	
if(preg_match("/^[[:alnum:]]{8,30}$/",$pswd)){
	}else{
		echo "<script>alert('비밀번호가 8~30자 사이의 영문자나 숫자의 조합이 아닙니다. ')</script>";
		$err++;
	}
	
if(preg_match("/^[[:alnum:]]{3,20}$/",$nick)){
	}else{
		echo "<script>alert('닉네임이 3~20자 사이의 영문자나 숫자의 조합이 아닙니다. ')</script>";
		$err++;
	}

if(preg_match("/^[[:digit:]]{4,4}$/",$by)){
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
	
		$res = mysqli_query($conn,'select count(*) as total from user_info where id="'.$id.'";');
		$row = mysqli_fetch_assoc($res);
    	$res1 = $row['total'];
		
		$res = mysqli_query($conn,'select count(*) as total from user_info where nickname="'.$nick.'";');
		$row = mysqli_fetch_assoc($res);
		$res2 = $row['total'];
	
if(!$res1&&!$res2){
$query = "insert into user_info(id,password,birthdate,nickname) values('".$id."','".hash("sha56",$pswd)."','".$birth."','".$nick."')";
$result = mysqli_query($conn,$query);
	echo "<script>alert('회원가입 성공!!')</script>";
	echo '<script>location.href="/main.php"</script>';
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
		<meta name="theme-color" content="gray">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">	
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
				
		<title>[회원가입]정신과 시간의 방</title>
	</head>
		<header>
		<h1 font-family="ITCBLKAD"><a href="/main.php"><img id="main_logo" src="/images/logo.png" alt="정신과시간의방"></a>		
		<label for="menubtn" onclick><span class="material-icons">menu</span>Menu</label>
		<input type="checkbox" id="menubtn"/>
		<nav id="menubar" >
			<ul>
				<li><a class="sel" href="/freeboard.php">FreeBoard</a></li>
				<li><a class="sel" href="/mypage.php">MyPage</a></li>
				<li><a class="sel" href="/chat.php">Chat</a></li>
				<li><a class="sel" href="">Secret</a></li>
				<li><a class="sel" href="">Secret</a></li>
			</ul>
		</nav>
	</header>
	<body>	
	   <h1 align="center" font-family="ITCBLKAD"> sign-in
	 <form method="POST" action="" name="form">
	<div style="width:550px;" >
	<table border="1" width="100%" height="100px" align="center" class="table">
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
	<div style="width:550px;" >
	 <table border="1" width="100%" height="100px" align="center" class="table">
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
	   <div style="width:550px;" >
	 <table border="1" width="100%" height="20px" align="center" class="table">
	   <tr>
	   <td colspan="4" align ="center"><input type="submit" name="가입하기" value="V 가입하기"/</td>
	   </tr>
	   </table>
	   </div>
        </form>
	</body>

</html>

			 
