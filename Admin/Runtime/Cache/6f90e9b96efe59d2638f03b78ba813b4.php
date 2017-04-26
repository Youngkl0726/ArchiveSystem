<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="container">
<table  border="1" align="center" class="zebra">
  <tr>
    <th width="11%">用户ID</th>
    <th width="13%">用户姓名</th>
    <th width="17%">登录IP</th>
    <th width="20%">登录时间</th>
    <th width="39%">维护内容</th>
  </tr>
  <?php if(is_array($LogList)): $i = 0; $__LIST__ = $LogList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td><?php echo ($vo["USER_ID"]); ?></td>
    <td><?php echo ($vo["USER_NAME"]); ?></td>
    <td><?php echo ($vo["LOG_IP"]); ?></td>
    <td><?php echo (date("Y-m-d H:i:s",$vo["EVENT_TIME"])); ?></td>
    <td><?php echo ($vo["EVENT_DESC"]); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  <tr>
     <td colspan='5' align='center'>
       <?php echo ($page); ?>
      </td>
     </tr>
</table>
</div>
<p>&nbsp;</p>
</body>
</html>