<?php 
session_start();

function jreset(){
global $nowlevel;
global $nowcash;
global $upgradecash;
global $sellcash;
global $okper;
global $permin;
global $mincnt;
global $nowcnt;
$nowlevel = 0;
$nowcash = 1000;
$upgradecash = 0;
$sellcash = 0;
$okper = 100;
$permin = 0.5;
$mincnt = 1;
$nowcnt = 0;
}


jreset();

function jsave()
{
	global $nowcash;
	global $nowlevel;
	global $morecash;
	global $num;
	global $sellcash;
	global $upgradecash;	

	if($num == 1)
{
	echo "실행중";
	if($nowcash >= 50000){
	$nowcash -= 50000;
    $nowlevel += 10;
	perup(10);
       $sellcash += 2000*10;
       $upgradecash += 300 *10;
	}else{
	echo "You Can't Not Buy This!</br>";
	$morecash = 50000-$nowcash;
	echo "you need ".$morecash."won</br>";
	}
}
 

if($num == 2)
{
	if($nowcash >= 1500000){
		$nowcash -= 1500000;
		$nowlevel += 15;
		$sellcash += 2000*15;
		$upgradecash += 300*15;
		perup(15);
	}else{
	echo "You Can't Not Buy This!</br>";
	$morecash = 1500000-$nowcash;
	echo "you need ".$morecash."won</br>";
	}
} 

if($num == 3)
{
	if($nowcash >= 999999999){
		$nowcash -= 999999999;
		$nowlevel += 1000;
		$sellcash += 2000*1000;
		$upgradecash += 300*1000;
		perup(1000);
	}else{
	echo "You Can't Not Buy This!</br>";
	$morecash = 999999999-$nowcash;
	echo "you need ".$morecash."won</br>";
	}
} 
}

 
function jper(){
	global $per;
	global $tmp;
	global $okper;
	
for($i=0; $i < 100; $i++ ){
	$per[$i] = 0;
}
for($i=0; $i < $okper ;$i++){
	$per[$i] = 1;
}
$tmp = $per[rand()%100];
} 
 
function perup($a){
	global $nowcnt;
	global $mincnt;
	global $permin;
	global $okper;
	
	for($i =0; $i < $a ; $i++){
	$nowcnt++;
	if($mincnt < $nowcnt)
	{
		$permin *= 2;
		$mincnt += 1;
		$nowcnt = 0;
	}
	$okper -= $permin;
	}
}
 
if($num == 4)
{
	
}

jreset();

$cnt = $_POST['cnt'];
if(isset($cnt)){
$num = $_POST['num'];
$exnum = $_POST['exnum'];
$nowlevel = $_POST['nowlevel']; 
$nowcash = $_POST['nowcash']; 
$upgradecash = $_POST['upgradecash']; 
$sellcash = $_POST['sellcash'];
$okper = $_POST['okper'];
$permin = $_POST['permin'];
$mincnt = $_POST['mincnt'];
$nowcnt = $_POST['nowcnt'];
}

if($_SESSION['continue']==1){
$cnt = $_SESSION['cnt']; 
$nowcnt = $_SESSION['nowcnt']; 
$mincnt =$_SESSION['mincnt'] ;
$permin =$_SESSION['permin'] ;
$exnum =$_SESSION['exnum'];
$nowlevel =$_SESSION['nowlevel'];
$nowcash =$_SESSION['nowcash'] ;
$upgradecash =$_SESSION['upgradecash']; 
$sellcash =$_SESSION['sellcash'];
$okper =$_SESSION['okper'];

	echo "save 성공!!";
	unset($_SESSION['continue']);
}

if($_SESSION['continue']==2){

$cnt = $_SESSION['cnt']; 
$nowcnt = $_SESSION['nowcnt']; 
$mincnt =$_SESSION['mincnt'] ;
$permin =$_SESSION['permin'] ;
$exnum =$_SESSION['exnum'];
$nowlevel =$_SESSION['nowlevel'];
$nowcash =$_SESSION['nowcash'] ;
$upgradecash =$_SESSION['upgradecash']; 
$sellcash =$_SESSION['sellcash'];
$okper =$_SESSION['okper'];

	echo "load 성공!!";
	unset($_SESSION['continue']);
}

jper();

if($exnum == 3){
jsave();
$exnum = "";
}

