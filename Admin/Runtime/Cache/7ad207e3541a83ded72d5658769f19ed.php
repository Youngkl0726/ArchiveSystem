<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>档案管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="imagetoolbar" content="no" />
<link rel="stylesheet" href="__PUBLIC__/css/layout.css" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/scripts/jquery-1.4.1.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/jquery.slidepanel.setup.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/jquery.cycle.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/scripts/jquery.cycle.setup.js"></script>
</head>
<body>
<!-- ####################################################################################################### -->
<div class="wrapper col1">
  <div id="header">
    <div id="logo">
      <h1><a href="__URL__/userHome">档案管理系统</a>    </h1>
    </div>
     <div id="topnav">
      <ul>
        <li><a href="__URL__/userHome">主页</a></li>
        <li class="active"><a href="__URL__/System">系统简介</a></li>
         <li><a href="__URL__/Borrow">用户申请借阅</a></li>
        <li><a href="javascript:void(0)" onclick="popWin()">申请状态查询</a></li>
      
      </ul>
    </div>
    <br class="clear" />
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">You Are Here</li>
      <li>&#187;</li>
      <li><a href="#">Home</a></li>  
    <li>&#187;</li>
      <li class="current"><a href="#">系统简介</a></li>
    </ul>
  </div>
</div>
<!-- ####################################################################################################### -->
<div class="wrapper col3">
  <div id="container">
    <h1>湖南大学档案馆</h1>
    
    长沙市城建档案馆位于曙光中路185号，1980年成立，1996年5月"长沙市城市建设档案管理处"、长沙市建设信息中心"合署办公，实行"三块牌子，一套人马"的管理体制,归口长沙市住房和城乡建设委员会。内设办公室、业务一科（城乡建设档案业务指导）、业务二科（城乡建设档案收集鉴定）、业务三科（建设信息中心、网站管理及地下管线信息动态管理）、业务四科（城乡建设声像档案管理及编研）、业务五科（城乡建设档案管理及查阅利用），共一室五科。现有职工45人，其中大学本科以上文化程度33人，硕士研究生7人，正高职称3人，副高职称4人，中级职称12人。建馆以来，档案利用累计为社会创可测算经济效益人民币7亿多元，现馆藏有1808年至今的各类城市建设档案70多万卷。</p>
    <p>基本职能</p>
    <ul>
      <li>、贯彻执行国家和省、市城市建设档案工作的法律法规和方针政策，编制本市城建档案工作的发展规划，并组织监督实施；.</li>
      <li>受市建设行政主管部门委托，开展城乡建设档案管理执法；.</li>
      <li>负责区、县（市）城建档案工作业务指导；</li>
      <li>负责接收、保管和开发利用城乡建设档案和城建资料（包括城市规划、城市勘测、城市综合基础资料）； </li>
      <li>负责对建设工程档案进行业务指导和验收；</li>
      <li>负责编制本市城乡建设档案业务标准和技术规范；</li>
      <li>负责研究住建系统信息化建设长远战略、总体规划和发展目标； </li>
      <li>负责住建委信息化建设工作的技术标准和规范性文件的制定；</li>
      <li>负责住建委建设业务管理信息系统软件的设计、开发、升级，以及日常运行的维护保障工作； </li>
      <li>负责组织住建委信息化技术培训和合作交流活动； </li>
    </ul>
    <p>相关工作人员.</p>
    <ol>
      <li>书记：xxxxx</li>
      <li>馆长：xxxx.</li>
     <li>副馆长：xxxx.</li>
     <li>副馆长：xxxx.</li>
     
    </ol>
  </div>
</div>

<div class="wrapper col5">
  <div id="copyright">
    <p align="center">Copyright &copy; HNU. All Rights Reserved.</p>
    <br class="clear" />
  </div>
</div>
<script>
    function popWin(){
          var win,weigth=300,height=200; 
          // var theURL="Announcement/id/"+id; 
          win=window.open("Query.html","winDWL","width="+weigth+",height="+height+",resizable=yes,menubar=yes,toolbar=no,location=no,scrollbars=yes,status=no")       
          win.moveTo((screen.width-weigth)/2,(screen.height-height)/2);
      }
</script>
</body>
</html>