<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>档案管理登录界面</title>
    <link href="__PUBLIC__/css/alogin.css" rel="stylesheet" type="text/css" />
    <style type="text/css"> 
.button1{font-size:12px;cursor:hand;width: 104px;height: 36px;background-color: #ffffff;background-image: url(__PUBLIC__/images/login/btnlogin.gif);background-repeat: repeat;background-attachment: scroll;background-position: center;border: 0 solid #000000;text-align: center;padding-top: 3px;} 
.button2{font-size:12px;cursor:hand;width: 104px;height: 36px;background-color: #ffffff;background-image: url(__PUBLIC__/images/login/btnpwd.gif);background-repeat: repeat;background-attachment: scroll;background-position: center;border: 0 solid #000000;text-align: center;padding-top: 3px;} 
    </style> 
    <script language="JavaScript">
    function fleshVerify(){ 
    //重载验证码
    var time = new Date().getTime();
        document.getElementById('verifyImg').src= '__URL__/verify/'+time;
    }
    </script>
</head>
<body>
    <form id="form1" runat="server" action="<?php echo U('/Index/login');?>" method="post">
    <div class="Main">
        <ul>
            <li class="top"></li>
            <li class="top2"></li>
            <li class="topA"></li>
            <li class="topB"><span>
                <img src="__PUBLIC__/images/login/logo1.gif" alt="" style="" />
            </span></li>
            <li class="topC"></li>
            <li class="topD">
                <ul class="login">
                    <li><span class="left">用户名：</span> <span style="left">
                        <input id="username" type="text" name='USER_NAME' class="txt" />  
                    </span></li>
                    <li><span class="left">密 码：</span> <span style="left">
                       <input id="pwd" type="password" name='pwd' class="txt" />  
                    </span></li>
                         <li><span class="left">验证码：</span> <span style="left">
                    <input name="verify" id="Text3" type="code" class="txtCode" />  
                    <img id="verifyImg" src='__URL__/verify/' onclick="fleshVerify()" />

                    </span>
                    <!-- </li> -->
                    <li>
                    <!-- <span class="left">记住我：</span> -->
                        <!-- <input id="Checkbox1" type="checkbox" /> -->
                        <!-- <input name='submit' value="" type='submit'style="width:104px;height:35px;background:url('__PUBLIC__/images/login/btnlogin.gif')"/> -->
                    </li>
                </ul>
            </li>
            <li class="topE"></li>
            <li class="middle_A"></li>
            <li class="middle_B"></li>
            <li class="middle_C">
            <span class="btn">
                <input class="button1" name='submit' value="" type='submit'/>
                <input class="button2" name='submit' value="" type='button' onclick="popWin()" />
            </span>
            </li>
            <li class="middle_D"></li>
            <li class="bottom_A"></li>
            <li class="bottom_B"></li>
        </ul>
    </div>
    </form>
    <script>
    //忘记密码
    function popWin(){
        // alert("gg");
          var win,weigth=300,height=200; 
          // var theURL="Announcement/id/"+id; 
          win=window.open("__URL__/ForgetPwd","winDWL","width="+weigth+",height="+height+",resizable=yes,menubar=yes,toolbar=no,location=no,scrollbars=yes,status=no")       
          win.moveTo((screen.width-weigth)/2,(screen.height-height)/2);
      }

      </script>
</body>
</html>