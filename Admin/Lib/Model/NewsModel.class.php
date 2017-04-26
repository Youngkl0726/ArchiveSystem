<?php
    class NewsModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('TITLE','require','标题必须'),
        array('CONTENT','require','内容必须'),
        );
    // 定义自动完成
    protected $_auto    =   array(
        array('pub_time','time',1,'function'),
        );
 }
?>