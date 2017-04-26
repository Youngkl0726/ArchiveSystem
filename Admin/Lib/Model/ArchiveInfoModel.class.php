<?php
    class ArchiveInfoModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('ARCH_CODE','require','档号必填'),
        array('ARCH_NAME','require','档案题名必填'),
        array('ARCH_CODE','','该档号已经存在！',0,'unique',1),
        );
    // 定义自动完成
 }
?>