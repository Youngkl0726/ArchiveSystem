<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/CSS/body.css" rel="stylesheet" type="text/css" />
</head>

<script language="javascript" type="text/javascript">
        function ValidateNumber(e, pnumber){
        if (!/^\d+$/.test(pnumber)){
          e.value = /^\d+/.exec(e.value);}
          return false;
        } 

        function check(fondForm){
        if(fondForm.FILE_CODE.value.length==0){
         alert("文件编号不能为空");
         return false;
        }
        if(fondForm.RESP_HOLDER.value.length==0){
         alert("责任人不能为空");
         return false;
        }
        return true;
        }
        
</script>




<body>
<p><strong>||修改卷内文件||</strong>
</p>
<hr width="600" color="#000000" />
<form name="fileForm" action="__URL__/WenjianSave/id/<?php echo ($data['SEQID']); ?>" method="post" onsubmit ="return check(this);">
  <table width="410" border="0" align="center">
  <center>*为必填</center>
  <tr>
    <td align="right">文件编号：</td>
    <td>
    <label for="textfield"></label>
    <input type="text" name="FILE_CODE" id="textfield" value="<?php echo ($data['FILE_CODE']); ?>" onkeyup="return ValidateNumber(this,value)" />
    <span class="error">*<?php echo $nameErr;?></span></td>
  </td>
  </tr>

  <tr>
    <td align="right">责任人：</td>
    <td><input name="RESP_HOLDER" type="text" id="textfield6" size="20" value="<?php echo ($data['RESP_HOLDER']); ?>"/><span class="error"> *<?php echo $nameErr;?></span></td>
  </tr>

  <tr>
    <td align="right">文件题名：</td>
    <td>
      <label for="textarea"></label>
      <textarea name="DOC_NAME" id="textarea" cols="35" rows="5" style="width:300px;height:70px;resize:none;"><?php echo ($data['DOC_NAME']); ?></textarea>
  </td>
  </tr>
  
  
  <tr>
    <td align="right">附件：</td>
    <td>
      <label for="textarea"></label>
      <textarea name="ATTACHMENT" id="textarea" cols="35" rows="5" style="width:300px;height:70px;resize:none;"><?php echo ($data['ATTACHMENT']); ?></textarea>
  </td>
  </tr>
  <tr>
    <td align="right">稿本：</td>
    <td>
      <label for="textarea"></label>
      <textarea name="CONTENT" id="textarea" cols="35" rows="5" style="width:300px;height:70px;resize:none;"><?php echo ($data['CONTENT']); ?></textarea>
  </td>
  </tr>
  
</table>
<input type="hidden" name="ids" value="<?php echo ($data['FILE_ID']); ?>">
<table width="254" border="0" align="center">
  <tr align="center">
  
    <td><input type="submit" value="保存"></td>
   
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/FileInformation/id/<?php echo ($data['FILE_ID']); ?>'"></td>
  </tr>
</table>&nbsp;</p></form>
</body>
</html>