<?php

class ArchAction extends Action{
    public function Arch(){
        $this->display('Arch');
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

   
    public function FondsManagement(){
          $db=new Model('fullmodel');
          // $fond=$db->select();
          import('ORG.Util.Page');// 导入分页类
          $count      = $db->count();
          $Page       = new Page($count,7);
          $show       = $Page->show();// 分页显示输出
          $fond=$db->limit($Page->firstRow.','.$Page->listRows)->select();
          $this->assign('page',$show);
          $this->assign('list',$fond);
          $this->display('FondsManagement');
    }

    public function Add(){
        // 添加全宗方法
            $Fond = D('Fullmodel');
            $id=I('post.FULL_MODEL_NUM');
            $name=I('post.FULL_MODEL_NAME');
            if($Fond->create($_POST,1)){
                $result=$Fond->add();
                if($result){
                    //添加管理日志
                    $log=M('Log');
                    $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                    $data2['USER_ID']=$logInfo['USER_ID'];
                    $data2['USER_NAME']=$logInfo['USER_NAME'];
                    $data2['LOG_IP']=$logInfo['LOG_IP'];
                    $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                    $data2['EVENT_DESC']=$logInfo['USER_NAME']."添加了全宗编号为“".$id."”".",全宗名称为“".$name."”的全宗";
                    if($log->create($data2,1)) {
                        $result =   $log->add();
                    }

                    $this->success('操作成功！',"FondsManagement");
                }else{
                    $this->error('写入错误！');
                }
            }else{
                $this->error($Fond->getError());
            }

    }

    public function delete(){
        //删除全宗方法
        $num = 0;
        $id = I('get.ids');
        $ids = substr($id, 1);
        $ids = explode(',',$ids);
        $total = count($ids);
        $FULL_MODEL_NUM=I('post.FULL_MODEL_NUM');
        // var_dump($ids);exit;
        $fond = M('Fullmodel');
        foreach($ids as $key => $value){
            $fond->where("FULL_MODEL_ID =".$value)->delete();
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
            $data2['EVENT_DESC']=$logInfo['USER_NAME']."删除了全宗编号为“".$FULL_MODEL_NUM."”的全宗";
            if($log->create($data2,1)) {
                $result =   $log->add();
            }
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
        
    }

    public function FondsInformation(){
        $id = I("get.id");
        $fond = M('Fullmodel');
        $data = $fond->where("FULL_MODEL_ID = ".$id)->find();
        $this->assign("data",$data);
        $this->display("FondsInformation");
    }


    public function FondsModification(){
        $id = I('get.id');
        // var_dump($id);
        $fond =M('Fullmodel');
        $data = $fond->where("FULL_MODEL_ID = ".$id)->find();
        $this->assign("data",$data);
        $this->display("FondsModification");

    }

    public function FondsSave(){
        // $id = I('post.ids');
        $data['FULL_MODEL_ID'] = I('post.ids');
        $data['FULL_MODEL_NUM'] = I("post.fullmodelnum");
        $data['FULL_MODEL_NAME'] = I("post.fullmodelname");
        $data['ARCH_SUMMARY'] = I("post.archsummary");
        $data['ARCH_CONTENT'] = I("post.archcontent");
        $data['BEGIN_TIME'] = I("post.begintime");
        $data['END_TIME'] = I("post.endtime");
        $data['FULL_MODEL_MEMO'] = I("post.fullmodelmemo");
        $data['SUM1'] = I("post.sum1");
        $data['SUM2'] = I("post.sum2");
        // var_dump($id);exit;


        $Fond = M('Fullmodel');
        

        $res = M('Fullmodel')->where(array('FULL_MODEL_NUM'=>array('eq',$data['FULL_MODEL_NUM']),"FULL_MODEL_ID"=>array('neq',$data['FULL_MODEL_ID']))
        )->count();

        if($res){
            $this->error("该全宗编号已经存在！");
        }
        $res2 = M('Fullmodel')->where(array('FULL_MODEL_NAME'=>array('eq',$data['FULL_MODEL_NAME']),"FULL_MODEL_ID"=>array('neq',$data['FULL_MODEL_ID']))
        )->count();
        if($res2)
        {
             $this->error("该全宗名称已经存在！");
        }
        $Fond->save($data);
        //添加管理日志
        $log=M('Log');
        $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
        $data2['USER_ID']=$logInfo['USER_ID'];
        $data2['USER_NAME']=$logInfo['USER_NAME'];
        $data2['LOG_IP']=$logInfo['LOG_IP'];
        $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
        $data2['EVENT_DESC']=$logInfo['USER_NAME']."修改了全宗编号为“".$data['FULL_MODEL_ID']."”的全宗";
        if($log->create($data2,1)) {
            $result =   $log->add();
        }
        $this->success("修改成功！","FondsManagement");
        
        // $fond =M('Fullmodel');
        // if($fond->where("FULL_MODEL_ID = ".$id)->save($data)){
        //     $this->success("修改成功","FondsManagement");
        // }else{
        //     $this->error("修改失败");
        // }
    }

    public function FilesList(){
        if(IS_POST){
            $gongkai = I("post.gongkai");
            $entity_name =I("post.entity_name");
            $db=new Model('Archive_info');
            $sql = " 1 = 1 ";
            if($gongkai != '2'){
                $sql .= " and IS_PUBLIC = ".$gongkai;
            }
            if($entity_name != '100'){
                $sql .= " and ENTITY_ID = ".$entity_name;
            }
            // $data = $Archive_info->where($sql)->select();
            // $this->assign('list',$data);

            $enti=M('entity');
            $ent=$enti->select();
            // var_dump($en);
            $this->assign('ent',$ent);
            
            import('ORG.Util.Page');// 导入分页类
            $count      = $db->where($sql)->count();
            $Page       = new Page($count,7);
            $show       = $Page->show();// 分页显示输出
            $fond=$db->where($sql)->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('page',$show);
            $this->assign('list',$fond);

            $this->display('FilesList');
        }else{
            $db=new Model('Archive_info');
            $sta=3;
            $arch=$db->select();
            $this->assign('list',$arch);

            $enti=M('entity');
            $ent=$enti->select();
            $this->assign('ent',$ent);
            
            import('ORG.Util.Page');// 导入分页类
            $count      = $db->where("ARCH_STATUS =".$sta)->count();
            $Page       = new Page($count,7);
            $show       = $Page->show();// 分页显示输出
            $fond=$db->where("ARCH_STATUS =".$sta)->limit($Page->firstRow.','.$Page->listRows)->select();
            $this->assign('page',$show);
            $this->assign('list',$fond);


            $this->display('FilesList');
        }
        
    }

    
    public function archdelete(){
        $num = 0;
        $id = I('get.ids');
        $ids = substr($id, 1);
        $ids = explode(',',$ids);
        $total = count($ids);
        $ARCH_CODE=I('post.ARCH_CODE');
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

    public function KeywordManagement(){
        $db=new Model('keyword');
        
        import('ORG.Util.Page');// 导入分页类
        $count      = $db->count();
        $Page       = new Page($count,7);
        $show       = $Page->show();// 分页显示输出
        $fond=$db->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$fond);
        $this->display('KeywordManagement');
    }

    public function keyworddelete(){
        //删除主题词
        $num = 0;
        $id = I('get.ids');
        $ids = substr($id, 1);
        $ids = explode(',',$ids);
        $total = count($ids);
        $KEYWORD_NUM=I('post.KEYWORD_NUM');
        // var_dump($ids);exit;
        $fond = M('Keyword');
        foreach($ids as $key => $value){
            $fond->where("KEYWORD_ID=".$value)->delete();
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
            $data2['EVENT_DESC']=$logInfo['USER_NAME']."删除了主题词编号为“".$KEYWORD_NUM."”的主题词";
            if($log->create($data2,1)) {
                $result =   $log->add();
            }
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function kwordAdd(){
            $Fond = D('Keyword');
            $KEYWORD_NUM=I('post.KEYWORD_NUM');
            if($Fond->create($_POST,1)){
                 // var_dump($Fond);exit();
                $result=$Fond->add();
                if($result){
                    //添加管理日志
                    $log=M('Log');
                    $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                    $data2['USER_ID']=$logInfo['USER_ID'];
                    $data2['USER_NAME']=$logInfo['USER_NAME'];
                    $data2['LOG_IP']=$logInfo['LOG_IP'];
                    $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                    $data2['EVENT_DESC']=$logInfo['USER_NAME']."添加了主题词编号为“".$KEYWORD_NUM."”的主题词";
                    if($log->create($data2,1)) {
                        $result =   $log->add();
                    }
                    $this->success('操作成功！',"KeywordManagement");
                }else{
                    $this->error('写入错误！');
                }
            }else{
                $this->error($Fond->getError());
            }
    }

    public function StoreroomManagement(){
        $db=new Model('storeroom');
        import('ORG.Util.Page');// 导入分页类
        $count      = $db->count();
        $Page       = new Page($count,7);
        $show       = $Page->show();// 分页显示输出
        $fond=$db->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$fond);
        $this->display('StoreroomManagement');
    }

    public function Storeroomdelete(){
        $num = 0;
        $id = I('get.ids');
        $ids = substr($id, 1);
        $ids = explode(',',$ids);
        $total = count($ids);
        $STOREROOM_NAME=I('post.STOREROOM_NAME');
        // var_dump($ids);exit;
        $fond = M('storeroom');
        foreach($ids as $key => $value){
            $fond->where("STOREROOM_ID=".$value)->delete();
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
            $data2['EVENT_DESC']=$logInfo['USER_NAME']."删除了库房名称为“".$STOREROOM_NAME."”的库房";
            if($log->create($data2,1)) {
                $result =   $log->add();
            }
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function sroomAdd(){
            $Fond = D('Storeroom');
            $STOREROOM_NAME=I('post.STOREROOM_NAME');
            // var_dump($Fond);exit();
            if($Fond->create($_POST,1)){
                 // var_dump($Fond);exit();
                $result=$Fond->add();
                if($result){
                    //添加管理日志
                    $log=M('Log');
                    $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                    $data2['USER_ID']=$logInfo['USER_ID'];
                    $data2['USER_NAME']=$logInfo['USER_NAME'];
                    $data2['LOG_IP']=$logInfo['LOG_IP'];
                    $data2['EVENT_TIME']=$logInfo['EVENT_TIME'];
                    $data2['EVENT_DESC']=$logInfo['USER_NAME']."添加了库房名称为“".$STOREROOM_NAME."”的库房";
                    if($log->create($data2,1)) {
                        $result =   $log->add();
                    }

                    $this->success('操作成功！',"StoreroomManagement");
                }else{
                    $this->error('写入错误！');
                }
            }else{
                $this->error($Fond->getError());
            }
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
        $data['ARCH_STATUS']=3;
        //少档案状态
        // var_dump($data);exit;
        $fond = D('ArchiveInfo');
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
                $data2['EVENT_DESC']=$logInfo['USER_NAME']."新增了全宗编号为“".$data['FULL_MODEL_ID']."”,档号为“".$data['ARCH_CODE']."”的档案";
                if($log->create($data2,1)) {
                    $result =   $log->add();
                }
                $this->success('添加成功！',"FilesList");
            }else{
                $this->error('添加失败！');
            }
        }else{
            $this->error($fond->getError());
        }
    }

    public function FilesInformation(){
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


        $this->display("FilesInformation");
    }

     public function Filesrecording2(){//href地址名与函数名一致
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

        $tp=M('cust_info');
        $temp=$tp->select();
        $this->assign('temp',$temp);

        $this->display("Filesrecording2");
    }
    

    public function FileModification(){
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
        $this->display("FileModification");

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
// var_dump($data);exit();

        $Fond = M('Archive_info');
        $res = M('Archive_info')->where(array('ARCH_CODE'=>array('eq',$data['ARCH_CODE']),"SEQID"=>array('neq',$data['SEQID']))
        )->count();
        // var_dump($res);exit();
        if($res){
            $this->error("该档号已经存在！");
        }
        // $res2 = M('Archive_info')->where(array('ARCH_NAME'=>array('eq',$data['ARCH_NAME']),"SEQID"=>array('neq',$data['SEQID']))
        // )->count();
        // if($res2)
        // {
        //      $this->error("该档案题名已经存在！");
        // }
        $Fond->save($data);
        //添加管理日志
        $log=M('Log');
        $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
        $data['USER_ID']=$logInfo['USER_ID'];
        $data['USER_NAME']=$logInfo['USER_NAME'];
        $data['LOG_IP']=$logInfo['LOG_IP'];
        $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
        $data['EVENT_DESC']=$logInfo['USER_NAME']."修改了档号为“".$data['ARCH_CODE']."”的文件";
        if($log->create($data,1)) {
            $result =   $log->add();
        }

        $this->success("修改成功！","FilesInformation/id/{$data[SEQID]}");

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

    public function filedelete(){
        //删除全宗方法
        $num = 0;
        $id = I('get.ids');
        $ids = substr($id, 1);
        $ids = explode(',',$ids);
        $total = count($ids);
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
            $data['USER_ID']=$logInfo['USER_ID'];
            $data['USER_NAME']=$logInfo['USER_NAME'];
            $data['LOG_IP']=$logInfo['LOG_IP'];
            $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data['EVENT_DESC']=$logInfo['USER_NAME']."删除了文件编号为“".$ids."”的文件";
            if($log->create($data,1)) {
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
                $data['USER_ID']=$logInfo['USER_ID'];
                $data['USER_NAME']=$logInfo['USER_NAME'];
                $data['LOG_IP']=$logInfo['LOG_IP'];
                $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data['EVENT_DESC']=$logInfo['USER_NAME']."新增了文件编号为“".$data['FILE_CODE']."”的文件";
                if($log->create($data,1)) {
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

    public function FilesModification(){
        $id = I('get.id');
        // var_dump($id);
        $fond =M('File_info');
        $data = $fond->where("FILE_ID = ".$id)->find();

        $this->assign("data",$data);
        $this->display("FilesModification");

    }

    public function WenjianSave(){//修改卷内文件信息保存
        $data['FILE_ID']=I('post.ids');
        $data['FILE_CODE']=I('post.FILE_CODE');
        $data['RESP_HOLDER']=I('post.RESP_HOLDER');
        $data['DOC_NAME']=I('post.DOC_NAME');
        $data['ATTACHMENT']=I('post.ATTACHMENT');
        $data['CONTENT']=I('post.CONTENT');
        // $data['SEQID']=I('get.id');
        $data['SEQID']=I('post.idss');
// var_dump($data);exit();

        $Fond = M('File_info');
        $res = M('File_info')->where(array('FILE_CODE'=>array('eq',$data['FILE_CODE']),"FILE_ID"=>array('neq',$data['FILE_ID']))
        )->count();
        // var_dump($res);exit();
        if($res){
            $this->error("该文件编号已经存在！");
        }
        $Fond->save($data);
        // if($Fond->save($data)){
        // //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data['USER_ID']=$logInfo['USER_ID'];
                $data['USER_NAME']=$logInfo['USER_NAME'];
                $data['LOG_IP']=$logInfo['LOG_IP'];
                $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data['EVENT_DESC']=$logInfo['USER_NAME']."修改了文件编号为“".$data['FILE_CODE']."”的文件";
                if($log->create($data,1)) {
                    $result =   $log->add();
                }
            $this->success('修改成功！',"FileInformation/id/{$data['FILE_ID']}");
        // }
    }
    public function DepartmentOfAdvanceFiles(){
        $db=new Model('Archive_info');
        $sta=2;
        import('ORG.Util.Page');// 导入分页类
        $count      = $db->where("ARCH_STATUS =".$sta)->count();
        $Page       = new Page($count,7);
        $show       = $Page->show();// 分页显示输出
        $fond=$db->where("ARCH_STATUS =".$sta)->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$fond);
        $this->display('DepartmentOfAdvanceFiles');
    }

    public function Check(){//卷内文件信息输出
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


        $type=M('fullmodel');
        $arr=$type->select();
        $this->assign('arr',$arr);

        $kword=M('keyword');
        $keyw=$kword->select();
        $this->assign('keyw',$keyw);

        $media=M('media_type');
        $array=$media->select();
        $this->assign('array',$array);

        $room=M('storeroom');
        $store=$room->select();
        $this->assign('store',$store);
        
        $enti=M('entity');
        $ent=$enti->select();
        $this->assign('ent',$ent);

        $prep=M('preserv_peroid');
        $pret=$prep->select();
        $this->assign('pret',$pret);
        
        $this->assign("data",$data);
        $this->assign('id',$id);
        $this->display("Check");
    }

    public function Accept(){
        $id=I('get.id');
        $fond =M('Archive_info');
        // $data = $fond->where("SEQID = ".$id)->find();
        $data['ARCH_STATUS']=3;
        if($fond->where('SEQID=' .$id)->save($data)){
            // var_dump($user); exit();
            // //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data['USER_ID']=$logInfo['USER_ID'];
            $data['USER_NAME']=$logInfo['USER_NAME'];
            $data['LOG_IP']=$logInfo['LOG_IP'];
            $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data['EVENT_DESC']=$logInfo['USER_NAME']."通过了档号为“".$id."”的案卷审核";
            if($log->create($data,1)) {
                $result =   $log->add();
            }
            $this->success("通过审核",'__URL__/DepartmentOfAdvanceFiles');
        }
        // var_dump($data);exit();
        // $this->display('DepartmentOfAdvanceFiles');
    }

    public function RefuseFiles(){
        $id=I('get.id');
        // var_dump($id);
        $this->assign('id',$id);
        $this->display('RefuseFiles');
    }

    public function ModifyAdvice(){
        $id=I('post.ids');
        // var_dump($id); exit();
        $fond=M('Archive_info');
        $data['REFUSE_TITLE']=I('post.REFUSE_TITLE');
        $data['MODIFY_DEC']=I('post.MODIFY_DEC');
        $data['ARCH_STATUS']=4;
        if($fond->where('SEQID=' .$id)->save($data)){
            // //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data['USER_ID']=$logInfo['USER_ID'];
            $data['USER_NAME']=$logInfo['USER_NAME'];
            $data['LOG_IP']=$logInfo['LOG_IP'];
            $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data['EVENT_DESC']=$logInfo['USER_NAME']."拒绝了档号为“".$id."”的案卷审核";
            if($log->create($data,1)) {
                $result =   $log->add();
            }
            $this->success("提交成功",'__URL__/DepartmentOfAdvanceFiles');
        }
    }

    public function Daishendanganwenjian(){
        $id=I('get.id');
        // var_dump($id); exit();
        $fl=M('File_info');
        $data = $fl->where("SEQID = ".$id)->select();
        // var_dump($data);
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->display("Daishendanganwenjian");
    }

    public function Daishenwenjianxinxi(){
        $id = I("get.id");
        // var_dump($id); exit();
        $fond = M('File_info');
        $data = $fond->where("FILE_ID = ".$id)->find();
        
        // var_dump($data);exit();
        $this->assign("data",$data);


        $this->display('Daishenwenjianxinxi');
    }

    public function TemplateManagement(){
        $db=new Model('Cust_info');
        import('ORG.Util.Page');// 导入分页类
        $count      = $db->count();
        $Page       = new Page($count,7);
        $show       = $Page->show();// 分页显示输出
        $fond=$db->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('page',$show);
        $this->assign('list',$fond);
        $this->display('TemplateManagement');
    }

    public function Templatedelete(){
        $num = 0;
        $id = I('get.ids');
        $ids = substr($id, 1);
        $ids = explode(',',$ids);
        $t=substr($id,1);
        $data=M('cust_info')->where(array('TEMPLATE_ID'=>$t))->find();
        $total = count($ids);
        $fond = M('cust_info');
        foreach($ids as $key => $value){
            $fond->where("TEMPLATE_ID =".$value)->delete();
            $num++;
        }
        if($num == $total){
            // //添加管理日志
            $log=M('Log');
            $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
            $data['USER_ID']=$logInfo['USER_ID'];
            $data['USER_NAME']=$logInfo['USER_NAME'];
            $data['LOG_IP']=$logInfo['LOG_IP'];
            $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
            $data['EVENT_DESC']=$logInfo['USER_NAME']."删除了模版编号为“".$data['TEMPLATE_NUM']."”的模版";
            if($log->create($data,1)) {
                $result =   $log->add();
            }
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
    }

    public function TemplateAdd(){//href地址名与函数名一致
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

        $this->display("TemplateAdd");
    }
    
    public function TAdd(){
        // 添加模版
        $data['TEMPLATE_NUM']=I("post.TEMPLATE_NUM");
        $data['TEMPLATE_NAME']=I("post.TEMPLATE_NAME");
        $data['FULL_MODEL_ID'] = I("post.full_model_num");
        // $data['ARCH_CODE'] = I("post.arch_code");
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
        // var_dump($data);exit();
        $fond = M('cust_info');
        if($fond->create($data,1)){
            // var_dump($Fond);exit();
            $result=$fond->add();
            if($result){
                // //添加管理日志
                $log=M('Log');
                $logInfo=$log->where(array('EVENT_TIME' => $_COOKIE['EVENT_TIME']))->find();
                $data['USER_ID']=$logInfo['USER_ID'];
                $data['USER_NAME']=$logInfo['USER_NAME'];
                $data['LOG_IP']=$logInfo['LOG_IP'];
                $data['EVENT_TIME']=$logInfo['EVENT_TIME'];
                $data['EVENT_DESC']=$logInfo['USER_NAME']."增加了模版编号为“".$data['TEMPLATE_NUM']."”的模版";
                if($log->create($data,1)) {
                    $result =   $log->add();
                }
                $this->success('添加成功！',"TemplateManagement");
            }else{
                $this->error('添加失败！');
            }
        }else{
            $this->error($fond->getError());
        }
    }

    public function TemplateFilesInformation(){
        $id = I("get.id");
        // var_dump($id);exit();
        $fond = M('cust_info');
        $data = $fond->where("TEMPLATE_ID = ".$id)->find();
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


        $this->display("TemplateFilesInformation");
    }

    public function TempInsert(){
        $id = I('post.TEMPLATE_ID');
        // var_dump($id);exit();
        $fond = M('cust_info');
        $data = $fond->where("TEMPLATE_ID = ".$id)->find();
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
        
        // var_dump($data);exit();
        $this->assign("data",$data);
        $this->display("Filesrecording2");
    }


}


?>