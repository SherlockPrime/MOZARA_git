<?php @session_start();?>
<?php 
	
	header("Content-Type:text/html; charset=UTF-8");
	$_SESSION = array();
	echo "<script>"."window.alert('로그아웃 했습니다.');"."location.href='index.php';"."</script>";
	
	

?>

