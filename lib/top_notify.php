
<? 
	$nscale=3;			// 한 화면에 표시되는 글 수
	$ntable = "notify";

	$nsql = "select * from $ntable order by num desc";
	$nresult = mysql_query($nsql, $connect);
	$ntotal_record = mysql_num_rows($nresult); // 전체 글 수
?>
	<div id="nlist_content">
	<?		
   for ($j=0; $j < $ntotal_record; $j++)                    
   {
      mysql_data_seek($nresult, $j);       
      // 가져올 레코드로 위치(포인터) 이동  
      $nrow = mysql_fetch_array($nresult);       
      // 하나의 레코드 가져오기
	
	  $nitem_num     = $nrow[num];
	  $nitem_id      = $nrow[id];
	  $nitem_name    = $nrow[name];
  	  $nitem_nick    = $nrow[nick];
	  $nitem_hit     = $nrow[hit];
      $nitem_date    = $nrow[regist_day];
	  $nitem_date = substr($nitem_date, 0, 10);  
	  $nitem_subject = str_replace(" ", "&nbsp;", $nrow[subject]);

?>
		    	<div id="nlist_item">
				<div id="nlist_item1"><?echo " * "; ?></div>
				<div id="nlist_item2"><a href="view.php?table=<?=$ntable?>&num=<?=$nitem_num?>"><?= $nitem_subject ?></a></div>
				<div id="nlist_item3"><?= $nitem_nick ?></div>
				<div id="nlist_item4"><?= $nitem_date ?></div>
				<div id="nlist_item5"><?= $nitem_hit ?></div>
			</div>	
<?
   	   $ntotal_record--;
   }
?>
 </div> <!-- end of nlist content -->	
