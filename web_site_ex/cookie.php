<?php
setcookie("cookieName","cookieValue",time()+(60*60*24));
echo $_COOKIE["cookieName"];
?>
