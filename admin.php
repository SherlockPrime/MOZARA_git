<?php @session_start();?>
<?php
include("connect.php");
?>
<!DOCTYPE HTML>

<html>
   <head>
      <title>MOZARA</title>

         <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1" />
         <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
         <link rel="stylesheet" href="assets/css/main17.css" />
         <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
         <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
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
						<li><a href="index_log.php">홈</a></li>
						<li><a href="shop.php">구경하기</a></li>
							<li><a href="order_view.php">주문내역</a></li>
							<li><a href="contact.php">문의하기</a></li>
							<?php
								if ($_SESSION['id'] == "admin")
								{
									//echo "<li><a href='board.php'>관리자 설정</a></li>";
								}
								else if(($_SESSION['id'] == "worldbest5") || ($_SESSION['id'] == "worldbest6") || ($_SESSION['id'] == "worldbest7"))
								{
									//echo "<li><a href='board.php'>직원 설정</a></li>";
								}
							?>
							<li> <a href='logout.php'> 로그아웃 </a></li>
					</ul>
				</nav>

	<table>

		<tr>

			  <td > <a href="admin_member.php" target="admin" >  회원 관리   </a> </td>


		</tr>



		<tr>

			<td > <a href="admin_doll.php" target="admin" >  상품 관리   </a> </td>


		</tr>

		<tr>

			<td > <a href="admin_order.php" target="admin" >  주문 관리   </a> </td>


		</tr>

		<tr>

			<td > <a href="admin_contact.php" target="admin" >  문의 관리   </a> </td>


		</tr>
	</table>

	<iframe src = "" width=90% height=500px name="admin" > </iframe>

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
											else if(($_SESSION['id'] == "worldbest5") || ($_SESSION['id'] == "worldbest6") || ($_SESSION['id'] == "worldbest7"))
											{
												echo "직원 계정으로 로그인 했습니다.";
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
      <!-- Script -->
          <script src="assets/js/jquery.min.js"></script>
          <script src="assets/js/skel.min.js"></script>
          <script src="assets/js/util.js"></script>
          <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
          <script src="assets/js/main.js"></script>
   </body>
</html>
