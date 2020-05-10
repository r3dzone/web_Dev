<?php

$num1 = $_POST['post'];
$holzak =$_POST['holzak'];
$c = 0;
$k = 0;

if($holzak == 1){
for($c=1; $c <= $num1; $c++ ){
if($c%2 != 0){
         if($c != 1){echo " + ";}
         echo $c;
		 $k += $c;
       }
   }
}

if($holzak == 2){
for($c=2; $c <= $num1; $c++ ){
if($c%2 == 0){
         if($c != 2){echo " + ";}
         echo $c;
		 $k += $c;
       }
   }
}
echo " = ".$k;

?>

<html>
	<head>
	<meta charset="UTF-8">
	</head>
	<body onload="start()">
			<form method="POST" action="">
			<input type="text" name="post">
			<input type="submit" value ="입력">
			</br>
			<input type="radio" name="holzak" value="1"/>홀수
	        <input type="radio" name="holzak" value="2"/>짝수
			</form>
	</body>
	
</html>
