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

	$query=" select * from ordertbl";

	$result= mysqli_query($connect,$query);

	echo "<table border=1>";
	echo "<tr> <th> 주문번호 </th> <th> 사진 </th> <th> 아이디 </th> <th> 상품이름 </th> <th> 갯수 </th> <th> 가격 </th> <th> X </th> </tr> ";
	while( $member = mysqli_fetch_array($result)  )
	{
			echo "<tr>";
			echo "<td>" . $member['oNum']     .  "</td>";

			$query1=" select * from doll where dNum = '$member[dNum]' ";

			$result1= mysqli_query($connect,$query1);
			$member1 = mysqli_fetch_array($result1);

			echo "<td>" .  "<image src = $member1[Name].jpg width=150px height=150px >"    .  "</td>";

			$query2=" select * from member where mnum = '$member[mnum]' ";

			$result2= mysqli_query($connect,$query2);
			$member2 = mysqli_fetch_array($result2);

			echo "<td>" . $member2['id']     .  "</td>";
			echo "<td>" . $member1['Name']     .  "</td>";
			echo "<td>" . $member['Count']     .  "</td>";
			echo "<td>" . $member['TotalPrice']     .  "</td>";
			echo "<form method='post' action='admin_order_delete.php'>";
			echo "<td>" . " <input type = hidden   value='$member[oNum]' name = 'id' ><input type=submit  value = '삭제'  >   " .  "</td>" ;
			echo "</form>";
			echo "</tr>";

	}

	echo "</table>";


?>
