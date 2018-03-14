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
                height: 1000px;
                margin : 0 auto;
            }
            table.board_2 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: center;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 200%;
                width:1000px;
            }
            table.board_2 th {
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                line-height: 200%;
            }
            table.board_2 td {
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
                line-height: 200%;
            }
            </style>
        <title>게시판 글 보기</title>
    </head>
    <body>
        <div id="wrapper">
        <?php
        if(isset($_COOKIE['usr_id'])){
        $id=$_COOKIE['usr_id'];
    }
    else{
        $id=NULL;
    }
        if($id==NULL){
            echo "<script>alert('로그인이 필요합니다')</script>";
            echo "<meta http-equiv='refresh' content='0;url=/P1/login.php'>";
        }
        else {
            
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from member_db where id='".$id."'";
        $result= mysqli_query($conn, $sql);
        
        if($result2=mysqli_fetch_array($result)){
     
        $sql2="select * from seat_db where s_usr='".$id."'";
        $result3=mysqli_query($conn, $sql2);
        $result4=mysqli_fetch_array($result3);
        
        $sql3="select * from rental_db where r_mem='".$id."'";
        $result5=mysqli_query($conn, $sql3);
        $result6=mysqli_fetch_array($result5);
                    
                        ?>
          <center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
            <div id="wrapper">
                <center><h1>
                        좌석 이용 현황</h1>
            <table class="board_2">
                <thead>
                    <tr>
                        <th scope="col" class="subject" width="600px" bgcolor="#6699ff">이름</th>
                        <th scope="col" class="subject" width="600px" bgcolor="#6699ff">좌석</th>
                        <th scope="col" class="subject" width="600px" bgcolor="#6699ff">입실 시간</th>
                        <th scope="col" class="subject" width="600px" bgcolor="#6699ff">퇴실</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="writeris" width="600px" bgcolor="#eeeeee"><?=$result2['name']?></td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee"><?=$result4['s_type']?></td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee"><?=$result4['s_sttime']?></td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee">
                            <?php
                        if($result4['s_sttime']!=NULL){
                            ?>
                        <form method="post" action="seat_ex.php">
                                <input type="submit" name="seat_ex" value="퇴실하기">
                                <input type="hidden" name="s_extime" value="<?=$ressult4['s_extime']?>">
                                <input type="hidden" name="s_sttime" value="<?=$ressult4['s_sttime']?>">
                        </form>
                            <?php
                        } 
                        ?>
                            </td>
                    </tr>
                    </tbody>
            </table>
                    <center><br><br><h1>
                        물품 이용 현황<br></h1>
                    <table class="board_2">
                <thead>
                    <tr>
                        <th scope="col" class="subject" width="150px" bgcolor="#6699ff">이름</th>
                        <th scope="col" class="subject" width="150px" bgcolor="#6699ff">물품번호</th>
                        <th scope="col" class="subject" width="150px" bgcolor="#6699ff">대여 시간</th>
                        <th scope="col" class="subject" width="150px" bgcolor="#6699ff">반납</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="writeris" width="600px" bgcolor="#eeeeee"><?=$result2['name']?></td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee"><?=$result6['r_name']?></td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee"><?=$result6['r_sttime']?></td>
                        <td class="writeris" width="600px" bgcolor="#eeeeee">
                            <?php
                        if($result6['r_sttime']!=NULL){
                            ?>
                            <form method="post" action="rental_ex.php">
                                <input type="submit" name="r_ex" value="반납하기">
                                </td>
                            </form>
                            <?php
                        }
        }
        }
        
                        ?>
                    </tr>
                    </tbody>
            </table>
                    </body>
        </div>
</html>
