<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
body {
	margin-left: 150px;
}
.ys01 {
	color: #572411;
}
</style>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" />
<script>
  function command1(){
     if(window.confirm("确认删除吗？")){
      return true;
    }
    else
      return false;
     }
  function command2(id){
    window.location.href="__URL__/NewsChange/id/"+id;
  }

</script>
</head>

<body>
<div id="container">
<table class="zebra" width="600" height="167" border="0" align="center" cellspacing="0" bgcolor="#000000">
  <thead>
  <th width="57%">新闻列表</th>
  <th width="43%" colspan="2">操作</th>
  </thead>
 <?php if(is_array($Newslist)): $i = 0; $__LIST__ = $Newslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><form method="post" action="<?php echo U('/Manger/deleteNews');?>"><tr>
        <input type="hidden" name="change" value="<?php echo ($vo["TITLE"]); ?>" >
        <td><?php echo ($vo["TITLE"]); ?></td>
        <td><input type="button" name="bt1" value="修改" onclick="command2('<?php echo ($vo["id"]); ?>')"/></td>
        <td><input type="submit" name="bt2" value="删除" onclick="return command1()"/></td>
      </tr>
      </form><?php endforeach; endif; else: echo "" ;endif; ?>
      <tr>
     <td colspan='3' align='center'>
       <?php echo ($page); ?>
      </td>
     </tr>
</table>
</div>
<input type="button" name="bt1" value="添加新闻" onclick="window.location.href='__URL__/NewsAdd'"/>
</body>
</html>