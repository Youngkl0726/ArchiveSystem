<?php
/**
 * @Author: anchen
 * @Date:   2015-01-10 19:28:23
 * @Last Modified by:   anchen
 * @Last Modified time: 2015-01-12 16:11:59
 */
class UserAction extends Action{
    public function userHome(){
        $db1=D('Message');
        $db2=D('News');
        $Ann=$db1->select();
        $Nlist=$db2->select();
        $date=date('Y-m-d H:i',$Ann['PUB_TIME']);
        // $Ann['PUB_TIME']
        $this->assign('Annlist',$Ann);
        $this->assign('date',$date);
        $this->assign('Nlist',$Nlist);
        $this->display('userHome');
    }
    public function Announcement(){
        if(!IS_POST){
            $id = I("get.id");
            $Message = M("Message");
            $data = $Message->where(array("id"=>$id))->find();
            $this->assign('data',$data);
            $this->display("Announcement");
        }
    }
    public function News(){
        if(!IS_POST){
            $id = I("get.id");
            $News = M("News");
            $data = $News->where(array("id"=>$id))->find();
            $this->assign('data',$data);
            $this->display("News");
        }
    }
    public function borrowInsert(){
        $Arch_util_app   =   D('Arch_util_app');
        $data['APP_NAME']=I("post.APP_NAME");
        $data['APP_DEPT']=I("post.APP_DEPT");
        $data['ARCH_NAME']=I("post.ARCH_NAME");
        $data['UTIL_PURPOSE']=I("post.UTIL_PURPOSE");
        $data['UTIL_CONTENT']=I("post.UTIL_CONTENT");
        $data['UTIL_MODE']=I("post.UTIL_MODE");
        $data['CERTIFICATE']=I("post.CERTIFICATE");
        $data['CONTACT_INFO']=I("post.CONTACT_INFO");
        $data['APP_BORROWTIME']=I("post.APP_BORROWTIME");
        $data['APP_RETURNTIME']=I("post.APP_RETURNTIME");

        // $data['APP_BORROWTIME']=strtotime($time1);
        // $data['APP_RETURNTIME']=strtotime($time2);
        
        
        if($Arch_util_app->create($data,1)) {
            $result =   $Arch_util_app->add();
            if($result) {
                $this->success('操作成功！','userHome');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($Arch_util_app->getError());
        }
    }

    public function CerificateQuery(){
        $CERTIFICATE=I("post.CERTIFICATE");
        $db=D('Arch_util_app');
        $result=$db->where(array('CERTIFICATE'=>$CERTIFICATE))->find();
        // var_dump($result);
        if(!$result)
            echo '<script>alert("没有查询到你输入的身份证号");</script>';
        else{
            if($result['APP_STATUS']=="通过")
                echo '<script>alert("你的申请已经通过");</script>';
            else if($result['APP_STATUS']=="拒绝")
                echo '<script>alert("你的申请没有通过");</script>';
        }
        $this->display('Query');
    }
}
header('Content-Type:text/html;charset=utf-8');
?>

