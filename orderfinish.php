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
							 <p style = "text-align:right; font-family: consolas;  ">
	 							[회원정보]<br>
	 							<?php

								header("Content-Type:text/html; charset=UTF-8");
									 include("connect.php");
									 $connect= dbconn();

								$id= $_SESSION["id"];

								$query=" select * from usertbl where userID='$id'";

								$result= mysqli_query($connect,$query);
								$member= mysqli_fetch_array($result);

								if($member["sJob"] != NULL)
								 {
									 if ($member["sJob"] == "관리자")
									 {
										 echo "관리자 계정으로 로그인 했습니다.";
									 }
									 else
									 {
										 echo "직원 계정으로 로그인 했습니다.";
									 }
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
							if($member["sJob"] != NULL)
							{
								if ($member["sJob"] == "관리자")
								{
									echo "<li><a href='admin.php'>관리자 설정</a></li>";
								}
								else
								{
									echo "<li><a href='admin.php'>직원 설정</a></li>";
								}
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
              <div class = "container">
                <h1 calss="display3">주문 완료</h1>
              </div>

              <div class = "container">
                <h2 calss = "alert alert-danger">주문해 주셔서 감사합니다.</h2>
              </div>

              <div class"container">
                <p>주문은 3일 뒤에 배송될 예정입니다.</p>

                 </div>

                 <div class = "container">
                   <p><input type=submit  value = "메인으로 돌아가기" onclick="location.href='index_log.php'"></p/>

						</div>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<div class="inner" style = "font-family: consolas;">
							<section>
				                                <h2>[회원정보]</h2>
                              					<p>
												<?php


											  if($member["sJob"] != NULL)
											   {
											     if ($member["sJob"] == "관리자")
											     {
											       echo "관리자 계정으로 로그인 했습니다.";
											     }
											     else
											     {
											       echo "직원 계정으로 로그인 했습니다.";
											     }
											   }
											   else
											   {
											     echo "ID : " . $_SESSION['id'] . "</br>";
											   }
												?>
												</p>

								    <hr width = '1200px'>
                                    <p style = "font-size: 12px;">
                                    <?php
                                    $query33=" select * from company limit 1";

                                    $result33= mysqli_query($connect,$query33);
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
