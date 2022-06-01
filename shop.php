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
         <link rel="stylesheet" href="assets/css/main17.css" />
         <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
         <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->

		 <script>
			function Check_order(name,num,price)
			{

				if ( confirm("이 상품[ " + name + " ]을 구매 할까요?") == true  )
				{
					location.assign("order.php?" + "id=" + num + "&price=" + price);
				}
				else
				{

				}

			}
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
							<li><a href="order_view.php">주문내역</a></li>
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
				<form method='post' action='shop.php'>
				<input type = text placeholder='상품 이름' name='name' style="width:200px; float:left;">
				<input type=submit  value = '검색' style="width:200px; height:50px; clear:left;"   >
				<input type=button  value = '이름순' style="width:150px; height:50px; " onClick="location.assign('shop.php?' + 'id=이름' );"   >
				<input type=button  value = '판매인기순' style="width:150px; height:50px; " onClick="location.assign('shop.php?' + 'id=인기' );"    >
				<input type=button  value = '낮은가격순' style="width:150px; height:50px; "  onClick="location.assign('shop.php?' + 'id=낮은가격' );"   >
				<input type=button  value = '높은가격순' style="width:150px; height:50px; "  onClick="location.assign('shop.php?' + 'id=높은가격' );"   >
				</form>
	<section class="tiles">
		<?php
			header("Content-Type:text/html; charset=UTF-8");
			include("connect.php");
			$connect= dbconn();


			$search = $_POST["pdtName"];
			$fillter = $_GET["id"];

			if ($fillter == NULL)
			{
				if ($search  == NULL)
				{
					$query=" select * from producttbl";
				}
				else
				{
					$query=" select * from producttbl where pdtName Like( '%$search%' ) ";
				}
			}
			else
			{
				if ($fillter == "이름")
					$query=" select * from producttbl order by pdtName";
				if ($fillter == "인기")
					$query=" select * from producttbl order by pdtNo";
				if ($fillter == "낮은가격")
					$query=" select * from producttbl order by pdt_Price";
				if ($fillter == "높은가격")
					$query=" select * from producttbl order by pdt_Price desc";
			}

			$result= mysqli_query($connect,$query);

			while( $member = mysqli_fetch_array($result)  )
			{
				echo "<article >";
				echo "<span class='image'>";
				echo "<img src=$member[pdtName].jpg alt=''  >";
				echo "</span>";
				echo "<a   >";
				echo "<div class='content' onClick=Check_order('$member[pdtName]','$member[pdtNo]','$member[pdt_Price]') style='cursor:pointer;'>";
				echo "<p><h1 style='color:rgb(255,255,255);'>$member[pdtName] <br>  $member[pdt_Price]원 <br> $member[pdt_Ctt] <br> ♥ $member[pdtNo] </h1></p>";
				echo "</div>";
				echo "</a>";
				echo "</article>";

			}


		?>


	</section>
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
