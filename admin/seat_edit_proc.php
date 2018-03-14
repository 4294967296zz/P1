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
        $s_no=$_POST['s_no'];
        $s_type=$_POST['s_type'];
        $s_desc=$_POST['s_desc'];
        $s_sex=$_POST['s_sex'];
        
        $conn= mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="update seat_db set s_type='".$s_type."', s_desc='".$s_desc."'"
                . ", s_sex='".$s_sex."' where s_no=$s_no";
        $result=mysqli_query($conn,$sql);
      if($result){
            echo "<script>alert('수정이 완료되었습니다!')</script>";
            echo "<meta http-equiv='refresh' content='1;url=seat.php?page='0'>";
        }
        else{
            echo "<script>alert('수정을 실패하였습니다! 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=seat.php?page_no='0'>";
        }
        ?>
    </body>
</html>
