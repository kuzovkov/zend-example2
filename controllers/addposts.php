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
    $q = $db->select()->from('post', array('id', 'title', 'body', 'img', 'updated_at'))->order(array('updated_at DESC', 'title'))->limit(5, $n);
    $posts = $db->fetchAll($q);
    for($i = 0; $i < count($posts); $i++){
        $id = $posts[$i]['id'];
        $q = $db->select()->from(array('t' => 'tag'),array('name'))->join(array('pt'=>'post_tags'), 't.id=pt.tag_id',array())->where('pt.post_id='.$id);
        $tags = $db->fetchCol($q);
        $posts[$i]['tags'] = $tags;
    }

    $smarty = Zend_Registry::get('smarty');
    $smarty->assign('posts', $posts);
    $smarty->assign('upload_dir', 'upload');

    echo $smarty->fetch('posts.tpl');
