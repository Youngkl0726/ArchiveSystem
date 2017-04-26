<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p></p>
<form><table width="470"  border="0" align="center" cellspacing="1" bgcolor="#000000">
  <tr height="5%">
    <td width="100" height="36" align="right" bgcolor="#999999">全宗编号</td>
    <td width="226" bgcolor="#CCCCCC"><?php echo ($data['FULL_MODEL_NUM']); ?></td>
    <td width="68" bgcolor="#999999">全宗名称</td>
    <td width="197" bgcolor="#CCCCCC"><?php echo ($data['FULL_MODEL_NAME']); ?></td>
  </tr>
  <tr height="28%">
    <td height="50" align="right" bgcolor="#999999">档案概况</td>
    <td colspan="3" bgcolor="#CCCCCC"><?php echo ($data['ARCH_SUMMARY']); ?></td>
  </tr>
  <tr height="28%">
    <td height="50" align="right" bgcolor="#999999">档案内容和成分</td>
    <td colspan="3" bgcolor="#CCCCCC"><?php echo ($data['ARCH_CONTENT']); ?></td>
  </tr>
  <!-- <tr height="5%">
    <td height="34" align="right" bgcolor="#999999">开始时间</td>
    <td bgcolor="#CCCCCC"><?php echo ($data['BEGIN_TIME']); ?></td>
    <td bgcolor="#999999">终止时间</td>
    <td bgcolor="#CCCCCC"><?php echo ($data['END_TIME']); ?></td>
  </tr> -->
  <tr height="28%">
    <td height="119" align="right" bgcolor="#999999">备注</td>
    <td colspan="3" bgcolor="#CCCCCC"><?php echo ($data['FULL_MODEL_MEMO']); ?></td>
  </tr>
  <tr height="5%">
    <td height="31" align="right" bgcolor="#999999">总卷数</td>
    <td bgcolor="#CCCCCC"><?php echo ($data['SUM1']); ?></td>
    <td bgcolor="#999999">总件数</td>
    <td bgcolor="#CCCCCC"><?php echo ($data['SUM2']); ?></td>
  </tr>
</table>
<table width="372" height="33" border="0" align="center">
  <tr align="center">
  <td><input type="button" value="修改" onclick="window.location.href='__URL__/FondsModification/id/<?php echo ($data['FULL_MODEL_ID']); ?>'"></td>
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/FondsManagement'"></td>
  </tr>
</table></form>
<p>&nbsp;</p>
</body>
</html>