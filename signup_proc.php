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
        $pwd2=$_POST['pwd2'];
        $name=$_POST['name'];
        $n_name=$_POST['nickname'];
        $email=$_POST['email'];
        $addr=$_POST['addr'];
        $phone=$_POST['phone'];
        $sex=$_POST['usr_sex'];
        $resv='no';
        if($pwd==$pwd2){
       
        $salt='1234';
        $pass=$pwd.$salt;
        $enc_pass=md5($pass);
        
        $conn= mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="insert into member_db values(NULL, '".$id."','".$enc_pass."','".$name."','".$n_name."',"
                . "'".$addr."',$phone,'".$email."','".$sex."',0,'".$resv."',NULL,NULL)";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('회원가입이 완료되었습니다! 로그인해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=/P1/login.php'>";
        }
        else{
            echo "<script>alert('회원가입에 실패하였습니다! 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=/P1/signup.php'>";
        }
        }
 else {
            echo "<script>alert('비밀번호 재입력이 틀렸습니다 다시시도하세요')</script>";
            //echo "<meta http-equiv='refresh' content='0;url=/P1/signup.php'>";
        }
        ?>
    </body>
</html>
