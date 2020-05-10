<?php 
session_start();
$pcnum = rand(1,3);
$inputnum = 0;
$u = 0;
$u = $_POST['u'];
$inputnum = $_POST['num'];
$count = 0;
$count  = $_POST['cnt'];
if(isset($_SESSION['cnt']))
{
$count = $_SESSION['cnt'];
$u = 3;
unset($_SESSION['cnt']);
}
$brnum = array();
if($count != 0)
{
	$brnum = $_SESSION['brnum'];
	}
	if($_SESSION['continue'] == 1)
{

	$u = 4;
	$brnum = $_SESSION['brnum'];
    unset($_SESSION['continue']);
	}


if(count($brnum) < 31){
   	
	while(true){
        if($inputnum >3){
 		$u = 2;
		break;
		}
		 if($u == 3){
		break;
			}
			if($u == 4){
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
			 if($u == 3){
			$u = 1;
			echo "LOAD 성공</br>";
			}
			 if($u == 4){
			$u = 1;
			echo "SAVE 성공</br>";
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
			<input type="hidden" name="cnt" value="<?=$count?>">
			<input type="hidden" name="u" value="<?=$u?>">
			</form>
			
			<form method="POST" action="br31save.php">
			<input type="hidden" name="salo" value="1">
            <input type="hidden" name="cnt" value="<?=$count?>">
			<input type="submit" value ="save">
            </form> 

            <form method="POST" action="br31save.php">
			<input type="hidden" name="salo" value="2">
            <input type="submit" value ="load">
            </form> 			
			
	</body>
</html>
