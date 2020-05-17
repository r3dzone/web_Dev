 <?php
session_start();
$id =$_SESSION['id'];
$nick =$_SESSION['nick'];
?>
 <html>
	<head>
	<meta charset="UTF-8">
		<title>HTC's chat</title>
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
		background-image:url('back_ground.png');
		background-repeat:no-repeat;
		background-position:50% 50%;
		}
	
	div#condiv table{
			text-align: left;
		}
		 </style>
	</head>
	<body>
	
 <form method="POST" action="./chat_upload.php" name="reply">
	   <div style="border:3px solid skyblue ;width:700px;" >
	    <table border="1" width="700px" height="100px" align="center" name="table">
  
				<tr>
					<td colspan="5"><textarea rows = '7' cols = '100' name="mesg"></textarea>
					</td>
				</tr>		
				<tr>
					<td colspan="1"><input type="submit" name="submit" value="보내기"/></td>
				</tr>		
	   </table>
  </div>
 </form>

</body>

</html>