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
                margin :0 auto;
            }
            table.board_2 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: center;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 200%;
                width:1000px;
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
            .subjectis {
                font-size: 16pt;
                font-weight: bold;
                text-align:left;
            }
            .con1{
                height:300px;
                text-align:left;
            }
            table.coment{
                border-collapse: separate;
                border-spacing: 1px;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 200%;
                width:1000px;
            }
             table.coment th{
                border-collapse: separate;
                border-spacing: 1px;
                text-align: left;
                line-height: 0.5;
                margin: 50px 10px;
                line-height: 150%;
            }
            table.coment td{
                padding: 5px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
                line-height: 200%;
            }
            .s_sub{
                font-size: 16pt;
                font-weight: bold;
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
        $q_no=$_GET['q_no'];
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="update qna_db set q_hit=q_hit+1 where q_no = $q_no";
        $result= mysqli_query($conn, $sql);
        $sql2="select * from qna_db where q_no=$q_no";
        $result2=mysqli_query($conn, $sql2);
        $result3=mysqli_fetch_array($result2) or die("MySQL error: " . mysqli_error($conn) . "<hr>\nQuery: $sql");
      
        ?>
            <div id="wrapper">
                <h1>글 상세보기</h1>
            <table class="board_2">
                <thead>
                    <tr>
                        <td colspan="1" class="subject" width="150px" 
                            bgcolor="#B3B0B0">글 제목</td>
                        <td colspan="5" class="subjectis" width="600px"><?=$result3['q_subject']?></td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="writer" width="150px" bgcolor="#B3B0B0">작성자</td>
                        <td class="writeris" width="600px"><?=$result3['q_writer']?></td>
                        <td class="hits" width="150px" bgcolor="#B3B0B0">작성일자</td>
                        <td class="hitss" width="300px"><?=$result3['q_date']?></td>
                        <td class="hits" width="100px" bgcolor="#B3B0B0">조회수</td>
                        <td class="hitss" width="80px"><?=$result3['q_hit']?></td>
                    </tr>
                    <tr>
                        <td class="con" colspan="1" width="150px" bgcolor="#B3B0B0">내용</td>
                        <td class="con1" colspan="5" width="600px"><?=$result3['q_contents']?></td>
   
                    </tr>
                    
                    </tbody>
            </table>
                <br>
                
                <table class="coment">
                <thead>
                    <tr>
                        <th scope="col" class="s_sub">댓글</th>
                    </tr>
                </thead>
                
                <?php
                
                $subject=$result3['q_subject'];
                
                $sql3="select * from coment_db where subject='".$subject."' order by no desc";
                $result4=mysqli_query($conn, $sql3);
                while($result5=mysqli_fetch_array($result4)){
                    
                ?>
                
                <tbody>
                <tr>
                     <td class="c_contents"><?=$result5['contents']?></td><!--댓글내용 들어감-->
                        <td class="c_writer"><?=$result5['writer']?></td><!--아이디가 표시됨-->
                        <td class="c_date" style="font-size:7pt;"><?=$result5['date']?></td>
                    </tr>
                    
                    <?php
                    }
                    ?>
                    <tr>
                        <td class="contents">
                            <form method="post" action="coment_reg.php">
                            <textarea name="contents" 
                                style="width: 800px; height: 80px;">
                            </textarea>
                            </td>
                            <td>
                            <input type="submit" value="완료"
                                   style="height:80px; width:80px;">
                            <input type="hidden" name="subject" value="<?=$subject?>">
                            <input type="hidden" name="q_no" value="<?=$result3['q_no']?>">
                        </td><!--댓글내용 들어감-->
                        </form>
                    </tr>
                </tbody>
            </table>
                    
                    </body>
        </div>
            <br><center><form methoe="get" action="board_edit.php">
                <input type="submit" value="글 수정"
                       style="width:100px; height:40px;
                       font-size:12pt; font-weight:blod;
                       background-color:#6699ff; border:1px;">
                <input type="hidden" name="q_no" value="<?=$result3['q_no']?>">
                </form></center>
            <br><center><form method="get" action="board.php">
                <input type="submit" value="목록으로"
                       style="width:100px; height:40px;
                       font-size:12pt; font-weight:blod;
                       background-color:#6699ff; border:1px;">
                <input type="hidden" name="page_no" value="0">
                </form>
</html>
