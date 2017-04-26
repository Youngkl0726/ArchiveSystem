<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<script>
   function command(){
    window.location.href="__URL__/BorrowApplication";
  }
  function check1(){
    var a=document.getElementById("status").value;
    var b=document.getElementById("bt1").value;
    if(a==b){
      alert("该申请已经通过");
      return false;
    }
    else return true;
  }
  function check2(){
    var a=document.getElementById("status").value;
    var b=document.getElementById("bt2").value;
    if(a==b){
      alert("该申请已经拒绝");
      return false;
    }
    else return true;
  }
</script>
</head>
<body>
<form method="post" action="__URL__/BorrowInformation" name="BorrowForm">
<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
<p><strong>||档案利用申请信息 || </strong></p>
<hr width="600" color="#000000" />
<table width="24%" border="0" align="center">
  <tr>
    <td>姓&nbsp&nbsp&nbsp&nbsp名：</td>
    <td colspan="2">
      <?php echo ($data["APP_NAME"]); ?>
  </td>
  </tr>
  <tr>
    <td>单&nbsp&nbsp&nbsp&nbsp位：</td>
    <td colspan="2">
      <?php echo ($data["APP_DEPT"]); ?>
    </td>
  </tr>
  <tr>
    <td>档案题名：</td>
    <td colspan="2">
      <?php echo ($data["ARCH_NAME"]); ?>
  </td>
  </tr>
  <tr>
    <td>利用目的：</td>
    <td colspan="2">
      <?php echo ($data["UTIL_PURPOSE"]); ?>
   </td>
  </tr>
  <tr>
    <td height="73">利用内容：</td>
    <td colspan="2">
      <?php echo ($data["UTIL_CONTENT"]); ?>
   </td>
  </tr>
  <tr>
    <td>利用方式：</td>
    <td colspan="2">
      <?php echo ($data["UTIL_MODE"]); ?>
   </td>
  </tr>
  <tr>
    <td>身份证件：</td>
    <td colspan="2">
      <?php echo ($data["CERTIFICATE"]); ?>
    </td>
  </tr>
  <tr>
    <td>联系方式：</td>
    <td colspan="2">
      <?php echo ($data["CONTACT_INFO"]); ?>
 </td>
  </tr>
  <tr>
    <td>借阅时间：</td>
    <td colspan="2">
    <?php echo ($data["APP_BORROWTIME"]); ?>
    </td>
  </tr>
  <tr>
    <td>归还时间：</td>
    <td colspan="2">
    <?php echo ($data["APP_RETURNTIME"]); ?>
    </td>
  </tr>

</table>
    <input type="hidden" name="idd" id="status" value='<?php echo ($data["APP_STATUS"]); ?>'>
    <input type="hidden" name="ids" value='<?php echo ($data["APP_ID"]); ?>'>
    <input type="submit" name="sb1" id="bt1" value="通过" onclick="return check1()" />
    <input type="submit" name="sb2" id="bt2" value="拒绝" onclick="return check2()" />
    <input type="button" value="返回" onclick="command()" />

  </form>
</body>
</html>