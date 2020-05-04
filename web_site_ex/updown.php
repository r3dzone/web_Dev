<?php 
session_start();
$num = mt_rand(0,50);
$cnt = 0;
if(isset($_POST['cnt']))
$cnt = $_POST['cnt'];
if($_SESSION['continue']==1){
$cnt =  $_SESSION['cnt'];
$cnt -= 1; 
}
$inputnum = $_POST['number'];
if($cnt == 0)
$_SESSION['num'] = $num;
$hnum = $_SESSION['num'];

if($_SESSION['continue']==1){
	$hnum = $_SESSION['saveud'];
	echo "save 성공";
	unset($_SESSION['continue']);
}
if($_SESSION['continue']==2){
	$hnum = $_SESSION['saveud'];
	$cnt =  $_SESSION['cnt'] - 1;
	echo "load 성공";
	unset($_SESSION['continue']);
}

if($inputnum > 50 || $inputnum < 0)echo "입력오류";
if($hnum == $inputnum)
{
	echo "<script>alert('clear!!!')</script>";
}
	else if($hnum > $inputnum)
		echo $cnt."회 째"."<h1>up</h1>";
			else if($hnum < $inputnum)
			echo $cnt."회 째"."<h1>down</h1>";
		
$cnt++;

if($cnt > 10)
{
	echo "<script>alert('10회 이내 실패')</script>";
echo '<script>location.href="http://junior.catsecurity.net/~unknown/updown.php"</script>';	
}
?>

<html>
<script>
	
	</script>
	<head>
	<meta charset="UTF-8">
	</head>
	<body>
	
			<form method="POST" action="">
			<input type="text" name="number">
			<input type="submit" value ="입력">
			<input type="hidden" name="cnt" value="<?=$cnt?>">
			</form>
			
				<form method="POST" action="udsave.php">
					<input type="hidden" name="cnt" value="<?=$cnt?>">
			<input type="hidden" name="salo" value="1">
           
			<input type="submit" value ="save">
            </form> 

            <form method="POST" action="udsave.php">
			<input type="hidden" name="salo" value="2">
            <input type="submit" value ="load">
            </form>
			
	</body>
</html>
