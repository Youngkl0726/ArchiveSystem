<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
</head>

<body>

<form><table width="457" height="317" border="0" align="center" cellspacing="1" bgcolor="#000000">
  <tr>
    <td width="81" align="center" bgcolor="#999999">文件编号</td>
    <td width="162" bgcolor="#CCCCCC"><?php echo ($data['FILE_CODE']); ?></td>
    <td width="69" align="center" bgcolor="#999999">责任人</td>
    <td width="127" bgcolor="#CCCCCC"><?php echo ($data['RESP_HOLDER']); ?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#999999">文件题名</td>
    <td width="370" style="word-break:break-all" colspan="3" bgcolor="#CCCCCC"><?php echo ($data['DOC_NAME']); ?></td>
  </tr>
  <tr>
    <td height="114" align="center" bgcolor="#999999">附件</td>
    <td width="370" style="word-break:break-all" colspan="3" bgcolor="#CCCCCC"><?php echo ($data['ATTACHMENT']); ?></td>
  </tr>
  <tr>
    <td height="127" align="center" bgcolor="#999999">稿本</td>
      <td width="370" style="word-break:break-all" colspan="3" bgcolor="#CCCCCC"><?php echo ($data['CONTENT']); ?></td>
  </tr>
</table>
<table width="200" border="0" align="center">
  <tr align="center">
  <td><input type="button" value="修改" onclick="window.location.href='__URL__/FilesModification/id/<?php echo ($data['FILE_ID']); ?>'"></td>
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/FileList/id/<?php echo ($data['SEQID']); ?>'"></td>
  </tr>
</table></form>
<p>&nbsp;</p>
</body>
</html>