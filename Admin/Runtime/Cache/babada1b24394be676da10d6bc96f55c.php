<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
</head>

<body>
<p><strong>||案卷信息||</strong>
</p>
<hr width="600" color="#000000" />
<form><table width="470" border="0" align="center" cellspacing="1" bgcolor="#000000">
  <tr>
    <td width="100" bgcolor="#999999">全宗编号</td>
    <td width="370" colspan="3" bgcolor="#CCCCCC"><?php echo ($data['FULL_MODEL_NUM']); ?></td>
  </tr>
  <tr>
    <td bgcolor="#999999">档号</td>
    <td colspan="3" bgcolor="#CCCCCC"  style="word-break:break-all" ><?php echo ($data['ARCH_CODE']); ?></td>
  </tr>
  <tr>
    <td bgcolor="#999999">档案题名</td>
    <td colspan="3" bgcolor="#CCCCCC"  style="word-break:break-all" ><?php echo ($data['ARCH_NAME']); ?></td>
  </tr>
  <tr>
    <td bgcolor="#999999">主题词</td>
    <td width="370" style="word-break:break-all" colspan="3" bgcolor="#CCCCCC"><?php echo ($data['KEYWORD']); ?></td>
  </tr>
  <tr>
    <td bgcolor="#999999">保存时间</td>
    <td width="131" bgcolor="#CCCCCC"><?php echo ($data['PRESERV_PEROID_NAME']); ?></td>
    <td bgcolor="#999999">是否公开</td>
    <td bgcolor="#CCCCCC" width="130"><?php if(($data['IS_PUBLIC'] == 0) ): ?>不公开 <?php else: ?>公开<?php endif; ?></td>
  </tr>
  <tr>
    <td width="101" bgcolor="#999999">载体类型</td>
    <td width="119" bgcolor="#CCCCCC" style="word-break:break-all" width="370"><?php echo ($data['MEDIA_TYPE_NAME']); ?></td> 
    <td bgcolor="#999999">数量</td>
    <td bgcolor="#CCCCCC"><?php echo ($data['QUANTITY_AND_UNIT']); ?></td>
  </tr>
  <tr>
    <td bgcolor="#999999">日期</td>
    <td bgcolor="#CCCCCC" colspan="3"><?php echo ($data['ARCH_TIME']); ?></td>
    
  </tr>
 
  <tr>
    <td bgcolor="#999999">档案附注</td>
    <td colspan="3" bgcolor="#CCCCCC" style="word-break:break-all" width="370"><?php echo ($data['ARCH_MEMO']); ?></td>
  </tr>
  <tr>
    <td bgcolor="#999999">档案提要</td>
    <td colspan="3" bgcolor="#CCCCCC" style="word-break:break-all" width="370"><?php echo ($data['ARCH_SUMMARY']); ?></td>
  </tr>
  
  <tr>
    <td bgcolor="#999999">库房</td>
    <td colspan="3" bgcolor="#CCCCCC" style="word-break:break-all" width="370"><?php echo ($data['STOREROOM_NAME']); ?></td>
  </tr>
  <tr>
    <td bgcolor="#999999">缩微号</td>
    <td colspan="3" bgcolor="#CCCCCC" style="word-break:break-all" width="370"><?php echo ($data['MICROCOPY_CODE']); ?></td>
  </tr>
  <tr>
    <td height="18" bgcolor="#999999">所属分类</td>
    <td colspan="3" bgcolor="#CCCCCC" style="word-break:break-all" width="370"><?php echo ($data['ENTITY_NAME']); ?></td>
  </tr>
</table>
<!-- <input type="text" value="<?php echo ($data['SEQID']); ?>"> -->
<table width="366" border="0" align="center">
  <tr align="center">
    <td><input type="button" value="修改" onclick="window.location.href='__URL__/FilesModification/id/<?php echo ($data['SEQID']); ?>'"></td>
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/FilesSubmit'"></td>
    <td><input type="button" value="卷内文件" onclick="window.location.href='__URL__/FileList/id/<?php echo ($data['SEQID']); ?>'"></td>
  </tr>
</table></form>
<p>&nbsp;</p>
</body>
</html>