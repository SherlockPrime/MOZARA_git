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

if($member1['sJob'] == 'NULL')
{
		echo "<script>"."window.alert('관리자나 직원만 접속 가능합니다.');"."location.href='index_log.php';"."</script>";
	}

	$pdtNo = $_POST["pdtNo"];
	$pdtName= $_POST["pdtName"];
	$pdtCat = $_POST["pdtCat"];
	$pdtColor = $_POST["pdtColor"];
	$pdtSize = $_POST["pdtSize"];
	$pdt_Rmn = $_POST["pdt_Rmn"];
	$pdt_Ctt = $_POST["pdt_Ctt"];
	$pdt_Brd = $_POST["pdt_Brd"];
	$pdt_Price= $_POST["pdt_Price"];

	$query="insert into producttbl(pdtNo,pdtName,pdtCat,pdtColor,pdtSize,pdt_Rmn,pdt_Ctt,pdt_Brd,pdt_Price)
	values( $pdtNo, '$pdtName' , '$pdtCat', '$pdtColor', '$pdtSize', $pdt_Rmn, '$pdt_Ctt', '$pdt_Brd', $pdt_Price) ";

	$result= mysqli_query($connect,$query);


	echo "<script>"."location.href='admin_doll.php';"."</script>";



?>
