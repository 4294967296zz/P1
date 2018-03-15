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
        <div id="wrapper"><center>
            <table class="buttons">
                <thead>
                    <tr>
                        <th scope="col" class="no">
                            <form method="get" action="board.php">
                                <input type="submit" value="게시판"
                                   style="width:150px; height:60px; 
                                   border:1px;
                                   font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                        </th>
                        <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="seat_reg.php">
                                <input type="submit" value="이용등록"
                                   style="width:150px; height:60px; 
                                   border:1px;
                                   font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                        <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="member.php">
                                <input type="submit" value="회원관리"
                                   style="width:150px; height:60px; 
                                   border:1px;
                                   font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="status.php">
                                <input type="submit" value="이용현황"
                                   style="width:150px; height:60px; 
                                   border:1px;
                                   font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="log.php">
                                <input type="submit" value="기록 조회"
                                   style="width:150px; height:60px; 
                                   border:1px;
                                   font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                            </th>
                    </form>
                    <th scope="col" class="no" style="background-color: #dddddd;"></th>
                        <th scope="col" class="no">
                            <form method="get" action="mgmt.php">
                                <input type="submit" value="좌석/물품관리"
                                   style="width:150px; height:60px; 
                                   border:1px;
                                   font-size:13pt; font-weight:bold">
                                <input type="hidden" name="page_no" value="0">
                            </form>
                    
        </tr>
        </thead>
        </table>
                <h1>관리자 페이지</h1>
            </center>
        </div>
    <?php
         }
         else{
             echo "<script>alert('관리자 권한이 필요합니다')</script>";
             echo "<meta http-equiv='refresh' content='1;url=hacker.php'>";
         }
    ?>
    </body>
</html>
