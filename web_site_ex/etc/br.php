<?php 
$pcnum = rand(1,3);
$brnum = 0;
$u = 0;
$inputnum = 0; 
$brnum = $_POST['br'];
$inputnum = $_POST['num'];
$u = $_POST['u'];
$count = $_POST['cnt'];
if($brnum < 31){
   	
	while(true){
                if($inputnum >3){
 		$u = 2;
		break;
		}
                if($count != 0 && $inputnum < 0){
 		$u = 2;
		break;
		}
		
		if($u == 1){
 		echo "you";
                while($inputnum > 0){
                $brnum = $brnum + 1;
		if($brnum >= 30){break;}
                $inputnum --;
                }
		if($brnum >= 30){break;}
                $u -= 1;
                }
		
		if($u == 0){
 	//	echo '<script> function a(){} setTimeout("a()",1000*3);</script>';
		echo "pc";
                while($pcnum > 0){
                $brnum = $brnum + 1;
		if($brnum >= 30){break;}
                $pcnum --;
                }
		if($brnum >= 30){break;}
                $u += 1;
		break;
                }
	}
                if($u == 2){
			$u = 1;
			echo "입력오류</br>";
			}

}

for($i=1; $i <= $brnum ;$i++){
	if($i%10==0){echo "</br>\n";}
	echo "==>".$i;
}
    
if($brnum >= 30){
if($u == 0 ){ 
echo "player lose";
}
 if($u == 1 ){ 
 echo "player win";
}
}          
$count++;
?>

<html>
	<head>
	<meta charset="UTF-8">
	</head>
	<body>
			<form method="POST" action="">
			<input type="text" name="num">
			<input type="submit" value ="입력">
			<input type="hidden" name="br" value="<?=$brnum?>">
			<input type="hidden" name="cnt" value="<?=$count?>">
			<input type="hidden" name="u" value="<?=$u?>">
			</form>
	</body>
</html>
