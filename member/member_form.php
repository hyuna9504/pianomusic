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
          alert("���̵� �Է��ϼ���");    
          document.member_form.id.focus();
          return;
      }

      if (!document.member_form.pass.value)
      {
          alert("��й�ȣ�� �Է��ϼ���");    
          document.member_form.pass.focus();
          return;
      }

      if (!document.member_form.pass_confirm.value)
      {
          alert("��й�ȣȮ���� �Է��ϼ���");    
          document.member_form.pass_confirm.focus();
          return;
      }

      if (!document.member_form.name.value)
      {
          alert("�̸��� �Է��ϼ���");    
          document.member_form.name.focus();
          return;
      }

      if (!document.member_form.nick.value)
      {
          alert("�г����� �Է��ϼ���");    
          document.member_form.nick.focus();
          return;
      }


      if (!document.member_form.job.value)
      {
          alert("������ �Է��ϼ���");    
          document.member_form.job.focus();
          return;
      }

      if (document.member_form.pass.value != 
            document.member_form.pass_confirm.value)
      {
          alert("��й�ȣ�� ��ġ���� �ʽ��ϴ�.\n�ٽ� �Է����ּ���.");    
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
 	<td>*���̵�</td>              <td><input type="text" name="id" />
					  <input type="button" name="id2" value="�ߺ�Ȯ��" onclick="check_id()" href="#"></td>
	 </tr>
	 <tr>
	 <td>*��й�ȣ</td>            <td><input type="password" name="pass" /></td>
	 </tr>
	 <tr>
	 <td>*��й�ȣ Ȯ��</td>       <td><input type="password" name="pass_confirm" /></td>
	 </tr>
 	<tr>
 	<td>*�̸�</td>                 <td><input type="text" name="name" /></td>
 	</tr>
	<tr>
	<td>*�г���</td>               <td><input type="text" name="nick" />
					   <input type="button" name="nick2" value="�ߺ�Ȯ��" onclick="check_nick()" href="#"></td>
	                              
        </tr>
 	<tr>
	 <td>*����</td>                <td><select class="job" name="job">
					  <option value='�л�'>�л�</option>
   					  <option value='�ǾƴϽ�Ʈ'>�ǾƴϽ�Ʈ</option>
   					  <option value='���α׷���'>���α׷���</option>
  					  <option value='���ǰ�'>���ǰ�</option>
   					  <option value='������'>������</option>
  					  <option value='��Ÿ'>��Ÿ</option></select></td>
 	</tr>
 	<tr>
 	<td>�̸���</td>                <td><input type="text" name="email1">@
				    <select name="email2">
				     <option value="">�����Է�</option>
                		     <option value="daum.net">daum.net</option>
                		     <option value="empal.com">empal.com</option>
                		     <option value="gmail.com">gmail.com</option>
             			     <option value="hanmail.net">hanmail.net</option>
             			     <option value="msn.com">msn.com</option>
             			     <option value="naver.com">naver.com</option>
              			     <option value="nate.com">nate.com</option></select></td>
 	</tr>
 	<tr>
 	<td>����</td>                <td><input type="radio" name="sex" value="male"> ����
				         <input type="radio" name="sex" value="female"> ���� </td>
 	</tr>
	<tr>
	<td></td><td>*�� �ʼ� �Է��׸� �Դϴ�.</td>
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
