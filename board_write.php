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
                width : 1100px;
                height: 65px;
                margin : 0 auto;
                background-color: #dddddd;
                text-align: center;
            }
            table.board_1 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: center;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 150%;
                background: #B3B0B0;
            }
            table.board_1 th {
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                color: #fff;
                line-height: 150%;
            }
            table.board_1 td {
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #B3B0B0;;
                font-weight: bold;
            }
            </style>
        <title></title>
    </head>
    <body><center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        
        <form method='post' action='board_write_proc.php'>
                
            <table class="board_1">
                <thead>
                    <tr>
                        <th colspan="1">글제목</th>
                        <th colspan="4">
                            <input type="text" style="width:450px; height:25px;" 
                                   name='subject'></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" bgcolor="#B3B0B0"</td>
                    </tr>
                    <tr>
                        <td colspan="1">글 내용 </td>
                        <td colspan="4">
                            <textarea name="contents" style="width:450px;height:250px;">
                            </textarea></td>
                    </tr>
                </tbody>
            </table>
        <br><input type='submit' style="background-color:#B3B0B0; border:1px;
                   width:120px; height:30px;"
                   value='작성 완료!'>
        </form>

    </body>
</html>
