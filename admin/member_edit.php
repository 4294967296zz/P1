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
        <title></title>
    </head>
    <body>
        
        <form action="index_admin.php">
            <input type="submit" value="HOME"
                   style="width:80px; background-color: beige;
                          border:0px;">
            </form> 
        <?php
        $id=$_GET['m_id'];
        
        
        $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
        $sql="select * from member_db where id='".$id."'";
        $result=mysqli_query($conn,$sql);
        $result2=mysqli_fetch_array($result);
                ?>
    <center><br><br><br>
        <table class="board_1">
                <thead>
                    <tr>
                        <th scope="col" class="no" style="width:50px;">이름</th>
                        <th scope="col" class="id" style="width:200px;">아이디</th>
                        <th scope="col" class="n_name" style="width:100px;">닉네임</th>
                        <th scope="col" class="addr" style="width:400px;">주소</th>
                        <th scope="col" class="num"style="width:80px;">전화번호</th>
                        <th scope="col" class="mail" style="width:80px;">이메일</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="no">
                            <form method='post' action='member_proc.php'>
                        <input type="text" name="name" style="width:80px;"
                          value="<?=$result2['name']?>"></td>
                        <td class="id"><?=$result2['id']?></td>
                        <td class="n_name">
                        <input type="text" name="nickname"
                          value="<?=$result2['nickname']?>"</td>
                        <td class="addr">
                        <input type="text" name="addr" style="width:350px;"
                          value="<?=$result2['addr']?>"</td>
                        <td class="num">
                        <input type="text" name="phone" style="width:80px;"
                          value="<?=$result2['phone']?>"</td>
                        <td class="mail">
                        <input type="text" name="email" style="width:180px;"
                          value="<?=$result2['email']?>"</td>
                        <input type='hidden' name='m_num' value='<?=$result2['num']?>'>
                    </tr>
                    </tbody>
      
            </table>
        <br><br><center>
            <input type='submit' value='수정'></form>
                            <form method='post' action='member_del.php'>
                            <input type='submit' value='삭제'>
                            <input type='hidden' name='m_id' value='<?=$result2['id']?>'>
                            </form>
                            </center>
    </body>
</html>
