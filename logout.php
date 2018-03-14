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
         $id=$_COOKIE['usr_id'];
         
        if($id==NULL){
            echo "<script>alert('로그인이 먼저입니다.')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/index.php'>";
        }
        else {
            
            setcookie("usr_id","");
            setcookie("n_name","");
            setcookie("usr_sex","");
            setcookie("resv", "");
            
            echo "<script>alert('로그아웃 되었습니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/index.php'>";
        }
        ?>
    </body>
</html>
