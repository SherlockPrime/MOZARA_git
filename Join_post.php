<?php
header('Content-Type: text/html; charset=UTF-8');

	include("connect.php");
	$connect = dbconn();

	$userID = $_POST["userID"];
	$userPwd = $_POST["userPwd"];
	$userRrn_f = $_POST["userRrn_f"];
	$userRnn_r = $_POST["userRrn_r"];
	$userName = $_POST["userName"];
	$userPh_1 = $_POST["userPh_1"];
	$userPh_2 = $_POST["userPh_2"];
	$userPh_3 = $_POST["userPh_3"];
	$userAddr_do = $_POST["userAddr_do"];
	$userAddr_si = $_POST["userAddr_si"];
	$userAddr_doro = $_POST["userAddr_doro"];
	$userAddr_det = $_POST["userAddr_det"];
	$userSMS_agr = TRUE;
	$sJob = NULL;


	$query2=" select * from usertbl where userID='$userID'";

	$result2= mysqli_query($connect,$query2);

	$member= mysqli_fetch_array($result2);

	if($userID == $member["userID"]){
		echo "<script>"."window.alert('중복된 아이디가 있습니다.');"."location.href='Join.php';"."</script>";
	}else{

		$query = "insert into usertbl(userID, userName, userPwd, userRrn_f, userRrn_r, userPh_1, userPh_2,	userPh_3, userAddr_do, userAddr_si, userAddr_doro, userAddr_det, userSMS_agr, sJob)values
		('$userID', '$userName', '$userPwd', '$userRrn_f' , '$userRnn_r' , '$userPh_1' , '$userPh_2', '$userPh_3', '$userAddr_do', '$userAddr_si', '$userAddr_doro', '$userAddr_det', '$userSMS_agr', '$sJob' )";
		mysqli_query($connect,"set names utf8",);
		mysqli_query($connect,$query);
	}
?>
<script>
window.alert('회원가입이 완료되었습니다.');
location.href='index.php';
</script>
