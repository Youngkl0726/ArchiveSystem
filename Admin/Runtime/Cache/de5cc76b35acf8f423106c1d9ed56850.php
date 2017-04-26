<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<script type="text/javascript">
  function MM_jumpMenu(targ,selObj,restore){ //v3.0
    eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if (restore) selObj.selectedIndex=0;
  }
//全选
    
  function  a(){
    //子复选框
    var checkObj = document.all("cheboxId");
    //主复选框
    var cid =document.all("cid");
    var flag =true;
    //只有一个checkbox
    if(checkObj.length==undefined){
      if(checkObj.checked){
        if(cid.checked){
          cid.checked=true;
          checkObj.checked=true;
        }
        else if(!cid.checked){
          cid.checked=false;
          checkObj.checked=false;
        }
      }
      else if(!checkObj.checked){
        if(cid.checked){
          checkObj.checked=true;
        }
      }
    }
    //多个checkbox
    //有一个或多个checkbox没选，flag=false，全选了flag=true
    else{
      for(var i = 0;i<checkObj.length;i++){
        if (checkObj[i].checked==false)
          flag=false;
    }
    if (flag==true) {
      if(!cid.checked)
        for(var i = 0;i<checkObj.length;i++)
          checkObj[i].checked = false;
      else
        flag=false;
    }
    else if(flag==false){

      for(var i = 0;i<checkObj.length;i++)
       if (checkObj[i].checked==false) 
        checkObj[i].checked = true;
    }
    if(!flag)
      cid.checked=true;
    else
      cid.checked=false;
    }
  }
  //得到GROUP_ID
  function getCbk1(){
    var checkObj = document.all("cheboxId");
    var value1='';
    var value2='';
    if(checkObj.length){
          for (var i = 0; i<checkObj.length;i++) {
            if(checkObj[i].checked){
              value1+=checkObj[i].value.substr(0,1);
            }
          }
        }
    return value1;
  }
  //得到USER_ID
  function getCbk2(){
    var checkObj = document.all("cheboxId");
    var value1='';
    var value2='';
    if(checkObj.length){
          for (var i = 0; i<checkObj.length;i++) {
            if(checkObj[i].checked){
              value2+=','+checkObj[i].value.substr(2,checkObj[i].value.length);
            }
          }
        }
    return value2;
  }

  function CommandConfirm1(){
      //子复选框
      var checkObj = document.all("cheboxId");
      var num=0;
      var ids = '';
      var group= '';
      if(checkObj.length){
      for (var i = 0; i<checkObj.length;i++) {
        if(checkObj[i].checked){
          if(checkObj[i].value.substr(0,1)==1){
            alert("不能修改超级管理员");
            return false;
          }
          ids += ','+checkObj[i].value;
          num++;
        }
      }
      // num = 1;
      if(num<1)  
        alert("请至少选择一个数据");
      else if(num>=1){ 
        document.getElementById('ids').value = getCbk2();
        show('fd');  
      }
    }
  }
  

  function CommandConfirm2(){
    var num=0;
    var checkObj = document.all("cheboxId");
    for (var i = 0; i<checkObj.length;i++) 
      if(checkObj[i].checked){
        if(checkObj[i].value.substr(0,1)==1){
          alert("不能删除超级管理员");
          return false;
        }
        num++;
      }
      if(window.confirm("你确定删除吗？")){ 
          //子复选框
          var cheboxId = document.getElementById("cheboxId").value;
          if(checkObj.length){
            if(num<1)   {
              alert("请至少选择一个数据");
              return false;
            }
            else{
              userForm.action = "__URL__/delete/idss/"+getCbk2();
              userForm.submit();
            }
          }
          else{
            if(!cheboxId.checked){
              alert("请至少选择一个数据");
              return false;
            }
            else{
            userForm.action = "__URL__/delete/idss/"+cheboxId;
            userForm.submit();
          }
          }
      }else{
          return false;
        }
  }

  function CommandConfirm(){
        if(window.confirm("你确定修改吗？")){
          var a=getCbk1();
          var b=document.getElementById('select').value;
          if(a==b){
            alert("身份已经存在");
            return false;
          }
          else return true;
        }else{
          return false;
        }
        }

</script>
<link href="__PUBLIC__/css/body1.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tanchu.css" rel="stylesheet" type="text/css" />
<link href="__PUBLIC__/css/tablestyle.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" href="__PUBLIC__/js/right.js"></script>

</head>
  <body>

<div id="container">
<form method='post' name="userForm">
  <table class="zebra" width="70%" border="1" align="center">
      <thead>
        <th width="10%"> 
          <input type="checkbox" name="all" onclick="a()" id='cid'></th>
        <th width="50%">用户名</th>
        <th width="50%">身份</th>
      </thead>
      <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td><input type="checkbox" name="user[]" id='cheboxId' value='<?php echo ($vo["GROUP_ID"]); ?>&<?php echo ($vo["USER_ID"]); ?>'>
        <input type="hidden" id="group_id" value="<?php echo ($vo["GROUP_ID"]); ?>"></td>
        <td><?php echo ($vo["USER_NAME"]); ?></td>
        <td><?php echo ($vo["GROUP_NAME"]); ?></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
      <tr>
     <td colspan='3' align='center'>
       <?php echo ($page); ?>
      </td>
     </tr>
    </table>
  <input type="hidden" name="idss" value="<?php echo ($id); ?>">
    <input type="button" name="bt1" value="修改" onclick="return CommandConfirm1()" >
    <input type="submit" name="bt2" value="删除" onclick="return CommandConfirm2()">
  </form>
  </div>
  <div id="hidebg" style="position:absolute;left:0px;top:0px; 
      background-color:#000; 
      width:100%;  /*宽度设置为100%，这样才能使隐藏背景层覆盖原页面*/ 
      filter:alpha(opacity=60);  /*设置透明度为60%*/ 
      opacity:0.6;  /*非IE浏览器下设置透明度为60%*/ 
      display:none; 
      z-Index:2;"></div>
  <div id="fd" style="display:none;filter:alpha(opacity=100);opacity:1;position:absolute;z-Index:3;"/>
  <form name="Dform" action="__URL__/change" method="post">
  <div class="content">修改身份</div>
    <input type="hidden" id="ids" name="ids">
    <div>部门: <select name="GRUOP_ID" id="select" style="width: 157px;size: 120px;">
        <option value=2>档案馆工作人员</option>
        <option value=3>预录工作人员</option>
        <option value=4>管理员</option>
      </select></div>
<div class="content"><input type="submit" value="确定" onclick='return CommandConfirm();')></form>
<input type="button" value="关闭" onclick="closeed('fd')"></div>

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
    h.style.height=document.documentElement.clientHeight+"px";  //设置隐藏层的高度为当前页面高度
    h.style.width=document.documentElement.clientWidth+"px";
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