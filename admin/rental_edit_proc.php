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
        $r_no=$_POST['r_no'];
        $r_type=$_POST['r_type'];
        $r_desc=$_POST['r_desc'];
        $r_time=$_POST['r_time'];
        
        $conn= mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="update rental_db set r_type='".$r_type."', r_desc='".$r_desc."', "
                . "r_time=$r_time where r_no=$r_no";
        $result=mysqli_query($conn,$sql);
      if($result){
            echo "<script>alert('수정이 완료되었습니다!')</script>";
            echo "<meta http-equiv='refresh' content='0;url=rental.php?page_no='0'>";
        }
        else{
            echo "<script>alert('수정을 실패하였습니다! 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='0;url=rental.php?page_no='0'>";
        }
        ?>
    </body>
</html>
