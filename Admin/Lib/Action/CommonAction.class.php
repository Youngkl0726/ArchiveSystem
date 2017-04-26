<?php

class CommonAction extends Action{
   //自动运行的方法
    public function _initialize(){
    if(!isset($_SESSION['username']))
    $this->redirect('./Index/Index');  
    }


}



?>