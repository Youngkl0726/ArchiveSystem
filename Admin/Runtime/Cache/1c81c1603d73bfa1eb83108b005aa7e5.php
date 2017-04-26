<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<!-- <link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/style2.css" rel="stylesheet" type="text/css" /> -->

<link href="__PUBLIC__/css/body1.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" />
</head>


<body>
<div id="container">
<form name="fileForm" method="post" action="<?php echo U('/PRM/wenjianadd');?>">
  <table width="83%"  align="center" class="zebra" >
  <tr align="center">
    <th width="7%">序号</th>
    <th width="39%">文件编号</th>
    <th width="29%">责任人</th>
    </tr>


  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><input type="checkbox" name="data[]" id='cheboxId' value='<?php echo ($vo["FILE_ID"]); ?>'></td>
      <td><a style="color:blue;" href="__URL__/Daishenwenjianxinxi/id/<?php echo ($vo["FILE_ID"]); ?>"><?php echo ($vo["FILE_CODE"]); ?></td>
      <!-- /id/<?php echo ($vo["FILE_ID"]); ?> -->
      <td style="word-break:break-all"><?php echo ($vo["RESP_HOLDER"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<input type="hidden" name="ids" value="<?php echo ($id); ?>">
<table width="200" border="0" align="center">
    <tr align="center">
      <td><input type="button" value="返回" onclick="window.location.href='__URL__/Check/id/<?php echo ($id); ?>'">
      </td>
    </tr>
</table>

</form></div>
</body>
</html>