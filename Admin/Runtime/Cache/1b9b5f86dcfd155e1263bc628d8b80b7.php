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
            storeroomForm.action = "__URL__/Storeroomdelete/ids/"+id;
            storeroomForm.submit();
          }
          }
          else{
            if(!cheboxId.checked){
              alert("请至少选择一个数据");
              return false;
            }
            else{
            storeroomForm.action = "__URL__/Storeroomdelete/ids/"+","+cheboxId;
            storeroomForm.submit();
          }
          }
        }else{
          return false;
        }
  }

</script>




<body>
<div id="container">
<form method="post" name="storeroomForm">
  <table align="center" class="zebra" >
  <thead align="center">
    <th width="9%">序号</th>
    <th width="26%">库房名称</th>
    <th width="47%">库房备注</th>
  </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <input type="hidden" name="STOREROOM_NAME" value="<?php echo ($vo["STOREROOM_NAME"]); ?>">
      <td><input type="checkbox" name="sroom[]" id='cheboxId' value='<?php echo ($vo["STOREROOM_ID"]); ?>'></td>
      <td><?php echo ($vo["STOREROOM_NAME"]); ?></td>
      <td><?php echo ($vo["STOREROOM_MEMO"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  <tr>
     <td colspan='3' align='center'>
       <?php echo ($page); ?>
      </td>
     </tr>
</table>

<td><a href="__URL__/StoreroomAdd"><input type="button" name="bt1" value="添加" /></a></td>
   <td><input type="submit" name="bt2" value="删除" onclick="return CommandConfirm()"></td>

   <!--  <td><a href="__URL__/StoreroomAdd">添加</a>&nbsp; &nbsp;<a href="#">删除</a></td> -->

</form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>