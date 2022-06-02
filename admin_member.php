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

if($member['sJob'] = 'NULL')
{
		echo "<script>"."windows.alert('관리자나 직원만 접속 가능합니다.');"."location.href='index_log.php';"."</script>";
	}


	$query1=" select * from usertbl";

	$result1= mysqli_query($connect,$query1);

  $query0 = " select SUBSTR(userRrn_r, 1, 1),
	case when SUBSTR(userRrn_r, 1, 1) in ('1','3', '5', '7', '9') then '남자' when SUBSTR(userRrn_r, 1, 1) IN ('2', '4', '6', '8', '0') then '여자' else '오류' end sex from usertbl";

  $result0 = mysqli_query($connect, $query0);
  $mem = mysqli_fetch_array($result0);
  $query99 = "select FLOOR((CAST(REPLACE(CURRENT_DATE,'-','') AS UNSIGNED) - CAST(userRrn_f AS UNSIGNED) - 19000000) / 10000) as 'age' from usertbl";

  $result99 = mysqli_query($connect, $query99);
  $mem99 = mysqli_fetch_array($result99);
	echo "<table border=1>";
	echo "<tr>  <th> 아이디 </th> <th> 이름 </th> <th> 성별 </th> <th> 나이 </th>  <th> 비밀번호 </th> <th> 전화번호 </th> <th> 회원삭제 </th></tr>";
	while( $member1 = mysqli_fetch_array($result1)  )
	{	if ($member1['sJob'] == NULL)
		{
			echo "<tr>";
			echo "<td>" . $member1['userID']     .  "</td>";
			echo "<td>" . $member1['userName']     .  "</td>";
      			echo "<td>" . $mem['sex'] .  "</td>";
      			echo "<td>" . $mem99['age'] .  "</td>";
			echo "<td>" . $member1['userPwd']     .  "</td>";
			echo "<td>" . $member1['userPh_1'] .'-'. $member1['userPh_2'] . '-' .$member1['userPh_3']  .  "</td>";
			echo "<form method='post' action='admin_member_delete.php'>";
			echo "<td>" . " <input type = hidden   value='$member1[userID]' name = 'id' ><input type=submit  value = '삭제'  >   " .  "</td>" ;
			echo "</form>";
			echo "</tr>";
		}
	}

	echo "</table>";


?>
