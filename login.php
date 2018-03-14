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
    <style type="text/css">
            #wrapper {
                width : auto;
                margin : 0 auto;
            }
            table.login{
                width: 300px;
                padding: 10px;
                font-weight: bold;
                font-size: 15pt;
                vertical-align: top;
                color: #fff;
                background: #B3B0B0 ;
                line-height: 150%;
            }
            </style>
    <body>
        <?php
        if(isset($_COOKIE['usr_id'])){
                        $id=$_COOKIE['usr_id'];
                    }
                    else {
                        $id=NULL;
                    }
                    
        if($id!=NULL){
           echo "<script>alert('이미 로그인되어있는 상태입니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/index.php'>";
        }
        else{
            ?>
        <center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        <div id="wrapper">
        <table class="login">
            <form action="login_proc.php" method="post">
            <thead>
                <tr>
                    <th scope="col" class="id">아 이  디</th>
                    <th scope="col" class="id_">
                        <input type="text" name="id"
                               style="height:30px;">
                    </th>
                <tr>
            <th scope="col" class="pwd">비밀번호</th>
            <th scope="col" class="pwd">
                <input type="password" name="pwd"
                       style="height:30px;">
            </th>
        </tr>
        <tr>
            <td colspan="2" style="height: 20px;"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;">
                <input type="submit" value="로그인"
                       style="width:200px; height:50px;
                       font-weight: bold; font-size:15pt;
                       background-color: white;">
            </td>
        </tr>
        </thead>
        </table>
        </form>
        </div>
        <?php
        }
        ?>
    </body>
</html>
