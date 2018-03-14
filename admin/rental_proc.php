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
        $r_type=$_POST['type'];
        $r_time=$_POST['time'];
        $r_desc=$_POST['desc'];
        $orig_name=$_FILES['img']['name'];
        $tmp_name=$_FILES['img']['tmp_name'];
        $save_name="C:\\xampp\htdocs\P1\admin\images\\".$orig_name;
        
        if(!move_uploaded_file($tmp_name, $save_name)){
            echo "<script>alert('업로드실패!')</script>";
            exit;
        }
        $conn= mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="insert into rental_db values"
                . "(NULL,NULL,$r_time,'".$r_desc."',NULL,NULL,NULL,'".$orig_name."','".$r_type."')";
      echo "sql은 바로  ".$sql;
        $result=mysqli_query($conn,$sql);
      if($result){
            echo "<script>alert('등록이 완료되었습니다!')</script>";
            echo "<meta http-equiv='refresh' content='1;url=rental.php?page='0'>";
        }
        else{
            echo "<script>alert('등록을 실패하였습니다! 다시시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=rental.php?page_no='0'>";
        }
        // put your code here
        ?>
    </body>
</html>
