<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body1.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" />

</head>

<script type="text/javascript">
function CommandConfirm(){
        if(window.confirm("你确定删除吗？")){ 
          //子复选框
          var checkObj = document.all("cheboxId");
          var cheboxId = document.getElementById("cheboxId").value;
          var num=0;
          var id = '';
          if(checkObj.length){
          for (var i = 0; i<checkObj.length;i++) {
            if(checkObj[i].checked){
              num++;
              id += ','+checkObj[i].value;
            }
          }
          if(num<1)   
            alert("请至少选择一个数据");
          else{
            fullmodelForm.action = "__URL__/delete/ids/"+id;
            fullmodelForm.submit();
          }
          }
          else{
            if(!cheboxId.checked){
              alert("请至少选择一个数据");
              return false;
            }
            else{
            fullmodelForm.action = "__URL__/delete/ids/"+","+cheboxId;
            fullmodelForm.submit();
          }
          }
        }else{
          return false;
        }
  }

</script>

<body>

<div id="container">
<form method="post" name="fullmodelForm">
  <table width="70%" class="zebra" border="0" align="center" >
  <thead align="center">
    <th width="8%">序号</th>
    <th width="22%">全宗编号</th>
    <th width="29%">全宗名称</th>
  </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>

      <td><input type="hidden" name="FULL_MODEL_NUM" ids="num1" value="<?php echo ($vo["FULL_MODEL_NUM"]); ?>">
      <input type="checkbox" name="fond[]" id='cheboxId' value='<?php echo ($vo["FULL_MODEL_ID"]); ?>'></td>
      <td><a style="color:blue;" href="__URL__/FondsInformation/id/<?php echo ($vo["FULL_MODEL_ID"]); ?>"><?php echo ($vo["FULL_MODEL_NUM"]); ?></a></td>
      <td style="word-break:break-all"><?php echo ($vo["FULL_MODEL_NAME"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

  <tr><td colspan='3' align='center'>
    <?php echo ($page); ?>
  </td></tr>
</table>
    <td><a href="__URL__/FondsAdd"><input type="button" name="bt1" value="添加全宗" /></a></td>

    <td><input type="submit" name="bt2" value="删除" onclick="return CommandConfirm()"></td>
</form>
</div>
<p>&nbsp;</p>
</body>
</html>