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
            fileForm.action = "__URL__/filedelete/ids/"+id;
            fileForm.submit();
          }
          }
          else{
            if(!cheboxId.checked){
              alert("请至少选择一个数据");
              return false;
            }
            else{
            fileForm.action = "__URL__/filedelete/ids/"+","+cheboxId;
            fileForm.submit();
          }
          }
        }else{
          return false;
        }
  }

</script>

<body>

<div id="container">
<form name="fileForm" method="post" action="<?php echo U('/Arch/wenjianadd');?>">
  <table width="83%"  align="center" class="zebra" >
  <tr align="center">
    <th width="7%">序号</th>
    <th width="39%">文件编号</th>
    <th width="29%">责任人</th>
    </tr>


  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
      <td><input type="checkbox" name="data[]" id='cheboxId' value='<?php echo ($vo["FILE_ID"]); ?>'></td>
      <td><a style="color:blue;" href="__URL__/FileInformation/id/<?php echo ($vo["FILE_ID"]); ?>"><?php echo ($vo["FILE_CODE"]); ?></a></td>
      <td style="word-break:break-all"><?php echo ($vo["RESP_HOLDER"]); ?></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>


</table>
<input type="hidden" name="ids" value="<?php echo ($id); ?>">
<!-- <td><a href="__URL__/FilesAdd/id/<?php echo ($id); ?>"><input type="button" name="bt1" value="添加" /></a></td>
 -->
    <td>
    <input type="submit" name="allot" id="allot" value="添加">
    </td>
    <td><input type="submit" name="bt2" value="删除" onclick="return CommandConfirm()"></td>
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/FilesInformation/id/<?php echo ($id); ?>'"></td>
</form>
</div>
</body>
</html>