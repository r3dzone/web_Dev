<?php

$id =$_GET['id'];
$pswd =$_GET['password'];
$nm =$_GET['이름'];
$by =$_GET['생년'];
$bm =$_GET['월'];
$bd =$_GET['일'];
$ph =$_GET['phone'];
$g =$_GET['성별'];

echo "id = ".$id."</br>";
echo "password = ".$pswd."</br>";
echo "이름 = ".$nm."</br>";
echo "성별 = ".$g."</br>";
echo "생년월일 =".$by."년".$bm."월".$bd."일"."</br>";
echo "휴대전화 = ".$ph."</br>";
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
	   <h1 align="center" font-family="ITCBLKAD"> sigin-in
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
	   <td>휴대전화</td>
	   <td><input type="text" name="phone"/></td>
	   </tr>
	   <tr>
	   <td colspan="2" align ="center"><input type="submit" name="가입하기" value="V 가입하기"/</td>
	   </tr>
	   </table>
	   </div>
        </form>
		
	</body>

</html>

			 