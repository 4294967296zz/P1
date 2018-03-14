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
        $mem_ex=$_POST['mem_ex'];
        $resv=$_POST['resv'];
        $name=$_POST['name'];
        $reg_t=date('Y-m-d H:i:s');
        $t_cost=$_POST['cost']+$_POST['cost2'];
        
        
        if($mem_ex==30){
             $ex_t=date("Y-m-d", strtotime($reg_t."+30days"));
        }
        else if($mem_ex==60){
             $ex_t=date("Y-m-d", strtotime($reg_t."+60day"));
        }
        else if($mem_ex==90){
             $ex_t=date("Y-m-d", strtotime($reg_t."+90day"));
        }

        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="update member_db set perm='".$mem_ex."', resv='".$resv."', "
                . "reg_t='".$reg_t."', ex_t='".$ex_t."' where name='".$name."'";
        $result=mysqli_query($conn,$sql);
        
        $sql2="select * from member_db where name='".$name."'";
        $result2=mysqli_query($conn, $sql2);
        $result3=mysqli_fetch_array($result2);
        
        $id=$result3['id'];
        
        $sql3="insert into reg_log_db values(NULL, '".$id."', '".$name."', '".$reg_t."'"
                . ", '".$ex_t."', '".$resv."', $t_cost, $mem_ex)";
        $result4=mysqli_query($conn,$sql3);
        
        if($result || $result4){
            echo "<script>alert('이용등록이 완료되었습니다.')</script>";
            echo "<meta http-equiv='refresh' content='1;url=seat_reg.php?page_no='0'>";
        
            }
        else {
            echo "<script>alert('실패 ! 다시 시도해주세요')</script>";
            echo "<meta http-equiv='refresh' content='1;url=seat_reg.php?page_no='0'>";
        }
        ?>
    </body>
</html>
