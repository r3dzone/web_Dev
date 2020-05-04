<?php 
session_start();
$sa = $_POST['salo'];
$_SESSION['continue'] = '';

if($sa==1){
$_SESSION['z'] = $_POST['z'];
$_SESSION['x'] = $_POST['x'];
$_SESSION['c'] = $_POST['c'];
$_SESSION['cnt'] = $_POST['count'];
$_SESSION['continue'] = 1;
echo '<script>location.href="http://junior.catsecurity.net/~unknown/sutja.php"</script>';
}
if($sa==2){
$_SESSION['continue'] = 2;
echo '<script>location.href="http://junior.catsecurity.net/~unknown/sutja.php"</script>';
}
$sa = 0;

?>

