<?php 
session_start();
$sa = $_POST['salo'];

if($sa==1){
$_SESSION['saveud'] = $_SESSION['num'];
$_SESSION['continue'] = 1;
$_SESSION['cnt'] = $_POST['cnt'];
echo '<script>location.href="http://junior.catsecurity.net/~unknown/updown.php"</script>';
}
if($sa==2){
$_SESSION['continue'] = 2;
$_SESSION['num'] = $_SESSION['saveud'];
echo '<script>location.href="http://junior.catsecurity.net/~unknown/updown.php"</script>';
}
$sa = 0;

?>

