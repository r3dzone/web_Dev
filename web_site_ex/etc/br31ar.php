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
//$brnum =$_SESSION['brnum'];
$brnum[0] =$_POST['cn1'];
$brnum[1] =$_POST['cn2'];
$brnum[2] =$_POST['cn3'];
$brnum[3] =$_POST['cn4'];
$brnum[4] =$_POST['cn5'];
$brnum[5] =$_POST['cn6'];
$brnum[6] =$_POST['cn7'];
$brnum[7] =$_POST['cn8'];
$brnum[8] =$_POST['cn9'];
$brnum[9] =$_POST['cn10'];
$brnum[10] =$_POST['cn11'];
$brnum[11] =$_POST['cn12'];
$brnum[12] =$_POST['cn13'];
$brnum[13] =$_POST['cn14'];
$brnum[14] =$_POST['cn15'];
$brnum[15] =$_POST['cn16'];
$brnum[16] =$_POST['cn17'];
$brnum[17] =$_POST['cn18'];
$brnum[18] =$_POST['cn19'];
$brnum[19] =$_POST['cn20'];
$brnum[20] =$_POST['cn21'];
$brnum[21] =$_POST['cn22'];
$brnum[22] =$_POST['cn23'];
$brnum[23] =$_POST['cn24'];
$brnum[24] =$_POST['cn25'];
$brnum[25] =$_POST['cn26'];
$brnum[26] =$_POST['cn27'];
$brnum[27] =$_POST['cn28'];
$brnum[28] =$_POST['cn29'];
$brnum[29] =$_POST['cn30'];
$brnum[30] =$_POST['cn31'];
$brnum[31] =$_POST['cn32'];

if($count < 31){
   	
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
		$count++;
		if($brnum[30] > 0 ){break;}
                $inputnum --;
                }
		if($brnum[30] > 0){break;}
                $u -= 1;
                }
		
		if($u == 0){

        while($pcnum > 0){
		array_push($brnum,'2');
		$count++;
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
			
			<input type="hidden" name="cn1" value="<?=$brnum[0]?>">
			<input type="hidden" name="cn2" value="<?=$brnum[1]?>">
			<input type="hidden" name="cn3" value="<?=$brnum[2]?>">
			<input type="hidden" name="cn4" value="<?=$brnum[3]?>">
			<input type="hidden" name="cn5" value="<?=$brnum[4]?>">
			<input type="hidden" name="cn6" value="<?=$brnum[5]?>">
			<input type="hidden" name="cn7" value="<?=$brnum[6]?>">
			<input type="hidden" name="cn8" value="<?=$brnum[7]?>">
			<input type="hidden" name="cn9" value="<?=$brnum[8]?>">
			<input type="hidden" name="cn10" value="<?=$brnum[9]?>">
			<input type="hidden" name="cn11" value="<?=$brnum[10]?>">
			<input type="hidden" name="cn12" value="<?=$brnum[11]?>">
			<input type="hidden" name="cn13" value="<?=$brnum[12]?>">
			<input type="hidden" name="cn14" value="<?=$brnum[13]?>">
			<input type="hidden" name="cn15" value="<?=$brnum[14]?>">
			<input type="hidden" name="cn16" value="<?=$brnum[15]?>">
			<input type="hidden" name="cn17" value="<?=$brnum[16]?>">
			<input type="hidden" name="cn18" value="<?=$brnum[17]?>">
			<input type="hidden" name="cn19" value="<?=$brnum[18]?>">
			<input type="hidden" name="cn20" value="<?=$brnum[19]?>">
			<input type="hidden" name="cn21" value="<?=$brnum[20]?>">
			<input type="hidden" name="cn22" value="<?=$brnum[21]?>">
			<input type="hidden" name="cn23" value="<?=$brnum[22]?>">
			<input type="hidden" name="cn24" value="<?=$brnum[23]?>">
			<input type="hidden" name="cn25" value="<?=$brnum[24]?>">
			<input type="hidden" name="cn26" value="<?=$brnum[25]?>">
			<input type="hidden" name="cn27" value="<?=$brnum[26]?>">
			<input type="hidden" name="cn28" value="<?=$brnum[27]?>">
			<input type="hidden" name="cn29" value="<?=$brnum[28]?>">
			<input type="hidden" name="cn30" value="<?=$brnum[29]?>">
			<input type="hidden" name="cn31" value="<?=$brnum[30]?>">
			<input type="hidden" name="cn32" value="<?=$brnum[31]?>">
		
			</form>
	</body>
</html>
