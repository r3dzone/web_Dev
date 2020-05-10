<?php

$id =$_GET['id'];
$pswd =$_GET['password'];
$nm =$_GET['이름'];
$by =$_GET['생년'];
$bm =$_GET['월'];
$bd =$_GET['일'];
$ph1 =$_GET['phone1'];
$ph2 =$_GET['phone2'];
$ph3 =$_GET['phone3'];
$g =$_GET['성별'];
$email = $_GET['email'];
$jumin1 =$_GET['jumin1'];
$jumin2 =$_GET['jumin2'];
$homepage =$_GET['homepage'];
$pht = 0;
$err = 0;

if(isset($_GET['email'])){
	
	if(empty($_GET['id'])||empty($_GET['password'])||empty($_GET['이름'])||empty($_GET['생년'])||empty($_GET['월'])
	||empty($_GET['일'])||empty($_GET['phone1'])||empty($_GET['phone2'])||empty($_GET['phone3'])||empty($_GET['성별'])||empty($_GET['email'])||empty($_GET['jumin1'])||empty($_GET['jumin2'])||empty($_GET['homepage']))
	{
		echo "작성하지 않은 부분이 있습니다.";
$err++;	}
		if(ereg("^[[:digit:]]{6,6}$",$jumin1)){
			
		}else{
			echo "주민 번호 앞자리가 잘못되어있습니다.</br>";
$err++;
			}
        if(ereg("^[[:digit:]]{7,7}$",$jumin2)){
			$jmt =0;
			if(ereg("^1[[:digit:]]{6,6}$",$jumin2)){ $jmt++;}
			if(ereg("^2[[:digit:]]{6,6}$",$jumin2)){ $jmt++;}	
			if(ereg("^3[[:digit:]]{6,6}$",$jumin2)){ $jmt++;}
			if(ereg("^4[[:digit:]]{6,6}$",$jumin2)){ $jmt++;}
			if(ereg("^5[[:digit:]]{6,6}$",$jumin2)){ $jmt++;}
			if($jmt != 1)
			echo "주민 번호 뒷자리가 잘못되어있습니다.</br>";		
$jmt = 0;
$err++;
		}else{

			echo "주민 번호 뒷자리가 잘못되어있습니다.</br>";
$err++;
			}

		if(ereg("^.+\@.*$",$email)){

		}else{
			echo "이메일 주소가 잘못되어있습니다.</br>";
$err++;
			}
			
			if(ereg("^.+\..+\..*$",$homepage)){

		}else{
			echo "홈페이지 주소가 잘못되어있습니다.</br>";
$err++;
			}
			
			 if(ereg("^[[:digit:]]{2,3}$",$ph1)){
			if(strcmp($ph1,'02')){
			$pht += 1;
			}
			if(strcmp($ph1,'032')){
			$pht += 1;
			}
			if(strcmp($ph1,'010')){
			$pht += 1;
			}
			}else{
			echo "전화번호 앞자리가 잘못 되었습니다.</br>";
$err++;
			}
			if($pht != 2)
			{
	echo "전화번호 앞자리가 잘못 되었습니다.</br>";
$err++;
}			
			if(ereg("^[[:digit:]]{3,4}$",$ph2)){

		}else{
			echo "전화번호 두번째가 잘못되어있습니다.</br>";
$err++;
			}
			if(ereg("^[[:digit:]]{4,4}$",$ph3)){

		}else{
			echo "전화번호 세번째가 잘못되어있습니다.</br>";
$err++;
			}
			
			
			
			}

		
					
if(!($err != 0)){
echo "id = ".$id."</br>";
echo "password = ".$pswd."</br>";
echo "이름 = ".$nm."</br>";
echo "성별 = ".$g."</br>";
echo "생년월일 =".$by."년".$bm."월".$bd."일"."</br>";
echo "전화번호 = ".$ph1.$ph2.$ph3."</br>";
}
$err = 0;
?>



<html>
	<head>
	<meta charset="UTF-8">
		<title> 회원가입</title>
		
		<style>
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
	 <form method="GET" action="" name="form">
	<div style="border:3px solid skyblue ;width:550px;" >
	<table border="1" width="550px" height="100px" align="center" name="table">
	   <tr>
	   <td>아이디</td>
	   <td><input type="text" name="id"/></td>
	   </tr>
	   <tr>
	   <td>비밀번호</td>
	   <td><input type="password" name="password"/></td>
	   </tr>
    </table>
	</div>
	</br>
	<div style="border:3px solid skyblue ;width:550px;" >
	 <table border="1" width="550px" height="150px" align="center" name="table">
	   <tr>
	   <td colspan="2">이름</td>
	   <td colspan="2"><input type="text" name="이름"/></td>
	   </tr>
	    <tr>
	   <td colspan="4">성별:<input type="radio" name="성별" value="남"/>남
                <input type="radio" name="성별" value="여"/>여</td>
	   </tr>
	    
		 <tr>
	   <td>생일</td>
	   <td><input type="text" name="생년"/>년</td>
	   <td><select name="월">
	         <option value="1">1</option>
			  <option value="2">2</option>
			  <option value="3">3</option>
			  <option value="4">4</option>
			  <option value="5">5</option>
			  <option value="6">6</option>
			  <option value="7">7</option>
			  <option value="8">8</option>
			  <option value="9">9</option>
			  <option value="10">10</option>
			  <option value="11">11</option>
			  <option value="12">12</option>
			  </select>월</td>
			  
	   <td><input type="text" name="일"/>일</td>
	   </tr>
	   </table>
	   </div>
	   <br/>
	   
	   <div style="border:3px solid skyblue ;width:550px;" >
	   <table border="1" width="550px" height="100px" align="center" name="table">
	   <tr>
	   <td>주민등록 번호</td>
	   <td><input type="text" name="jumin1"/>-<input type="text" name="jumin2"/></td>
	   </tr>
	   <tr>
	   <td>홈페이지</td>
	   <td><input type="text" name="homepage"/></td>
	   </tr>
    </table>
	   
	   <div style="border:3px solid skyblue ;width:550px;" >
	    <table border="1" width="550px" height="100px" align="center" name="table">
	   <tr>
	   <td>이메일</td>
	   <td><input type="text" name="email"/></td>
	   <td>전화번호</td>
	   <td><input type="text" name="phone1"/>
	   -<input type="text" name="phone2"/>
	   -<input type="text" name="phone3"/>
	   </td>
	   </tr>
	   <tr>
	   <td colspan="4" align ="center"><input type="submit" name="가입하기" value="V 가입하기"/</td>
	   </tr>
	   </table>
	   </div>
        </form>
		
	</body>

</html>

			 
