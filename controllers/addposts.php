<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 12.11.16
 * Time: 23:18
 */

    $n = (isset($_GET['n']))? intval($_GET['n']) : 0;
    $db = Zend_Registry::get('db');
    //var_dump($db);
    $q = $db->select()->from('post', array('id', 'title', 'body', 'img', 'updated_at'))->limit(5, $n);
    $posts = $db->fetchAll($q);
    for($i = 0; $i < count($posts); $i++){
       $posts[$i]['tags'] = array('tag1', 'tag2');
    }

    $smarty = Zend_Registry::get('smarty');
    $smarty->assign('posts', $posts);
    $smarty->assign('upload_dir', 'upload');

    echo $smarty->fetch('posts.tpl');
