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
            
            <h1>물품 이용 현황</h1>
            <table class="board_1">
                <thead>
                    <tr>
                        <th scope="col" class="no">물품번호</th>
                        <th scope="col" class="no">이용자</th>
                        <th scope="col" class="no">아이디</th>
                        <th scope="col" class="no">대여 시간</th>
                        <th scope="col" class="no">반납 시간</th>
                        <th scope="col" class="no">반납 처리</th>
                        
                    </tr>
                    </thead>
            <?php
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select count(*) from rental_db";
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
        
        $sql2="select * from rental_db order by r_type desc limit ".$start_no.",".$record_per_page;
        $result3=mysqli_query($conn,$sql2);
       while($result4=mysqli_fetch_array($result3)){
        
        ?>
                    <tbody>
                    <tr>
                        <td class="no"><?=$result4['r_type']?></td>
                        <td class="no"><?=$result4['r_name']?></td>
                        <td class="no"><?=$result4['r_mem']?></td>
                        <td class="no"><?=$result4['r_sttime']?></td>
                        <td class="no"><?=$result4['r_extime']?></td>
                        <td class="no">
                            <?php
                        if($result4['r_mem']!=NULL){
                            ?>
                            <form method='post' action='rental_rst.php'>
                                <input type='submit' value='반납 처리'>
                                <input type='hidden' name='r_name' value="<?=$result4['r_name']?>">
                                <input type='hidden' name='r_type' value="<?=$result4['r_type']?>">
                                <input type='hidden' name='r_sttime' value="<?=$result4['r_sttime']?>">
                                <input type='hidden' name='r_extime' value="<?=$result4['r_extime']?>">
                                <input type='hidden' name='r_mem' value="<?=$result4['r_mem']?>">
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