 <?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
$replyn = $_GET['replyn'];
$kn = $_GET['kn'];
?>
 <html>
	<head>
	<meta charset="UTF-8">
		<title>Utack's board</title>
		<style>
		div{
		margin: auto;
		text-align: left;
		}
		
		table{
			border: 0px; solid black;
			text-align: center;
		}
		h1{
		font-family: Cursive;
		color:skyblue;
		}

		body{
		background-image:url('d.png');
		background-repeat:no-repeat;
		background-position:50% 50%;
		}
	
	div#condiv table{
			text-align: left;
		}
		 </style>
	</head>
	<body>
	
 <form method="POST" action="./replydbupload.php" name="reply">
	   <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" height="100px" align="center" name="table">
  
				<tr>
					<td colspan="5"><textarea rows = '7' cols = '100' name="reply"></textarea>
					</td>
				</tr>		
				<input type="hidden" name="kn" value ="<?=$kn?>">
				<input type="hidden" name="replyn" value ="<?=$replyn?>">
				<tr>
					<td colspan="1"><input type="checkbox" name="secret" value="1">비밀 답글</td>	
					<td colspan="1"><input type="submit" name="submit" value="답글 작성"/></td>
				</tr>		
	   </table>
  </div>
 </form>

</body>

</html>