<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="../档案馆工作人员界面/css/body.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<table class="zebra" align="center">
  <thead align="center">
    <th width="20%">案卷档号</th>
    <th width="10%">状态</th>
    <th width="30%">修改建议</th>
    <th width="35%">修改说明</th>
    </thead>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr> 
      <!-- <td><input type="hidden" name="fond[]" value='<?php echo ($vo["FULL_MODEL_ID"]); ?>'></td> -->
      <td><?php echo ($vo["ARCH_CODE"]); ?></td>
      <td><?php if(($vo['ARCH_STATUS'] == 2)): ?>待审<?php elseif(($vo['ARCH_STATUS'] == 3)): ?>通过<?php else: ?>拒绝<?php endif; ?>
      </td>
      <td style="word-break:break-all"><?php echo ($vo["REFUSE_TITLE"]); ?></td>
      <td style="word-break:break-all"><?php echo ($vo["MODIFY_DEC"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  <tr>
     <td colspan='4' align='center'>
       <?php echo ($page); ?>
      </td>
     </tr>
</table>
</div>
<p>&nbsp;</p>
</body>
</html>