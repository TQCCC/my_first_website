<?php
if (isset($_GET['sid'])) {
    require_once '../mysql/mysql_connect.php';
    $sid = escape_data($_GET['sid']);
    $sql = "update suggestions set likes=likes+1 where sug_id=$sid";
    $result = mysql_query($sql);
    if (mysql_affected_rows() == 1) {
        $sql = "select likes from suggestions where sug_id=$sid";
        $result = mysql_query($sql);
        $row = mysql_fetch_array($result);
        $response = "".$row[0];
    }else {
        $response = "false";
    }

    mysql_close();

    echo $response;
}

 ?>
