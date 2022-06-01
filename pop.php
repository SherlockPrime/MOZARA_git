<?php
header("Content-Type:text/html; charset=UTF-8");
   include("connect.php");
	 echo '<head> <link rel="stylesheet" href="assets/css/main17.css" > </head>';
   $connect= dbconn();

$id= $_SESSION["id"];

$query=" select * from usertbl where userID='$id'";

$result= mysqli_query($connect,$query);
$member= mysqli_fetch_array($result);

if($member['sJob'] == NULL)
{
		echo "<script>"."windosw.alert('관리자나 직원만 접속 가능합니다.');"."location.href='index_log.php';"."</script>";
	}
?>
