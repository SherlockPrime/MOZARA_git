<?php @session_start();?>
<?php
	if ($_SESSION['id'] != "admin")
	{
		echo "<script>"."window.alert('관리자만 접속 가능합니다.');"."location.href='index.php';"."</script>";
	}

	header("Content-Type:text/html; charset=UTF-8");
	include("connect.php");
	echo '<head> <link rel="stylesheet" href="assets/css/main17.css" > </head>';
	$connect= dbconn();

	$query=" select * from doll";

	$result= mysqli_query($connect,$query);

	echo "<table border=1>";
	echo "<tr>  <th> 상품번호 </th> <th> 사진 </th> <th> 이름 </th> <th> 가격 </th> <th> 설명 </th> <th> X </th> </tr>";
	while( $member = mysqli_fetch_array($result)  )
	{	
		echo "<tr>";
		echo "<td>" . $member['dNum']     .  "</td>";
		echo "<td>" .  "<image src = $member[Name].jpg width=150px height=150px >"    .  "</td>";
		echo "<td>" . $member['Name']     .  "</td>";
		echo "<td>" . $member['Price']     .  "</td>";
		echo "<td>" . $member['Intro']     .  "</td>";
		echo "<form method='post' action='admin_doll_delete.php'> ";
		echo "<td>" . "<input type = hidden   value='$member[dNum]' name = 'id' ><input type=submit  value = '삭제'  >  " .  "</td>" ;
		echo "</form>";
		echo "</tr>";

	}
	echo "<tr>";
	echo "<form method='post' action='admin_doll_insert.php'>";
	echo "<td>" . "NULL"    .  "</td>";
	echo "<td>" . "<input type = text placeholder='Name' name='name'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='Price' name='price'>"     .  "</td>";
	echo "<td>" . "<input type = text placeholder='Intro' name='intro'>"     .  "</td>";
	echo "<td>" . "<input type=submit  value = '추가'  >"   .  "</td>" ;

	echo "</form>";
	echo "</tr>";
	echo "</table>";


?>
