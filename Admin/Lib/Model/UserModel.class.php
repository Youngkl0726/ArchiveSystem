<?php
    class UserModel extends Model {
    // 定义自动验证
    protected $_validate    =   array(
        array('USER_NAME','require','用户名必须'),
        array('PASSWORD','require','密码必须'),
        array('EMAIL','require','邮箱必须'),
        array('USER_NAME','','帐号名称已经存在！',0,'unique',1),);
    // 定义自动完成
    protected $_auto    =   array(
        array('USER_STATUS','1'),
        // array('NEEDLOG','1'),
        );
    
 }
?>