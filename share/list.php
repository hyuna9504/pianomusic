<? 
	session_start(); 
	$table = "share";
	$ripple = "share_ripple";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head> 
<meta charset="euc-kr">
<link href="../css/common.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/board5.css" rel="stylesheet" type="text/css" media="all">
</head>
<?
	include "../lib/dbconn.php";
	$scale=6;			// 한 화면에 표시되는 글 수
    $r_max=0;
    if ($mode=="search")
	{
		if(!$search)
		{
			echo("
				<script>
				 window.alert('검색할 단어를 입력해 주세요!');
			     history.go(-1);
				</script>
			");
			exit;
		}
		$sql = "select * from $table where $find like '%$search%' order by num desc ";
	}
	else
	{
		$sql = "select * from $table order by num desc";
	}

	$result = mysql_query($sql, $connect);
	$total_record = mysql_num_rows($result); // 전체 글 수

	// 전체 페이지 수($total_page) 계산 
	if ($total_record % $scale == 0)     
		$total_page = floor($total_record/$scale);      
	else
		$total_page = floor($total_record/$scale) + 1; 
 
	if (!$page)                 // 페이지번호($page)가 0 일 때
		$page = 1;              // 페이지 번호를 1로 초기화
 
	// 표시할 페이지($page)에 따라 $start 계산  
	$start = ($page - 1) * $scale;      
	$number = $total_record - $start;

?>
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
		<div id="title">
			<img src="../img/title_share.gif">
		</div>

		<form  name="board_form" method="post" action="list.php?table=<?=$table?>&mode=search"> 
		<div id="list_search">
			<div id="list_search1">▷ 총 <?= $total_record ?> 개의 게시물이 있습니다.  </div>
			<div id="list_search2"><img src="../img/select_search.gif"></div>
			<div id="list_search3">
				<select name="find">
                    <option value='subject'>제목</option>
                    <option value='content'>내용</option>
                    <option value='nick'>별명</option>
                    <option value='name'>이름</option>
				</select></div>
			<div id="list_search4"><input type="text" name="search"></div>
			<div id="list_search5"><input type="image" src="../img/list_search_button.gif"></div>
		</div>
		</form>
		<div class="clear"></div>

		<div id="list_top_title">
		</div>

		<div id="list_content">
		 <div id="notify_view">
		     <? include "../lib/top_notify.php"; ?></div>
<table style="text-align:center" >
 <? 
		for ($i=$start; $i<$start+$scale && $i < $total_record; $i++) {
			if(($i%3) ==0){echo "</tr><tr>";}
			echo "<td>";
      mysql_data_seek($result, $i);     // 포인터 이동        
      $row = mysql_fetch_array($result); // 하나의 레코드 가져오기	      
      
	  $item_num     = $row[num];
	  $item_id      = $row[id];
	  $item_name    = $row[name];
	  $image_name[0] =$row[file_name_0];
	  $image_copied[0]=$row[file_copied_0];
  	  $item_nick    = $row[nick];
	  $item_hit     = $row[hit];
      $item_date    = $row[regist_day];
	  $item_date = substr($item_date, 0, 10);  
	  $item_subject = str_replace(" ", "&nbsp;", $row[subject]);

	  $sql = "select * from $ripple where parent=$item_num";
	  $result2 = mysql_query($sql, $connect);
	  $num_ripple = mysql_num_rows($result2);

		if ($image_copied[0]){
			$imageinfo = GetImageSize("./data/".$image_copied[0]);

			$image_width[0] = $imageinfo[0];
			$image_height[0] = $imageinfo[1];
			$image_type[0]  = $imageinfo[2];

			if ($image_width[0] > 200)
				$image_width[0] = 250;
		}
		else
		{
			$image_width[0] = "";
			$image_height[0] = "";
			$image_type[0]  = "";
		}
		
	
?>
	<div id="list_item">
		<?= $number ?></br>
		<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>"><?=$item_subject ?></a>
			<?
				 if ($num_ripple)
				   echo " [$num_ripple]";  
			?> </br>
		<a href="view.php?table=<?=$table?>&num=<?=$item_num?>&page=<?=$page?>">
			<?
					    if ($image_copied[0])
						{
						$img_name = $image_copied[0];
						$img_name = "./data/".$img_name;
						$img_width = $image_width[0];
			
						echo "<img src='$img_name' width='$img_width'>"."<br><br>";
						}
			?>
					</a>
					</br>
		<?= $item_nick ?></br>
		<?= $item_date ?></br>
		<? echo "조회수: " ?><?= $item_hit ?></br>	
			</div>
<?     
		echo "</td>";
   	   $number--;
}
?>
</table>
        </div> <!-- end of list content -->
			<div id="page_button">
				<div id="page_num"> ◀ 이전 &nbsp;&nbsp;&nbsp;&nbsp; 
<?
   // 게시판 목록 하단에 페이지 링크 번호 출력
   for ($i=1; $i<=$total_page; $i++)
   {
		if ($page == $i)     // 현재 페이지 번호 링크 안함
		{
			echo "<b> $i </b>";
		}
		else
		{ 
			echo "<a href='list.php?table=$table&page=$i'> $i </a>";
		}      
   }
?>			
			&nbsp;&nbsp;&nbsp;&nbsp;다음 ▶
				</div>
				<div id="button">
					<a href="list.php?table=<?=$table?>&page=<?=$page?>"><img src="../img/list.png"></a>&nbsp;
<? 
	if($userid)
	{
?>
		<a href="write_form.php?table=<?=$table?>"><img src="../img/write.png"></a>
<?
	}
?>
				</div>
			</div> <!-- end of page_button -->		

		<div class="clear"></div>

	</div> <!-- end of col2 -->
  </div> <!-- end of content -->
</div> <!-- end of wrap -->

</body>
</html>