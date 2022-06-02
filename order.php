<?php @session_start();?>
<?php
	if ($_SESSION['id'] == NULL)
	{
		echo "<script>"."window.alert('회원만 접속 가능합니다.');"."location.href='index.php';"."</script>";
	}

	header("Content-Type:text/html; charset=UTF-8");
	include("connect.php");
	$connect= dbconn();
	#$dnum= $_GET["id"];
	#$price= $_GET["price"];
	$id= $_SESSION['id'];
	$sum = $_POST['sum'];
#	$date = $_POST['date'];


	$query55="select * from cart where userTBL_userID ='$id' ";

	$result55= mysqli_query($connect,$query55);
	$cart= mysqli_fetch_array($result55);

	#if ( $cartnull['productTBL_pdtNo'] == NULL or $cartnull['userTBL_userNo'] == NULL or $cartnull['Qtt'] == NULL )
	#{
	#	echo "<script>"."window.alert('상품이 존재하지 않습니다.');"."location.href='cart.php';"."</script>";
	#}

	$query="insert into ordertbl(ordTot, userTBL_userID) values($sum, '$id')";
	$result= mysqli_query($connect,$query);


	$query555="select productTBL_pdtNo from cart where userTBL_userID ='$id' ";

	$result555= mysqli_query($connect,$query555);


	while($ord= mysqli_fetch_array($result555)) {
		$query5565="select * from cart where productTBL_pdtNo ='$ord[productTBL_pdtNo]' ";

		$result5565= mysqli_query($connect,$query5565);
		$ord2= mysqli_fetch_array($result5565);
	$query34="insert into orddettbl(ordDet_Qtt,productTBL_pdtNo,orderTBL_ordNo) values($ord2[Qtt], $ord[productTBL_pdtNo],
	(select ordNo from ordertbl where userTBL_userID = '$id' order by ordNo desc limit 1))";
	$result34= mysqli_query($connect,$query34);

	#$member= mysqli_fetch_array($result);
}
$query55655="delete from cart where userTBL_userID = '$id'";

$result55655= mysqli_query($connect,$query55655);

	#$mnum = $member['userTBL_userID'];


	echo "<script>"."window.alert('감사합니다! 주문 내역을 확인해주세요.');"."location.href='orderfinish.php';"."</script>";



?>
