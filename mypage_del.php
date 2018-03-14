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
        $id=$_COOKIE['usr_id'];
        
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="update member_db set pwd=NULL where id='".$id."'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        
        if($result){
            echo "<script>alert('탈퇴가 완료되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php>";
        }
        else{
            echo "<script>alert('탈퇴를 실패하였습니다 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=index.php>";
        }
        
            setcookie("usr_id","");
            setcookie("n_name","");
            setcookie("usr_sex","");
            setcookie("resv", "");
        // put your code here
        ?>
    </body>
</html>
