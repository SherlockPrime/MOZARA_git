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


              <div id="detail_container">
                  <section id="detail_img_wrap">
                    <?php
#$pdtNm=$_POST["pdtName99"];
										#$pdtNm=request.getParameter($member['pdtNo']);
                    $pdtN=$_POST["pdtNo"];
                    $query1 = "select * from producttbl where pdtNo = '$pdtN'";

                    $result1= mysqli_query($connect,$query1);
                    $member1= mysqli_fetch_array($result1);
                      #echo "<img src=$member1[pdtName].jpg' width=150px height=150px>"
                      echo "<img src='$member1[pdtName].jpg' alt=''  >";
                      ?>
                  </section>
                  <section id="detail_wrap">
                      <table id="detail_table">
                          <tr>
                              <th>브랜드</th>

                               <td>
                                 <?php
                                 $pdtN=$_POST["pdtNo"];
                                 $query1 = "select * from producttbl where pdtNo = '$pdtN'";

                                 $result1= mysqli_query($connect,$query1);
                                 $member1= mysqli_fetch_array($result1);
                                   echo "$member1[pdt_Brd]";
                                   ?>
                               </td>
                          </tr>
                          <tr>
                              <th>제품명</th>
                              <td>
                                <?php
                                $pdtN=$_POST["pdtNo"];
                                $query1 = "select * from producttbl where pdtNo = '$pdtN'";

                                $result1= mysqli_query($connect,$query1);
                                $member1= mysqli_fetch_array($result1);
                                  echo "$member1[pdtName]";
                                  ?>
                              </td>
                          </tr>
                          <tr>
                              <th>분류</th>
                              <td>
                                <?php
                                $pdtN=$_POST["pdtNo"];
                                $query1 = "select * from producttbl where pdtNo = '$pdtN'";

                                $result1= mysqli_query($connect,$query1);
                                $member1= mysqli_fetch_array($result1);
                                  echo "$member1[pdt_Ctt]";
                                  ?>
                              </td>
                          </tr>
                          <tr>
                              <th>가격</th>
                              <<td>
                                <?php
                                $pdtN=$_POST["pdtNo"];
                                $query1 = "select * from producttbl where pdtNo = '$pdtN'";

                                $result1= mysqli_query($connect,$query1);
                                $member1= mysqli_fetch_array($result1);
                                  echo "$member1[pdt_Price]";
                                  ?>
                              </td>
                          </tr>

                      </table>
<?php
$pdtN=$_POST["pdtNo"];
$query1 = "select * from producttbl where pdtNo = '$pdtN'";

$result1= mysqli_query($connect,$query1);
$member1= mysqli_fetch_array($result1);

                      echo "<form method='post' action='cart.php'>";
                      	echo "<Input type='hidden' name='pdtNo' value='$member1[pdtNo]'>";
                    	  echo "<Input type='submit' value='장바구니 담기'>";

                      echo "</form>";
?>


                  </section>
              </div>

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
                                      echo "ID : ". $_SESSION['id'];
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
