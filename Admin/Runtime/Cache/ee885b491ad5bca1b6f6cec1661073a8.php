<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/CSS/body.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__PUBLIC__/MyDatePicker/WdatePicker.js"></script>
<!-- <link href="__PUBLIC__/css/body1.css" rel="stylesheet" type="text/css" /> -->
<link href="__PUBLIC__/css/tanchu.css" rel="stylesheet" type="text/css" />
<!-- <link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" /> -->
<script type="text/javascript" href="__PUBLIC__/js/right.js"></script>

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

        function CommandConfirm(){
        if(window.confirm("你确定使用该模板吗？")){
          return true;
        }else{
          return false;
        }
        }
        function CommandConfirm1(){
        if(window.confirm("你确定添加吗？")){
          return true;
        }else{
          return false;
        }
        }

</script> 
</head>
<body>
<div id="container">
<p></p>
<form method="post" action="
<?php echo U('/Arch/FLAdd');?>">
<table width="500" border="0" align="center">
  <font size="4px" color="black"><center>*为必填</center></font>
<tr>
    <td width="100" align="right">全宗编号:</td>
    <td colspan="2">
      <select name="full_model_num" id="select">
        <?php if(is_array($arr)): foreach($arr as $key=>$vo): ?><option value="<?php echo ($vo["FULL_MODEL_ID"]); ?>"<?php if(($data['FULL_MODEL_NUM'] == $vo['FULL_MODEL_NUM'])): ?>selected<?php endif; ?>><?php echo ($vo["FULL_MODEL_NUM"]); ?></option><?php endforeach; endif; ?>
      </select> </td></tr>
 
 <tr><td align="right">档号:</td>
    <td><input type ="text" name="arch_code" id="archcode" onkeyup="return ValidateNumber(this,value)"/>
     *
    </td></tr>
  
  <tr>
    <td  align="right">档案题名:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="arch_name" id="archname"><?php echo ($data['ARCH_NAME']); ?></textarea>
      *
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
    <td><select name="IS_PUBLIC" id="select4">
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
  <table width="200" border="0" align="center">
  <tr align="center">
  <!-- <tr align="right"> -->
   <!--  <td colspan="2"><table width="100%" border="0" align="center">
      <tr align="center"> -->
        <td><input type="button" value="模板" onclick="show('fd')"> </td>
        <td><input type="submit" name="allot" id="allot" value="保存" onclick="return CommandConfirm1()"></td>
        <td><input type="button" value="返回" onclick="window.location.href='__URL__/FilesList'"> </td>
        <!-- <td><button><a href="__URL__/FilesList">返回</a></button></td> -->
<!--       </tr>
    </table></td> -->
  </tr>
</table>
</form>
</div>
<div id="hidebg" style="position:absolute;left:0px;top:0px; 
      background-color:#000; 
      width:100%;  /*宽度设置为100%，这样才能使隐藏背景层覆盖原页面*/ 
      filter:alpha(opacity=60);  /*设置透明度为60%*/ 
      opacity:0.6;  /*非IE浏览器下设置透明度为60%*/ 
      display:none; 
      z-Index:2;"></div>
