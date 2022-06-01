<?php @session_start();?>
<?php
	if ($_SESSION['id'] == NULL)
	{
		echo "<script>"."window.alert('회원만 접속 가능합니다.');"."location.href='index.php';"."</script>";
	}

	header("Content-Type:text/html; charset=UTF-8");
	include("connect.php");
	$connect= dbconn();
	$dnum= $_GET["id"];
	$price= $_GET["price"];
	$id= $_SESSION['id'];

	if ( $dnum == NULL or $price == NULL   )
	{
		echo "<script>"."window.alert('잘못된 접근입니다..');"."location.href='shop.php';"."</script>";
	}



	$query="select * from usertbl where userID ='$id' ";

	$result= mysqli_query($connect,$query);
	$member= mysqli_fetch_array($result);

	$mnum = $member['userTBL_userID'];

	$query="select * from ordertbl where ordNo ='$dnum' and userTBL_userID = '$mnum'  ";

	$result= mysqli_query($connect,$query);
	if ($member= mysqli_fetch_array($result) )
	{
		$query="update ordertbl set Count = Count +1, TotalPrice = TotalPrice + $price where oNum= '$member[oNum]' " ;

		$result= mysqli_query($connect,$query);
	}
	else
	{
		$query="insert into orders(mnum,dNum,Count,TotalPrice) values( '$mnum' , '$dnum' , 1 , '$price' ) ";

		$result= mysqli_query($connect,$query);

	}

	$query="update doll set Love = Love + 1 where dNum ='$dnum' ";

	$result= mysqli_query($connect,$query);



	echo "<script>"."window.alert('감사합니다! 주문 내역을 확인해주세요.');"."location.href='shop.php';"."</script>";



?>
