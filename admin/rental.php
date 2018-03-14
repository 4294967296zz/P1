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
            </style>
        <title>대여물품 LIST</title>
    </head>
    <body><center>
        <a href="index_admin.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
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
            <table class="board_1">
                <thead>
                    <tr>
                        <th scope="col" class="no" width="100px">물품번호</th>
                        <th scope="col" class="no" width="550px">제품명</th>
                        <th scope="col" class="no" width="150px">대여시간 (분)</th>
                    </tr>
                    </thead>
            <?php
            echo "<h1>대여물품";
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
        
        if(isset($_POST['keyword'])){
                        $keyword=$_POST['keyword'];
                    }
                    else {
                        $keyword=NULL; 
                    }
                    
        $sql2="select * from rental_db where r_type like '%".$keyword."%' order by r_no desc limit ".$start_no.",".$record_per_page;
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
            </table><center>
        <form method='post'><center>
            <input type='text' name='keyword'>
            <input type='submit' value='검색'>
            </form><br>
            <br><br><form method="post" action="rental_reg.php">
                <input type="submit" value="물품 추가"
                       style="width:100px; height:40px;
                       font-size:12pt; font-weight:blod;
                       background-color:#6699ff; border:1px;">
            </form><br><br>
             <?php
    for($cnt=1;$cnt <= $page_cnt; $cnt++){
           echo "<a href='board.php?page_no=".$cnt."'>".$cnt."</a>";
       }
     }
         else{
             echo "<script>alert('관리자 권한이 필요합니다')</script>";
             echo "<meta http-equiv='refresh' content='1;url=hacker.php'>";
         }
       ?>
            </div>
    </body>

</html>