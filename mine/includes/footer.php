
        </div>
        <div style="margin-top:0px;">
            <form action="" method="get" onsubmit="return handle_suggestion();">
                <fieldset>
                    <legend> <strong> I need Your Suggestion!!(撩我):</strong></legend>
                    <textarea id="sug" name="sug" rows="3" cols="40" required="required"></textarea><br>
                    Your name/nickname:<input type="text" id="who" name="who" value="">
                    <input type="submit" value="提交" style="float:right">
                </fieldset>
            </form>
        </div>

        <h4>所有评论：</h4>
        <div id="comment_list">
            <div id="wait_data" style="display:none">
                提交中...
            </div>

            <?php
                $sql = "select * from suggestions order by publish_date DESC";
                $result = mysql_query($sql);
                if (mysql_num_rows($result) > 0) {
                    while($row = mysql_fetch_array($result)){
                        echo "<div class=\"comment\">";
                        echo "<span>@{$row['who']}:   </span>";
                        echo "<span>{$row['suggestion']} </span>";
                        echo "<a onclick=\"add_likes({$row['sug_id']},this);\" href=\"javascript:void(0);\">赞({$row['likes']})</a>";
                        echo "<span> {$row['publish_date']}</span>";
                        echo "</div>";
                    }
                }
                mysql_close();
             ?>

        </div>


        <div class="footer" align="center">
            Copyright (c) 2016 TQC All Rights Reserved.
        </div>
    </body>
    <script type="text/javascript">

        function insertAfter(newEle,target) {
            var parent = target.parentNode;
            if (parent.lastChild == target) {
                parent.appendChild(newEle);
            }else {
                parent.insertBefore(newEle,target.nextSibling);
            }
        }

        function handle_suggestion() {

            var x = document.getElementById('wait_data');
            x.style.display="block";

            var sug = document.getElementById('sug').value;
            var who = document.getElementById('who').value;

            var xmlhttp;
            if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }else {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    if(xmlhttp.responseText != 'false'){
                        x.style.display="none";
                        sid = Number(xmlhttp.responseText);
                        var c = document.createElement('c');
                        c.innerHTML="<div class='comment'>"+
                                "<span>@"+who+": </span>"+
                                "<span>"+sug+" </span>"+
                                "<a onclick='add_likes("+sid+",this);' href='javascript:void(0);'>赞(0) </a>"+
                                "<span>Just now</span>"+
                                "</div>";
                        var wait_data = document.getElementById('wait_data');
                        insertAfter(c,wait_data);
                    }else {
                        x.innerHTML="评论失败，请重试"
                    }

                }
            }

            xmlhttp.open("GET","./includes/add_comments.php?sug="+sug+"& who="+who,true);
            xmlhttp.send();

            return false;
        }

        function add_likes(sid,x) {
            var xmlhttp;
            if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp=new XMLHttpRequest();
            }else {// code for IE6, IE5
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    if (xmlhttp.responseText != 'false') {
                        x.innerHTML = "赞("+Number(xmlhttp.responseText)+")";
                    }
                }
            }

            xmlhttp.open("GET","./includes/add_likes.php?sid="+sid,true);
            xmlhttp.send();
        }
    </script>
</html>
