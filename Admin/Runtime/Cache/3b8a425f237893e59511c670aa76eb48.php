<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
    <head>
        <meta charset="utf-8">
        <script>
function check(){
  var newPwd=document.getElementById("newPwd").value;
  var confirmPwd=document.getElementById("confirmPwd").value;
  if(confirmPwd!=newPwd){
    alert("两次密码不一致");
    return false;
  }
  if(newPwd<6||confirmPwd<6){
    alert("新密码必须大于6个字符");
    return false;
  }
  else
    return true;
}
</script>
    </head>
    <body>
    <form method="post" action="<?php echo U('/Index/pwd');?>"> 
  <table align='center'>
    <tr><td align='center'>*为必填</td></tr>

    <tr><td>用&nbsp户&nbsp名:<input type="text" name="USER_NAME" />
     <span class="error">* <?php echo $nameErr;?></span></td></tr>
    <tr><td>邮&nbsp&nbsp&nbsp 箱:<input type="text" name="email"/>
   <span class="error">* <?php echo $nameErr;?></span></td></tr>
   <!-- <br><br> -->
    <tr><td>新 密 码:<input type="password" name="newPwd" id="newPwd" />
   <span class="error">* <?php echo $nameErr;?></span></td></tr>
   <!-- <br><br> -->
  <tr><td>确认密码:<input type="password" name="confirmPwd" id="confirmPwd" />
   <span class="error">* <?php echo $nameErr;?></span></td></tr>
   <!-- <br><br> -->
   <tr><td align='center'><input type="submit"value="确定" onclick='return check()'/></td></tr>
 </table>
    </form>

    </body>
</html>