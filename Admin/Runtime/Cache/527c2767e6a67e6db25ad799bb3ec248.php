<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<!-- <link href="css/body.css" rel="stylesheet" type="text/css" /> -->
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />

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
</script> 
<p></p>
<form method="post" action="
<?php echo U('/Arch/sroomAdd');?>" onSubmit="return CommandConfirm();">
  <table width="421" border="0" align="center">
    <center>*为必填</center>

    <tr><td align="right">库房名称:</td>
    <td><input type ="text" name="STOREROOM_NAME" id="storeroomname" />
     <span class="error">*<?php echo $nameErr;?></span>
    </td></tr>

  <tr><td align="right">库房备注:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="STOREROOM_MEMO" id="storeroommemo"></textarea>
    </td></tr>
</table>
<table width="200" border="0" align="center">
  <tr align="center">
    <td><input type="submit" name="allot" id="allot" value="保存"></td>
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/StoreroomManagement'"></td>
  </tr>
</table></form>
<p>&nbsp;</p>
</body>
</html>