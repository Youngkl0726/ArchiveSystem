<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/CSS/body.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__PUBLIC__/MyDatePicker/WdatePicker.js"></script>

</head>

<body>

<script>
        function CommandConfirm(){
        if(window.confirm("你确定添加吗？")){
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
        function ValidateNumber(e, pnumber){
        if (!/^\d+$/.test(pnumber)){
          e.value = /^\d+/.exec(e.value);}
          return false;
        } 
</script> 

<p><strong>||案卷级立卷||</strong></p>
<hr width="600" color="#000000" />
<form method="post" action="
<?php echo U('/PRM/FLAdd');?>" onSubmit="return CommandConfirm();">
<table width="500" border="0" align="center">
  <center>*为必填</center>
<tr>
    <td width="100" align="right">全宗编号:</td>
    <td colspan="2">
      <select name="full_model_num" id="select">
        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><option value="<?php echo ($vo["FULL_MODEL_ID"]); ?>"><?php echo ($vo["FULL_MODEL_NUM"]); ?></option><?php endforeach; endif; ?>
      </select> </td></tr>
 
 <tr><td align="right">档号:</td>
    <td><input type ="text" name="arch_code" id="archcode" onkeyup="return ValidateNumber(this,value)"/>
     <span class="error">*<?php echo $nameErr;?></span>
    </td></tr>
  
  <tr>
    <td  align="right">档案题名:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="arch_name" id="archname"></textarea><span class="error">*<?php echo $nameErr;?></span>
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

 <!--  <tr>
    <td align="right">立卷单位:</td>
    <td><select name="ENTITY_CODE_3" id="select">
      <option>教务处</option>
      <option>马克思主义学院</option>
      <option>机械与运载学院</option>
      <option>经济与贸易学院</option>
      <option>材料科学与工程学院</option>
      <option>金融与统计学院</option>
      <option>电气与信息工程学院</option>
      <option>法学院</option>
      <option>信息科学与工程学院</option>
      <option>建筑学院</option>
      <option>体育学院</option>
      <option>土木工程学院</option>
      <option>文学院</option>
      <option>化学化工学院</option>
      <option>外国语学院</option>
      <option>环境科学与工程学院</option>
      <option>新闻传播与影视学院</option>
      <option>生物学院</option>
      <option>岳麓学院</option>
      <option>工商管理学院</option>
      <option>数学与计量经济学院</option>
      <option>设计艺术学院</option>
      <option>物理与微电子学院</option>
    </select></td>
  </tr> -->
</table>
  <table width="200" border="0" align="center">
  <tr align="center">
  <!-- <tr align="right"> -->
   <!--  <td colspan="2"><table width="100%" border="0" align="center">
      <tr align="center"> -->
        <td><input type="submit" name="allot" id="allot" value="保存"></td>
        <td><input type="button" value="返回" onclick="window.location.href='__URL__/FilesSubmit'"></td>
  </tr>
</table></form>
<p>&nbsp;</p>
</body>
</html>