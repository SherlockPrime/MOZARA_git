<!DOCTYPE HTML>
<html>
	<head>
		<title>MOZARA</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main17.css" />
	</head>
	<body>
		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="inner">

                     <!-- Logo -->
                        <a href="index.php">

													 <div style="text-align : center;">
                           <span class="symbol"><img src=logos.jpg width="30%" alt"" /></span><span class="title"></span>
												 </div>
                        </a>
												<hr width ="100%"></hr>
							<!-- Nav -->
								<nav>
									<ul>
										<li><a href="#menu">Menu</a></li>
									</ul>
								</nav>

						</div>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<h2>메 뉴</h2>
						<ul>
							<li><a href="Join.php">회원가입</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">
						<div class="inner">
							<header>

							</header>

							<img src="bg1.jpg" alt=""  width="100%" height=900px >
							<img src="bg2.png" alt="" width="100%" height=900px >
						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner">
							<section>
                                                                <h2>Login</h2>
																																                   <form method="post" action="login_post.php">
                                                                        <div class="field half first">
                                                                                <input type="text" name="id" id="id" placeholder="ID" />
                                                                        </div>
                                                                        <div class="field half">
                                                                                <input type="password" name="pwd" id="pwd" placeholder="PASSWORD" />
                                                                        </div>
                                                                        <ul class="actions">
                                                                                <li><input type="submit" value="Login" class="special"/></li>
                                                                        </ul>
                                                                </form>
																																<hr width = '1200px'>
																																<p style = "font-size: 12px;">
																																<?php
																																header("Content-Type:text/html; charset=UTF-8");
																																	 include("connect.php");
																																	 $connect= dbconn();
																																$query33=" select * from company limit 1";
																																$result33= mysqli_query($connect, $query33);
																																$member33= mysqli_fetch_array($result33);

																																echo "상호: ". $member33['cpyName'] . "</br>";
																																echo "전화번호: ". $member33['cpyPhNum'] . "</br>";
																																echo "주소: ". $member33['cpyAddr'] . "</br>";
																																echo "이메일: ". $member33['cpyEmail'] . "</br>";
																																echo "대표: ". $member33['cpyCEO'] . "</br>";
																																 ?>
																																</p>
							</section>

						</div>

					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
