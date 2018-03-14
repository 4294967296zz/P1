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
        <?php
        $r_no=$_POST['r_no'];
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from rental_db where r_no=$r_no";
        $result= mysqli_query($conn, $sql);
        $result2=mysqli_fetch_assoc($result) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
      
        ?>
            <div id="wrapper">
                <form action="index_admin.php">
            <input type="submit" value="HOME"
                   style="width:80px; background-color: beige;
                          border:0px;">
            </form><br><h1>
                        물품 상세보기<br><br></h1>
            <table class="board_2">
                <thead>
                <form enctype="multipart/form-data" 
                      method="post" action="rental_edit_proc.php">
                    <tr>
                        <th scope="col" class="subject" width="150px" bgcolor="#6699ff">제품명</th>
                        <th scope="col" class="is" width="600px" bgcolor="#eeeeee">
                            <input type="text" name="r_type" value="<?=$result2['r_type']?>">
                        </th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="hits" width="150px" bgcolor="#6699ff">상세설명</td>
                        <td class="hitss" width="600px" bgcolor="#eeeeee">
                        <input type="text" name="r_desc" value="<?=$result2['r_desc']?>"
                                   style='width:600px; height:300px;'></td>
   
                    </tr>
                    <tr>
                        <td class="contents" width="150px" bgcolor="#6699ff">대여가능시간</td>
                        <td class="contentsis" width="600px" bgcolor="#eeeeee">
                            <input type="text" name="r_time" value="<?=$result2['r_time']?>"
                                   style='width:80px;'> (분)
                </td>
   
                    </tr>
                    
                    </tbody>
            </table>
            <br><center>
                <input type="submit" value="수정 완료"
                       style="width:100px; height:40px;
                       font-size:12pt; font-weight:blod;
                       background-color:#6699ff; border:1px;">
                <input type="hidden" value="<?=$result2['r_no']?>" name="r_no">
            </form>
        </div>
            <center><a href="rental.php?page_no='0'">목록</a>
</html>
