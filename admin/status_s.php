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
            table.board_1 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: center;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 150%;
            }
            table.board_1 th {
                width: 800px;
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                color: #fff;
                background: #6699ff ;
                line-height: 150%;
            }
            table.board_1 td {
                width: 800px;
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
                background: #eee;
            }
            </style>
        <title>좌석 이용 현황</title>
    </head>
    <body>
        
        <div id="wrapper">
            <form action="index_admin.php">
            <input type="submit" value="HOME"
                   style="width:80px; background-color: beige;
                          border:0px;">
            </form>
            
            <h1>좌석 이용 현황</h1>
            <h3>반드시 퇴실여부를 확인, 간단한 정리와 청소 후 퇴실처리 하시기 바랍니다.</h3>
            <table class="board_1">
                <thead>
                    <tr>
                        <th scope="col" class="no">좌석 번호</th>
                        <th scope="col" class="no">이용자</th>
                        <th scope="col" class="no">아이디</th>
                        <th scope="col" class="no">입실 시간</th>
                        <th scope="col" class="no">퇴실 시간</th>
                        <th scope="col" class="no">퇴실 처리</th>
                        
                    </tr>
                    </thead>
            <?php
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select count(*) from seat_db";
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
        
        $sql2="select * from seat_db order by s_type desc limit ".$start_no.",".$record_per_page;
        $result3=mysqli_query($conn,$sql2);
        $result4=mysqli_fetch_array($result3);
                while($result4=mysqli_fetch_array($result3)){
                    
        ?>
                    <tbody>
                    <tr>
                        <td class="no"><?=$result4['s_type']?></td>
                        <td class="no"><?=$result4['s_name']?></td>
                        <td class="no"><?=$result4['s_usr']?></td>
                        <td class="no"><?=$result4['s_sttime']?></td>
                        <td class="no"><?=$result4['s_extime']?></td>
                        <td class="no">
                            <?php
                        if($result4['s_usr']!=NULL){
                            ?>
                            <form method='post' action='seat_rst.php'>
                                <input type='submit' value='퇴실 처리'>
                                <input type='hidden' name='s_type' value="<?=$result4['s_type']?>">
                                <input type='hidden' name='s_name' value="<?=$result4['s_name']?>">
                                <input type='hidden' name='s_usr' value="<?=$result4['s_usr']?>">
                                <input type='hidden' name='s_sttime' value="<?=$result4['s_sttime']?>">
                                <input type='hidden' name='s_extime' value="<?=$result4['s_extime']?>">
                            </form>
                            <?php
                        } 
                        ?>
                        </td>
                    </tr>
                    <?php
       }
       
       ?>
                    </tbody>
            </table>
             <?php
    for($cnt=1;$cnt <= $page_cnt; $cnt++){
           echo "<a href='status_s.php?page_no=".$cnt."'>".$cnt."</a>";
       }
       ?>
        </div>
    </body>

</html>