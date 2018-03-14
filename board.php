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
            }
            table.board_1 th {
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                color: #fff;
                background: #B3B0B0;
                line-height: 150%;
            }
            table.board_1 td {
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
                font-weight: bold;
            }
            table.buttons th {
                width:100px;
                height:40px;
                border:1px;
                border-collapse: separate;
                border-spacing:50px 50px;
                text-align: center;
            }
            .no, .hits{
                width : 100px;
            }
            .subject {
                width : 600px;
            }
            .date, .writer {
                width : 200px;
            }
           
            </style>
        <title>게시판 페이지</title>
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
                            <form method="get" action="login.php">
                                <input type="submit" value="로그인"
                                   style="width:100px; 
                                   border:1px; font-size:13pt; font-weight:bold">
                            </form>
                        </th>
                        <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="mypage.php">
                                <input type="submit" value="마이페이지"
                                   style="width:120px;
                                   border:1px; font-size:13pt; font-weight:bold">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="board.php">
                                <input type="submit" value="게시판"
                                   style="width:100px;
                                   border:1px;  font-size:12pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="seat.php">
                                <input type="submit" value="좌석도"
                                   style="width:100px; height:60px; 
                                   border:1px; font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                    <form method="get" action="rental.php">
                                <input type="submit" value="물품대여"
                                   style="width:120px;
                                   border:1px; font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                    <form method="get" action="signup.php">
                                <input type="submit" value="회원가입"
                                   style="width:130px; 
                                   border:1px; font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                    <form method="get" action="logout.php">
                                <input type="submit" value="로그아웃"
                                   style="width:120px;
                                   border:1px; font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
        </tr>
        </thead>
           </table>
            <center>
            <table class="board_1">
                <thead>
                    <tr>
                        <th scope="col" class="no">글 번호</th>
                        <th scope="col" class="subject">제목</th>
                        <th scope="col" class="writer">작성자</th>
                        <th scope="col" class="date">작성일</th>
                        <th scope="col" class="hits">조회수</th>
                    </tr>
                    </thead>
                    <?php
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select count(*) from qna_db";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        
        $record_cnt=$result2['count(*)']; 
        $record_per_page=10;
        $page_cnt=ceil($record_cnt / $record_per_page);
        
        $page_no=$_GET['page_no'];
        if($page_no==0){
            $page_no=1;
        }
        $start_no=($page_no-1)*$record_per_page;
        
        if(isset($_POST['keyword'])){
                        $keyword=$_POST['keyword'];
                    }
                    else {
                        $keyword=NULL;
                    }
                    
        $sql2="select * from qna_db where q_subject like '%".$keyword."%' order by q_no "
                . "desc limit ".$start_no.",".$record_per_page;
        $result3=mysqli_query($conn,$sql2);
       while($result4=mysqli_fetch_array($result3)){
        ?>
                    <tbody>
                    <tr>
                        <td class="no"><?=$result4['q_no']?></td>
                        <td class="subject">
                            <a href=board_view.php?q_no=<?=$result4['q_no']?>>
                                    <?=$result4['q_subject']?>
                            </a>
                        </td>
                        <td class="writer"><?=$result4['q_writer']?></td>
                        <td class="date"><?=$result4['q_date']?></td>
                        <td class="hits"><?=$result4['q_hit']?></td>
                    </tr>
                    <?php
       }
       
       ?>
                    </tbody>
            </table>
            
            <form method='post'><center>
            <input type='text' name='keyword'>
            <input type='submit' value='검색'>
            </form>
            <br><br><form action="board_write.php">
                <input type="submit" value="글 작성"
                       style="width:100px; height:40px;
                       font-size:12pt; font-weight:blod;
                       background-color:#B3B0B0; border:1px;">
            </form><br><br>
             <?php
    for($cnt=1;$cnt <= $page_cnt; $cnt++){
           echo "<a href='board.php?page_no=".$cnt."'>".$cnt."</a>";
       }
       ?>
        </div>
    </body>

</html>