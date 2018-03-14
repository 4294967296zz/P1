<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <html>
    <head>
        <meta charset="UTF-8">
        <style type="text/css">
            #wrapper {
                width : auto;
                margin : 0 auto;
            }
            table.board_2 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: center;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 100%;
                background-color: #B3B0B0;
                
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
                line-height: 100%;
            }
            </style>
        <title>게시판 글 보기</title>
    </head>
    <body><center>
        <a href="index.php">
            <img src="images/logo.jpg" width="620px" height="210px">
        </a>
        <div id="wrapper">
            <center><h1>회원가입하기</h1>
            <form method="post" action="signup_proc.php">
            <table class="board_2">
                <thead>
                    <tr>
                        <th scope="col" class="subject" width="150px">아이디</th>
                        <th scope="col" class="subjects" bgcolor="#eeeeee">
                            <input type='text' name='id'>
                        </th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="writer" width="150px">이름</td>
                        <td class="writeris"bgcolor="#eeeeee">
                            <input type='text' name='name'>
                        </td>
                    </tr>
                    <tr>
                        <td class="hits" width="150px">비밀번호</td>
                        <td class="hitss" bgcolor="#eeeeee">
                            <input type='password' name='pwd'></td>
   
                    </tr>
                    <tr>
                        <td class="hits" width="150px">비밀번호 재입력</td>
                        <td class="hitss" bgcolor="#eeeeee">
                            <input type='password' name='pwd2'></td>
   
                    </tr>
                    <tr>
                        <td class="contents" width="150px">성별</td>
                        <td class="contentsis" bgcolor="#eeeeee">
                            <select name="usr_sex">
                                <option value='FEMALE'>여성</option>
                                <option value='MALE'>남성</option>
                            </select>
                    </tr>
                    <tr>
                        <td class="writer" width="150px">닉네임</td>
                        <td class="writeris"bgcolor="#eeeeee">
                            <input type='text' name='nickname'>
                        </td>
                    </tr>
                    <tr>
                        <td class="writer" width="150px">전화번호</td>
                        <td class="writeris"bgcolor="#eeeeee">
                            <input type='text' name='phone'>
                        </td>
                    </tr>
                    <tr>
                        <td class="writer" width="150px">이메일</td>
                        <td class="writeris"bgcolor="#eeeeee">
                            <input type='text' name='email'>
                        </td>
                    </tr>
                    <tr>
                        <td class="writer" width="150px">주소</td>
                        <td class="writeris" bgcolor="#eeeeee">
                            <input type='text' name='addr' style='width:300px;'>
                        </td>
                    </tr>
                    </tbody>
                    
            </table>
                <br><input type="submit" value="회원등록하기"
                           style="width:200px; height:50px; background-color:#B3B0B0;
                           border: 2px solid grey;">
                               
                    </div>
                    </body>
                </body>
</html>
