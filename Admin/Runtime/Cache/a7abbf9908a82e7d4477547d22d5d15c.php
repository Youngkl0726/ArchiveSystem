<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__PUBLIC__/MyDatePicker/WdatePicker.js"></script>
</head>

<script language="javascript" type="text/javascript">
        function ValidateNumber(e, pnumber){
        if (!/^\d+$/.test(pnumber)){
          e.value = /^\d+/.exec(e.value);}
          return false;
        } 

        function check(fondForm){
        if(fondForm.fullmodelnum.value.length==0){
         alert("全宗编号不能为空");
         return false;
        }
        if(fondForm.fullmodelname.value.length==0){
         alert("全宗名称不能为空");
         return false;
        }
        return true;
        }
</script>



<body>
<form action="__URL__/FondsSave" method="post" onsubmit ="return check(this);" name="fondForm"><table width="406" border="0" align="center">
  <center>*为必填</center>
  <tr>
    <td align="right">全宗编号：</td>
    <td>
      <label for="textfield"></label>
      <input type="text" name="fullmodelnum" id="textfield" value="<?php echo ($data['FULL_MODEL_NUM']); ?>" onkeyup="return ValidateNumber(this,value)" />
      <span class="error">*<?php echo $nameErr;?></span>
   </td>
  </tr>
  <tr>
    <td align="right">全宗名称：</td>
    <td><input type="text" name="fullmodelname" id="textfield2" value="<?php echo ($data['FULL_MODEL_NAME']); ?>" />
      <span class="error">*<?php echo $nameErr;?></span></td>
  </tr>
  <tr>
    <td align="right">档案概况：</td>
    <td>
      <label for="textarea"></label>
      <textarea name="archsummary" id="textarea" cols="35" rows="5" style="width:300px;height:70px;resize:none;"><?php echo ($data['ARCH_SUMMARY']); ?></textarea>
  </td>
  </tr>
  <tr>
    <td align="right">档案内容和成分：</td>
    <td><textarea name="archcontent" id="textarea2" cols="35" rows="5" style="width:300px;height:70px;resize:none;"><?php echo ($data['ARCH_CONTENT']); ?></textarea></td>
  </tr>
  <!-- <tr>
    <td align="right">开始时间：</td>
    <td><input class="Wdate" type="text" name="begintime" id="begintime" onClick="WdatePicker()" value="<?php echo ($data['BEGIN_TIME']); ?>"></td>
  </tr>
  <tr>
    <td align="right">终止时间：</td>
    <td> <input class="Wdate" type="text" name="endtime" id="endtime"  onClick="WdatePicker()" value="<?php echo ($data['END_TIME']); ?>"></td>
  </tr> -->
  <tr>
    <td align="right">备注：</td>
    <td><textarea name="fullmodelmemo" id="fullmodelmemo" cols="35" rows="5" style="width:300px;height:70px;resize:none;"><?php echo ($data['FULL_MODEL_MEMO']); ?></textarea></td>
  </tr>
  <tr>
    <td align="right">总卷数：</td>
    <td><input type="number" name="sum1" id="textfield5" value="<?php echo ($data['SUM1']); ?>"/></td>
  </tr>
  <tr>
    <td align="right">总件数：</td>
    <td><input type="number" name="sum2" id="textfield6" value="<?php echo ($data['SUM2']); ?>"/></td>
  </tr>
</table>
<input type="hidden" name="ids" value="<?php echo ($data['FULL_MODEL_ID']); ?>">
<table width="200" border="0" align="center">
  <tr align="center">
    <td><input type="submit" value="保存"></td>
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/FondsInformation/id/<?php echo ($data['FULL_MODEL_ID']); ?>'"></td>
  </tr>
</table></form>
<p>&nbsp;</p>
</body>
</html>