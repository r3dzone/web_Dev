<? 
$str="here!"; 
function getfile(){ 
global $str; 
return $str; 
} 
?> 
<html> 
<head> 
<title>test</title> 
<script language="javascript"> 
function getfile(){ 
alert("<?echo getfile();?>"); 
} 
</script> 
</head> 
<body> 
<input type="button" value="click me" onclick="getfile()"></input> 
</body> 
</html> 
