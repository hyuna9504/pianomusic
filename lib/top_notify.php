
<? 
	$nscale=3;			// �� ȭ�鿡 ǥ�õǴ� �� ��
	$ntable = "notify";

	$nsql = "select * from $ntable order by num desc";
	$nresult = mysql_query($nsql, $connect);
	$ntotal_record = mysql_num_rows($nresult); // ��ü �� ��
?>
	<div id="nlist_content">
	<?		
   for ($j=0; $j < $ntotal_record; $j++)                    
   {
      mysql_data_seek($nresult, $j);       
      // ������ ���ڵ�� ��ġ(������) �̵�  
      $nrow = mysql_fetch_array($nresult);       
      // �ϳ��� ���ڵ� ��������
	
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
