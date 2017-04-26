<?php if (!defined('THINK_PATH')) exit();?>﻿<html lang="zh-cn">
<head>
<title>档案管理系统</title>
    <meta charset="utf-8">
    
    <link href="__PUBLIC__/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="__PUBLIC__/css/default.css" />
    <style>
        html{
            overflow: hidden;
        }
    </style>
    <script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>

</head>
<body>
    <div class="g-header">
        <div class="m-toplogo"><img src="__PUBLIC__/images/title.jpg" alt="" class="pngfix"></div>
        <div class="m-topuser"><a href="#">预录工作人员-<?php echo ($_SESSION['username']); ?> </a></div>
        <!-- <a href='javascript:if(confirm("确认退出？"))location.href="../Index/index"'>退出登录</a> -->
    </div>
</body>
</html>