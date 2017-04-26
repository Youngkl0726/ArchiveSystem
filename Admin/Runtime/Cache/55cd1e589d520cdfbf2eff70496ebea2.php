<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__PUBLIC__/MyDatePicker/WdatePicker.js"></script>

</head>

<script>
        function CommandConfirm(){
        if(window.confirm("你确定添加吗？")){
            if(tForm.TEMPLATE_NUM.value.length==0){
              alert("模版编号不能为空");
              return false;
              }
            if(tForm.TEMPLATE_NAME.value.length==0){
              alert("模版名称不能为空");
              return false;
              }
              return true;
            }else{
            return false;
          }
        }

         function ValidateNumber(e, pnumber){
        if (!/^\d+$/.test(pnumber)){
          e.value = /^\d+/.exec(e.value);}
          return false;
        }

        // function check(fileForm){
        // if(fileForm.arch_code.value.length==0){
        //  alert("档号不能为空");
        //  return false;
        // }
        // if(fileForm.arch_name.value.length==0){
        //  alert("档案题名不能为空");
        //  return false;
        // }
        // return true;
        // }

</script> 

<body>
<p></p>
<form method="post" action="
<?php echo U('/Arch/TAdd');?>" onSubmit="return CommandConfirm();" name="tForm">
<table width="421" border="0" align="center">
  <!-- <td align="center"></td> -->
     
    <center>*为必填</center>
  <tr><td align="right">模版编号:</td>
    <td><input type ="text" name="TEMPLATE_NUM" id="TEMPLATE_NUM" onkeyup="return ValidateNumber(this,value)" />
     <span class="error">*<?php echo $nameErr;?></span>
    </td></tr>

  <tr>
    <td width="33%" align="right">模板名称:</td>
    <td width="33%"><input type="text" name="TEMPLATE_NAME" id="TEMPLATE_NAME" />
      <span class="error">*<?php echo $nameErr;?></span>
    </td>
  </tr>

  <tr>
    <td width="100" align="right">全宗编号:</td>
    <td colspan="2">
      <select name="full_model_num" id="select">
        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><option value="<?php echo ($vo["FULL_MODEL_ID"]); ?>"><?php echo ($vo["FULL_MODEL_NUM"]); ?></option><?php endforeach; endif; ?>
      </select> </td></tr>

  <tr>
    <td  align="right">档案题名:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="arch_name" id="archname"></textarea>
  </td>
  </tr>

  <tr>
    <td width="100" align="right">主题词编号:</td>
    <td colspan="2">
      <select name="keyword_num" id="select">
        <?php if(is_array($keyw)): foreach($keyw as $key=>$po): ?><option value="<?php echo ($po["KEYWORD_ID"]); ?>"><?php echo ($po["KEYWORD_NUM"]); ?></option><?php endforeach; endif; ?>
      </select> </td></tr>


  <tr>
    <td align="right">保存时间:</td>
    <td colspan="2">
      <select name="preserv_peroid_time" id="select">
        <?php if(is_array($pret)): foreach($pret as $key=>$vo): ?><option value="<?php echo ($vo["PRESERV_PEROID_ID"]); ?>"><?php echo ($vo["PRESERV_PEROID_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td>
  </tr>

  <tr>
    <td align="right">载体类型:</td>
    <td colspan="2">
      <select name="media_type_name" id="select">
        <?php if(is_array($array)): foreach($array as $key=>$vo): ?><option value="<?php echo ($vo["MEDIA_TYPE_ID"]); ?>"><?php echo ($vo["MEDIA_TYPE_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td>
  </tr>
  <tr>
    <td align="right">数量:</td>
    <td><input name="QUANTITY_AND_UNIT" type="number" id="textfield14" size="5" min="0" /></td>
  </tr>
 
  <tr>
    <td align="right">日期:</td>
    <td><input class="Wdate" type="text" name="ARCH_TIME" id="archtime" onClick="WdatePicker()"> 
      <!-- <input type="text" name="ARCH_TIME" id="textfield2" /> --></td>
  </tr>
 
  <tr>
    <td align="right">档案附注:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="ARCH_MEMO" id="archmemo"></textarea>
    </td></tr>
  <tr>
    <td align="right">档案提要:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="ARCH_SUMMARY" id="archsummary"></textarea>
    </td></tr>
  
  <tr>
    <td align="right">库房:</td>
    <td colspan="2">
      <select name="storeroom_name" id="select">
        <?php if(is_array($store)): foreach($store as $key=>$vo): ?><option value="<?php echo ($vo["STOREROOM_ID"]); ?>"><?php echo ($vo["STOREROOM_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td>
  </tr>

  <tr>
    <td align="right">缩微号:</td>
    <td><input type="text" name="MICROCOPY_CODE" id="textfield6" onkeyup="return ValidateNumber(this,value)"/></td>
  </tr>
  
   <tr>
    <td align="right">是否公开：</td>
    <td><select name="IS_PUBLIC" id="select4">
      <option value="1">公开</option>
      <option value="0">不公开</option>
    </select></td>
  </tr>

  <tr>
    <td align="right">所属分类:</td>
    <td colspan="2">
      <select name="entity_name" id="select">
        <?php if(is_array($ent)): foreach($ent as $key=>$vo): ?><option value="<?php echo ($vo["ENTITY_ID"]); ?>"><?php echo ($vo["ENTITY_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td>
  </tr>
  </table>
 <table width="200" border="0" align="center">
  <tr align="center">
    <td><input type="submit" name="allot" id="allot" value="保存"></td>
    <td><input type="button" value="返回" onclick="window.location.href='__URL__/TemplateManagement'"> </td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
</body>
</html>