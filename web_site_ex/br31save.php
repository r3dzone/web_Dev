<?php 
session_start();
$sa = $_POST['salo'];

if($sa==1){
$_SESSION['savebr'] = $_SESSION['brnum'];
$_SESSION['continue'] = 1;
echo '<script>location.href="http://junior.catsecurity.net/~unknown/br31.php"</script>';
}
if($sa==2){
	if(isset($_SESSION['savebr'])){
$_SESSION['brnum'] = $_SESSION['savebr'];
$_SESSION['cnt'] = 1;
	}
echo '<script>location.href="http://junior.catsecurity.net/~unknown/br31.php"</script>';
}
$sa = 0;

?>