<div id="fd" style="display:none;filter:alpha(opacity=100);opacity:1;position:absolute;z-Index:3;">
  <form name="tform" action="<?php echo U('/Arch/TempInsert');?>" method="post">
  <div class="content">选择模板</div>
    <!-- <input type="hidden" id="ids" name="ids"> -->
    <div>模板名称: 
      <select name="TEMPLATE_ID" id="select" style="width: 157px;size: 120px;">
        <?php if(is_array($temp)): foreach($temp as $key=>$vo): ?><option value="<?php echo ($vo["TEMPLATE_ID"]); ?>"><?php echo ($vo["TEMPLATE_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
    </div>
<div class="content"><input type="submit" value="确定" onclick='return CommandConfirm();')></form>
<input type="button" value="关闭" onclick="closeed('fd')"></div>

</div>

<script  type="text/javascript" charset="utf-8" >
var prox;
var proy;
var proxc;
var proyc;
function show(id) /*--打开--*/
{
    clearInterval(prox);
    clearInterval(proy);
    clearInterval(proxc);
    clearInterval(proyc);
    var h = document.getElementById("hidebg");
    var o = document.getElementById(id);
    h.style.display="block";  //显示隐藏层 
    h.style.height=document.body.clientHeight+"px";  //设置隐藏层的高度为当前页面高度
    h.style.width=document.body.clientWidth+"px";
    var windowWidth=document.documentElement.clientWidth;
    var windowHeight = document.documentElement.clientHeight;
    o.style.display = "block";
    o.style.width = "1px";
    o.style.height = "1px";
    o.style.left=windowWidth/2-500/2+"px";
    o.style.top=windowHeight/2-200/2+"px";
    // alert(windowHeight);
    prox = setInterval(function()
    {
        openx(o,500)
    },10);
}
function openx(o,x) /*--打开x--*/
{
    var cx = parseInt(o.style.width);
    if(cx < x)
    {
        o.style.width = (cx + Math.ceil((x-cx)/5)) +"px";
    }
    else
    {
        clearInterval(prox);
        proy = setInterval(function()
        {
            openy(o,200)
        },10);
    }
}
function openy(o,y) /*--打开y--*/
{
    var cy = parseInt(o.style.height);
    if(cy < y)
    {
        o.style.height = (cy + Math.ceil((y-cy)/5)) +"px";
    }
    else
    {
        clearInterval(proy);
    }
}
function closeed(id) /*--关闭--*/
{
    clearInterval(prox);
    clearInterval(proy);
    clearInterval(proxc);
    clearInterval(proyc);
    var h = document.getElementById("hidebg");
    var o = document.getElementById(id);
    if(o.style.display == "block")
    {
        h.style.display = "none";
        proyc = setInterval(function()
        {
            closey(o)
        },10);
    }
}
function closey(o) /*--关闭y--*/
{
    var cy = parseInt(o.style.height);
    if(cy > 0)
    {
        o.style.height = (cy - Math.ceil(cy/5)) +"px";
    }
    else
    {
        clearInterval(proyc);
        proxc = setInterval(function()
        {
            closex(o)
        },10);
    }
}
function closex(o) /*--关闭x--*/
{
    var cx = parseInt(o.style.width);
    if(cx > 0)
    {
        o.style.width = (cx - Math.ceil(cx/5)) +"px";
    }
    else
    {
        clearInterval(proxc);
        o.style.display = "none";
    }
}
/*鼠标拖动*/
var od = document.getElementById("fd");
var dx,dy,mx,my,mouseD;
var odrag;
var isIE = document.all ? true : false;
document.onmousedown = function(e)
{
    var e = e ? e : event;
    if(e.button == (document.all ? 1 : 0))
    {
        mouseD = true;
    }
}
document.onmouseup = function()
{
    mouseD = false;
    odrag = "";
    if(isIE)
    {
        od.releaseCapture();
        od.filters.alpha.opacity = 100;
    }
    else
    {
        window.releaseEvents(od.MOUSEMOVE);
        od.style.opacity = 1;
    }
}
// function readyMove(e){
od.onmousedown = function(e)
{
    odrag = this;
    var e = e ? e : event;
    if(e.button == (document.all ? 1 : 0))
    {
        mx = e.clientX;
        my = e.clientY;
        od.style.left = od.offsetLeft + "px";
        od.style.top = od.offsetTop + "px";
        if(isIE)
        {
            od.setCapture();
            od.filters.alpha.opacity = 50;
        }
        else
        {
            window.captureEvents(Event.MOUSEMOVE);
            od.style.opacity = 0.5;
        }
    }
}
document.onmousemove = function(e)
{
    var e = e ? e : event;
    if(mouseD==true && odrag)
    {
        var mrx = e.clientX - mx;
        var mry = e.clientY - my;
        od.style.left = parseInt(od.style.left) +mrx + "px";
        od.style.top = parseInt(od.style.top) + mry + "px";
        mx = e.clientX;
        my = e.clientY;
    }
}
</script>


</body>
</html>