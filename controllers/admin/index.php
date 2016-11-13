<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 0:08
 */

if (!Auth::isAuth('admin')){
    header('Location: /');
    exit();
}

$smarty = Zend_Registry::get('smarty');
$smarty->assign('login', Auth::getLogin());
echo $smarty->fetch('admin/index.tpl');