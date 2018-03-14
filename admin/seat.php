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
            </style>
        <title>좌석 선택</title>
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
        <div id="wrapper"><center>
        <a href="index_admin.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
            
            <h1>좌석도 </h1><h2>
                
            <span style="color:red">여성전용 좌석</span>
            <span style="color:blue">남성전용 좌석</span></h2>
            <form action="seat_view.php" method="get">
                
                   
                    <?php
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select count(*) from seat_db";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        $record_cnt=$result2['count(*)']; 
        $sql2="select * from seat_db";
        $result3=mysqli_query($conn,$sql2);
       while($result4=mysqli_fetch_array($result3)){
        if($result4['s_sex']=="FEMALE"){
           ?>      
                    <input type='submit'
                  style ='width:80px; height:80px; background-color:#cc0033;
                  border: 2px solid grey;'
                  value="<?=$result4['s_type']?>"
                  name="s_type">
                    <?php
       }
       else if($result4['s_sex']=="MALE"){
           ?>
       <input type='submit' 
              style ='width:80px; height:80px; background-color: #6699ff;
              border: 2px solid grey;'
              value="<?=$result4['s_type']?>"
              name="s_type">
       <?php
       }
       }
       }
         else{
             echo "<script>alert('관리자 권한이 필요합니다')</script>";
             echo "<meta http-equiv='refresh' content='1;url=hacker.php'>";
         }
       ?>
            </form>
            <br><br>
            <form method="post" action="seat_add.php">
            <input type="submit" value="좌석 추가하기"
                   style="width:100px; height:60px;
                   background-color:#6699ff; 
                   font-size:10pt; font-weight: bold;">
        </form>
</div>
    </body>

</html>