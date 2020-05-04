<?php 
session_start();
if(isset($_POST['z'])){
	$z = $_POST['z'];
    $x = $_POST['x'];
    $c = $_POST['c'];
}
else{
$z = rand(0,9);
$x = rand(0,9);
$c = rand(0,9);

while($z == $x){$x = rand(0,9);}
while($z == $c || $x == $c){$c = rand(0,9);}
}
$ba = 0;
$st = 0;
$count = 0;

$ba = 0; 
$st = 0;
$num1 = $_POST['post'];
$count = $_POST['count'];
if($_SESSION['continue']==1){
	$z = $_SESSION['z'];
    $x = $_SESSION['x'];
    $c = $_SESSION['c'];
	$count = $_SESSION['cnt'];
	echo "save 성공!!";
	unset($_SESSION['continue']);
}
if($_SESSION['continue'] == 2){
	$z = $_SESSION['z'];
    $x = $_SESSION['x'];
    $c = $_SESSION['c'];
    $count = $_SESSION['cnt'];
		echo "load 성공!!";
unset($_SESSION['continue']);
}

$a = 0;//사용자 예상
$s = 0;
$d = 0;

$a = ($num1/100)%10;
$s = ($num1/10)%10;
$d = $num1%10;

if($z == $s || $z == $d ){$ba++;}
if($x == $a || $x == $d ){$ba++;}
if($c == $a || $c == $s ){$ba++;}
if($z == $a){$st++;}
if($x == $s){$st++;}
if($c == $d){$st++;}

$count ++;
if($count > 9){
	echo 
	"<script>alert('게임 종료... 아쉽네요')</script>";
    echo '<script>location.href="http://junior.catsecurity.net/~unknown/sutja.php"</script>';			
}
if($st == 3){
	echo 
	"<script>alert('게임 클리어! 대단하시네요!')</script>";
    echo '<script>location.href="http://junior.catsecurity.net/~unknown/sutja.php"</script>';			
}
echo $count."회차".$ba."볼".$st."스트라이크";
if($ba==0&&$st==0){
	echo " out!";
	}
$ba = 0; 
$st = 0;
?>

<html>
	<head>
	<meta charset="UTF-8">
	</head>
	<body>
			<form method="POST" action="">
			<input type="text" name="post">
			<input type="submit" value ="입력">
			
			<input type="hidden" name="count" value="<?=$count?>">
			<input type="hidden" name="z" value="<?=$z?>">
			<input type="hidden" name="x" value="<?=$x?>">
			<input type="hidden" name="c" value="<?=$c?>">
			</form>
			
			<form method="POST" action="sutjasave.php">
			
			<input type="hidden" name="count" value="<?=$count?>">
			<input type="hidden" name="z" value="<?=$z?>">
			<input type="hidden" name="x" value="<?=$x?>">
			<input type="hidden" name="c" value="<?=$c?>">
			<input type="hidden" name="salo" value="1">
           
			<input type="submit" value ="save">
            </form> 

            <form method="POST" action="sutjasave.php">
			<input type="hidden" name="salo" value="2">
            <input type="submit" value ="load">
            </form>
			
	</body>
	
</html>
