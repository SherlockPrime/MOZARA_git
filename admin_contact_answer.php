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


	$cnum= $_POST["cnum"];
	$name= $_POST["name"];

	$query2= "select * from boardtbl where boardNum = $cnum";
	$result3= mysqli_query($connect, $query2);
	$member2 = mysqli_fetch_array($result3);
	$query="insert into boardcmttbl(userTBL_userID, boardTBL_boardNum, boardAnswer) values('$member2[userTBL_userID]', $cnum, '$name')";

	$result= mysqli_query($connect,$query);

	echo "<script>"."location.href='admin_contact.php';"."</script>";



?>
