<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>紧急通知-HTML5</title>
<style type="text/css">
body { width: 700px; margin: 40px auto; border: 1px solid #999; padding: 0 20px;  border-radius:10px;}
li{list-style: none;}
h2 {text-align: center;}
</style>
</head>
<body>
<h2><?php echo ($data["TITLE"]); ?></h2>
<p><?php echo ($data["CONTENT"]); ?></p>

<p align="right"><?php echo (date("Y-m-d h:i:s",$data["PUB_TIME"])); ?></p>
</body>
</html>