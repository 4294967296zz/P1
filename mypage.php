<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <style type="text/css">
            #wrapper {
                width : auto;
                height: 1000px;
            }
            table.buttons th {
                width:150px; 
                height:60px;
                border:1px;
                border-collapse:separate;
                border-spacing:50px 50px;
            }
            
            </style>
        <title></title>
    </head>
    <body><center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        <div id="wrapper">
            <table class="buttons">
                <thead>
                    <tr>
                        <th scope="col" class="no">
                            <form method="get" action="mypage_info.php">
                                <input type="submit" value="내 정보"
                                   style="width:150px; height:60px; border:1px;
                                   font-size:15pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                        </th>
                        <th scope="col" class="no" style="background-color: white;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="status_info.php">
                                <input type="submit" value="이용 현황"
                                   style="width:150px; height:60px; border:1px;
                                   font-size:15pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
        </tr>
        </thead>
        </table>
            </center>
        <?php
        // put your code here
        ?>
        </div>
    </body>
</html>
