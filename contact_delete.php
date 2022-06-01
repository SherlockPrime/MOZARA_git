<?php @session_start();?>
<?php
	if ($_SESSION['id'] == NULL)
	{
		echo "<script>"."window.alert('잘못된 접근입니다.');"."location.href='index.php';"."</script>";

	}

	header("Content-Type:text/html; charset=UTF-8");
	include("connect.php");
	$connect= dbconn();
	$name= $_POST["name"];

	$query="delete from contact where cNum = $name ";

	$result= mysqli_query($connect,$query);

	echo "<script>"."location.href='contact.php';"."</script>";




?>
