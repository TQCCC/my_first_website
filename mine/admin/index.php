<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" name="viewport">
        <title>Admin</title>
    </head>
    <body>
        <?php
            require_once '../mysql/mysql_connect.php';
            $sql = "select * from page_views";
            $result = mysql_query($sql);
            echo "Title Quantity";
            while ($row = mysql_fetch_array($result)) {
                echo $row['page_title'].' '.$row['quantity'].'<br />';
            }

            mysql_close();

         ?>
    </body>
</html>
