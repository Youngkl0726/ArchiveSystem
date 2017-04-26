<?php
    class StoreroomModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('STOREROOM_NAME','require','库房名称必须'),
        array('STOREROOM_NAME','','该库房名称已经存在！',0,'unique',1),
        
        );
    // 定义自动完成
 }
?>