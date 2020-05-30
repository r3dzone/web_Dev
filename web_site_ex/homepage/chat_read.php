<html>
	<head>
			<meta charset="UTF-8">
		<meta name="theme-color" content="gray">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">	
		<link rel="stylesheet" type="text/css" href="/css/style.css">
		
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
				
		<title>chat</title>
	</head>
	<body>
  <div id = "condiv" style="width:100%;" >
	    <table width="100%" align="center" class="table table-sm">
<?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$idx = $_GET['idx'];

$dbHost = 'localhost';
$dbId = '';
$dbPw = '';
$dbName = '';
$conn = mysqli_connect($dbHost,$dbId,$dbPw,$dbName);

#인코딩셋
mysqli_query($conn,"set session character_set_connection=utf8;");
mysqli_query($conn,"set session character_set_results=utf8;");
mysqli_query($conn,"set session character_set_client=utf8;");
		
	$res = mysqli_query($conn,'select mesg,nick from chat order by chatn desc;');
while($row = mysqli_fetch_array($res)){	
	echo "<tr>";
		echo "<td colspan='4' width='100%' j>";
		echo $row['nick'].":";
		$str = $row['mesg'];
		echo htmlentities($str);
		echo "</td>";
	echo "</tr>";
	}
?>
	   </table>
  </div>
 </br>
	</body>

</html>