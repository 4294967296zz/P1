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
        $r_name=$_POST['r_name'];
        $r_mem=$_POST['r_mem'];
        $r_sttime=$_POST['r_sttime'];
        $r_type=$_POST['r_type'];
        $r_extime=$_POST['r_extime'];
        
        if($r_extime==NULL){
            $r_extime=date('Y-m-d H:i:s');
        
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql2="insert into rental_log_db values (NULL, '".$r_mem."', '".$r_name."', "
                . "'".$r_sttime."', '".$r_extime."', '".$r_type."')";
        $result2=mysqli_query($conn, $sql2);
        
        if($result2){
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="update rental_db set r_mem=NULL, r_sttime=NULL, r_extime=NULL, r_name=NULL where r_name='".$r_name."'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('반납처리가 완료되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='1;url=status_r.php?page_no='0'>";
        }
        else{
            echo "<script>alert('반납처리에 실패하였습니다 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=status_r.php?page_no='0'>";
        }
        }
        }
        ?>
    </body>
</html>
