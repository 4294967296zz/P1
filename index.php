<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <style type="text/css">
            #wrapper {
                width : auto;
                height: 65px;
                margin : 0 auto;
                background-color: #dddddd;
                text-align: center;
            }
            table.buttons th {
                width:100px;
                height:40px;
                border:1px;
                border-collapse: separate;
                border-spacing:50px 50px;
                text-align: center;
            }
            </style>
        <title>게시판 페이지</title>
    </head>
    <body><center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        <div id="wrapper">
           <table class="buttons">
                <thead>
                    <tr>
                        <th scope="col" class="no">
                            <form method="get" action="login.php">
                                <input type="submit" value="로그인"
                                   style="width:100px; background-color:#dddddd;
                                   border:1px; font-size:13pt; font-weight:bold">
                            </form>
                        </th>
                        <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="mypage.php">
                                <input type="submit" value="마이페이지"
                                   style="width:120px; background-color:#dddddd;
                                   border:1px; font-size:13pt; font-weight:bold">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="board.php">
                                <input type="submit" value="게시판"
                                   style="width:100px; background-color:#dddddd;
                                   border:1px;  font-size:12pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="seat.php">
                                <input type="submit" value="좌석도"
                                   style="width:100px; height:60px; background-color:#dddddd;
                                   border:1px; font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                    <form method="get" action="rental.php">
                                <input type="submit" value="물품대여"
                                   style="width:120px; background-color:#dddddd;
                                   border:1px; font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                    <form method="get" action="signup.php">
                                <input type="submit" value="회원가입"
                                   style="width:130px; background-color:#dddddd;
                                   border:1px; font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                    <form method="get" action="logout.php">
                                <input type="submit" value="로그아웃"
                                   style="width:120px; background-color:#dddddd;
                                   border:1px; font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
        </tr>
        </thead>
           </table>
        </div>
    </body>
<?php
        if(isset($_COOKIE['usr_id'])){
                        $id=$_COOKIE['usr_id'];
                    }
                    else {
                        $id=NULL;
                    }
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from member_db where id='".$id."'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
      
          $today=date('Y-m-d H:i:s');
          $dday=$result2['ex_t'];
          $showday=intval(strtotime($dday) - strtotime($today))/86400;
        
          if($showday<=0 || $showday==NULL){
              $sql2="update member_db set perm=0, reg_t=NULL, ex_t=NULL where"
                      . "id='".$id."'";
              $result3=mysqli_query($conn,$sql2);
              echo "<br><h1>이용권 등록 후 이용가능합니다";
          }
          else{
          echo "<br><h1>이용권".floor($showday)."일 남았습니다";
          }
          
                ?>
    
</html>