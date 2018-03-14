<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <form action="index.php">
            <input type="submit" value="HOME"
                   style="width:80px; background-color: beige;
                          border:0px;">
            </form>
        <style type="text/css">
            #wrapper {
                width : 1000px;
                margin : 0 auto;
            }
            </style>
        <title></title>
    </head>
    <body>
        <div id="wrapper">
            <br><br><center><h3>비밀번호를 입력해주세요</h3>
            <form method="post" action="mypage_edit.php">
                <input type="password" name="pwd">
                <input type="submit" value="확인">
            </form>
                </center>
        </div>
        <?php
        
        ?>
    </body>
</html>
