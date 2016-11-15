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
                if ($this->schema_edit[$key]['type'] == 'datetime'){
                    $dt = new DateTime($val);
                    $row[$key] = $dt->format('Y-m-d H:i:s');
                }
            }
            $this->db->insert($this->table, $row);
            $id = $this->db->lastInsertId();
            return $id;
        }
        return false;
    }

    /**
     * обновление объекта сущности
     * @param id
     * */
    public function update($id){
        if ($this->set != null){
            $row = array();
            foreach($this->set as $key=>$val){
                $row[$key] = $val;
                if ($this->schema_edit[$key]['type'] == 'datetime'){
                    $dt = new DateTime($val);
                    $row[$key] = $dt->format('Y-m-d H:i:s');
                }
            }
            $where = $this->db->quoteInto('id=?', $id);
            $row_affected = $this->db->update($this->table, $row, $where);
            return $row_affected;
        }
        return false;
    }

    /**
     * удаление объекта сущности
     * @param $id
     * */
    public function delete($id){
        $where = $this->db->quoteInto('id=?', $id);
        $this->db->delete($this->table, $where);
    }

    /**
     * Получение одного экземпляра сущности
     * @param $id
     */
    public function getOne($id){
        $q = $this->db->select()->from($this->table)->where('id='.intval($id));
        $item = $this->db->fetchRow($q);
        return $item;
    }


}