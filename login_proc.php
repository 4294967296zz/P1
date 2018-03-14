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

        $id=$_POST['id'];
        $pwd=$_POST['pwd'];
        $salt='1234';
        $pass=$pwd.$salt;
        $enc_pass=md5($pass);
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from member_db where id='".$id."'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        if($result2['perm']==999){
            echo "<script>alert('관리자님 환영합니다!')</script>";
            echo "<meta http-equiv='refresh' content='1;url=/P1/admin/index_admin.php'>";
        }
        
        else if($enc_pass==$result2['pwd']){
            echo "<script>alert('".$result2['nickname']."님 환영합니다!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/index.php'>";
        }
        else {
            echo "<script>alert('로그인 실패 !다시 시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/login.php'>";
        }
         
        
        $nickname=$result2['nickname'];
        $usr_sex=$result2['sex'];
        $resv=$result2['resv'];
        
        
         setcookie("usr_id",$id);
         setcookie("n_name",$nickname);
         setcookie("usr_sex", $usr_sex);
         setcookie("resv", $resv);
         setcookie("perm", $result2['perm']);
         
         
        ?>
    </body>
</html>
