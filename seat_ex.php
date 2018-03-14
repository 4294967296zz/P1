<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $extime=date('Y-m-d H:i:s');
        $usr_id=$_COOKIE['usr_id'];
            
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="update seat_db set s_extime='$extime' where s_usr='".$usr_id."'";
        $result= mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('퇴실신청이 완료되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/status_info.php'>";
        }
        else{
            echo "<script>alert('퇴실신청을 실패하였습니다 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/status_info.php'>";
        }
        ?>
    </body>
</html>
