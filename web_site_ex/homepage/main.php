<html>
	<head>
	<meta charset="UTF-8">
		<title>Utack's hompage</title>
		<style>
		a{
			color:black;
			text-decoration: none;
            }
		ul#menu{
			float:right;
			padding: 0;
		}
		ul#menu li{
			display:inline;
		}
		ul#menu li a{ 
	    font-size:18px;
            background-color: black;
            color: white;
			text-decoration: none;
            }
	ul#menu li a:hover {
	background-color: white;
	color: black;
		}
	
		div{
			margin: auto;
		}		
		table{
			border: 0px; solid black;
			text-align: center;
		}
		h1{
		font-family: default;
		}

		body{
		background-image:url('d.png');
		background-repeat:no-repeat;
		background-position:50% 50%;
		}
		
	#menubar {
                        height: 40px;
                        width: 1200px;
                }

                #menubar ul li {
                        list-style: none;
                        color: white;
                        background-color: skyblue;
                        float: left;
                        line-height: 40px;
                        vertical-align: middle;
                        text-align: center;
                }

                #menubar .sel {
                        text-decoration:none;
                        color: white;
                        display: block;
                        width: 200px;
                        font-size: 17px;
                        font-weight: bold;
                        font-family: "default";
                }
                #menubar .sel:hover {
                        color: black;
                        background-color: white;
                }
				
				p{
					text-align: center;
				}
				
		 </style>
	</head>
	<body>
	   <h1 font-family="ITCBLKAD"><a href="http:///~unknown/homepage/main.php">TACK'S BOARD</a>
<nav id="menubar" >
		<ul>
			<li><a class="sel" href="http:///~unknown/homepage/freeboard.php">FreeBoard</a></li>
			<li>|</li>
			<li><a class="sel" href="http:///~unknown/homepage/mypage.php">MyPage</a></li>
			<li>|</li>
			<li><a class="sel" href="">Secret</a></li>
			<li>|</li>
			<li><a class="sel" href="">Secret</a></li>
			<li>|</li>
			<li><a class="sel" href="">Secret</a></li>
		</ul>
	</nav>
<ul id = "menu">
<?php
 session_start();
if(isset($_SESSION['id'])){
echo '<li><a href="http:///~unknown/homepage/logout.php">로그아웃</a></li>';
echo '<li><a href="http:///~unknown/homepage/mypage.php">마이페이지</a></li>';
}
else {
echo '<li><a href="http:///~unknown/homepage/login.php">로그인</a></li>';
echo ' <li><a href="http:///~unknown/homepage/signup.php">회원가입</a></li>';
echo '<li><a href="http:///~unknown/homepage/findpswd.php">비번찾기</a></li>';
}
	?>
</ul>
</br>
<p>
<img src="welcome.png">
</p>
</body>

</html>
