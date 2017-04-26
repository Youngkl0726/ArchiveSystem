<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body1.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" />
</head>

<div id="container">
  <form>
<table class="zebra" align="center">
  <thead align="center">

    <th width="17%">档号</th>
    <th width="24%">档案题名</th>
    <th width="14%">提要</th>
  </thead>

  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <input type="hidden" name="fond[]"  value='<?php echo ($vo["SEQID"]); ?>'/>
    <td><a style="color:blue;" href="__URL__/Check/id/<?php echo ($vo["SEQID"]); ?>" ><?php echo ($vo["ARCH_CODE"]); ?></a></td>
    <td style="word-break:break-all"><?php echo ($vo["ARCH_NAME"]); ?></td>
    <td style="word-break:break-all"><?php echo ($vo["ARCH_SUMMARY"]); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<tr>
     <td colspan='3' align='center'>
       <?php echo ($page); ?>
      </td>
     </tr>
</table>
</form>
</div>
</body>
</html>