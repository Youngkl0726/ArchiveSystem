<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/CSS/body.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__PUBLIC__/MyDatePicker/WdatePicker.js"></script>
</head>

<script language="javascript" type="text/javascript">
        function ValidateNumber(e, pnumber){
        if (!/^\d+$/.test(pnumber)){
          e.value = /^\d+/.exec(e.value);}
          return false;
        } 

        function check(fileForm){
        if(fileForm.arch_code.value.length==0){
         alert("档号不能为空");
         return false;
        }
        if(fileForm.arch_name.value.length==0){
         alert("档案题名不能为空");
         return false;
        }
        return true;
        }

</script>

<body>
<p><strong>||修改案卷||</strong>
</p>
<hr width="600" color="#000000" />
<form action="__URL__/FileSave" method="post" name="filedForm" onsubmit ="return check(this);" name="fileForm">
  <table width="500" border="0" align="center">
    <center>*为必填</center>

    <tr>
    <td width="100" align="right">全宗编号:</td>
    <td colspan="2">
      <select name="full_model_num" id="select">
        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><option value="<?php echo ($vo["FULL_MODEL_ID"]); ?>" <?php if(($data['FULL_MODEL_NUM'] == $vo['FULL_MODEL_NUM'])): ?>selected<?php endif; ?>><?php echo ($vo["FULL_MODEL_NUM"]); ?></option><?php endforeach; endif; ?>
      </select> </td></tr>

  <tr>
    <td width="33%" align="right">档号:</td>
    <td width="33%"><input type ="text" name="arch_code" id="archcode" value="<?php echo ($data['ARCH_CODE']); ?>" onkeyup="return ValidateNumber(this,value)"/>
     <span class="error">*<?php echo $nameErr;?></span>
    </td>
  </tr>
  <tr>
    <td align="right">档案题名:</td>
    <td>
      <textarea style="width:300px;height:70px;resize:none;" name="arch_name" id="archname"><?php echo ($data['ARCH_NAME']); ?></textarea><span class="error">*<?php echo $nameErr;?></span>
  </td>
  </tr>
  
  <tr>
    <td width="100" align="right">主题词编号:</td>
    <td colspan="2">
      <select name="keyword_num" id="select">
        <?php if(is_array($keyw)): foreach($keyw as $key=>$po): ?><option value="<?php echo ($po["KEYWORD_ID"]); ?>" <?php if(($data['KEYWORD_NUM'] == $vo['KEYWORD_NUM'])): ?>selected<?php endif; ?>><?php echo ($po["KEYWORD_NUM"]); ?></option><?php endforeach; endif; ?>
      </select> </td></tr>

  <tr>
    <td align="right">保存时间:</td>
    <td colspan="2">
      <select name="preserv_peroid_time" id="select">
        <?php if(is_array($pret)): foreach($pret as $key=>$vo): ?><option value="<?php echo ($vo["PRESERV_PEROID_ID"]); ?>" <?php if(($data['PRESERV_PEROID_NAME'] == $vo['PRESERV_PEROID_NAME'])): ?>selected<?php endif; ?>><?php echo ($vo["PRESERV_PEROID_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td>
  </tr>


  <tr>
    <td align="right">载体类型:</td>
    <td colspan="2">
      <select name="media_type_name" id="select">
        <?php if(is_array($array)): foreach($array as $key=>$vo): ?><option value="<?php echo ($vo["MEDIA_TYPE_ID"]); ?>" <?php if(($data['MEDIA_TYPE_NAME'] == $vo['MEDIA_TYPE_NAME'])): ?>selected<?php endif; ?>><?php echo ($vo["MEDIA_TYPE_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td>
  </tr>


  <tr>
    <td align="right">数量:</td>
    <td><input name="QUANTITY_AND_UNIT" type="number" id="textfield14" size="5" min="0" value="<?php echo ($data['QUANTITY_AND_UNIT']); ?>"/></td>
  </tr>
 
  <tr>
    <td align="right">日期:</td>
    <td><input class="Wdate" type="text" name="ARCH_TIME" id="archtime" onClick="WdatePicker()" value="<?php echo ($data['ARCH_TIME']); ?>"> 
      <!-- <input type="text" name="ARCH_TIME" id="textfield2" /> --></td>
  </tr>
 
  <tr>
    <td align="right">档案附注:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="ARCH_MEMO" id="archmemo"><?php echo ($data['ARCH_MEMO']); ?></textarea>
    </td></tr>


  <tr>
    <td align="right">档案提要:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="ARCH_SUMMARY" id="archsummary"><?php echo ($data['ARCH_SUMMARY']); ?></textarea>
    </td></tr>
  
  <tr>
    <td align="right">库房:</td>
    <td colspan="2">
      <select name="storeroom_name" id="select">
        <?php if(is_array($store)): foreach($store as $key=>$vo): ?><option value="<?php echo ($vo["STOREROOM_ID"]); ?>" <?php if(($data['STOREROOM_NAME'] == $vo['STOREROOM_NAME'])): ?>selected<?php endif; ?>><?php echo ($vo["STOREROOM_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td>
  </tr>


  <tr>
    <td align="right">缩微号:</td>
    <td><input type="text" name="MICROCOPY_CODE" id="textfield6" value="<?php echo ($data['MICROCOPY_CODE']); ?>" onkeyup="return ValidateNumber(this,value)"/></td>
  </tr>

 
  <tr>
    <td align="right">是否公开：</td>
    <td><select name="select4" id="select4">
      <option value="0" <?php if(($data['IS_PUBLIC'] == 0)): ?>selected<?php endif; ?>>不公开</option>
      <option value="1" <?php if(($data['IS_PUBLIC'] == 1)): ?>selected<?php endif; ?>>公开
      </option>

    </select></td>
  </tr>

  <tr>
    <td align="right">所属分类:</td>
    <td colspan="2">
      <select name="entity_name" id="select">
        <?php if(is_array($ent)): foreach($ent as $key=>$vo): ?><option value="<?php echo ($vo["ENTITY_ID"]); ?>" <?php if(($data['ENTITY_NAME'] == $vo['ENTITY_NAME'])): ?>selected<?php endif; ?>><?php echo ($vo["ENTITY_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td>
  </tr>
</table>
<input type="hidden" name="ids" value="<?php echo ($data['SEQID']); ?>">
  <table width="200" border="0" align="center">
      <tr align="center">
        <td><input type="submit" value="保存"></td>
        <td><input type="button" value="返回" onclick="window.location.href='__URL__/FilesInformation2/id/<?php echo ($data['SEQID']); ?>'"></td>
      </tr>
    </table>
</form>
<p>&nbsp;</p>
</body>
</html>