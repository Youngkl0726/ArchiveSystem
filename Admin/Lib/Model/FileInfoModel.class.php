<?php
    class FileInfoModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('FILE_CODE','require','文件编号必填'),
        array('RESP_HOLDER','require','责任人必填'),
        array('FILE_CODE','','该文件编号已经存在！',0,'unique',3),
        // array('FILE_CODE','','该文件编号已经存在！',0,'unique',1),
        );
    // 定义自动完成
 }
?>