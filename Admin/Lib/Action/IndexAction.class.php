<?php
class IndexAction extends Action{
    public function Index(){
    	$this->display();
    }
    public function login(){
    	if(!IS_POST) 
		  halt('页面错误');
		
		$username=I('USER_NAME');
		$pwd=I('pwd');
		
		$db=new Model('User');
        if(session('verify') != md5($_POST['verify'])){
            $this->error('验证码错误！');
        }
		$User=$db->where(array('USER_NAME'=>I('USER_NAME')))->find();
		if(!$User||$User['PASSWORD']!=$pwd){
			$this->error('用户名或密码错误');
		}
		$_SESSION['username']=$User['USER_NAME'];
        
        //添加日志信息
        $log=M('Log');
        $data['USER_ID']=$User['USER_ID'];
        cookie('USER_ID',$User['USER_ID']);
        $data['USER_NAME']=$User['USER_NAME'];
        $data['LOG_IP']=get_client_ip();
        $data['EVENT_TIME']=time();
        cookie('EVENT_TIME',$data['EVENT_TIME']);
        $data['EVENT_DESC']=$User['USER_NAME']."登录了系统";
        if($log->create($data,1)) {
            $result =   $log->add();
        }

        if($User[GROUP_ID]=="1")
		  $this->redirect("./Super/force");
        else if($User[GROUP_ID]=="2")
            $this->redirect('./Arch/Arch');
        else if($User[GROUP_ID]=="3")
            $this->redirect('./PRM/PRM'); 
        else if($User[GROUP_ID]=="4")
            $this->redirect('./Manger/manger'); 
    }
    public function verify(){
        import('ORG.Util.Image');
        Image::buildImageVerify();
    }
    public function pwd(){
        $USER_NAME=I('post.USER_NAME');
        $email=I('email');
        $newPwd=I('newPwd');

        $db=M('User');
        $data['PASSWORD']=$newPwd;
        $user=$db->where(array('USER_NAME'=>$USER_NAME))->find();
        if($user['EMAIL']==$email)
            $result = $db->where(array('USER_NAME'=>$USER_NAME))->save($data);
        if($result){
            echo '<script>alert("修改成功");</script>';
            echo '<script>window.close();</script>';
        }
        else
            echo '<script>alert("修改失败");</script>';

    }


    
}
header('Content-Type:text/html;charset=utf-8');
?>