<?
$file_name = "a.txt";//Download Filename
$path = "./upload/$file_name";
$file_size = filesize($path);

header("Pragma: public");
header("expires: 0");
header("content-Type: application/octet-stream");
header("content-Transfer-Encoding: binary");
header("content-Length: ".$file_size);
header('content-Disposition: attachment; filename="'.$file_name.'"');

ob_clean();
flush();
readfile($path);
?>
			 
