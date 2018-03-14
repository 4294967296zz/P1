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
        $q_no=$_POST['q_no'];
        $writer=$_COOKIE['usr_id'];
        $pwd=$_POST['pwd'];
        $contents=$_POST['contents'];
        $date=date('Y-m-d H:i:s');
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from member_db where id='".$writer."'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        
        if($result2['pwd']==$pwd){
            
        $sql2="update qna_db set q_contents='".$contents."', q_date='".$date."' where q_no = $q_no";
        $result3=mysqli_query($conn, $sql2);
        
        echo "<script>alert('수정이 완료되었습니다')</script>";
        echo "<meta http-equiv='refresh' content='0;url=/P1/board.php?page_no='0'>";
        }
        else{
            echo "<script>alert('비밀번호가 일치하지 않습니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/board.php?page_no='0'>";
        }
        
        ?>
    </body>
</html>
