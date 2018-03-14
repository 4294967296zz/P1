<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <form action="index_admin.php">
            <input type="submit" value="HOME"
                   style="width:80px; background-color: beige;
                          border:0px;">
            </form>
        <title></title>
    </head>
    <body>
        <?php
        $m_no=$_POST['m_num'];
        $name=$_POST['name'];
        $n_name=$_POST['nickname'];
        $addr=$_POST['addr'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="update member_db set name='".$name."', nickname='".$n_name."', "
                . "addr='".$addr."', phone='".$phone."', email='".$email."' where"
                . " num=$m_no";
        $result=mysqli_query($conn,$sql);
       if($result){
            echo "<script>alert('수정이 완료되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='1;url=member.php?page_no='0'>";
        }
        else{
            echo "<script>alert('수정을 실패하였습니다 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=member.php?page_no='0'>";
        }
        ?>
    </body>
</html>
