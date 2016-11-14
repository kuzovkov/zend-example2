<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 17:56
 */

class Post extends Model{

    public function __construct(){
        parent::__construct();
        $this->title = 'Статьи';
        $this->entity = 'Post';
    }

    public function getPosts($limit){
        $q = $this->db->select()->from('post', array('id', 'title', 'body', 'img', 'updated_at'))->order(array('updated_at DESC', 'title'))->limit($limit);
        $posts = $this->db->fetchAll($q);
        for($i = 0; $i < count($posts); $i++){
            $id = $posts[$i]['id'];
            $q = $this->db->select()->from(array('t' => 'tag'),array('name'))->join(array('pt'=>'post_tags'), 't.id=pt.tag_id',array())->where('pt.post_id='.$id);
            $tags = $this->db->fetchCol($q);
            $posts[$i]['tags'] = $tags;
        }
        return $posts;
    }


    public function getNextPosts($limit, $n){
        $q = $this->db->select()->from('post', array('id', 'title', 'body', 'img', 'updated_at'))->order(array('updated_at DESC', 'title'))->limit($limit, $n);
        $posts = $this->db->fetchAll($q);
        for($i = 0; $i < count($posts); $i++){
            $id = $posts[$i]['id'];
            $q = $this->db->select()->from(array('t' => 'tag'),array('name'))->join(array('pt'=>'post_tags'), 't.id=pt.tag_id',array())->where('pt.post_id='.$id);
            $tags = $this->db->fetchCol($q);
            $posts[$i]['tags'] = $tags;
        }
        return $posts;
    }


}