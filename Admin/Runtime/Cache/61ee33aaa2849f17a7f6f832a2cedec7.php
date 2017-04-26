<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/CSS/body.css" rel="stylesheet" type="text/css" />
</head>

<body>

<script>
        function CommandConfirm(){
        if(window.confirm("你确定添加吗？")){
            return true;
        }else{
        return false;
        }
        }
        function ValidateNumber(e, pnumber){
        if (!/^\d+$/.test(pnumber)){
          e.value = /^\d+/.exec(e.value);}
          return false;
        } 
</script> 

<p><strong>||新增卷内文件||</strong>
</p>
<hr width="600" color="#000000" />
<form method="post" action="
<?php echo U('/PRM/fileadd');?>" onSubmit="return CommandConfirm();">
  <table width="450" border="0" align="center">
    <center>*为必填</center>
  <tr>
    <td align="right">文件编号：</td>
    <td><input name="FILE_CODE" type="text" id="filecode" size="20"  onkeyup="return ValidateNumber(this,value)"/><span class="error">*<?php echo $nameErr;?></span></td>
  </tr>

  <tr>
    <td align="right">责任人：</td>
    <td><input name="RESP_HOLDER" type="text" id="respholder" size="20" /><span class="error">*<?php echo $nameErr;?></span></td></tr>

  <tr>
    <td align="right">文件题名：</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="DOC_NAME" id="docname"></textarea>
    </td></tr>

  <tr>
    <td align="right">附件：</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="ATTACHMENT" id="attachment"></textarea>
    </td></tr>
    
  <tr>
    <td align="right">稿本：</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="CONTENT" id="content"></textarea>
    </td></tr>
</table>
<input type="hidden" name="ids" value="<?php echo ($id); ?>">
<table width="200" border="0" align="center">
  <tr align="center">
    <td>
    <input type="submit" name="allot" id="allot" value="添加">
    </td>

    <td><input type="button" value="返回" onclick="window.location.href='__URL__/FileList/id/<?php echo ($id); ?>'"></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
</body>
</html>