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

if($member1['sJob'] == NULL)
{
		echo "<script>"."windosw.alert('관리자나 직원만 접속 가능합니다.');"."location.href='index_log.php';"."</script>";
	}

	$query=" select * from producttbl";

	$result= mysqli_query($connect,$query);

	echo "<table border=1>";
	echo "<tr>  <th> 상품번호 </th> <th> 사진 </th> <th> 이름 </th> <th> 가격 </th> <th> 설명 </th> <th> X </th> </tr>";
	while( $member = mysqli_fetch_array($result)  )
	{
		echo "<tr>";
		echo "<td>" . $member['pdtNo']     .  "</td>";
		echo "<td>" .  "<image src = $member[pdtName].jpg width=150px height=150px >"    .  "</td>";
		echo "<td>" . $member['pdtName']     .  "</td>";
		echo "<td>" . $member['pdt_Price']     .  "</td>";
		echo "<td>" . $member['pdt_Ctt']     .  "</td>";
		echo "<form method='post' action='admin_doll_delete.php'> ";
		echo "<td>" . "<input type = hidden   value='$member[pdtNo]' name = 'id' ><input type=submit  value = '삭제'  >  " .  "</td>" ;
		echo "</form>";
		echo "</tr>";

	}
	echo "<tr>";
	echo "<form method='post' action='admin_doll_insert.php'>";
	echo "<td>" . "NULL"    .  "</td>";
	echo "<td>" . "<input type = text placeholder='Name' name='pdtName'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='Price' name='pdt_Price'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='Intro' name='pdt_Ctt'>"     .  "</td>";
	echo "<td>" . "<input type=submit  value = '추가'  >"   .  "</td>" ;

	echo "</form>";
	echo "</tr>";
	echo "</table>";


?>
