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
            <li><a href="./main.php">Home</a></li>
            <li><a href="./first.php">first</a></li>
            <li><a href="./second.php">second</a></li>
			<li class="active"><a href="./third.php">third</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" style="float: none; margin:100 auto;">
        <h1>Can you run the XSS?? :)</h1>
        <p>XSS를 사용할 줄 아시나요?
			<div class="colorscripter-code" style="color:#010101;font-family:Consolas, 'Liberation Mono', Menlo, Courier, monospace !important; position:relative !important;overflow:auto"><table class="colorscripter-code-table" style="margin:0;padding:0;border:none;background-color:#fafafa;border-radius:4px;" cellspacing="0" cellpadding="0"><tr><td style="padding:6px;border-right:2px solid #e5e5e5"><div style="margin:0;padding:0;word-break:normal;text-align:right;color:#666;font-family:Consolas, 'Liberation Mono', Menlo, Courier, monospace !important;line-height:130%"><div style="line-height:130%">1</div><div style="line-height:130%">2</div><div style="line-height:130%">3</div><div style="line-height:130%">4</div><div style="line-height:130%">5</div></div></td><td style="padding:6px 0;text-align:left"><div style="margin:0;padding:0;color:#010101;font-family:Consolas, 'Liberation Mono', Menlo, Courier, monospace !important;line-height:130%"><div style="padding:0 6px; white-space:pre; line-height:130%"><span style="color:#ff3399">&lt;?php</span></div><div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#066de2">$inp</span>&nbsp;<span style="color:#0086b3"></span><span style="color:#a71d5d">=</span>&nbsp;<span style="color:#066de2">$_GET</span>[<span style="color:#63a35c">'XSS'</span>];</div><div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#066de2">$inp</span>&nbsp;<span style="color:#0086b3"></span><span style="color:#a71d5d">=</span>&nbsp;str_replace(<span style="color:#63a35c">"&lt;script&gt;"</span>,<span style="color:#63a35c">"DO&nbsp;NOT&nbsp;USE&nbsp;SCRIPT!"</span>,<span style="color:#066de2">$inp</span>);</div><div style="padding:0 6px; white-space:pre; line-height:130%">&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#066de2">echo</span>&nbsp;<span style="color:#066de2">$inp</span>;</div><div style="padding:0 6px; white-space:pre; line-height:130%"><span style="color:#ff3399">?&gt;</span></div></div><div style="text-align:right;margin-top:-13px;margin-right:5px;font-size:9px;font-style:italic"><a href="http://colorscripter.com/info#e" target="_blank" style="color:#e5e5e5text-decoration:none">Colored by Color Scripter</a></div></td><td style="vertical-align:bottom;padding:0 2px 4px 0"><a href="http://colorscripter.com/info#e" target="_blank" style="text-decoration:none;color:white"><span style="font-size:9px;word-break:normal;background-color:#e5e5e5;color:white;border-radius:10px;padding:1px">cs</span></a></td></tr></table></div>
		<br>이 페이지의 필터링 코드는 위와 같습니다!</p>
    </div>
	
	<div style="float: none; margin:100 auto;">
		<h1>
			<?php
				$inp = $_GET['XSS'];
				$inp = strtoupper($inp);
				echo $inp;
			?>
		</h1>
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
