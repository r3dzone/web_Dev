<html>
	<head>
	<meta charset="UTF-8">
		<title>글 쓰기</title>
		<style>
		
		div{
		margin: auto;
		}
		
		table{
			border: 0px; solid black;
			text-align: center;
		}
		h1{
		font-family: Serif;
		color:skyblue;
		}

		body{
		background-image:url('back_ground.png');
		background-repeat:no-repeat;
		background-position:50% 50%;
		}
		 </style>
	</head>
			<script>
			function check(){
				form = document.write;
				if(form.contentname.value == ""){
					alert("제목이 지정되지 않았습니다.");
				return form.contentname.focus();
				}
				if(form.content.value == ""){
					alert("내용이 비어있습니다.");
				return form.content.focus();
				}
				form.submit();
			}
			</script>
	<body>
		<h1 align="center" font-family="ITCBLKAD"> 글 작성하기
	 
	 
	 <form method="POST" action="./freeboarddbupload.php" name="write" enctype="multipart/form-data">
	   
	   <div style="border:3px solid skyblue ;width:1000px;" >
	    <table border="1" width="1000px" height="500px" align="center" name="table">
				<tr>
				<td colspan="6">제목 :<input type="text" name="contentname" style = 'width:700px'/></td>
				<td colspan="1"><input type="checkbox" name="secret" value="1">비밀글</td>				
				<td colspan="1"><input type="submit" name="submit" value="글쓰기" onclick="check()"/></td>
				</tr>
				<tr>
					<td colspan="8"><textarea rows = '30' cols = '130' name="content"></textarea>
					</td>
				</tr>
				<tr>				
				<td colspan = "8">첨부 :<input type="file" name="uploadfile"/></td>
				</tr>					
	   </table>
  </div>
 </form> 
</body>

</html>
