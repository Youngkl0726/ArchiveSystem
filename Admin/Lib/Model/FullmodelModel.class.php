<?php
    class FullmodelModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('FULL_MODEL_NUM','require','全宗编号必填'),
        array('FULL_MODEL_NAME','require','全宗名称必填'),
        array('FULL_MODEL_NUM','','该全宗编号已经存在！',0,'unique',3),
         // 在新增的时候验证num字段是否唯一
        array('FULL_MODEL_NAME','','该全宗名称已经存在！',0,'unique',3),
         // 在新增的时候验证name字段是否唯一
        );
    // 定义自动完成
 }
?>