<?php
if (isset($_GET['sug'])) {
    require_once '../mysql/mysql_connect.php';
    $sug = escape_data($_GET['sug']);
    $who = escape_data($_GET['who']);
    $sql = "insert into suggestions(suggestion,who,publish_date)values('$sug','$who',NOW())";
    $result = mysql_query($sql);
    if (mysql_affected_rows() == 1) {
        $response = "".mysql_insert_id();
    }else {
        $response = 'false';
    }
    mysql_close();
    echo $response;
}


 ?>
