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

	$query=" select * from producttbl";

	$result= mysqli_query($connect,$query);

	echo "<table border=1>";
	echo "<tr>  <th> 상품번호 </th> <th> 사진 </th> <th> 이름 </th> <th> 카테고리 </th>
					<th> 색상 </th> <th> 사이즈 </th><th> 재고량 </th>
	 				<th> 설명 </th> <th> 브랜드 </th> <th> 가격 </th><th> 수정 </th> <th> 삭제 </th>  <th> 추가 </th></tr>";
	while( $member = mysqli_fetch_array($result)  )
	{
		echo "<tr>";
		echo "<td>" . $member['pdtNo']     .  "</td>";
		echo "<td>" .  "<image src = $member[pdtName].jpg width=150px height=150px >"    .  "</td>";
		echo "<td>" . $member['pdtName']     .  "</td>";
		echo "<td>" . $member['pdtCat']     .  "</td>";
		echo "<td>" . $member['pdtColor']     .  "</td>";
		echo "<td>" . $member['pdtSize']     .  "</td>";
		echo "<td>" . $member['pdt_Rmn']     .  "</td>";
		echo "<td>" . $member['pdt_Ctt']     .  "</td>";
		echo "<td>" . $member['pdt_Brd']     .  "</td>";
		echo "<td>" . $member['pdt_Price']     .  "</td>";
		echo "<form method='post' action='admin_doll_re.php'> ";
		echo "<td>" . "<input type = hidden   value='$member[pdtNo]' name = 'id2' ><input type=submit  value = '수정'  >  " .  "</td>" ;
		echo "</form>";
		echo "<form method='post' action='admin_doll_delete.php'> ";
		echo "<td>" . "<input type = hidden   value='$member[pdtNo]' name = 'id' ><input type=submit  value = '삭제'  >  " .  "</td>" ;
		echo "</form>";
		echo "<td>" . " "     .  "</td>";
		echo "</tr>";

	}
	echo "<tr>";
	echo "<form method='post' action='admin_doll_insert.php'>";
	#echo "<td>" . "NULL"    .  "</td>";
	echo "<td>" . "<input type = text placeholder='상품번호' name='pdtNo'>"     .  "</td>";
	echo "<td>" . "이미지"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='상품이름' name='pdtName'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='카테고리' name='pdtCat'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='색상' name='pdtColor'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='사이즈' name='pdtSize'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='재고량' name='pdt_Rmn'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='설명' name='pdt_Ctt'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='브랜드' name='pdt_Brd'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='가격' name='pdt_Price'>"     .  "</td>";
	echo "<td>" . " "     .  "</td>";
	echo "<td>" . " "     .  "</td>";
	echo "<td>" . "<input type=submit  value = '추가'  >"   .  "</td>" ;

	echo "</form>";
	echo "</tr>";
	echo "</table>";


?>
