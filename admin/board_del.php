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
        $q_no=$_GET['q_no'];
        $id=$_COOKIE['usr_id'];
        
        if($id==="administrator"){
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="delete from qna_db where q_no = $q_no";
        $result= mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('삭제가 완료되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='1;url=board.php?page_no='0'>";
        }
        else{
            echo "<script>alert('삭제를 실패하였습니다 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=board.php?page_no='0'>";
        }
        }
        else{
            echo "<script>alert('권한이 없습니다')</script>";
            echo "<meta http-equiv='refresh' content='1;url=board.php?page_no='0'>";
        }
        ?>
    </body>
</html>
