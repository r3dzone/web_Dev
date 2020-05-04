<?php 
session_start();
$num1 = rand(0,9);
$num2 = rand(0,9);
$num3 = rand(0,9);
$numall = $num1*100+$num2*10+$num3;
$cnt = 0;
$cnt = $_POST['cnt'];
if($cnt == 0)
$_SESSION['num'] = $numall;
if($cnt != 0 &&$_SESSION['num'] == $_POST['code'])
{
	$_SESSION['name'] = $_POST['name'];
	echo '<script>location.href="http://junior.catsecurity.net/~unknown/check2.php"</script>';
}
if($cnt != 0 && $_SESSION['num'] != $_POST['code'])
{
echo '<script>location.href="http://junior.catsecurity.net/~unknown/check1.php"</script>';
}
echo "인증번호: ".$numall."</br>";
$cnt++;
?>

<html>
<script>
	var time = 30;
	function clock(){
	if(time >=0)
	document.getElementById("1").innerHTML = "제한 시간 : " + time + "초";
	if(time < 0)
	document.getElementById("1").innerHTML = "시간만료";
	if(time < -1)
	location.href="http://junior.catsecurity.net/~unknown/check1.php"
	time -= 1;
	setTimeout(clock, 1000);
	}
	</script>
	<head>
	<meta charset="UTF-8">
	</head>
	<body onload = "clock()">
			<h3 id =1></h3>
			<form method="POST" action="">
			<input type="text" name="name" placeholder = "name"></br>
			<input type="text" name="code">
			<input type="submit" value ="입력">
			<input type="hidden" name="cnt" value="<?=$cnt?>">
			</form>
			
	</body>
</html>
