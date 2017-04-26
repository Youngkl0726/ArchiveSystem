<?php
class SuperAction extends CommonAction{
    public function force(){
        $this->display('force');
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
        session_unset();
        session_destroy();
        cookie('EVENT_TIME',null);
        cookie('USER_ID',null);
        $this->redirect('./Index/Index');
    }
    public function LogManagement(){
        $db=M('Log');
        import('ORG.Util.Page');// 导入分页类
        $count      = $db->where(array('USER_ID'=>$_COOKIE['USER_ID']))->count();
        $Page       = new Page($count,7);
        $show       = $Page->show();// 分页显示输出
        $data=$db->where(array('USER_ID'=>$_COOKIE['USER_ID']))->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('LogList',$data);
        $this->assign('page',$show);
        $this->display('LogManagement');
    }

    public function RightsAssignment(){
        $prep=M('group');
        $s=1;
        $pret=$prep->where('GROUP_ID !='.$s)->select();
        $this->assign('pret',$pret);
        $department=M('department');
        $depart=$department->select();
        $this->assign('depart',$depart);
        $this->display("RightsAssignment");

    }

    public function RightsList(){
          $db=M('User');
          import('ORG.Util.Page');// 导入分页类
          $sroom=M('User')->field("GROUP_ID")->where(array("STOREROOM_ID"=>$data["STOREROOM_ID"]))->find();
          $count      = $db->count();
          $Page       = new Page($count,10);
          $show       = $Page->show();// 分页显示输出
          $user=$db->limit($Page->firstRow.','.$Page->listRows)->select();
          $result = M()->table('t_user,t_group')->where('t_user.GROUP_ID = t_group.GROUP_ID')->select();
          $this->assign('list',$result);
          $this->assign('page',$show);
          $this->display('RightsList'); 
    }

    public function delete(){
        // $id = I('post.user');
        $id = I('get.idss');
        $ids = implode(',',$id);
        $user = M('User');
        $ex=$user->where(array('USER_ID' => array('in',$id)))->find();
        $result1=$user->where(array('USER_ID' => array('in',$id)))->delete();
        if($result1){
            //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data['USER_ID']=$logInfo['USER_ID'];
            $data['USER_NAME']=$logInfo['USER_NAME'];
            $data['LOG_IP']=$logInfo['LOG_IP'];
            $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data['EVENT_DESC']=$logInfo['USER_NAME']."删除了用户".$ex['USER_NAME']."的数据";
            if($log->create($data,1)) {
                $result =   $log->add();
            }

            $this->success("删除成功");
        }
    }

    public function change(){
        $id = I('post.ids');
        $ids = substr($id,1);
        $data['GROUP_ID'] = I('post.GRUOP_ID');
        $user = M('User');
        $ex=$user->where(array('USER_ID' => array('in',$ids)))->find();
        $result1=$user->where(array('USER_ID' => array('in',$ids)))->save($data);
        if($result1){

            //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data['USER_ID']=$logInfo['USER_ID'];
            $data['USER_NAME']=$logInfo['USER_NAME'];
            $data['LOG_IP']=$logInfo['LOG_IP'];
            $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data['EVENT_DESC']=$logInfo['USER_NAME']."修改了用户".$ex['USER_NAME']."的数据";
            if($log->create($data,1)) {
                $result =   $log->add();
            }

            $this->success("修改成功");
        }
    }

    public function insert(){
        $User   =   D('User');
        if($User->create($_POST,1)) {
            $result =   $User->add();
            if($result) {
            //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data['USER_ID']=$logInfo['USER_ID'];
            $data['USER_NAME']=$logInfo['USER_NAME'];
            $data['LOG_IP']=$logInfo['LOG_IP'];
            $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data['EVENT_DESC']=$logInfo['USER_NAME']."添加了用户".$_POST['USER_NAME']."的数据";
            if($log->create($data,1)) {
                $result =   $log->add();
            }

                $this->success('操作成功！');
            }else{
                $this->error('写入错误！');
            }
        }else{
            $this->error($User->getError());
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


}


?>