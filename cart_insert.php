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

#cart

	$pdtNo = $_POST["pdtNo"];


  $query22="select * from cart where productTBL_pdtNo='$pdtNo'";
  $result22=mysqli_query($connect,$query22);
  $qtt1= mysqli_fetch_array($result22);


    if($qtt1['productTBL_pdtNo'] == NULL){
	$query="insert into cart(userTBL_userID,productTBL_pdtNo,Qtt) values( '$id', '$pdtNo' , 1) ";
} else {
  	$query="update cart set Qtt=$qtt1[Qtt]+1 where productTBL_pdtNo = '$pdtNo' ";
}

	$result= mysqli_query($connect,$query);


	echo "<script>"."location.href='cart.php';"."</script>";



?>
