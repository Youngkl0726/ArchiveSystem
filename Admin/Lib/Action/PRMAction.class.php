<?php
/**
 * @Author: anchen
 * @Date:   2014-12-20 17:51:34
 * @Last Modified by:   anchen
 * @Last Modified time: 2015-01-16 17:32:18
 */
class PRMAction extends Action{   
    public function Index(){
        $this->display('PRM');
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

    public function FilesSubmit(){
          $db=new Model('Archive_info');
          $sta=1;
          // var_dump($sta);exit();
          import('ORG.Util.Page');// 导入分页类
          $count      = $db->where("ARCH_STATUS =".$sta)->count();
          $Page       = new Page($count,7);
          $show       = $Page->show();// 分页显示输出
          $fond=$db->where("ARCH_STATUS =".$sta)->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign('page',$show);
          $this->assign('list',$fond);
          $this->display('FilesSubmit');
    }

    public function tijiaoanjuan(){
        $id = I('get.ids');
        $ids = substr($id,1);
        // var_dump($id);exit();
        $data['ARCH_STATUS'] = 2;
        // var_dump($data['ARCH_STATUS']);exit();
        $user = M('Archive_info');
        $data['USER_ID']=$_COOKIE['USER_ID'];
        
        if($user->where(array('SEQID' => array('in',$ids)))->save($data)){
            //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data2['USER_ID']=$logInfo['USER_ID'];
            $data2['USER_NAME']=$logInfo['USER_NAME'];
            $data2['LOG_IP']=$logInfo['LOG_IP'];
            $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data2['EVENT_DESC']=$logInfo['USER_NAME']."提交了档号为“".$ids."”的档案";
            if($log->create($data2,1)) {
                $result =   $log->add();
            }
            $this->success("提交成功");
        }
    }

    public function archdelete(){
        $num = 0;
        $id = I('get.ids');
        $ids = substr($id, 1);
        $ids = explode(',',$ids);
        $total = count($ids);
        $ARCH_CODE = I('post.ARCH_CODE');
        // var_dump($ids);exit;
        $fond = M('Archive_info');
        foreach($ids as $key => $value){
            $fond->where("SEQID =".$value)->delete();
            $num++;
        }
        if($num == $total){
            //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data2['USER_ID']=$logInfo['USER_ID'];
            $data2['USER_NAME']=$logInfo['USER_NAME'];
            $data2['LOG_IP']=$logInfo['LOG_IP'];
            $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data2['EVENT_DESC']=$logInfo['USER_NAME']."删除了档号为“".$ARCH_CODE."”的档案";
            if($log->create($data2,1)) {
                $result =   $log->add();
            }
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function FilesrecordingAdd(){//href地址名与函数名一致
        $type=M('fullmodel');
        // $arr['a'] = 'aa';
        $arr=$type->select();
        // var_dump($arr);//打印
        $this->assign('arr',$arr);

        $kword=M('keyword');
        $keyw=$kword->select();
        // var_dump($keyw);
        $this->assign('keyw',$keyw);

        $media=M('media_type');
        $array=$media->select();
        $this->assign('array',$array);

        $room=M('storeroom');
        $store=$room->select();
        $this->assign('store',$store);
        
        $enti=M('entity');
        $ent=$enti->select();
        // var_dump($en);
        $this->assign('ent',$ent);

        $prep=M('preserv_peroid');
        $pret=$prep->select();
        $this->assign('pret',$pret);

        $this->display("FilesrecordingAdd");
    }

    public function FLAdd(){
        // 案卷级立卷
        $data['FULL_MODEL_ID'] = I("post.full_model_num");
        $data['ARCH_CODE'] = I("post.arch_code");
        $data['ARCH_NAME'] = I("post.arch_name");
        $data['KEYWORD_ID'] = I("post.keyword_num");
        $data['PRESERV_PEROID_ID'] = I("post.preserv_peroid_time");
        $data['QUANTITY_AND_UNIT'] = I("post.QUANTITY_AND_UNIT");
        $data['ARCH_TIME'] = I("post.ARCH_TIME");
        $data['ARCH_MEMO'] = I("post.ARCH_MEMO");
        $data['ARCH_SUMMARY'] = I("post.ARCH_SUMMARY");
        $data['MEDIA_TYPE_ID']=I("post.media_type_name");
        $data['STOREROOM_ID'] = I("post.storeroom_name");
        $data['MICROCOPY_CODE'] = I("post.MICROCOPY_CODE");
        $data['IS_PUBLIC'] = I("post.IS_PUBLIC");
        $data['ENTITY_ID'] = I("post.entity_name");
        $data['ARCH_STATUS']=1;
        //少档案状态
        // var_dump($data);exit;
        $fond = M('Archive_info');
        $t=M('Archive_info')->where(array('ARCH_CODE'=>$data['ARCH_CODE']))->select();
        if($t)
            $this->error('该档号已经存在！');
        else
        if($fond->create($data,1)){
            // var_dump($Fond);exit();
            $result=$fond->add();
            if($result){
                //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data2['USER_ID']=$logInfo['USER_ID'];
                $data2['USER_NAME']=$logInfo['USER_NAME'];
                $data2['LOG_IP']=$logInfo['LOG_IP'];
                $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data2['EVENT_DESC']=$logInfo['USER_NAME']."新增了档号为“".$data['ARCH_CODE']."”的档案";
                if($log->create($data2,1)) {
                    $result =   $log->add();
                }
                $this->success('添加成功！',"FilesSubmit");
            }else{
                $this->error('添加失败！');
            }
        }else{
            $this->error($fond->getError());
        }
    }

    public function FilesInformation2(){
        $id = I("get.id");
        $fond = M('Archive_info');
        $data = $fond->where("SEQID = ".$id)->find();
        $fm = M("Fullmodel")->field("FULL_MODEL_NUM")->where(array("FULL_MODEL_ID"=>$data['FULL_MODEL_ID']))->find();
        $data['FULL_MODEL_NUM'] = $fm['FULL_MODEL_NUM'];
        $kw=M('keyword')->field("KEYWORD")->where(array('KEYWORD_ID' =>$data['KEYWORD_ID']))->find();
        $data['KEYWORD']=$kw['KEYWORD'];
        $pret=M('preserv_peroid')->field("PRESERV_PEROID_NAME")->where(array("PRESERV_PEROID_ID"=>$data['PRESERV_PEROID_ID']))->find();
        $data['PRESERV_PEROID_NAME']=$pret['PRESERV_PEROID_NAME'];
        $metp=M('media_type')->field("MEDIA_TYPE_NAME")->where(array('MEDIA_TYPE_ID' =>$data['MEDIA_TYPE_ID']))->find();
        $data['MEDIA_TYPE_NAME']=$metp['MEDIA_TYPE_NAME'];
        $sroom=M('storeroom')->field("STOREROOM_NAME")->where(array("STOREROOM_ID"=>$data["STOREROOM_ID"]))->find();
        $data['STOREROOM_NAME']=$sroom['STOREROOM_NAME'];
        $en=M('entity')->field("ENTITY_NAME")->where(array('ENTITY_ID' =>$data['ENTITY_ID']))->find();
        $data['ENTITY_NAME']=$en['ENTITY_NAME'];
//将表中id字段值换为其他值输出
        // var_dump($data);
        $this->assign("data",$data);
        
        $this->display("FilesInformation2");
    }


    public function FilesModification(){
        $id = I('get.id');
        $fond = M('Archive_info');
        $data = $fond->where("SEQID = ".$id)->find();
        $fm = M("Fullmodel")->field("FULL_MODEL_NUM")->where(array("FULL_MODEL_ID"=>$data['FULL_MODEL_ID']))->find();
        $data['FULL_MODEL_NUM'] = $fm['FULL_MODEL_NUM'];
        $kw=M('keyword')->field("KEYWORD")->where(array('KEYWORD_ID' =>$data['KEYWORD_ID']))->find();
        $data['KEYWORD']=$kw['KEYWORD'];
        $pret=M('preserv_peroid')->field("PRESERV_PEROID_NAME")->where(array("PRESERV_PEROID_ID"=>$data['PRESERV_PEROID_ID']))->find();
        $data['PRESERV_PEROID_NAME']=$pret['PRESERV_PEROID_NAME'];
        $metp=M('media_type')->field("MEDIA_TYPE_NAME")->where(array('MEDIA_TYPE_ID' =>$data['MEDIA_TYPE_ID']))->find();
        $data['MEDIA_TYPE_NAME']=$metp['MEDIA_TYPE_NAME'];
        $sroom=M('storeroom')->field("STOREROOM_NAME")->where(array("STOREROOM_ID"=>$data["STOREROOM_ID"]))->find();
        $data['STOREROOM_NAME']=$sroom['STOREROOM_NAME'];
        $en=M('entity')->field("ENTITY_NAME")->where(array('ENTITY_ID' =>$data['ENTITY_ID']))->find();
        $data['ENTITY_NAME']=$en['ENTITY_NAME'];
        // var_dump($data);

        $type=M('fullmodel');
        $arr=$type->select();
        $this->assign('arr',$arr);

        $kword=M('keyword');
        $keyw=$kword->select();
        // var_dump($keyw);
        $this->assign('keyw',$keyw);

        $media=M('media_type');
        $array=$media->select();
        $this->assign('array',$array);

        $room=M('storeroom');
        $store=$room->select();
        $this->assign('store',$store);
        
        $enti=M('entity');
        $ent=$enti->select();
        // var_dump($en);
        $this->assign('ent',$ent);

        $prep=M('preserv_peroid');
        $pret=$prep->select();
        $this->assign('pret',$pret);
        
        // var_dump($data);
        $this->assign("data",$data);
        $this->display("FilesModification");

    }


    public function FileSave(){
        $data['SEQID']=I('post.ids');
        $data['FULL_MODEL_ID']=I('post.full_model_num');
        $data['ARCH_CODE']=I('post.arch_code');
        $data['ARCH_NAME']=I('post.arch_name');
        $data['KEYWORD_ID']=I('post.keyword_num');
        $data['PRESERV_PEROID_ID']=I('preserv_peroid_time');
        $data['MEDIA_TYPE_ID']=I('post.media_type_name');
        $data['QUANTITY_AND_UNIT']=I('post.QUANTITY_AND_UNIT');
        $data['ARCH_MEMO']=I('post.ARCH_MEMO');
        $data['ARCH_SUMMARY']=I('post.ARCH_SUMMARY');
        $data['STOREROOM_ID']=I('post.storeroom_name');
        $data['MICROCOPY_CODE']=I('post.MICROCOPY_CODE');
        $data['IS_PUBLIC']=I('post.select4');
        $data['ENTITY_ID']=I('post.entity_name');
        $data['ARCH_TIME']=I('post.ARCH_TIME');
        $Fond = M('Archive_info');
        $res = M('Archive_info')->where(array('ARCH_CODE'=>array('eq',$data['ARCH_CODE']),"SEQID"=>array('neq',$data['SEQID']))
        )->count();
        if($res){
            $this->error("该档号已经存在！");
        }
        $res2 = M('Archive_info')->where(array('ARCH_NAME'=>array('eq',$data['ARCH_NAME']),"SEQID"=>array('neq',$data['SEQID']))
        )->count();
        if($res2)
        {
             $this->error("该档案题名已经存在！");
        }
        $Fond->save($data);
        //添加管理日志
        $log=M('Log');
        $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
        $data2['USER_ID']=$logInfo['USER_ID'];
        $data2['USER_NAME']=$logInfo['USER_NAME'];
        $data2['LOG_IP']=$logInfo['LOG_IP'];
        $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
        $data2['EVENT_DESC']=$logInfo['USER_NAME']."修改了档号为“".$data['ARCH_CODE']."”的档案";
        if($log->create($data2,1)) {
            $result =   $log->add();
        }
        $this->success("修改成功！","FilesInformation2/id/{$data[SEQID]}");
    }

    public function FileList(){
        $id = I('get.id');
        // var_dump($id);
        $fl=M('File_info');
        $data = $fl->where("SEQID = ".$id)->select();
        // var_dump($data);
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->display('FileList');
    }

    public function filedelete(){//删除卷内文件
        //删除全宗方法
        $num = 0;
        $id = I('get.ids');
        $ids = substr($id, 1);
        $ids = explode(',',$ids);
        $total = count($ids);
        $FILE_CODE=I('post.FILE_CODE');
        // var_dump($ids);exit;
        $fond = M('File_info');
        foreach($ids as $key => $value){
            $fond->where("FILE_ID =".$value)->delete();
            $num++;
        }
        if($num == $total){
            //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data2['USER_ID']=$logInfo['USER_ID'];
            $data2['USER_NAME']=$logInfo['USER_NAME'];
            $data2['LOG_IP']=$logInfo['LOG_IP'];
            $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data2['EVENT_DESC']=$logInfo['USER_NAME']."删除了文件编号为“".$FILE_CODE."”的文件";
            if($log->create($data2,1)) {
                $result =   $log->add();
            }
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function wenjianAdd(){
        $id=I('post.ids');
        // var_dump($id);
        $this->assign('id',$id);
        $this->display('FilesAdd');
    }//传递id值

    public function fileadd(){//名字不区分大小写？
        $data['SEQID']=I('post.ids');
        $data['FILE_CODE']=I('post.FILE_CODE');
        $data['RESP_HOLDER']=I('post.RESP_HOLDER');
        $data['DOC_NAME']=I('post.DOC_NAME');
        $data['ATTACHMENT']=I('post.ATTACHMENT');
        $data['CONTENT']=I('post.CONTENT');

        $fl=D('FileInfo');
        if($fl->create($data,1)){
            $result=$fl->add();
            if($result){
                //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data2['USER_ID']=$logInfo['USER_ID'];
                $data2['USER_NAME']=$logInfo['USER_NAME'];
                $data2['LOG_IP']=$logInfo['LOG_IP'];
                $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data2['EVENT_DESC']=$logInfo['USER_NAME']."增加了文件编号为“".$data['FILE_CODE']."”的文件";
                if($log->create($data2,1)) {
                    $result =   $log->add();
                }
                $this->success('添加成功！',"FileList/id/{$data[SEQID]}");
            }else{
                $this->error('添加失败！');
            }
        }else{
            $this->error($fl->getError());
        }
    }

    public function FileInformation(){//卷内文件信息输出
        $id = I("get.id");
        // var_dump($id); exit();
        $fond = M('File_info');
        $data = $fond->where("FILE_ID = ".$id)->find();
        
        // var_dump($data);exit();
        $this->assign("data",$data);


        $this->display("FileInformation");
    }

    public function WenjianModification(){
        $id = I('get.id');
        // var_dump($id);
        $fond =M('File_info');
        $data = $fond->where("FILE_ID = ".$id)->find();

        // var_dump($data);

        $this->assign("data",$data);
        $this->display("WenjianModification");

    }

    public function WenjianSave(){//修改卷内文件信息保存
        $data['FILE_ID']=I('post.ids');
        $data['FILE_CODE']=I('post.FILE_CODE');
        $data['RESP_HOLDER']=I('post.RESP_HOLDER');
        $data['DOC_NAME']=I('post.DOC_NAME');
        $data['ATTACHMENT']=I('post.ATTACHMENT');
        $data['CONTENT']=I('post.CONTENT');
        $data['SEQID']=I('get.id');
// var_dump($data);exit();

        $Fond = M('File_info');
        $res = M('File_info')->where(array('FILE_CODE'=>array('eq',$data['FILE_CODE']),"FILE_ID"=>array('neq',$data['FILE_ID']))
        )->count();
        if($res){
            $this->error("该文件编号已经存在！");
        }
        $Fond->save($data);
            //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data2['USER_ID']=$logInfo['USER_ID'];
            $data2['USER_NAME']=$logInfo['USER_NAME'];
            $data2['LOG_IP']=$logInfo['LOG_IP'];
            $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data2['EVENT_DESC']=$logInfo['USER_NAME']."增加了文件编号为“".$data['FILE_CODE']."”的文件";
            if($log->create($data2,1)) {
                $result =   $log->add();
            }
            $this->success('修改成功！',U("FileInformation?id=$data[FILE_ID]"));
        
    }
    public function CheckStatus(){
        $id=$_COOKIE['USER_ID'];
        $db=M('archive_info');
        // $data=$fond->where("USER_ID =".$id)->select();
        import('ORG.Util.Page');// 导入分页类
        $count      = $db->where("USER_ID =".$id)->count();
        $Page       = new Page($count,7);
        $show       = $Page->show();// 分页显示输出
        $fond=$db->where("USER_ID =".$id)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$fond);
        $this->display("CheckStatus");
    }


}
?>