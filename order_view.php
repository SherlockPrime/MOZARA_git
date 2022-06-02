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
						<li><a href="contact.php">문의하기</a></li>

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

		#    $query=" select * from member where id = '$_SESSION[id]' ";

		#	$result= mysqli_query($connect,$query);
	#		$member = mysqli_fetch_array($result);

$userid = $_SESSION['id'];

			$query="select * from ordertbl where userTBL_userID = '$userid'";

			$result= mysqli_query($connect,$query);

			echo "<table>";
			echo "<tr> <th> 주문번호 </th> <th> 상품이름 </th> <th> 수량 </th> <th> 총액 </th> </tr> ";
			while( $member = mysqli_fetch_array($result)  )
			{
				echo "<tr>";
				echo "<th>" . $member['ordNo']     .  "</th>";

				$query1="select * from producttbl where pdtNo in (select productTBL_pdtNo from orddettbl where orderTBL_ordNo = $member[ordNo]) ";

				$result1= mysqli_query($connect,$query1);
				$member1 = mysqli_fetch_array($result1);

				#echo "<th >" .  "<image src = $member1[pdtName].jpg  width=100px height=100px style='left:30px;' >"    .  "</th>";

				$query2="select * from orddettbl where orderTBL_ordNo = $member[ordNo] ";

				$result2= mysqli_query($connect,$query2);
				$member2 = mysqli_fetch_array($result2);

				$query23="select ordDetNum from orddettbl where orderTBL_ordNo = $member[ordNo] ";

				$result23= mysqli_query($connect,$query23);
				echo "<th>";
				while($member23 = mysqli_fetch_array($result23))
				{

					$query234="select * from producttbl where pdtNo in (select productTBL_pdtNo from orddettbl where ordDetNum = $member23[ordDetNum]) ";
					$result234= mysqli_query($connect,$query234);
					$member234 = mysqli_fetch_array($result234);

					echo $member234['pdtName']		.	"</br>";  #   .  "</th>";
				}
				echo "</th>";

				$query233="select ordDet_Qtt, ordDetNum from orddettbl where orderTBL_ordNo = $member[ordNo]";

				$result233= mysqli_query($connect,$query233);

				echo "<th>";
				while($member233 = mysqli_fetch_array($result233))
				{
					$query2346="select ordDet_Qtt from orddettbl where ordDetNum = $member233[ordDetNum]";
					$result2346= mysqli_query($connect,$query2346);
					$member2346 = mysqli_fetch_array($result2346);

					echo $member2346['ordDet_Qtt']		.	"</br>";  #   .  "</th>";
				}
				echo "</th>";
				echo "<th>" . $member['ordTot']     .  "</th>";
				echo "</tr>";
			}


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
