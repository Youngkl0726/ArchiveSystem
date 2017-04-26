<?php
    class KeywordModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('KEYWORD_NUM','require','主题词编号必填'),
        array('KEYWORD','require','主题词必填'),
        array('KEYWORD_NUM','','该主题词编号已经存在！',0,'unique',1),
         // 在新增的时候验证num字段是否唯一
        array('KEYWORD','','该主题词已经存在！',0,'unique',1),
         // 在新增的时候验证name字段是否唯一
        );
    // 定义自动完成
 }
?>