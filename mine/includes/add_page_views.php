<?php
require_once './mysql/mysql_connect.php';

$pt = escape_data($page_title);
$sql = "select * from page_views where page_title='$pt'";
$result = mysql_query($sql);
if (mysql_num_rows($result) == 0) {
    $sql = "insert into page_views(page_title, quantity)values('$page_title',1)";
    $result = mysql_query($sql);
}else{
    $sql = "update page_views set quantity = quantity+1 where page_title = '$page_title'";
    $result = mysql_query($sql);
}

 ?>
