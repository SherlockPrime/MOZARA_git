<?php @session_start();?>
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


	$query1=" select * from usertbl";

	$result1= mysqli_query($connect,$query1);

	echo "<table border=1>";
	echo "<tr> <th> 회원번호 </th>  <th> 아이디 </th> <th> 이름 </th> <th> 나이 </th> <th> 주소 </th> <th> 전화번호 </th> <th> 이메일 </th> <th> X </th> </tr>";
	while( $member1 = mysqli_fetch_array($result1)  )
	{	if ($member1['sJob'] == NULL)
		{
			echo "<tr>";
			echo "<td>" . $member1['userID']     .  "</td>";
			echo "<td>" . $member1['userName']     .  "</td>";
			echo "<td>" . $member1['userPwd']     .  "</td>";
			echo "<td>" . $member1['userRrn_f']     .  "</td>";
			echo "<td>" . $member1['userRrn_r']     .  "</td>";
			echo "<td>" . $member1['userPh_1']     .  "</td>";
			echo "<td>" . $member1['userPh_2']     .  "</td>";
			echo "<form method='post' action='admin_member_delete.php'>";
			echo "<td>" . " <input type = hidden   value='$member1[userID]' name = 'id' ><input type=submit  value = '삭제'  >   " .  "</td>" ;
			echo "</form>";
			echo "</tr>";
		}
	}

	echo "</table>";


?>
