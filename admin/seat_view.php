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
                margin : 100px auto;
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
        <?php
        $s_type=$_GET['s_type'];
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from seat_db where s_type='".$s_type."'";
        $result= mysqli_query($conn, $sql);
        $result2=mysqli_fetch_array($result) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
        
        ?>
                <br><br><h1>
                        물품 상세보기<br><br></h1>
            <table class="board_2">
                <thead>
                    <tr>
                        <th scope="col" class="subject" width="150px" bgcolor="#6699ff">좌석번호</th>
                        <th scope="col" class="subjects" width="600px" bgcolor="#eeeeee"><?=$result2['s_type']?></th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="writer" width="150px" bgcolor="#6699ff">이미지</td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee"><img src=images/<?=$result2['s_img']?>></td>
                    </tr>
                    <tr>
                        <td class="hits" width="150px" bgcolor="#6699ff">상세설명</td>
                        <td class="hitss" width="600px" bgcolor="#eeeeee"><?=$result2['s_desc']?></td>
   
                    </tr>
                    <tr>
                        <td class="contents" width="150px" bgcolor="#6699ff">이용가능 성별</td>
                        <td class="contentsis" width="600px" bgcolor="#eeeeee"><?=$result2['s_sex']?></td>
                        
                            </td>
   
                    </tr>
                    </tbody>
            </table>
                    <center><form method="post" action="seat_edit.php">
                <input type="submit" value="수정하기"
                       style="width:100px; height:40px;
                       font-size:12pt; font-weight:blod;
                       background-color:#6699ff; border:1px;">
                <input type="hidden" value="<?=$result2['s_no']?>" name="s_no">
            </form>
        <br><a href="seat.php?page_no='0'">목록</a></center>
                    </div>
                    </body>
        
                    
</html>