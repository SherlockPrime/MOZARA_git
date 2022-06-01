<?php @session_start();?>
<?php

	if ($_SESSION['id'] == NULL)
	{
		echo "<script>"."window.alert('로그인이 필요합니다.');"."location.href='index.php';"."</script>";
	}
?>
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
							 <a href="index_log.php">

								 <div style="text-align : center;">
									<span class="symbol"><img src=logos.jpg width="30%" alt"" /></span><span class="title"></span>
							 </div>
							 </a>
							 <p style = "text-align:right; font-family: 휴먼편지체;  ">
	 							[회원정보]<br>
	 							<?php

								header("Content-Type:text/html; charset=UTF-8");
									 include("connect.php");
									 $connect= dbconn();
								session_start();
								$id= $_SESSION["id"];

								$query=" select * from usertbl where userID='$id'";

								$result= mysqli_query($connect,$query);
								$member= mysqli_fetch_array($result);

	 								if($member["sJob"] != NULL)
									{
										if ($_SESSION['id'] == "admin")
		 								{
		 									echo "관리자 계정으로 로그인 했습니다.";
		 								}
										echo "직원 계정으로 로그인 했습니다.";
									}
	 								else
	 								{
	 									echo "ID : ". $_SESSION['id'];
	 								}
	 							?>
	 						</p>
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
						<h2>Menu</h2>
						<ul>
							<li><a href="index_log.php">홈</a></li>
							<li><a href="shop.php">구경하기</a></li>
							<li><a href="order_view.php">주문내역</a></li>
							<li><a href="contact.php">문의하기</a></li>
							<?php
								if ($_SESSION['id'] == "admin")
								{
									echo "<li><a href='admin.php'>관리자 설정</a></li>";
								}
								else if(($_SESSION['id'] == "worldbest5") || ($_SESSION['id'] == "worldbest6") || ($_SESSION['id'] == "worldbest7"))
								{
									echo "<li><a href='admin.php'>직원 설정</a></li>";
								}
							?>
							<li> <a href='logout.php'> 로그아웃 </a></li>
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
						<div class="inner" style = "font-family: 휴먼편지체;">
							<section>
				                                <h2>[회원정보]</h2>
                              					<p>
												<?php
													if ($_SESSION['id'] == "admin")
													{
														echo "관리자 계정으로 로그인 했습니다.";
													}
													else
													{
														echo "<h2>ID : ". $_SESSION['id'] . "</h2>";
													}
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
