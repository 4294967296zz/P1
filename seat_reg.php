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
        $s_type=$_GET['s_type'];
        $usr_id=$_COOKIE['usr_id'];
        $sttime=date('Y-m-d H:i:s');
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from member_db where id='".$usr_id."'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        if($result2['perm']==0){
            echo "<script>alert('이용권이 만료되었습니다 데스크로 문의주세요!')</script>";
            echo "<meta http-equiv='refresh' content='1;url=mypage.php'>";
        }
        else{
        
        $sql2="update seat_db set s_sttime='".$sttime."', s_usr='".$usr_id."', "
                . "s_name='".$result2['name']."' where s_type='".$s_type."'";
        
        $result3= mysqli_query($conn, $sql2);
        
        if($result3){
            echo "<script>alert('좌석 선택이 완료되었습니다. 열공하세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=mypage.php'>";
        }
        else {
            echo "<script>alert('실패 !다시 시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=seat.php'>";
        }
        }
        ?>
    </body>
</html>
