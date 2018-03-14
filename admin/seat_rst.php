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
        $s_type=$_POST['s_type'];
        $s_usr=$_POST['s_usr'];
        $s_name=$_POST['s_name'];
        $s_sttime=$_POST['s_sttime'];
        $s_extime=$_POST['s_extme']; 
        
        if($s_extime==NULL){
            $s_extime=date('Y-m-d H:i:s');
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql2="insert into seat_log_db values (NULL, '".$s_usr."', '".$s_name."', "
                . "'".$s_sttime."', '".$s_extime."', '".$s_type."')";
        $result2=mysqli_query($conn, $sql2);
        
        if($result2){
            
        $sql="update seat_db set s_usr=NULL, s_sttime=NULL, s_extime=NULL, "
                . "s_name=NULL where s_type='".$s_type."'";
        $result=mysqli_query($conn,$sql);
        
        if($result){
            echo "<script>alert('퇴실처리가 완료되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='1;url=status_s.php?page_no='0'>";
        }
        else{
            echo "<script>alert('퇴실처리에 실패하였습니다 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=status_s.php?page_no='0'>";
        }
        }
        }
        ?>
    </body>
</html>
