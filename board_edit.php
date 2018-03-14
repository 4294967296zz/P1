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
        <form action="index.php">
            <input type="submit" value="HOME"
                   style="width:80px; background-color: beige;
                          border:0px;">
            </form>
        
        <?php
        $q_no=$_GET['q_no'];
        $id=$_COOKIE['usr_id'];
        
        if($id==NULL){
            echo "<script>alert('로그인이 필요합니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/login.php'>";
        }
        else {
            
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="update qna_db set q_hit=q_hit+1 where q_no = $q_no";
        $result= mysqli_query($conn, $sql);
        $sql2="select * from qna_db where q_no=$q_no";
        $result2=mysqli_query($conn, $sql2);
        $result3=mysqli_fetch_array($result2) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
        if($id==$result3['q_writer']){
        ?>
            <div id="wrapper">
                <center><br><br><h1>
                        글 상세보기<br><br></h1>
            <table class="board_2">
                <thead>
                    <tr>
                        <td colspan="1" class="subject" width="150px" bgcolor="#6699ff">글 제목</td>
                        <td colspan="5" class="is" width="600px" bgcolor="#eeeeee"><?=$result3['q_subject']?></td>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6"></td>
                        </tr>
                    <tr>
                        <td class="writer" width="150px" bgcolor="#6699ff">작성자</td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee"><?=$result3['q_writer']?></td>
                        <td class="hits" width="150px" bgcolor="#6699ff">작성일자</td>
                        <td class="hitss" width="300px" bgcolor="#eeeeee"><?=$result3['q_date']?></td>
                        <td class="hits" width="100px" bgcolor="#6699ff">조회수</td>
                        <td class="hitss" width="80px" bgcolor="#eeeeee"><?=$result3['q_hit']?></td>
                    </tr>
                    <tr>
                        <td colspan="6"></td>
                    </tr>
                    <tr>
                        <td colspan="1" width="150px" bgcolor="#6699ff">내용</td>
                        <td colspan="5" width="600px" bgcolor="#eeeeee">
                            <form method="post" action="board_edit_proc.php">
                                <textarea name="contents" style="width:450px;height:250px;">
                                    <?=$result3['q_contents']?>
                                </textarea>
                </td>
                            </tr>
                <tr>
                <td colspan="1" width="150px" bgcolor="#6699ff">비밀번호</td>
                        <td colspan="5" width="600px" bgcolor="#eeeeee">
                            <input type="password" name="pwd">
   
                    </tr>
                    
                    </tbody>
            </table>
                    </body>
        </div>
            <br><center>
                <input type="submit" value="수정완료"
                       style="width:100px; height:40px;
                       font-size:12pt; font-weight:blod;
                       background-color:#6699ff; border:1px;">
                <input type="hidden" name="q_no" value="<?=$result3['q_no']?>">
                </form></center>
            <br><center><form action="board.php">
                <input type="submit" value="목록으로"
                       style="width:100px; height:40px;
                       font-size:12pt; font-weight:blod;
                       background-color:#6699ff; border:1px;">
                <input type="hidden" name="page_no" value="0">
                </form><br><br></center>
            <?php
        } else{
            echo "<script>alert('작성자만 수정가능합니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/board_view.php?q_no=".$result3['q_no']."'>";
        }
        
        }
        ?>
</html>
