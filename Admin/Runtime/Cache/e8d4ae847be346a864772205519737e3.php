<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript" src="__PUBLIC__/MyDatePicker/WdatePicker.js"></script>

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
</script> 
<form method="post" action="
<?php echo U('/Arch/Add');?>" onSubmit="return CommandConfirm();">
  <table align="center">
  <p></p>
   <!--  <tr><td align='right'>*为必填</td></tr> -->
    <center>*为必填</center>
     <tr><td></td></tr>
     
  <tr><td align="right">全宗编号:</td>
    <td><input type ="text" name="FULL_MODEL_NUM" id="fullmodelnum" onkeyup="return ValidateNumber(this,value)" />
     <span class="error">*<?php echo $nameErr;?></span>
    </td></tr>
  <tr>
    <td align="right">全宗名称:</td>
    <td><input type="text" name="FULL_MODEL_NAME" id="fullmodelname" />
       <span class="error">*<?php echo $nameErr;?></span>
     </td></tr>
  <tr>
    <td align="right">档案概况:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="ARCH_SUMMARY" id="archsummary"></textarea>
  </td></tr>
  <tr>
    <td align="right">档案内容和成分:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="ARCH_CONTENT" id="archcontent"></textarea>
    </td></tr>
 <!--  <tr>


    <td align="right">开始时间:</td>
    <td><input class="Wdate" type="text" name="BEGIN_TIME" id="begintime" onClick="var mindate=nowdate();WdatePicker({minDate:mindate,maxDate:enddate()||'2020-10-01'})"> 
      
    </td></tr>
  <tr>
    <td align="right">终止时间:</td>
    <td>
      <input class="Wdate" type="text" name="END_TIME" id="endtime" onClick="var date=begindate();WdatePicker({minDate:date||nowdate(),maxDate:'2020-10-01'})"> 
     
    </td></tr> -->
  <tr>
    <td align="right">备注:</td>
    <td><textarea style="width:300px;height:70px;resize:none;" name="FULL_MODEL_MEMO" id="archmodelmemo"></textarea>
    </td></tr>
  <tr>
    <td align="right">总卷数:</td>
    <td><input type="number" name="SUM1" id="sum1" />
    </td></tr>
  <tr>
    <td align="right">总件数:</td>
    <td><input type="number" name="SUM2" id="sum2" />
    </td></tr>
</table>
<table width="200" border="0" align="center">
  <tr align="center">
    <td><!-- <button><a href="__URL__/FondsManagement">保存</a></button> -->
    <input type="submit" name="allot" id="allot" value="保存">
    </td>

    <td><input type="button" value="返回" onclick="window.location.href='__URL__/FondsManagement'"></td>
  </tr>
</table>
</form>
<p>&nbsp;</p>
<script type="text/javascript">
function begindate(){
  var min = document.getElementById("begintime").value;
  return min;
}
function enddate(){
  var max = document.getElementById("endtime").value;
  return max;
}
function nowdate(){
  var date = new Date();
  var year = date.getFullYear();
  var month =date.getMonth()+1;
  var day = date.getDate()+1; 
  return year+'-'+month+'-'+day;
}

</script>
</body>
</html>