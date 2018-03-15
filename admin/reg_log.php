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
            .r_name, .r_id{
                width : 120px;
            }
            .r_sttime,.r_extime{
                width : 250px;
            }
            .r_perm,r.resv{
                width : 80px;
            }
            .r_cost{
                width : 100px;
                font-weight: bold;
            }
            </style>
        <title>이용권 등록 기록</title>
    </head>
    <body><center>
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
                        <th scope="col" class="r_name">이름</th>
                        <th scope="col" class="r_id">아이디</th>
                        <th scope="col" class="r_perm">등록 상품</th>
                        <th scope="col" class="r_sttime">등록일</th>
                        <th scope="col" class="r_extime">만료일</th>
                        <th scope="col" class="r_resv">고정석 여부</th>
                        <th scope="col" class="r_cost">결제완료금액</th>
                    </tr>
                    </thead>
                    <?php
        echo "<h1> 기용권 등록 기록 <br><br>";
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select count(*) from reg_log_db";
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
        
        $sql2="select * from reg_log_db where r_name like '%".$keyword."%' order by r_no desc limit ".$start_no.",".$record_per_page;
        $result3=mysqli_query($conn,$sql2);
       while($result4=mysqli_fetch_array($result3)){
        
        ?>
                    <tbody>
                    <tr>
                        <td class="r_name"><?=$result4['r_name']?></td>
                        <td class="r_id"><?=$result4['r_id']?></td>
                        <td class="r_perm"><?=$result4['r_perm']."일권"?></td>
                        <td class="r_sttime"><?=$result4['r_sttime']?></td>
                        <td class="r_extime"><?=$result4['r_extime']?></td>
                        <td class="r_resv"><?=$result4['r_resv']?></td>
                        <td class="r_cost"><?=$result4['r_cost']?></td>
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