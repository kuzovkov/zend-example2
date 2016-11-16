<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 17:34
 */

class Mod{}

class Controller{
    
    protected $view = null;
    protected $config = null;
    protected $model = null;
    
    public function __construct(){
        $this->view = new View();
        $this->config = Zend_Registry::get('config');
        $this->model = new Mod();
    }
    
    public function loadModel($name){
        $filename = $this->config->path->models_dir . DIRECTORY_SEPARATOR . strtolower($name) . '.php';
        if (file_exists($filename)){
            require_once ($filename);
            $this->model->{$name} = null;
            $this->model->{$name} = new $name();
        }else{
            throw new Exception("Model $name does't exists!");
        }
    }


}