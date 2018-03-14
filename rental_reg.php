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
        if(isset($_COOKIE['usr_id'])){
                        $id=$_COOKIE['usr_id'];
                    }
                    else {
                        $id=NULL;
                    }
                    
        $r_type=$_GET['r_type'];
        $sttime=date('Y-m-d H:i:s');
        
        if($id==NULL){
            echo "<script>alert('로그인이 필요합니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/login.php'>";
        }
        else {
    
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from member_db where id='".$id."'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        
        if($result2['perm']==0){
            echo "<script>alert('이용권이 만료되었습니다 데스크로 문의주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=mypage.php'>";
        }
        else{
        
        $sql2="update rental_db set r_sttime='".$sttime."', r_mem='".$id."', "
                . "r_name='".$result2['name']."' where r_type='".$r_type."'";
        
        $result3= mysqli_query($conn, $sql2);
        
        if($result3){
            echo "<script>alert('대여 신청이 완료되었습니다. 프런트로 와주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=mypage.php'>";
        }
        else {
            echo "<script>alert('실패 !다시 시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=rental.php'>";
        }
        }
        }
        ?>
    </body>
</html>
