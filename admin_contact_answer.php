<?php @session_start();?>
<?php
	if ($_SESSION['id'] != 'admin')
	{
		echo "<script>"."window.alert('관리자만 접속 가능합니다.');"."location.href='index.php';"."</script>";
	}

	header("Content-Type:text/html; charset=UTF-8");
	include("connect.php");
	$connect= dbconn();
	$cnum= $_POST["id"];
	$name= $_POST["name"];


	$query="update contact set Answer = '$name' where cNum= $cnum " ;

	$result= mysqli_query($connect,$query);





	echo "<script>"."location.href='admin_contact.php';"."</script>";



?>