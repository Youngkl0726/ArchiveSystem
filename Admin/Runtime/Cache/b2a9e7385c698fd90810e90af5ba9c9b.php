<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
body {
	margin-left: 230px;
	margin-top: 0px;
}
</style>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />

<script>
  function command1(){
     if(window.confirm("确认修改吗？")){
      return true;
    }
    else
      return false;
     }
  function command2(){
     if(window.confirm("确认取消吗？")){
      AnnForm.action = "__URL__/AnnRe";
      AnnForm.submit();
      return true;
    }
    else
      return false;
  }

</script>

</head>

<body>

<form name="AnnForm" method="post" action="__URL__/AnnouncementChange">
<input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
<table border="0" align="center">
  <tr>
      <td width="66" valign="top">标题：</td>
      <td width="339">
        <input name="TITLE" type="text" id="textfield" value="<?php echo ($data["TITLE"]); ?>" />
      </td>
  </tr>
    <tr>
      <td valign="top">内容：</td>
      <td>
        <textarea name="CONTENT" id="textarea" cols="60" rows="15" style="resize:none" ><?php echo ($data["CONTENT"]); ?></textarea>
     </td>
    </tr>
    <tr align="center" valign="top">
      <td colspan="2">
        <input type="submit" name="add1" id="button" value="修改" onclick="command1()" />
        <input type="submit" name="return1" id="button" value="取消" onclick="command2()"/>
    </td>
    </tr>
</table>
</form>
</body>
</html>