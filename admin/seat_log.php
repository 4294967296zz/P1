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
                width : 1200px;
                margin : 100px auto;
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
                background: #6699ff ;
                line-height: 150%;
            }
            table.board_1 td {
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
                background: #eee;
            }
            .name{
                width:120px;
            }
            .id{
                width: 250px;
            }
            .type{
                width : 150px;
            }
            .sttime, .extime{
                width : 250px;
            }
            </style>
        <title>회원 목록</title>
    </head>
    <body>
        <?php
        if(isset($_COOKIE['usr_id'])){
                        $id=$_COOKIE['usr_id'];
                    }
                    else {
                        $id=NULL;
                    }
                    
         if($id==="administrator"){
        ?>
        <div id="wrapper">
            <form action="index_admin.php">
            <input type="submit" value="HOME"
                   style="width:80px; background-color: beige;
                          border:0px;">
            </form>
            <table class="board_1">
                <thead>
                    <tr>
                        <th scope="col" class="name">이름</th>
                        <th scope="col" class="id">아이디</th>
                        <th scope="col" class="type">좌석 유형</th>
                        <th scope="col" class="sttime">입실 시간</th>
                        <th scope="col" class="extime">퇴실 시간</th>
                    </tr>
                    </thead>
                    <?php
        echo "<h1> 회원 목록 <br><br>";
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select count(*) from seat_log_db";
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
        
        $sql2="select * from seat_log_db where name like '%".$keyword."%' order by no desc limit ".$start_no.",".$record_per_page;
        $result3=mysqli_query($conn,$sql2);
       while($result4=mysqli_fetch_array($result3)){
        
        ?>
                    <tbody>
                    <tr>
                        <td class="name"><?=$result4['name']?></td>
                        <td class="id"><?=$result4['id']?></td>
                        <td class="type"><?=$result4['type']?></td>
                        <td class="sttime"><?=$result4['sttime']?></td>
                        <td class="extime"><?=$result4['extime']?></td>
                    </tr>
                    <?php
       }
       ?>
                    </tbody>
            </table>
            
            <form method='post'><center>
            <input type='text' name='keyword'>
            <input type='submit' value='검색'>
            </form><br>
             <?php
    for($cnt=1;$cnt <= $page_cnt; $cnt++){
           echo "<a href='/admin/reg_log.php?page_no=".$cnt."'>".$cnt."</a>";
       }
       }
         else{
             echo "<script>alert('관리자 권한이 필요합니다')</script>";
             echo "<meta http-equiv='refresh' content='1;url=hacker.php'>";
         }
       ?>
        </div>
    </body>
    </center>
</html>