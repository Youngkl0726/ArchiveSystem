<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/部门预立卷案.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
</head>

<script language="javascript" type="text/javascript">
        function check(fileForm){
        if(fileForm.REFUSE_TITLE.value.length==0){
         alert("标题不能为空");
         return false;
        }
        if(fileForm.MODIFY_DEC.value.length==0){
         alert("修改说明不能为空");
         return false;
        }
        return true;
        }

</script>

<body>
<p></p>
<form action="__URL__/ModifyAdvice" name="archForm" method="post" onsubmit ="return check(this);">
  <table align="center">
    <center>*为必填</center>
  <tr>
    <td width="25%" align="right">标题:</td>
    <td><input type="text" name="REFUSE_TITLE" id="REFUSE_TITLE">
      <span class="error">*<?php echo $nameErr;?></span>
    </td>
  </tr>
  <tr>
    <td align="right">修改说明:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="MODIFY_DEC" id="MODIFY_DEC"></textarea><span class="error">*<?php echo $nameErr;?></span>
  </td></tr>
 </table> 
<input type="hidden" name="ids" value="<?php echo ($id); ?>">
  <table width="200" border="0" align="center">
  <tr align="center">
    <td>
    <input type="submit" name="allot" id="allot" value="提交">
    </td>
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/Check/id/<?php echo ($id); ?>'"></td>
  </tr>
</table>

</form>

</body>
</html>