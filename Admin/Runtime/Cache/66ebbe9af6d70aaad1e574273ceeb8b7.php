<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>权限分配</title>
<link href="__PUBLIC__/css/body.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script>
				function CommandConfirm(){
                    var USER_NAME=document.getElementById("USER_NAME").value;
					           var a=document.getElementById("pwd1").value;
					           var b=document.getElementById("pwd2").value;
                    if(USER_NAME.length<6){
                        alert("用户名必须大于6个字符！");
                        return false;
                    }
                    if(a.length<6||b.length<6){
                        alert("密码长度必须大于6个字符！");
                        return false;
                    }
                    
					if(a==b){
				 		var id=document.form.DEPT_ID.value;
				 		switch(id){
				 			case "2":$DEPT_ID=2;
				 			case "3":$DEPT_ID=3;
				 			case "4":$DEPT_ID=4;
				 		}
					return true;
					}
					else{
						alert("两次密码不一致");
						return false;
					}
				}
				</script> 


<form method="post" name="fileForm" action="<?php echo U('/Super/insert');?>"> 
	<table align='center'>
 	<tr><td align='center'>*为必填</td></tr>
	 <tr><td></td></tr>
    <tr><td>用&nbsp户&nbsp名:<input type="text" name="USER_NAME" id="USER_NAME" />
	 <span class="error">* <?php echo $nameErr;?></span></td></tr>
	 <tr><td></td></tr>
	<tr><td>密&nbsp&nbsp&nbsp&nbsp码:<input type="password" name="PASSWORD" id="pwd1" />
	 <span class="error">* <?php echo $nameErr;?></span></td></tr>
	 <tr><td>确认密码:<input type="password" name="PASSWORD2" id="pwd2" />
	 <span class="error">* <?php echo $nameErr;?></span></td></tr>
	 <tr><td></td></tr>
     <tr><td>身&nbsp&nbsp&nbsp&nbsp份:<select name="GROUP_ID"  style="width: 157px;size: 120px;">
        <?php if(is_array($pret)): foreach($pret as $key=>$vo): ?><option value="<?php echo ($vo["GROUP_ID"]); ?>" ><?php echo ($vo["GROUP_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td></tr>
   <tr><td>部&nbsp&nbsp&nbsp&nbsp门:<select name="DEPT_ID"  style="width: 157px;size: 120px;">
        <?php if(is_array($depart)): foreach($depart as $key=>$vo): ?><option value="<?php echo ($vo["DEPT_ID"]); ?>"><?php echo ($vo["DEPT_NAME"]); ?></option><?php endforeach; endif; ?>
      </select> 
   </td>
  </tr>
      <tr><td>地&nbsp&nbsp&nbsp&nbsp址:<input type="text" name="ADDRESS" /></td></tr>
      <tr><td>电&nbsp&nbsp&nbsp&nbsp话:<input type="text" name="CONTACTPHONE" /></td></tr>
      <tr><td>手&nbsp&nbsp&nbsp&nbsp机:<input type="text" name="MOBILE" /></td></tr>
      <tr><td>邮&nbsp&nbsp&nbsp&nbsp箱:<input type="text" name="EMAIL" />&nbsp* </td></tr>
      <tr><td>密&nbsp&nbsp&nbsp&nbsp码:<input type="text" name="ADDRESS" /></td></tr>
      <tr><td>说&nbsp&nbsp&nbsp&nbsp明:<input type="text" name="NOTES" /></td></tr>
      <tr><td>姓&nbsp&nbsp&nbsp&nbsp名:<input type="text" name="CN_NAME" /></td></tr>
	 <tr><td align='center'><input type="submit" name="allot" id="allot" value="添加" onclick='return CommandConfirm();'/></td></tr>
	</table>
    </form>
  


</body>
</html>