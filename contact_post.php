<?php @session_start();?>
<?php
	if ($_SESSION['id'] == NULL)
	{
		echo "<script>"."window.alert('잘못된 접근입니다.');"."location.href='index.php';"."</script>";

	}

	header("Content-Type:text/html; charset=UTF-8");
	include("connect.php");
	$connect= dbconn();
	$name= $_POST["boardCtt"];

	$query="select * from usertbl where userID ='$_SESSION[id]' ";

	$result= mysqli_query($connect,$query);
	$member= mysqli_fetch_array($result);

	$mnum = $member['userID'];

	$query="insert into boardtbl(boardCtt,userTBL_userID) values('$name', '$mnum') ";

	$result= mysqli_query($connect,$query);

	echo "<script>"."location.href='contact.php';"."</script>";







?>
