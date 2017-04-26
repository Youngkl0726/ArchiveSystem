<?php
/**
 * @Author: anchen
 * @Date:   2014-12-19 03:42:41
 * @Last Modified by:   anchen
 * @Last Modified time: 2015-01-12 16:18:22
 */
class MangerAction extends CommonAction{   
    public function Index(){
        $this->display('manger');
    }
    public function top(){
        $this->display('top');
    }
    public function left(){
        $this->display('left');
    }
    public function right(){
        $this->display('right');
    }
    public function exit1(){

        $this->redirect('./Index/Index');
    }

    public function LogManagement(){
        $db=M('Log');import('ORG.Util.Page');// 导入分页类
        $count      = $db->where(array('USER_ID'=>$_COOKIE['USER_ID']))->count();
        $Page       = new Page($count,7);
        $show       = $Page->show();// 分页显示输出
        $data=$db->where(array('USER_ID'=>$_COOKIE['USER_ID']))->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('LogList',$data);
        $this->assign('page',$show);
        $this->display('LogManagement');
    }
    public function LogAdd(){
        //添加管理日志
        $log=M('Log');
        $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
        $data2['USER_ID']=$logInfo['USER_ID'];
        $data2['USER_NAME']=$logInfo['USER_NAME'];
        $data2['LOG_IP']=$logInfo['LOG_IP'];
        $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
        $data2['EVENT_DESC']=$logInfo['USER_NAME']."通过了编号为“".$id."”的借阅审批";
        if($log->create($data2,1)) {
            $result =   $log->add();
        }
    }
    public function update(){
        if(!IS_POST) 
        halt('页面错误');
        $oldPwd=I('oldPwd');
        $newPwd=I('newPwd');
        $confirmPwd=I('confirmPwd');
        
        $db=new Model('User');
        $data['USER_NAME'] = $_SESSION['username']; 
        $data['PASSWORD'] = I('oldPwd'); 
        $result = $db->where($data)->find();
        if(empty($oldPwd)||empty($newPwd)||empty($confirmPwd))
            $this->error("请填完整");
        else{
            if (!$result) {
                $this->error("密码错误请重新填写");
            }
            else{
                if($newPwd==$confirmPwd){                   
                    $result = $db->where($data)->setField('PASSWORD',$newPwd); 
                    //添加管理日志
                    $log=M('Log');
                    $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                    $data['USER_ID']=$logInfo['USER_ID'];
                    $data['USER_NAME']=$logInfo['USER_NAME'];
                    $data['LOG_IP']=$logInfo['LOG_IP'];
                    $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
                    $data['EVENT_DESC']=$logInfo['USER_NAME']."修改了密码";
                    if($log->create($data,1)) {
                        $result =   $log->add();
                    }

                    $this->success('修改成功');
                }
                else{
                    $this->error('两次密码不一致');
                }
            }
        }
    }

    public function AnnouncementManagement(){
          $db=D('Message');
          import('ORG.Util.Page');// 导入分页类
          $count      = $db->count();
          $Page       = new Page($count,7);
          $show       = $Page->show();// 分页显示输出
          $Ann=$db->limit($Page->firstRow.','.$Page->listRows)->select();
          // $Ann=$db->select();
          $this->assign('Annlist',$Ann);
          $this->assign('page',$show);
          $this->display('AnnouncementManagement');
    }

