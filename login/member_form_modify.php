<?
    session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/member.css" rel="stylesheet" type="text/css" media="all">
<script>
   function check_id()
   {
     window.open("check_id.php?id=" + document.member_form.id.value,
         "IDcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=250,height=100,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.pass.value)
      {
          alert("비밀번호를 입력하세요");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("비밀번호확인을 입력하세요");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("이름을 입력하세요");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("닉네임을 입력하세요");    
          document.member_form.nick.focus();
          return;
      }

      if (!document.member_form.job.value)
      {
          alert("직업을 입력하세요");    
          document.member_form.job.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("비밀번호가 일치하지 않습니다.\n다시 입력해주세요.");    
          document.member_form.pass.focus();
          document.member_form.pass.select();
          return;
      }

      document.member_form.submit();
   }

   function reset_form()
   {
      document.member_form.id.value = "";
      document.member_form.pass.value = "";
      document.member_form.pass_confirm.value = "";
      document.member_form.name.value = "";
      document.member_form.nick.value = "";
      document.member_form.job.value = "";
      document.member_form.email1.value = "";
      document.member_form.email2.value = "";
	  
      document.member_form.id.focus();

      return;
   }
</script>
</head>
<?
    include "../lib/dbconn.php";

    $sql = "select * from member where id='$userid'";
    $result = mysql_query($sql, $connect);

    $row = mysql_fetch_array($result);

    $email = explode("@", $row[email]);
    $email1 = $email[0];
    $email2 = $email[1];

    mysql_close();
?>
<body>
<div id="wrap">
 <div id="content">
  <div id="header">
    <? include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<? include "../lib/top_menu2.php"; ?>
  </div>  <!-- end of menu --> 
  

  
	<div id="col2">
        <form  name="member_form" method="post" action="modify.php"> 
		<div id="title">
			<img src="../img/title_join.gif">
		</div>

	<div id="form_join">
 	<form name="write_form_member" method="post">
 	<table width="700">
 	<tr>
 	<td>*아이디</td>              <td> <?= $row[id] ?></td>
	 </tr>
	 <tr>
	 <td>*비밀번호</td>            <td><input type="password" name="pass" value="<?= $row[pass] ?>" /></td>
	 </tr>
	 <tr>
	 <td>*비밀번호 확인</td>       <td><input type="password" name="pass_confirm" value="<?= $row[pass] ?>" /></td>
	 </tr>
 	<tr>
 	<td>*이름</td>                 <td><input type="text" name="name" value="<?= $row[name] ?>" /></td>
 	</tr>
	<tr>
	<td>*닉네임</td>               <td><input type="text" name="nick" value="<?= $row[nick] ?>" />
					   <input type="button" name="nick2" value="중복확인" onclick="check_nick()" href="#"></td>
	                              
        </tr>
 	<tr>
	 <td>*직업</td>                <td><select class="job" name="job" value="<?=$row[job]?>"/>
					  <option value='학생' name="학생"    <? if($job="학생"){?> selected <?}?>>학생</option>
   					  <option value='피아니스트'  <? if($row[job]=="피아니스트"){?> selected <?}?>>피아니스트</option>
   					  <option value='프로그래머'  <? if($row[job]=="프로그래머"){?> selected <?}?>>프로그래머</option>
  					  <option value='성악가'   <? if($row[job]=="성악가"){?> selected <?}?>>성악가</option>
   					  <option value='지휘자'  <? if($row[job]=="지휘자"){?> selected <?}?>>지휘자</option>
  					  <option value='기타'    <? if($row[job]=="기타"){?> selected <?}?>>기타</option></select></td>
 	</tr>
 	<tr>
 	<td>이메일</td>                <td><input type="text" name="email1" value="<?= $email1 ?>">@
				    <select name="email2">
				     <option value="">직접입력</option>
                		     <option value="daum.net" <? if($email2=="daum.net"){?> selected <?}?>>daum.net</option>
                		     <option value="empal.com" <? if($email2=="empal.com"){?> selected <?}?>>empal.com</option>
                		     <option value="gmail.com" <? if($email2=="gmail.com"){?> selected <?}?>>gmail.com</option>
             			     <option value="hanmail.net" <? if($email2=="hanmail.net"){?> selected <?}?>>hanmail.net</option>
             			     <option value="msn.com" <? if($email2=="msn.com"){?> selected <?}?>>msn.com</option>
             			     <option value="naver.com" <? if($email2=="naver.com"){?> selected <?}?>>naver.com</option>
              			     <option value="nate.com" <? if($email2=="nate.com"){?> selected <?}?>>nate.com</option></select></td>
 	</tr>
 	<tr>
 	<td>성별</td>                <td><input type="radio" name="sex" value="male" <? if($sex="male"){?> checked <?}?>> 남자
				         <input type="radio" name="sex" value="female" <? if($sex="female"){?> checked <?}?>> 여자 </td>
 	</tr>
	<tr>
	<td></td><td>*는 필수 입력항목 입니다.</td>
 	</tr>
	</table>
        <div id="button"><a href="#"><img src="../img/button_save.gif"  onclick="check_input()"></a>&nbsp;&nbsp;
		                 <a href="#"><img src="../img/button_reset.gif" onclick="reset_form()"></a>
		</div>
	</form>

	</div> <!-- end of col2 -->
</div> <!-- end of wrap -->

</body>
</html>
