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
            archiveinfoForm.action = "__URL__/archdelete/ids/"+id;
            archiveinfoForm.submit();
          }
          }
          else{
            if(!cheboxId.checked){
              alert("请至少选择一个数据");
              return false;
            }
            else{
            archiveinfoForm.action = "__URL__/archdelete/ids/"+","+cheboxId;
            archiveinfoForm.submit();
          }
          }
        }else{
          return false;
        }
  }

</script>


<body>
<div id="container">
<form action="__URL__/FilesList" method="post">
  <table width="70%" height="35" border="0" align="center">
  <tr>
    <td width="289" align="center">是否公开：
      <select name="gongkai" id="select4">
        <option value="2">所有</option>
        <option value="1">公开</option>
        <option value="0">不公开</option>
    </select></td>
    <td align="center">所属分类:
      <select name="entity_name" id="select">
        <option value="100">所有</option>
        <?php if(is_array($ent)): foreach($ent as $key=>$vo): ?><option value="<?php echo ($vo["ENTITY_ID"]); ?>"><?php echo ($vo["ENTITY_NAME"]); ?></option><?php endforeach; endif; ?>
      </select></td>
  <td width="49" align="center"><input type="submit" name="button3" id="button3" value="查询" /></td>
    </tr>
</table>
</form>
<form method='post' name="archiveinfoForm">
<table class="zebra" width="70%" border="0" align="center">
  <thead align="center">
    <th width="8%">序号</th>
    <th width="25%">档号</th>
    <th width="30%" >档案题名</th>
    </thead>

    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <input type="hidden" name="ARCH_CODE" value="<?php echo ($vo["ARCH_CODE"]); ?>">
        <td><input type="checkbox" name="arch[]" id='cheboxId' value='<?php echo ($vo["SEQID"]); ?>'></td>
        <td><a style="color:blue;" href="__URL__/FilesInformation/id/<?php echo ($vo["SEQID"]); ?>"><?php echo ($vo["ARCH_CODE"]); ?></td> 
        <td style="word-break:break-all"><?php echo ($vo["ARCH_NAME"]); ?></a></td> 
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<tr>
     <td colspan='3' align='center'>
       <?php echo ($page); ?>
      </td>
     </tr>
</table>
<a href="__URL__/Filesrecording2"><input type="button" name="bt1" value="新增档案" /></a> 
<input type="submit" name="bt2" value="删除" onclick="return CommandConfirm()">
</form>
</div>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>