if($num == 1 && $exnum != 3){
if($tmp == 1)
	{
	$nowlevel += 1;
	$sellcash += 2000;
	$nowcnt++;
	if($mincnt < $nowcnt)
	{
		$permin *= 2;
		$mincnt += 1;
		$nowcnt = 0;
	}
	$okper -= $permin;
	$nowcash -= $upgradecash;
	$upgradecash += 300;
	if($nowcash < 0){
		echo "<script>alert('you are lose')</script>";
echo '<script>location.href="/~unknown/upgrade.php"</script>';	
	}

	
	}
	
	if($tmp == 0)
	{
	$nowcash -= $upgradecash;
	if($nowcash < 0){
		echo "<script>alert('you are lose')</script>";
    echo '<script>location.href="/~unknown/upgrade.php"</script>';	
	}
	}
}
if($num == 2 && $exnum != 3){
	$nowlevel = 0;
	$nowcash += $sellcash;
	$sellcash = 0;
	$okper = 100;
	$upgradecash = 0;
	$permin = 0.5;
	$mincnt = 1;
	$nowcnt = 0;
}

if($num == 3 && $exnum != 3){
echo "What Do You Want To Buy??"."</br>";
echo "1. +10 Level - Need 50000 Won"."</br>";
echo "2. +15 Level - Need 1500000 Won"."</br>";
echo "3. +1000 Level - Need  999999999 Won"."</br>";
echo "4. Nothing"."</br>";
$exnum = 3;
}
if($num == 9 && $exnum != 3){
jreset();
}

if($num != 3 && $exnum != 3){
echo "현재 레벨: ".$nowlevel." Level</br>"; 
echo "현재 금액: ".$nowcash." won</br>"; 
echo "강화 비용: ".$upgradecash." won</br>"; 
echo "판매 금액: ".$sellcash." won</br>"; 
echo "성공 확률: ".$okper."%</br>"; 
if($tmp == 1)
echo "<font color= 'green'> succes!!!</br></font>";
if($tmp == 0)
echo "<font color= 'red'> failed!!!</br></font>";
$next = $nowlevel+1;
echo "레벨 업 후의 레벨: ". $next ."Level</br>";
}

$cnt ++;
?>

<html>
   <script>
   
	</script>
	<head>
	<meta charset="UTF-8">
	</head>
	<body>
			<form method="POST" action = "">
			<input type="text" id ="sel" name="num">
			<input type="submit" value ="입력" >
			<input type="hidden" name="cnt" value="<?=$cnt?>">
			<input type="hidden" name="nowcnt" value="<?=$nowcnt?>">
			<input type="hidden" name="mincnt" value="<?=$mincnt?>">
			<input type="hidden" name="permin" value="<?=$permin?>">
			<input type="hidden" name="exnum" value="<?=$exnum?>">
			<input type="hidden" name="nowlevel" value="<?=$nowlevel?>">
			<input type="hidden" name="nowcash" value="<?=$nowcash?>">
			<input type="hidden" name="upgradecash" value="<?=$upgradecash?>">
			<input type="hidden" name="sellcash" value="<?=$sellcash?>">
			<input type="hidden" name="okper" value="<?=$okper?>">
			</form>
			
			<form method="POST" action="upgradesave.php">
			
			<input type="hidden" name="cnt" value="<?=$cnt?>">
			<input type="hidden" name="nowcnt" value="<?=$nowcnt?>">
			<input type="hidden" name="mincnt" value="<?=$mincnt?>">
			<input type="hidden" name="permin" value="<?=$permin?>">
			<input type="hidden" name="exnum" value="<?=$exnum?>">
			<input type="hidden" name="nowlevel" value="<?=$nowlevel?>">
			<input type="hidden" name="nowcash" value="<?=$nowcash?>">
			<input type="hidden" name="upgradecash" value="<?=$upgradecash?>">
			<input type="hidden" name="sellcash" value="<?=$sellcash?>">
			<input type="hidden" name="okper" value="<?=$okper?>">
			
			<input type="hidden" name="salo" value="1">
           
			<input type="submit" value ="save">
            </form> 

            <form method="POST" action="upgradesave.php">
			<input type="hidden" name="salo" value="2">
            <input type="submit" value ="load">
			</form>
	</body>
</html>
