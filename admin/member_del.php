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
        $id=$_POST['m_id'];
        
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="delete from member_db where id='".$id."'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        
        if($result){
            echo "<script>alert('삭제가 완료되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='1;url=member.php?page_no='0'>";
        }
        else{
            echo "<script>alert('삭제를 실패하였습니다 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=member.php?page_no='0'>";
        }
        // put your code here
        ?>
    </body>
</html>
