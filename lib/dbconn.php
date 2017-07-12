<?
    $connect=mysql_connect( "localhost", "hyuna", "0403") or  
        die( "SQL server에 연결할 수 없습니다."); 

    mysql_select_db("hyuna_db",$connect);
?>
