<?php 
session_start();
$sa = $_POST['salo'];

if($sa==1){
$_SESSION['continue'] = 1;
$_SESSION['cnt'] = $_POST['cnt'];
$_SESSION['nowcnt'] = $_POST['nowcnt'];
$_SESSION['mincnt'] = $_POST['mincnt'];
$_SESSION['permin'] = $_POST['permin'];
$_SESSION['exnum'] = $_POST['exnum'];
$_SESSION['nowlevel'] = $_POST['nowlevel'];
$_SESSION['nowcash'] = $_POST['nowcash'];
$_SESSION['upgradecash'] = $_POST['upgradecash'];
$_SESSION['sellcash'] = $_POST['sellcash'];
$_SESSION['okper'] = $_POST['okper'];

echo '<script>location.href="http://junior.catsecurity.net/~unknown/upgrade.php"</script>';
}
if($sa==2){
$_SESSION['continue'] = 2;
$_SESSION['num'] = $_SESSION['save'];
echo '<script>location.href="http://junior.catsecurity.net/~unknown/upgrade.php"</script>';
}
$sa = 0;

?>

