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
        if($_COOKIE['usr_id']==NULL){
            echo "<script>alert('로그인 후 가능합니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/login.php'>";
        }
        else{
        
        $q_no=$_POST['q_no'];
        $subject=$_POST['subject'];
        $writer=$_COOKIE['usr_id'];
        $contents=$_POST['contents'];
        $date=date('Y-m-d H:i:s');
        
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="insert into coment_db values(NULL, '".$subject."', '".$contents."'"
                . ", '".$writer."', '".$date."')";
        echo $sql;
        $result=mysqli_query($conn, $sql);
        if($result){
            echo "<script>alert('작성이 완료되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/board_view.php?q_no=".$q_no."'>";
        }
        else{
            echo "<script>alert('작성을 실패하였습니다 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/board_view.php?q_no=".$q_no."'>";
        }
        }
        ?>
    </body>
</html>
