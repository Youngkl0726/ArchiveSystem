<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" />
<script>
  function pass(){
    BorrowForm.action="__URL__/pass";
    BorrowForm.submit();
  }
  function refuse(){
    BorrowForm.action="__URL__/refuse";
    BorrowForm.submit();
  }
   function command(id){
    window.location.href="__URL__/BorrowInformation/id/"+id;
  }
   function check1(status){
    var b=document.getElementById("bt2").value;
    if(status=="通过"){
      alert("该申请已经通过");
      return false;
    }
    else return false;
  }
  function check2(status){
    // alert(status);
    var b=document.getElementById("bt2").value;
    if(status=="拒绝"){
      alert("该申请已经拒绝");
      return false;
    }
    else return false;
  }
</script>
</head>

<body>
<div id="container">
<table align="center" class="zebra" >
  <thead>
    <tr align="center"></tr><th width="32%">申请列表</th>
    <th width="39%">审核状态</th>
    <th colspan="2">操作</th>
  </thead>
  <?php if(is_array($Borrowlist)): $i = 0; $__LIST__ = $Borrowlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bo): $mod = ($i % 2 );++$i;?><form method="post" action="__URL__/pass">
  <tr>
    <input type="hidden" name="ids" id="ids" value='<?php echo ($bo["APP_ID"]); ?>'>
    <input type="hidden" id="status1" value='<?php echo ($bo["APP_STATUS"]); ?>'>
    <td><a href="javascript:void(0)" onclick="command(<?php echo ($bo["APP_ID"]); ?>)"><?php echo ($bo["APP_ID"]); ?></a></td>
    <td><?php echo ($bo["APP_STATUS"]); ?></td>
    <td width="14%">
      <input type="submit" value="通过" id="bt1" onclick="check1(status1.value)" /></td>
      </form>
      <form method="post" action="__URL__/refuse">
      <td>
      <input type="hidden" name="idd" id="idd" value='<?php echo ($bo["APP_ID"]); ?>'>
      <input type="hidden" id="status2" value='<?php echo ($bo["APP_STATUS"]); ?>'>
    <input type="submit" value="拒绝" id="bt2" onclick="check2(status2.value)" /></td>
    </form>
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