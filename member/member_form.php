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
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_nick()
   {
     window.open("check_nick.php?nick=" + document.member_form.nick.value,
         "NICKcheck",
          "left=200,top=200,width=200,height=60,scrollbars=no,resizable=yes");
   }

   function check_input()
   {
      if (!document.member_form.id.value)
      {
          alert("아이디를 입력하세요");    
          document.member_form.id.focus();
          return;
      }

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

<body>
<div id="wrap">
  <div id="header">
    <? include "../lib/top_login2.php"; ?>
  </div>  <!-- end of header -->

  <div id="menu">
	<? include "../lib/top_menu2.php"; ?>
	    	   <div id="login">
	<? include"../login/login_form2.php"; ?></div>
  </div>  <!-- end of menu --> 

 	<div id="content">
  
	<div id="col2">
        <form  name="member_form" method="post" action="insert.php"> 
		<div id="title">
			<img src="../img/title_join.gif">
		</div> <!-- end of title --> 

	<div id="form_join">
 	<form name="write_form_member" method="post">
 	<table width="800" style="padding:5px 0 5px 0;">
 	<tr>
 	<td>*아이디</td>              <td><input type="text" name="id" />
					  <input type="button" name="id2" value="중복확인" onclick="check_id()" href="#"></td>
	 </tr>
	 <tr>
	 <td>*비밀번호</td>            <td><input type="password" name="pass" /></td>
	 </tr>
	 <tr>
	 <td>*비밀번호 확인</td>       <td><input type="password" name="pass_confirm" /></td>
	 </tr>
 	<tr>
 	<td>*이름</td>                 <td><input type="text" name="name" /></td>
 	</tr>
	<tr>
	<td>*닉네임</td>               <td><input type="text" name="nick" />
					   <input type="button" name="nick2" value="중복확인" onclick="check_nick()" href="#"></td>
	                              
        </tr>
 	<tr>
	 <td>*직업</td>                <td><select class="job" name="job">
					  <option value='학생'>학생</option>
   					  <option value='피아니스트'>피아니스트</option>
   					  <option value='프로그래머'>프로그래머</option>
  					  <option value='성악가'>성악가</option>
   					  <option value='지휘자'>지휘자</option>
  					  <option value='기타'>기타</option></select></td>
 	</tr>
 	<tr>
 	<td>이메일</td>                <td><input type="text" name="email1">@
				    <select name="email2">
				     <option value="">직접입력</option>
                		     <option value="daum.net">daum.net</option>
                		     <option value="empal.com">empal.com</option>
                		     <option value="gmail.com">gmail.com</option>
             			     <option value="hanmail.net">hanmail.net</option>
             			     <option value="msn.com">msn.com</option>
             			     <option value="naver.com">naver.com</option>
              			     <option value="nate.com">nate.com</option></select></td>
 	</tr>
 	<tr>
 	<td>성별</td>                <td><input type="radio" name="sex" value="male"> 남자
				         <input type="radio" name="sex" value="female"> 여자 </td>
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
     </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>
