<?
           session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
</head>
<body>
<div id="login_form">

<?
    if(!$userid){
?>

        <form  name="member_form" method="post" action="../login/login.php"> 
	    <div id="login2">
		<div id="id_input_button">
					<div id="id_pw_title">
						<ul>
						<li><img src="../img/id_title.gif"></li>
						<li><img src="../img/pw_title.gif"></li>
						</ul>
					</div>
					<div id="id_pw_input">
						<ul>
						<li><input type="text" name="id" class="login_input"></li>
						<li><input type="password" name="pass" class="login_input"></li>
						</ul>						
					</div>
					<div id="login_button">
						<input type="image" src="../img/login_button.gif"></div>
					<div id="join_button">
						<a href="../member/member_form.php">
						<img src="../img/join_button.gif"></a></div>
					</div> <!-- end of id_input_button -->

				      <div class="clear"></div>
					
				</div><!-- end of login2 -->
		
	    </form>


<?
	}
	else
	{
?>
		<?=$usernick?> | 
		<a href="../login/logout.php">로그아웃</a> | <a href="../login/member_form_modify.php">정보수정</a>
		 | <a href="../notify/list.php"> 공지사항 </a> 
<?
	}
?>  
</div> <!-- end of login_form -->
</doby>
</html>