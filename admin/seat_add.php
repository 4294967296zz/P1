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
                width : 1000px;
                margin : 0 auto;
            }
            table.board_2 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: center;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 200%;
            }
            table.board_2 th {
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                line-height: 200%;
            }
            table.board_2 td {
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
                line-height: 200%;
            }
            </style>
        <title>게시판 글 보기</title>
    </head>
    <body>
        <div id="wrapper">
            <form action="index_admin.php">
            <input type="submit" value="HOME"
                   style="width:80px; background-color: beige;
                          border:0px;">
            </form>
                <center><br><br><h1>
                        좌석 등록하기<br><br></h1>
            <table class="board_2">
                <form enctype='multipart/form-data' 
                          method='post' action='seat_proc.php'>
                <thead>
                    <tr>
                        <th scope="col" class="subject" width="150px" bgcolor="#6699ff">좌석유형</th>
                        <th scope="col" class="is" width="600px" bgcolor="#eeeeee">
                            <input type='text' name='type' style='width:500px;'>
                        </th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="writer" width="150px" bgcolor="#6699ff">이미지</td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee">
                            <input type='file' name='img'>
                        </td>
                    </tr>
                    <tr>
                        <td class="hits" width="150px" bgcolor="#6699ff">상세설명</td>
                        <td class="hitss" width="600px" bgcolor="#eeeeee">
                            <input type='text' name='desc'
                                   style='width:600px; height:300px;'>
                        </td>
   
                    </tr>
                    <tr>
                        <td class="contents" width="150px" bgcolor="#6699ff">이용가능성별</td>
                        <td class="contentsis" width="600px" bgcolor="#eeeeee">
                            <select name="usr_sex" style="width:80px; height:50px; font-size:15pt;">
                                <option value='FEMALE'>여성</option>
                                <option value='MALE'>남성</option>
                            </select>
                        </td>
   
                    </tr>
                    </tbody>
            </table>
                    <br><input type='submit' value='등록'
                               style="width:120px; height:40px;
                               font-size:12pt; font-weight: bold;">
                    </form>
                    </body>
        </div>
            <br><center><a href="seat.php?page_no='0'">목록</a>
</html>
