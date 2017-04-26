$(document).ready(function(){
    // 侧边栏主菜单展开与收缩
    $('.p1 > a').click(function(){
        var _this = $(this).parent();
        var sub = _this.find('.subnav');
        var suba = _this.children('a');
        $('.p1 a').removeClass('on');
        $(this).addClass('on');
        if (sub.is(':visible')) {
            sub.slideUp('1000');
        }else{
            sub.slideDown('1000');
        }
    });
    $('.menu > a').click(function(e){
        e.preventDefault();
    });
    // 侧边栏，鼠标经过2级菜单，显示与隐藏3级菜单
    $('.subnav .menu').hover(
        function() {
            var top = $(this).offset().top;
            $(this).children('.subsubnav').addClass('show').css('top',(top-50) + 'px');
            $(this).children('a').addClass('hover');
        },
        function() {
            $(this).children('.subsubnav').removeClass('show');
            $(this).children('a').removeClass('hover');
        }
    );

    // 页面内tab的切换与对应内容显示隐藏
    $(".sectiontab > li").click(function(){
        var num = $(this).index();
        $("ul.sectiontab > li > a").removeClass("active");
        $(this).children("a").addClass("active");
        $("div.tabcontent").children("div").hide();
        $("div.tabcontent").children("div").eq(num).show();
    });
    // boxtab的切换与对应内容显示隐藏
    $(".m-boxtab a").click(function(){
        var num = $(this).parent().index();
        $(".m-boxtab li").removeClass("active");
        $(".m-boxtab li").removeClass("onhover");// for ie6 csshover.htc bug
        $(this).parent().addClass("active");
        $("div.tabcontent").children("div").hide();
        $("div.tabcontent").children("div").eq(num).show();
    });
    // 表单页全选与取消全选
    $(".quanxuan").click(function(){
        var checkbox = $(this).parent().find("input.checkbox");
        var all = checkbox.length;
        var checked = $(this).parent().find("input.checkbox:checked").length ;
        if (checked != all){
            checkbox.attr("checked",true);
            $(this).html("全选/取消");
        }else{
            checkbox.attr("checked",false);
            $(this).html("全选/取消");
        }
    });
    // 表单页checkbox判断全选按钮状态
    $(".quanxuan").parent().find("input.checkbox").click(function(){
        var checkbox = $(this).parents(".formlinecontent").find("input.checkbox");
        var all = checkbox.length;
        var checked = $(this).parents(".formlinecontent").find("input.checkbox:checked").length;
        if (checked != all){
            $(this).parents(".formlinecontent").find(".quanxuan").html("全选/取消");
        }else{
            $(this).parents(".formlinecontent").find(".quanxuan").html("全选/取消");
        }
    });
    // 表格页全选与取消全选
    $(".quanxuan2").click(function(){
        var checkbox = $("table").find("input.checkbox");
        var all = checkbox.length;
        var checked = $("table").find("input.checkbox:checked").length ;
        if (checked != all){
            checkbox.attr("checked",true);
            $(this).attr("全选/取消");
        }else{
            checkbox.attr("checked",false);
            $(this).attr("全选/取消");
        }
    });
    // 表格页checkbox判断全选按钮状态
    $("table").find("input.checkbox").click(function(){
        var checkbox = $("table").find("input.checkbox");
        var all = checkbox.length;
        var checked = $("table").find("input.checkbox:checked").length;
        if (checked != all){
            $(".quanxuan2").html("全选/取消");
        }else{
            $(".quanxuan2").html("全选/取消");
        }
    });

});




