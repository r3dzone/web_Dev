<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>시스템보안 XSS 챌린지</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  </head>

  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./main.php">XSS chalenge</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="./main.php">Home</a></li>
            <li><a href="./first.php">first</a></li>
            <li><a href="./second.php">second</a></li>
			<li><a href="./third.php">third</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" style="float: none; margin:100 auto;">
        <h1>Can you run the XSS?? :)</h1>
        <p>
			XSS를 사용할 줄 아시나요?
			<br>이 페이지는 HTML코드를 입력하면 해당 HTML코드를 실행해줍니다!
			<br>각 페이지 마다 다른식으로 XSS를 필터링하고 있습니다.
			<br>마지막 페이지까지 XSS를 실행시켜 보세요! :)
		</p>
    </div>
	<div style="float: none; margin:100 auto;">
		<h1><?php echo $_GET['XSS']; ?></h1>
	</div>
	<table border="1" width="550px" height="100px" align="center" class="table">
		<form method="GET" action="" name="form">
			<tr>
				<td>XSS Input</td>
			</tr>
			<tr>	
				<td><textarea cols="100" rows="10" name="XSS"></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="submit!" align="center"/></td>
			</tr>
		</form>
	</table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  </body>
</html>
