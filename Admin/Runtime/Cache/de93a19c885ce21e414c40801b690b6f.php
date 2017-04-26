<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" />
</head>
<script type="text/javascript">
function CommandConfirm(){
  
  
  // alert(checkObj.length);
        if(window.confirm("你确定删除吗？")){ 
          //子复选框
          var checkObj = document.all("cheboxId");
          var num=0;
          var id = '';
          var cheboxId = document.getElementById("cheboxId").value;
          if(checkObj.length){
          for (var i = 0; i<checkObj.length;i++) {
            if(checkObj[i].checked){
              num++;
              id += ','+checkObj[i].value;
            }
          }
          // alert(id);
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
  function CommandConfirm2(){
    
        if(window.confirm("你确定提交吗？")){ 
          //子复选框
          var cheboxId = document.getElementById("cheboxId").value;
          var checkObj = document.all("cheboxId");
          // alert(checkObj.length);
          var num=0;
          var id = '';
          if(checkObj.length){
          for (var i = 0; i<checkObj.length;i++) {
            if(checkObj[i].checked){
              num++;
              id += ','+checkObj[i].value;
            }
          }
          // alert(id);
          if(num<1)   
            alert("请至少选择一个数据");
          else{
            archiveinfoForm.action = "__URL__/tijiaoanjuan/ids/"+id;
            archiveinfoForm.submit();
          }
          // return true;
        }
          else{
            archiveinfoForm.action = "__URL__/tijiaoanjuan/ids/"+","+cheboxId;
            archiveinfoForm.submit();
          }

        }else{
          return false;
        }
  }

</script>


<body>
<!-- <p><strong>||案卷列表||</strong></p>
<hr width="600" color="#000000" /> -->
<div id="container">
<form method="post" name="archiveinfoForm">
  <table width="85%" align="center" cellspacing="1" class="zebra">
  <thead align="center">
    <th width="9%">序号</th>
    <th width="38%">档号</th>
    <th width="53%">题名</th>
  </thead>
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <input type="hidden" name="ARCH_CODE" value="<?php echo ($vo["ARCH_CODE"]); ?>">
    <td><input type="checkbox" name="fond[]" id="cheboxId" value='<?php echo ($vo["SEQID"]); ?>'/></td>
    <td><a style="color:blue;" href="__URL__/FilesInformation2/id/<?php echo ($vo["SEQID"]); ?>" ><?php echo ($vo["ARCH_CODE"]); ?></a></td>
    <td style="word-break:break-all"><?php echo ($vo["ARCH_NAME"]); ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
  <tr>
     <td colspan='3' align='center'>
       <?php echo ($page); ?>
      </td>
     </tr>
</table>

<input type="submit" name="bt2" value="提交档案" onclick="return CommandConfirm2()">
<a href="__URL__/FilesrecordingAdd"><input type="button" name="bt1" value="新增档案" /></a>
<input type="submit" name="bt2" value="删除" onclick="return CommandConfirm()">
</form></div>
<p>&nbsp;</p>
</body>
</html>