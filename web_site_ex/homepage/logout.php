<?php
session_start();
unset($_SESSION['id']);
echo '<script>location.href="http://hypertime.tk/main.php"</script>';
?>