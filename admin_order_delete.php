<?php @session_start();?>
<?php
	if ($_SESSION['id'] != "admin")
	{
		echo "<script>"."window.alert('관리자만 접속 가능합니다.');"."location.href='index.html';"."</script>";
	}

	header("Content-Type:text/html; charset=UTF-8");
	include("connect.php");
	$connect= dbconn();
	$id= $_POST["id"];
	$query="delete from orders where oNum = '$id' ";

	$result= mysqli_query($connect,$query);
	
	echo "<script>"."location.href='admin_order.php';"."</script>";


?>
