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
        html{
            overflow: hidden;
        }
    </style>
    <script src="__PUBLIC__/js/jquery-1.8.3.min.js"></script>
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
                        <li><a href="<?php echo U('/Arch/exit1');?>"  target="_top">退出登录</a></li>
                    </ul>
                </li>
                <li class="p1 menu">
                    <a href="javascript:void(0);">档案馆立卷</a>
                    <ul class="subnav">
                        <li><a href="__URL__/FondsManagement"  target="main">全宗管理</a></li>
                        <li><a href="__URL__/FilesList"  target="main">案卷管理</a></li>
                        <li><a href="__URL__/KeywordManagement"  target="main">主题词管理</a></li>
                        <li><a href="__URL__/StoreroomManagement"  target="main">库房管理</a></li>
                        <li><a href="__URL__/TemplateManagement"  target="main">模板管理</a></li>

                        
                    </ul>
                </li>
                <li class="p1 menu">
                    <a href="javascript:void(0);">预录审核</a>  
                    <ul class="subnav">
                        <li><a href="__URL__/DepartmentOfAdvanceFiles"  target="main">待审核的档案</a></li>
                    </ul>
                </li>
               <!--  <li class="p1 menu">
                    <a href="javascript:void(0);">翻译</a>
                    <ul class="subnav">
                        <li><a href="__URL__/StudyMaterialsTranslation"  target="main">学籍材料翻译</a></li>
                        <li><a href="__URL__/RecordCheck"  target="main">翻译记录查询</a></li>
                        <li><a href="__URL__/GlossaryManagement"  target="main">翻译词汇管理</a></li>
                        
                    </ul>
                    
              </li> -->

                
            </ul>
        </div>
    </div>
    <script src="__PUBLIC__/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="__PUBLIC__/js/jquery.slimscroll.js"></script>
    <script src="__PUBLIC__/js/js.js"></script>
    <script>
        $(window).load(function(){
            setScroll();
            setLayout($('#main'));
        });

        $(window).resize(function(){
            setLayout($('#main'));
        });

        function setScroll() {
            var h = $(window).height()-50;
            $('.m-sidelist').slimScroll({
                position : 'left',
                distance : 0,
                size : '9px',
                height: h,
                color: '#1c1c1c',
                alwaysVisible : false,
                railVisible : true,
                railColor : '#1f1f1f',
                railOpacity : '0.6'
            });
        }

        function setLayout(main) {
            var h = $(window).height()-50;
            main.height(h);
            // $('.slimScrollDiv').height(h);
            $('.slimScrollRail').height(h);
            $('.m-sidelist').height(h).parent().height(h);
        }
    </script>
</body>
</html>