<?php
session_start();
$_SESSION = array();
echo '<script>location.href="/main.php"</script>';
?>