    public function insertAnn(){
        $Message   =   D('Message');
        $data['TITLE']=I("post.TITLE");
        $data['CONTENT']=I("post.CONTENT");
        $data['PUB_TIME']=time();
        if($data['TITLE']!=NULL&&$data['CONTENT']!=NULL){
            echo '<script> confirm("确认发布吗？") </script>'; 
        
        if($Message->create($data,1)) {
            $result =   $Message->add();
            if($result) {
                //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data2['USER_ID']=$logInfo['USER_ID'];
                $data2['USER_NAME']=$logInfo['USER_NAME'];
                $data2['LOG_IP']=$logInfo['LOG_IP'];
                $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data2['EVENT_DESC']=$logInfo['USER_NAME']."发布了标题为“".$data['TITLE']."”的公告";
                if($log->create($data2,1)) {
                    $result =   $log->add();
                }

                $this->success('操作成功！','AnnouncementManagement');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($Message->getError());
        }
    }
    }
    public function AnnRe(){
        $this->AnnouncementManagement();
    }
    public function deleteAnn(){
        $title = I('post.change');
        $Message = M('Message');
        if($Message->where(array('TITLE' => $title))->delete()){
            //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data2['USER_ID']=$logInfo['USER_ID'];
            $data2['USER_NAME']=$logInfo['USER_NAME'];
            $data2['LOG_IP']=$logInfo['LOG_IP'];
            $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data2['EVENT_DESC']=$logInfo['USER_NAME']."删除了标题为“".$title."”的公告";
            if($log->create($data2,1)) {
                $result =   $log->add();
            }

            $this->success("删除成功");
        }
    }

    public function AnnouncementChange(){
        if(!IS_POST){
            $id = I("get.id");
            $Message = M("Message");
            $data = $Message->where(array("id"=>$id))->find();
            $this->assign('data',$data);
            $this->display("AnnouncementChange");
        }else{
            $id = I("post.id");
            $data['TITLE'] = I("post.TITLE");
            $data['CONTENT'] = I("post.CONTENT");
            $data['PUB_TIME'] = time();
            $Message = M("Message");
            $ex = $Message->where(array("id"=>$id))->find();
            $res = $Message->where(array("id"=>$id))->save($data);
            if($res){
                //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data2['USER_ID']=$logInfo['USER_ID'];
                $data2['USER_NAME']=$logInfo['USER_NAME'];
                $data2['LOG_IP']=$logInfo['LOG_IP'];
                $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data2['EVENT_DESC']=$logInfo['USER_NAME']."修改了标题为“".$ex['TITLE']."”的公告,新标题为“".$data['TITLE']."”";
                if($log->create($data2,1)) {
                    $result =   $log->add();
                }

                $this->success('修改成功',"AnnouncementManagement");
            }else{
                $this->error('修改失败');
            }

            // var_dump($id);
        }
    }

    public function NewsManagement(){
          $db=new Model('News');
          import('ORG.Util.Page');// 导入分页类
          $count      = $db->count();
          $Page       = new Page($count,7);
          $show       = $Page->show();// 分页显示输出
          $News=$db->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign('page',$show);
          $this->assign('Newslist',$News);
          $this->display('NewsManagement');
    }
    public function insertNews(){
        $News = M('News');
        $data['TITLE']=I("post.TITLE");
        $data['CONTENT']=I("post.CONTENT");
        $data['PUB_TIME']=time();
        if($News->create($data,1)) {
            $result =   $News->add();
            if($result) {
                //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data2['USER_ID']=$logInfo['USER_ID'];
                $data2['USER_NAME']=$logInfo['USER_NAME'];
                $data2['LOG_IP']=$logInfo['LOG_IP'];
                $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data2['EVENT_DESC']=$logInfo['USER_NAME']."发布了标题为“".$data['TITLE']."”的新闻";
                if($log->create($data2,1)) {
                    $result =   $log->add();
                }

                $this->success('操作成功！','NewsManagement');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($News->getError());
        }
    }
    public function NewsRe(){
        $this->NewsManagement();
    }
    public function deleteNews(){
        $title = I('post.change');
        $News = M('News');
        if($News->where(array('TITLE' => $title))->delete()){
            //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data2['USER_ID']=$logInfo['USER_ID'];
            $data2['USER_NAME']=$logInfo['USER_NAME'];
            $data2['LOG_IP']=$logInfo['LOG_IP'];
            $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data2['EVENT_DESC']=$logInfo['USER_NAME']."删除了标题为“".$title."”的公告";
            if($log->create($data2,1)) {
                $result =   $log->add();
            }
            $this->success("删除成功");
        }
    }
    public function NewsChange(){
        if(!IS_POST){
            $id = I("get.id");
            $News = M("News");
            $data = $News->where(array("id"=>$id))->find();
            $this->assign('data',$data);
            $this->display("NewsChange");
        }else{
            $id = I("post.id");
            $data['TITLE'] = I("post.TITLE");
            $data['CONTENT'] = I("post.CONTENT");
            $data['PUB_TIME'] = time();
            $News = M("News");
            $ex = $News->where(array("id"=>$id))->find();
            $res = $News->where(array("id"=>$id))->save($data);
            if($res){
                //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data2['USER_ID']=$logInfo['USER_ID'];
                $data2['USER_NAME']=$logInfo['USER_NAME'];
                $data2['LOG_IP']=$logInfo['LOG_IP'];
                $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data2['EVENT_DESC']=$logInfo['USER_NAME']."修改了标题为“".$ex['TITLE']."”的公告,新标题为“".$data['TITLE']."”";
                if($log->create($data2,1)) {
                    $result =   $log->add();
                }
                $this->success('修改成功',"NewsManagement");
            }else{
                $this->error('修改失败');
            }
        }
    }
    public function BorrowApplication(){
        $db=D('Arch_util_app');
        import('ORG.Util.Page');// 导入分页类
        $count      = $db->count();
        $Page       = new Page($count,7);
        $show       = $Page->show();// 分页显示输出
        $Bo=$db->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('Borrowlist',$Bo);
        $this->display('BorrowApplication');
        
    }
    public function BorrowInformation(){
        if(!IS_POST){
            $id = I("get.id");
            $Arch_util_app = M("Arch_util_app");
            $data = $Arch_util_app->where(array("APP_ID"=>$id))->find();
            $this->assign('data',$data);
            $this->display("BorrowInformation");
        }
        else{
            $db=D('Arch_util_app');
            $id=I("post.ids");
            $data1=$db->where(array('APP_ID'=>$id))->select();
            // var_dump($data1);
            if(I("post.sb1")){
                $data2=$db->where(array('APP_ID'=>$id))->setField('APP_STATUS',"通过");
                //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data2['USER_ID']=$logInfo['USER_ID'];
                $data2['USER_NAME']=$logInfo['USER_NAME'];
                $data2['LOG_IP']=$logInfo['LOG_IP'];
                $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data2['EVENT_DESC']=$logInfo['USER_NAME']."通过了编号为“".$id."”的借阅审批";
                if($log->create($data2,1)) {
                    $result =   $log->add();
                }
                $this->redirect('BorrowApplication');
                
            }
            else if(I("post.sb2")){
                $data2=$db->where(array('APP_ID'=>$id))->setField('APP_STATUS',"拒绝");
                //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data2['USER_ID']=$logInfo['USER_ID'];
                $data2['USER_NAME']=$logInfo['USER_NAME'];
                $data2['LOG_IP']=$logInfo['LOG_IP'];
                $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data2['EVENT_DESC']=$logInfo['USER_NAME']."拒绝了编号为“".$id."”的借阅审批";
                if($log->create($data2,1)) {
                    $result =   $log->add();
                }
                $this->redirect('BorrowApplication');
            }
        }
    }
    public function pass(){
        $db=D('Arch_util_app');
        $id=I("post.ids");
        $data=$db->where(array('APP_ID'=>$id))->setField('APP_STATUS',"通过");
        //添加管理日志
        $log=M('Log');
        $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
        $data2['USER_ID']=$logInfo['USER_ID'];
        $data2['USER_NAME']=$logInfo['USER_NAME'];
        $data2['LOG_IP']=$logInfo['LOG_IP'];
        $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
        $data2['EVENT_DESC']=$logInfo['USER_NAME']."通过了编号为“".$id."”的借阅审批";
        if($log->create($data2,1)) {
            $result =   $log->add();
        }
            $this->redirect('BorrowApplication');
        
    }
    public function refuse(){
        $db=D('Arch_util_app');
        $id=I("post.idd");
        $data=$db->where(array('APP_ID'=>$id))->setField('APP_STATUS',"拒绝");
        //添加管理日志
        $log=M('Log');
        $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
        $data2['USER_ID']=$logInfo['USER_ID'];
        $data2['USER_NAME']=$logInfo['USER_NAME'];
        $data2['LOG_IP']=$logInfo['LOG_IP'];
        $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
        $data2['EVENT_DESC']=$logInfo['USER_NAME']."拒绝了编号为“".$id."”的借阅审批";
        if($log->create($data2,1)) {
            $result =   $log->add();
        }
        $this->redirect('BorrowApplication');
    }
    
}
header('Content-Type:text/html;charset=utf-8');
?>