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
        $writer=$_COOKIE['usr_id'];
        $subject=$_POST['subject'];
        $contents=$_POST['contents'];
        $date=date('Y-m-d H:i:s');
        
        $contents=str_ireplace("<script>","",$contents);
        $contents=eregi_ireplace("<Script[:blank:]*>","",$contents);
        $contents=eregi_ireplace("<script[:space:]$]*>","",$contents);
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="insert into qna_db values(NULL,'".$subject."','".$writer."', '".$contents."','".$date."',1)";
        $result=mysqli_query($conn,$sql);
       if($result){
            echo "<script>alert('작성이 완료되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/board.php?page_no='0'>";
        }
        else{
            echo "<script>alert('작성을 실패하였습니다 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/board.php?page_no='0'>";
        }
        ?>
    </body>
</html>
