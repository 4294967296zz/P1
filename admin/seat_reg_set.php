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
                width : 1000px;
                margin : 0 auto;
            }
            table.board_2 {
                border-collapse: separate;
                border-spacing: 1px;
                text-align: center;
                line-height: 0.5;
                margin: 20px 10px;
                line-height: 200%;
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
        <title>회원 이용 등록</title>
        <script language="javascript">
function selectbox(frm) {

    var cost = frm.mem_ex.selectedIndex;

    switch( cost ){
	   case 0:
	     frm.cost.value = '';
		 break;
             case 1:
	     frm.cost.value = '150000';
		 break;
	   case 2:
	     frm.cost.value = '280000';
		 break;
	   case 3:
	     frm.cost.value = '320000';
		 break;
    }
	
    return true;
}
function selectbox2(frm) {

    var cost2 = frm.resv.selectedIndex;

    switch( cost2 ){
	   case 0:
	     frm.cost2.value = '';
		 break;
             case 1:
	     frm.cost2.value = '50000';
		 break;
    }
	
    return true;
}

</script>
    </head>
    <body>
        <div id="wrapper">
            <form action="index_admin.php">
            <input type="submit" value="HOME"
                   style="width:80px; background-color: beige;
                          border:0px;">
            </form>
                <center><br><br><h1>
                        회원 이용 등록<br><br></h1>
                    <?php
                    $id=$_POST['id'];
                    
                      $conn=mysqli_connect("localhost", "root", "dkssud1313!", "test_db");
                      $sql="select * from member_db where id='".$id."'";
                      $result=mysqli_query($conn,$sql);
                      $result2=mysqli_fetch_array($result);
                      
                      ?>
            <table class="board_2">
                <form method='post' action='seat_reg_proc.php'>
                <thead>
                    <tr>
                        <th scope="col" class="subject" width="150px" bgcolor="#6699ff">회원</th>
                        <td colspan="3" class="is" width="200px" bgcolor="#eeeeee">
                            <?=$result2['name']?>
                        </th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="writer" width="150px" bgcolor="#6699ff">이용 기간</td>
                        <td class="writeris" width="200px" bgcolor="#eeeeee">
                            <select name="mem_ex" onchange="selectbox(this.form)"
                                    style="width:120px; height:40px; font-size:14pt;">
                                <option>결제일 선택</option>
                                <option value="30">30일</option>
                                <option value="60">60일</option>
                                <option value="90">90일</option>
                            </select>
                        </td>
                        <td class="resv" width="150px" bgcolor="#6699ff">고정석</td>
                        <td class="resvis" width="200px" bgcolor="#eeeeee">
                            <select name="resv" onchange="selectbox2(this.form)"
                                    style="width:80px; height:40px; font-size:14pt;">
                                <option value="no">NO</option>
                                <option value="yes">YES</option>
                            </select>
                        </td>
                        
                    </tr>
                    <tr>
                     <td class="resv" width="150px" bgcolor="#6699ff">결제금액</td>
                     <td colspan="3" width="200px" bgcolor="#eeeeee">
                    
                         <input type="text" name="cost"
                                style="width:150px; font-size:18pt;
                                height:40px;">원
                         +
                         <input type="text" name="cost2"
                                style="width:150px; font-size:18pt;
                                height:40px;">원
                         <br>
                        </td>
                    </tr>
                    </tbody>
            </table>
                    <br><input type='submit' value='등록'
                               style="width:100px; height:60px; background-color:#6699ff; 
                               border:solid;">
                    <input type="hidden" value="<?=$result2['name']?>" name="name">
                    </form>
                    </body>
        </div>
    <center><br><br><a href="rental.php?page_no='0'">목록</a>
</html>
