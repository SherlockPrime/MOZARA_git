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
         <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
         <link rel="stylesheet" href="assets/css/main17.css" >
         <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
         <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

		 <script>

		 </script>
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

							<?php
								if ($_SESSION['id'] == "admin")
								{
									echo "<li><a href='admin.php'>관리자 설정</a></li>";
								}
							?>
						<li> <a href='logout.php'> 로그아웃 </a></li>
					</ul>
				</nav>
	<?php
			header("Content-Type:text/html; charset=UTF-8");
			include("connect.php");
			$connect= dbconn();



			$ssid = $_SESSION['id'];
			$query=" select * from boardtbl where userTBL_userID = '$ssid' ";

			$result= mysqli_query($connect,$query);

			echo "<table>";
			echo "<tr> <th> 문의 번호 </th> <th> 문의 내용 </th> <th> 삭제하기 </th>  </tr> ";
			while( $member = mysqli_fetch_array($result)  )
			{
				echo "<tr height=80>";
				echo "<th >" . $member['boardNum']     .  "</th>";



				echo "<th>" . $member['boardCtt']     .  "</th>";
				echo "<form method='post' action='contact_delete.php'>";
				echo "<th>" . " <input type = hidden   value= $member[boardNum] name = 'name' ><input type=submit  value = '삭제'  >   " .  "</th>" ;
				echo "</form>";
				echo "</tr>";
				echo "<tr height=80>";



				$query1=" select * from boardcmttbl where boardTBL_boardNum = $member[boardNum] ";

				$result1= mysqli_query($connect,$query1);
				$member33 = mysqli_fetch_array($result1);
				if ( $member33["boardAnswer"] != NULL  )
				{
					echo "<th colspan=3> 문의 답변 : '$member33[boardAnswer]' </th> ";
				}
				else
				{
					echo "<th colspan=3> 문의 답변 :  </th> ";
				}
				echo "</tr>";
			}

			echo "<tr height=80> ";
			echo "<form method='post' action='contact_post.php'>";
			echo "<td>" . "NEW 문의"    .  "</td>";
			echo "<td>" . "<input type = text placeholder='문의내용' name='boardCtt'>"     .  "</td>";
			echo "<td>" . "<input type=submit  value = '추가'  >"   .  "</td>" ;

			echo "</form>";
			echo "</tr>";

			echo "</table>";


		?>
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
      <!-- Script -->
          <script src="assets/js/jquery.min.js"></script>
          <script src="assets/js/skel.min.js"></script>
          <script src="assets/js/util.js"></script>
          <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
          <script src="assets/js/main.js"></script>
   </body>
</html>
