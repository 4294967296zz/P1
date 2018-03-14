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
                background-color: #dddddd;
                text-align: center;
            }
            </style>
        <title>좌석 선택</title>
    </head>
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
    <body><center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        <div id="wrapper">
            
            <h1><br><br>좌석도</h1><br><h2>
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
        if($result4['s_sex']=="FEMALE" && $result4['s_usr']==NULL){
           ?>      
                    <input type='submit'
                  style ='width:80px; height:80px; background-color:#cc0033;
                  border: 2px solid grey;'
                  value="<?=$result4['s_type']?>"
                  name="s_type">
                    <?php
       }
       else if($result4['s_sex']=="MALE" && $result4['s_usr']==NULL){
           ?>
       <input type='submit' 
              style ='width:80px; height:80px; background-color: #6699ff;
              border: 2px solid grey;'
              value="<?=$result4['s_type']?>"
              name="s_type">
       <?php
       }
       else{
           ?>
            <input type='button' 
              style ='width:80px; height:80px; background-color: #eeeee;
              border: 2px solid grey;'
              value="이용중"
              name="s_type">
            <?php
       }
       }
        }
       ?>
            </form>
</div>
    </body>

</html>