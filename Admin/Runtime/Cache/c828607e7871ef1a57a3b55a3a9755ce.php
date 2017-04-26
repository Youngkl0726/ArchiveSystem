<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-cn">
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

    <div >
        <div class="m-sidelist">
            <ul class="nav">
            <li class="p1 menu">
                    <a href="javascript:void(0);">系统</a>
                    <ul class="subnav">
                        <li><a href="__URL__/Password"  target="main">修改密码</a></li>
                        <li><a href="__URL__/HelpInformation"  target="main">帮助信息</a></li>
                        <li><a href="__URL__/LogManagement"  target="main">查看日志</a></li>
                        <li><a href="<?php echo U('/Manger/exit1');?>"  target="_top">退出系统</a></li>       
                    </ul>
                </li>
                <li class="p1 menu">
                    <a href="javascript:void(0);">管理即时信息</a>
                    <ul class="subnav">
                        <li><a href="__URL__/AnnouncementManagement"  target="main">管理公告</a></li>
                        <li><a href="__URL__/NewsManagement"  target="main">管理新闻</a></li>
                        
                    </ul>
                </li>
                <li class="p1 menu">
                    <a href="javascript:void(0);">审批申请</a>
                    <ul class="subnav">
                        <li><a href="__URL__/BorrowApplication"  target="main">审批借阅申请</a></li>
                        
                    </ul>
                </li>
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