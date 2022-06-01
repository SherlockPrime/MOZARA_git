<?php


	header('Content-Type: text/html; charset=UTF-8');
	function dbconn(){
		$connect = @mysqli_connect("localhost","root","3096");



		mysqli_select_db($connect,"mozara");

		if(!$connect)die("연결에 실패하였습니다.".mysql_error());
		return $connect;
	}
	function member(){
		global $connect;
		$temps=$_COOKIE["COOKIES"];
		$cookise= explode("//",$temps);
		$query= "select * from member where user_id='$cookise[0]' ";
		mysqli_query($connect,"set names ust8",);
		$result= mysqli_query($query,$connect);
		$member= mysqli_fetch_array($result);
		return $member;
	}

?>
