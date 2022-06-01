<?php @session_start();?>
<?php
header("Content-Type:text/html; charset=UTF-8");
	 include("connect.php");
	 echo '<head> <link rel="stylesheet" href="assets/css/main17.css" > </head>';
	 $connect= dbconn();

$id= $_SESSION["id"];

$query1=" select * from usertbl where userID='$id'";

$result1= mysqli_query($connect,$query1);
$member1= mysqli_fetch_array($result1);

if($member1['sJob'] == 'NULL')
{
		echo "<script>"."windows.alert('관리자나 직원만 접속 가능합니다.');"."location.href='index_log.php';"."</script>";
	}

$selectPdtNo = $_POST["id2"];

	$query=" select * from producttbl where pdtNo = '$selectPdtNo'";

	$result= mysqli_query($connect,$query);

$member= mysqli_fetch_array($result);

	echo "<table border=1>";
	echo "<tr>  <th> 상품번호 </th> <th> 사진 </th> <th width=200px;> 이름 </th> <th> 카테고리 </th>
					<th> 색상 </th> <th> 사이즈 </th><th> 재고량 </th>
	 				<th> 설명 </th> <th> 브랜드 </th> <th> 가격 </th><th>  </th></tr>";

	echo "<tr>";
	#echo "<form >";
  echo "<form method='post' action='admin_doll_re_b.php'> ";
	#echo "<td>" . "NULL"    .  "</td>";
	echo "<td>" . $member['pdtNo']     .  "</td>";
  echo "<td>" .  "<image src = $member[pdtName].jpg width=150px height=150px >"    .  "</td>";
	echo "<td>" . $member['pdtName']     .  "</td>";
	echo "<td>" . "<input type = text placeholder='카테고리' value='$member[pdtCat]' name='pdtCat'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='색상' value='$member[pdtColor]' name='pdtColor'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='사이즈' value='$member[pdtSize]' name='pdtSize'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='재고량' value='$member[pdt_Rmn]' name='pdt_Rmn'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='설명' value='$member[pdt_Ctt]' name='pdt_Ctt'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='브랜드' value='$member[pdt_Brd]' name='pdt_Brd'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='가격' value='$member[pdt_Price]' name='pdt_Price'>"     .  "</td>";
	#echo "</form>";
  #echo "<form method='post' action='admin_doll_re_b.php'> ";
  echo "<td>" . "<input type = hidden   value='$member[pdtNo]' name = 're_b' ><input type=submit  value = '완료'  >  " .  "</td>" ;
  echo "</form>";
	echo "</tr>";
	echo "</table>";


?>
