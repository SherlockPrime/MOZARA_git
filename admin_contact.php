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
		echo "<script>"."windosw.alert('관리자나 직원만 접속 가능합니다.');"."location.href='index_log.php';"."</script>";
	}

	$query=" select * from boardtbl";

	$result= mysqli_query($connect,$query);

	echo "<table border=1>";
	echo "<tr>  <th> 문의번호 </th> <th> 아이디 </th> <th> 문의내용 </th> <th> X </th> </tr>";
	while( $member = mysqli_fetch_array($result)  )
	{
		echo "<tr height=80>";
		echo "<td>" . $member['boardNum']     .  "</td>";

		$query2=" select * from usertbl where userID = '$member[userTBL_userID]' ";

		$result2= mysqli_query($connect,$query2);
		$member2 = mysqli_fetch_array($result2);

		echo "<td>" . $member2['userID']     .  "</td>";
		echo "<td>" . $member['boardCtt']     .  "</td>";

		echo "<form method='post' action='admin_contact_delete.php'> ";
		echo "<td>" . "<input type = hidden   value='$member[boardNum]' name = 'id' ><input type=submit  value = '삭제'  >  " .  "</td>" ;
		echo "</form>";
		echo "</tr>";
		echo "<tr height=80>";
		echo "<form method='post' action='admin_contact_answer.php'>";

		$query3=" select * from boardCmttbl where userTBL_userID = '$member2[userID]' ";

		$result3= mysqli_query($connect,$query3);
		$member3 = mysqli_fetch_array($result3);

		if ( $member3["boardAnswer"] != NULL  )
		{
			echo "<th colspan=4> 문의 답변 :  $member3[boardAnswer] </th> ";
		}
		else
		{
			echo "<th colspan=3> <input type = text placeholder='답변 쓰기' name='name'> <input type = hidden   value=$member[boardNum] name = 'id' >  </th> ";
			echo "<th>" . "<input type=submit  value = '답변'  >"   .  "</th>" ;
		}
		echo "</form>";
		echo "</tr>";

	}

	echo "</table>";


?>
