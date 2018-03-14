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
                margin : 0 auto;
            }
            table.board_1 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: center;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 150%;
            }
            table.board_1 th {
                padding: 10px;
                font-weight: bold;
                vertical-align: top;
                color: #fff;
                background: #6699ff ;
                line-height: 150%;
            }
            table.board_1 td {
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
                background: #eee;
            }
            </style>
        <title>회원 목록</title>
    </head>
    <body>
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
            
        ?>
        <center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        <div id="wrapper">
            <table class="board_1">
                <thead>
                    <tr>
                        <th scope="col" class="no">이름</th>
                        <th scope="col" class="id">아이디</th>
                        <th scope="col" class="n_name">닉네임</th>
                        <th scope="col" class="addr">주소</th>
                        <th scope="col" class="num">전화번호</th>
                        <th scope="col" class="mail">이메일</th>
                        <th scope="col" class="mail">등록일</th>
                        <th scope="col" class="mail">고정석여부</th>
                        <th scope="col" class="edit">정보수정</th>
                    </tr>
                    </thead>
                    <?php
        echo "<h1> 내 정보";
        if(isset($_COOKIE['perm'])){
                        $perm=$_COOKIE['perm'];
                    }
                    else {
                        $perm=NULL;
                    }
                    
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from member_db where id='".$id."'";
       
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        
        
        $ex_t=$result2['ex_t'];
        $now=date('Y-m-d H:i:s');
        $result_t=(strtotime($ex_t) - strtotime(date('Y-m-d H:i:s'))) / 86400;
        $result_t=(int)$result_t;
        if($result_t<-1){
            $result_t=0;
        }
        ?>
                    <tbody>
                    <tr>
                        <td class="no"><?=$result2['name']?></td>
                        <td class="id"><?=$result2['id']?></td>
                        <td class="n_name"><?=$result2['nickname']?></td>
                        <td class="addr"><?=$result2['addr']?></td>
                        <td class="num"><?=$result2['phone']?></td>
                        <td class="mail"><?=$result2['email']?></td>
                        <td class="mail"><?=$result_t?>일</td>
                        <td class="mail"><?=$result2['resv']?></td>
                        <td class="edit">
                            <a href=mypage_edit_auth.php?usr_id=<?=$result2['id']?>>
                            EDIT</a></td>
                    </tr>
                    </tbody>
            </table>
        </div>
    </body>
    <?php
    }
    ?>
</html>