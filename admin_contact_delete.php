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
		echo "<script>"."window.alert('관리자나 직원만 접속 가능합니다.');"."location.href='index_log.php';"."</script>";
	}

	$name= $_POST["name"];

	$query="delete from boardcmttbl where boardTBL_boardNum = $name";

	$query1="delete from boardtbl where boardNum = $name";


	$result= mysqli_query($connect,$query);
	$result1= mysqli_query($connect,$query1);


	echo "<script>"."location.href='admin_contact.php';"."</script>";


?>
