<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<!-- <link href="__PUBLIC__/css/部门预立卷案.css" rel="stylesheet" type="text/css" /> -->
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<script>
function check(){
  var oldPwd=document.getElementById(oldPwd).value;
  var newPwd=document.getElementById(newPwd).value;
  var confirmPwd=document.getElementById(confirmPwd).value;
  if(oldPwd==newPwd){
    alert("新密码不能和旧密码一样");
    return false;
  }
  if(confirmPwd!=newPwd){
    alert("两次密码不一致");
    return false;
  }
  if(newPwd<6||confirmPwd<6){
    alert("新密码必须大于6个字符");
    return false;
  }
}
</script>
</head>

<body>
<p>||<strong>修改密码</strong>||</p>
<hr width="600" color="#000000" />
<form method="post" action="<?php echo U('/Super/update');?>"> 
  <table align='center'>
    <tr><td align='center'>*为必填</td></tr>

    <tr><td>旧 密 码:<input type="password" name="oldPwd" id="textfield" />
   <span class="error">* <?php echo $nameErr;?></span></td></tr>
   <!-- <br><br> -->
    <tr><td>新 密 码:<input type="password" name="newPwd" id="textfield" />
   <span class="error">* <?php echo $nameErr;?></span></td></tr>
   <!-- <br><br> -->
  <tr><td>确认密码:<input type="password" name="confirmPwd" id="textfield" />
   <span class="error">* <?php echo $nameErr;?></span></td></tr>
   <!-- <br><br> -->
   <tr><td align='center'><input type="submit" name="allot" id="allot" value="确定" onclick='return check();'/></td></tr>
 </table>
    </form>
</body>
</html>