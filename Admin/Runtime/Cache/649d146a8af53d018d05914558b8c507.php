<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    <script>
    function check(){
        var CERTIFICATE=document.getElementById("CERTIFICATE").value;
        if(CERTIFICATE.trim().length!=18){
            alert("身份证号不正确");
            return false;
        }
        else
            return true;
    }
    </script>    
    </head>
    <body>
    <form method="post" action="__URL__/CerificateQuery">
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div align="center"> 
    身份证号：<input type="text" name="CERTIFICATE" id="CERTIFICATE" onKeypress="if(event.keyCode<45||event.keyCode>57)event.returnValue=false;">
    </div>
    <div align="center">
    <input type="submit" name="query" value="查询" onclick="return check()"></div>
    </form>
    </body>
</html>