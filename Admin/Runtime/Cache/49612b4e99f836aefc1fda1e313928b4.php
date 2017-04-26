<?php if (!defined('THINK_PATH')) exit();?>﻿<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>档案管理系统
   			</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="__PUBLIC__/css/reset.css" rel="stylesheet">
    <link href="__PUBLIC__/css/style.css" rel="stylesheet">
    <link href="__PUBLIC__/css/slimScroll.css" rel="stylesheet">
    <link rel="stylesheet" href="__PUBLIC__/bootstrap3/css/bootstrap.min.css" />
    <link rel="stylesheet" href="__PUBLIC__/bootstrap3/css/bootstrap-theme.min.css" />
    <link rel="stylesheet" href="__PUBLIC__/css/default.css" />
    <script src="__PUBLIC__/bootstrap3/js/jquery.min.js"></script>
    <script src="__PUBLIC__/bootstrap3/js/bootstrap.min.js"></script>
    <style>
    </style>
    <script src="__PUBLIC__/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script>
    function exit1(){
        exitForm.action = "__URL__/exit1";
        exitForm.submit();
    }
    </script>
</head>
<body>
    <!-- g-sidebar start -->
    <div >
        <div class="m-sidelist">
            <ul class="nav">
        <li class="p1 menu">
         <a href="javascript:void(0);">系统</a>
            <ul class="subnav">
                <li><a href="__URL__/Password"  target="main">修改密码</a></li>
                <li><a href="__URL__/HelpInformation"  target="main">帮助信息</a></li>
                <li><a href="__URL__/LogManagement"  target="main">查看日志</a></li>
                <li><a href="<?php echo U('Super/exit1');?>" target="_top">退出系统</a></li>

            </ul>
            <li class="p1 menu">
         <a href="javascript:void(0);">用户管理</a>
            <ul class="subnav">
                <li><a href="RightsList"  target="main">用户列表</a></li>
                <li><a href="RightsAssignment"  target="main">添加用户</a></li>
               
            </ul>
              
            </ul>
        </div>
    </div>

    <script src="__PUBLIC__/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="__PUBLIC__/js/jquery.slimscroll.js"></script>
    <script src="__PUBLIC__/js/js.js"></script>
  
</body>
</html>