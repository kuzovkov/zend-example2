<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 17:37
 */

class View{

    private $smarty = null;

    public function __construct(){
        $this->smarty = Zend_Registry::get('smarty');
    }


    public function render($template, $data = array()){
        if (is_array($data)){
            foreach($data as $key => $val){
                $this->smarty->assign($key, $val);
            }
            return $this->smarty->fetch($template);
        }else{
            throw new Exception('parameter 2 must bee array!');
        }
    }

}