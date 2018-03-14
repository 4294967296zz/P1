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
                background: #B3B0B0;
                line-height: 150%;
            }
            table.board_1 td {
                padding: 10px;
                vertical-align: top;
                border-bottom: 1px solid #ccc;
                font-weight: bold;
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
        <title></title>
    </head>
    <body><center>
        <a href="index_admin.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        <?php
        if(isset($_COOKIE['usr_id'])){
                        $id=$_COOKIE['usr_id'];
                    }
                    else {
                        $id=NULL;
                    }
                    
         if($id==="administrator"){
        ?>
            <table class="board_1">
                <thead>
                    <tr>
                        <th scope="col" class="no">이름</th>
                        <th scope="col" class="id">아이디</th>
                        <th scope="col" class="n_name">닉네임</th>
                        <th scope="col" class="addr">주소</th>
                        <th scope="col" class="num">전화번호</th>
                        <th scope="col" class="mail">이메일</th>
                        <th scope="col" class="edit">정보수정</th>
                    </tr>
                    </thead>
                    <?php
        echo "<h1> 회원 목록";
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select count(*) from member_db";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
        $record_cnt=$result2['count(*)']; 
        $record_per_page=10;
        $page_cnt=ceil($record_cnt / $record_per_page);
        
        $page_no=$_GET['page_no'];
        if($page_no==0){
            $page_no=1;
        }
        $start_no=($page_no-1)*$record_per_page;
        
        if(isset($_POST['keyword'])){
                        $keyword=$_POST['keyword'];
                    }
                    else {
                        $keyword=NULL;
                    }
        
        $sql2="select * from member_db where name like '%".$keyword."%' order by num desc limit ".$start_no.",".$record_per_page;
       
        $result3=mysqli_query($conn,$sql2);
       while($result4=mysqli_fetch_array($result3)){
        
        ?>
                    <tbody>
                    <tr>
                        <td class="no"><?=$result4['name']?></td>
                        <td class="id"><?=$result4['id']?></td>
                        <td class="n_name"><?=$result4['nickname']?></td>
                        <td class="addr"><?=$result4['addr']?></td>
                        <td class="num"><?=$result4['phone']?></td>
                        <td class="mail"><?=$result4['email']?></td>
                        <td class="edit">
                            <a href=member_edit.php?m_id=<?=$result4['id']?>>
                            EDIT</a></td>
                    </tr>
                    <?php
       }
       ?>
                    </tbody>
            </table>
            
            <form method='post'><center>
            <input type='text' name='keyword'>
            <input type='submit' value='검색'>
            </form><br>
             <?php
    for($cnt=1;$cnt <= $page_cnt; $cnt++){
           echo "<a href='/admin/member.php?page_no=".$cnt."'>".$cnt."</a>";
       }
       }
         else{
             echo "<script>alert('관리자 권한이 필요합니다')</script>";
             echo "<meta http-equiv='refresh' content='1;url=hacker.php'>";
         }
       ?>
        </div>
    </body>
    </center>
</html>