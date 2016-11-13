<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 0:24
 */


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    Auth::login($login, $pass);
    if (Auth::isAuth('admin')){
        header("Location: /admin");
    }else if (Auth::isAuth('user')){
        header("Location: /");
    }else{
        $errmsg = 'bad credintials';
        $smarty = Zend_Registry::get('smarty');
        $smarty->assign('errmsg', $errmsg);
        echo $smarty->fetch('admin/login.tpl');
    }
    exit();
}else{
    if (Auth::isAuth('admin')){
        header("Location: /admin");
        exit();
    }
    $smarty = Zend_Registry::get('smarty');
    $smarty->assign('login', Auth::getLogin());
    $smarty->assign('errmsg', '');
    echo $smarty->fetch('admin/login.tpl');
}