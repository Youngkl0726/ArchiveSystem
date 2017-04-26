<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<script>
        function CommandConfirm(){
        if(window.confirm("你确定添加吗？")){
            return true;
        }else{
        return false;
        }
        } 
</script> 
</head>

<body>
<form method="post" action="
<?php echo U('/Arch/kwordAdd');?>" onSubmit="return CommandConfirm();">
  <table width="500" border="0" align="center">
    <center>*为必填</center>

    <tr><td align="right">主题词编号:</td>
    <td><input type ="text" name="KEYWORD_NUM" id="keywordnum" onKeypress="if(event.keyCode<45||event.keyCode>57)event.returnValue=false;" />
     <span class="error">*<?php echo $nameErr;?></span>
    </td></tr>
  <tr><td align="right">主题词:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="KEYWORD" id="keyword"></textarea>
      <span class="error">*<?php echo $nameErr;?></span>
    </td></tr>
</table>
<table width="200" border="0" align="center">
  <tr align="center">
    <td><input type="submit" name="allot" id="allot" value="保存"></td>
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/KeywordManagement'"></td>
  </tr>
</table></form>
<p>&nbsp;</p>
</body>
</html>