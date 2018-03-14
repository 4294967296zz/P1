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
                width : 1300px;
                height:1000px;
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
    <body><center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        <div id="wrapper">
        <?php
        $s_type=$_GET['s_type'];
        $usr_sex=$_COOKIE['usr_sex'];
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from seat_db where s_type='".$s_type."'";
        $result= mysqli_query($conn, $sql);
        $result2=mysqli_fetch_array($result) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
        
        if($result2['s_sex']==$usr_sex){
        ?>
                <center><h1>
                        좌석 상세보기</h1>
            <table class="board_2">
                <thead>
                    <tr>
                        <th scope="col" class="subject" width="150px" bgcolor="#B3B0B0">좌석번호</th>
                        <th scope="col" class="subjects" width="600px" bgcolor="#eeeeee"><?=$result2['s_type']?></th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="writer" width="150px" bgcolor="#B3B0B0">이미지</td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee"><img src=images/<?=$result2['s_img']?>></td>
                    </tr>
                    <tr>
                        <td class="hits" width="150px" bgcolor="#B3B0B0">상세설명</td>
                        <td class="hitss" width="600px" bgcolor="#eeeeee"><?=$result2['s_desc']?></td>
   
                    </tr>
                    <tr>
                        <td class="contents" width="150px" bgcolor="#B3B0B0">이용가능 성별</td>
                        <td class="contentsis" width="600px" bgcolor="#eeeeee"><?=$result2['s_sex']?></td>
                        
                            </td>
   
                    </tr>
                    </tbody>
            </table>
                    <form action="seat_reg.php" method="get">
                                <input type="hidden" name="s_type" value="<?=$result2['s_type']?>">
                                <input type="submit" value="좌석 선택하기"
                                       style="width:300px; height:80px; 
                                       background-color:#B3B0B0; border: 2px solid grey;">
                                </form>
                    <center><br>
                        <span style="font: 20pt solid;"><a href="seat.php?page_no='0'">
                                목록</a></span>
                    </div>
                    </body>
        
            
                <?php
        } else {
            echo "<script>alert('".$result2['s_sex']."전용 좌석으로 사용 불가합니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/seat.php'>";
        }
        ?>
</html>