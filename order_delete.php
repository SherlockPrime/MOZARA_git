<?php @session_start();?>
<?php
	if ($_SESSION['id'] == NULL)
	{
		echo "<script>"."window.alert('로그인이 필요합니다.');"."location.href='index.php';"."</script>";
	}

	header("Content-Type:text/html; charset=UTF-8");
	include("connect.php");
	$connect= dbconn();
	$id= $_POST["id"];
	$query="delete from orders where oNum = '$id' ";

	$result= mysqli_query($connect,$query);

	echo "<script> alert('주문 삭제 완료!'); location.href='order_view.php'; </script>";



?>
