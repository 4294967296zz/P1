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
                height: 1000px;
                margin : 0 auto;
                text-align: center;
            }
            table.rental_1 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: center;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 150%;
            }
            table.rental_1 th {
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                color: #fff;
                background:#B3B0B0;
                line-height: 150%;
            }
            table.rental_1 td {
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
                background: #eee;
            }
            </style>
        <title>물품 대여</title>
    </head>
    <body>
    <?php
    if(isset($_COOKIE['usr_id'])){
        $id=$_COOKIE['usr_id'];
    }
    else{
        $id=NULL;
    }
        if($id==NULL){
            echo "<script>alert('로그인이 필요합니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/login.php'>";
        }
        else {
    ?>
    <center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        <div id="wrapper">
            <center><h1>물품 대여</h1>
            <table class="rental_1">
                <thead>
                    <tr>
                        <th scope="col" class="no" style="width:80px;">물품번호</th>
                        <th scope="col" class="no"style="width:300px;">제품명</th>
                        <th scope="col" class="no"style="width:100px;">대여시간(분)</th>
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
        
        $sql2="select * from rental_db order by r_no desc limit ".$start_no.",".$record_per_page;
        $result3=mysqli_query($conn,$sql2);
       while($result4=mysqli_fetch_array($result3)){
        
        ?>
                    <tbody>
                    <tr>
                        <td class="no"><?=$result4['r_no']?></td>
                        <td class="no">
                            <a href=rental_view.php?r_no=<?=$result4['r_no']?>>
                                    <?=$result4['r_type']?>
                            </a>
                        </td>
                        <td class="no"><?=$result4['r_time']?></td>
                    </tr>
                    <?php
       }
       
       ?>
                    </tbody>
            </table>
            <br><a href=rental_reg.php'>물품 추가</a><br>
             <?php
    for($cnt=1;$cnt <= $page_cnt; $cnt++){
           echo "<a href='board.php?page_no=".$cnt."'>".$cnt."</a>";
       }
        }
       ?>
        </div>
    </body>

</html>