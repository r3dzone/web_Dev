<?php 
session_start();
$sa = $_POST['salo'];
$_SESSION['continue'] = '';

if($sa==1){
$_SESSION['a'] = $_POST['a'];
$_SESSION['str'] = $_POST['str'];
$_SESSION['c'] = $_POST['c'];
$_SESSION['cnt'] = $_POST['count'];
$_SESSION['continue'] = 1;
echo '<script>location.href="http://junior.catsecurity.net/~unknown/itgi.php"</script>';
}
if($sa==2){
$_SESSION['continue'] = 2;
echo '<script>location.href="http://junior.catsecurity.net/~unknown/itgi.php"</script>';
}
$sa = 0;

?>

