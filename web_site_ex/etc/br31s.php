<?php 
session_start();
$pcnum = rand(1,3);
$inputnum = 0;
$u = 0;
$u = $_POST['u'];
$inputnum = $_POST['num'];
$count = 0;
$count  = $_POST['cnt'];
$brnum = array();
if($count != 0)
$brnum = $_SESSION['brnum'];


if(count($brnum) < 31){
   	
	while(true){
        if($inputnum >3){
 		$u = 2;
		break;
		}
        if($count != 0 && $inputnum <= 0){
 		$u = 2;
		break;
		}
		
		if($u == 1){
        while($inputnum > 0){
        array_push($brnum,'1');
		if($brnum[30] > 0 ){break;}
                $inputnum --;
                }
		if($brnum[30] > 0){break;}
                $u -= 1;
                }
		
		if($u == 0){

        while($pcnum > 0){
		array_push($brnum,'2');
		if($brnum[29] == '2'){break;}
		if($brnum[30] > 0){break;}
                $pcnum --;
                }
		if($brnum[30] > 0){break;}
                $u += 1;
				break;
                }
	}
                if($u == 2){
			$u = 1;
			echo "입력오류</br>";
			}

}

for($i=1; $i < count($brnum)+1 ;$i++){
	if($i%10==0){echo "</br>\n";}
	if($brnum[$i-1] == '2')echo "<font color= 'red'>";
	if($brnum[$i-1] == '1')echo "<font color= 'blue'>";
	echo "==>".$i."</font>";
}
	
    
$_SESSION['brnum'] = $brnum;

if($brnum[30] > 0){
if($brnum [30] == '1'   ){ 
echo "player lose";
}
 if($brnum [30] == '2'){ 
 echo "player win";
}
}  

function savese(){
	echo "save ok";
	$_SESSION['savese'] = $_SESSION['brnum'];
	echo "save ok";
	echo '<script>location.href="http://junior.catsecurity.net/~unknown/br31s.php"</script>';
}
        function loadse(){
			$_SESSION['brnum'] = $_SESSION['savese'];
			echo '<script>location.href="http://junior.catsecurity.net/~unknown/br31s.php"</script>';
			}
$count++;
?>

<html>
   <script>
   
	</script>
	<head>
	<meta charset="UTF-8">
	</head>
	<body id=1>
			<form method="POST" action="">
			<input type="text" name="num">
			<input type="submit" value ="입력">
			<input type="button" value ="save" onclick = '<?php savese();
	 ?>'></input> 
			<input type="button" value ="load" onclick = '<?php loadse();
	?> '></input> 
			<input type="hidden" name="cnt" value="<?=$count?>">
			<input type="hidden" name="u" value="<?=$u?>">
			</form>
	</body>
</html>
