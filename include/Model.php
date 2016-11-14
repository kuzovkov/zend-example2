<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 17:37
 */
/**
 * Class Set класс для хранения имен полей их значений у сущности
 */
class Set{}


class Model{

    protected $db = null;
    protected $config = null;
    public $title = '';
    public $entity = '';
    public $table = '';
    public $set = null;

    public function __construct(){
        $this->db = Zend_Registry::get('db');
        $this->config = Zend_Registry::get('config');
        $this->set = new Set();
    }

    /**
    * получение массива объектов представляющих сущность
     * @param param array('field_name'=>'ASC/DESC')
     * */
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
        $items = $this->db->fetchAll($q);
        return $items;
    }

     /**
     * создание нового объекта сущности
     * */
    public function create(){
        if ($this->set != null){
            $row = array();
            foreach($this->set as $key=>$val){
                $row[$key] = $val;
            }
            $this->db->insert($this->table, $row);
            $id = $this->db->lastInsertId();
            return $id;
        }
        return false;
    }


}