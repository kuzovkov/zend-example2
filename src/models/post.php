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
        $now = date('Y/m/d', time());
        $this->schema_edit['updated_at']['default'] = $now;

    }

    /**
     * Получение первых постов
     * @param $limit
     * @return mixed
     */
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

    /**
     * Получение последующих постов
     * @param $limit
     * @param $n
     * @return mixed
     */
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

    /**
     * Переопределяем метод getlist для добавления данных о тегах
     * @param null $param
     * @return mixed
     */
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

    /**
     * Возвращает все существующие теги
     * @return mixed
     */
    public function getObjects(){
        $q = $this->db->select()->from('tag');
        $tags = $this->db->fetchAll($q);
        return $tags;
    }

    /**
     * переопределяем метод create
     * создание нового объекта сущности
     * */
    public function create(){
        if ($this->set != null){
            $row = array();
            foreach($this->set as $key=>$val){
                if ($key == 'tags') continue;
                $row[$key] = $val;
                if ($this->schema_edit[$key]['type'] == 'datetime'){
                    $dt = new DateTime($val);
                    $row[$key] = $dt->format('Y-m-d H:i:s');
                }
            }
            $this->db->insert($this->table, $row);
            $id = $this->db->lastInsertId();
            $tag_ids = explode(',', $this->set->tags);
            foreach($tag_ids as $tag_id){
                $this->addTag($id, $tag_id);
            }
            return $id;
        }
        return false;
    }

    /**
     * Добавление тега
     * @param $post_id Id статьи
     * @param  $tag_id Id тега
     */
    public function addTag($post_id, $tag_id){
        $table = 'post_tags';
        $q = $this->db->select()->from($table)->where('post_id='.$post_id)->where('tag_id='.$tag_id);
        $tags = $this->db->fetchAll($q);
        if (is_array($tags) && count($tags)) return;
        $row = array('tag_id' => $tag_id, 'post_id' => $post_id);
        $this->db->insert($table, $row);
    }

    /**
     * Удаление тега
     * @param $post_id Id статьи
     * @param  $tag_id Id тега
     */
    public function removeTag($post_id, $tag_id){
        $table = 'post_tags';
        $where = array(
            $this->db->quoteInto('tag_id=?',$tag_id),
            $this->db->quoteInto('post_id=?',$post_id),
        );
        $this->db->delete($table, $where);
    }

    /**
     * переопределяем метод delete для коррктного записей о тегах
     * @param $id
     */
    public function delete($id){
        $table = 'post_tags';
        $where = $this->db->quoteInto('post_id=?', $id);
        $this->db->delete($table, $where);
        parent::delete($id);

    }

    /**
     * Возвращает теги для указанного поста
     * @param $id
     */
    public function getTags($id){
        $id = intval($id);
        $q = $this->db->select()->from(array('t' => 'tag'),array('id','name'))->join(array('pt'=>'post_tags'), 't.id=pt.tag_id',array())->where('pt.post_id='.$id);
        $tags = $this->db->fetchAll($q);
        return $tags;
    }


    /**
     * Переопределение метода getOne
     * Получение одного экземпляра сущности
     * @param $id
     */
    public function getOne($id){
        $post = parent::getOne($id);
        $tags = $this->getTags($id);
        $post['tags'] = $tags;
        return $post;
    }



}