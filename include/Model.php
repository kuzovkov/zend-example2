<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 17:37
 */

class Model{

    protected $db = null;
    protected $config = null;
    public $title = '';
    public $entity = '';

    public function __construct(){
        $this->db = Zend_Registry::get('db');
        $this->config = Zend_Registry::get('config');
    }


}