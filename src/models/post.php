<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 17:56
 */

class Post extends Model{


    /**
     * @var array массив определяющий показ списка статей в админке
     */
    public $schema_list = array(
        'id' => array('type'=>'integer','visible'=>true,'name'=>'id'),
        'title' => array('type'=>'string','visible'=>true,'name'=>'Заголовок'),
        'body' => array('type'=>'text','visible'=>true,'name'=>'Текст'),
        'img' => array('type'=>'img','visible'=>true,'name'=>'Изображение'),
        'tags' => array('type'=>'object_array','visible'=>true,'name'=>'Тэги'),
        'updated_at' => array('type'=>'date','visible'=>true,'name'=>'Создано/Обновлено'),
    );

    /**
     * @var array массив определяющий создание формы при редактировании и создании статьи
     */
    public $schema_edit = array(
        'id' => array('type'=>'integer','visible'=>true,'name'=>'id','enabled'=>false),
        'title' => array('type'=>'string','visible'=>true,'name'=>'Заголовок'),
        'body' => array('type'=>'text','visible'=>true,'name'=>'Текст', 'class'=>'html'),
        'img' => array('type'=>'img','visible'=>true,'name'=>'Изображение'),
        'tags' => array('type'=>'object_array','visible'=>true,'name'=>'Теги'),
        'updated_at' => array('type'=>'datetime','visible'=>true,'name'=>'Создано/Обновлено', 'class'=>'datetime'),
    );



    public function __construct(){
        parent::__construct();
        $this->title = 'Статьи';
        $this->entity = 'Post';
        $this->table = 'post';
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

    public function getlist($param=null){
        if ($param != null && is_array($param) && count($param)){
            foreach($param as $col=>$ord){
                $column = $col;
                $order = $ord;
            }
            $q = $this->db->select()->from($this->table)->order(array($column . ' ' . $order));
        }else{
            $q = $this->db->select()->from($this->table);
        }
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