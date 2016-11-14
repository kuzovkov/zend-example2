<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 11.11.16
 * Time: 12:24
 */
session_start();
require_once ('../include/common.inc.php');

$config = Zend_Registry::get('config');
$controllers = $config->path->controllers_dir;
$root_dir = ''; /*если скрипт не в корневом каталоге сервера*/

$routes = array(
    '/' => array('controller' => 'index', 'action'=>'index'),
    '404' => array('controller' => '_404', 'action'=>'index'),
    '/addposts' => array('controller' => 'index', 'action'=>'addposts'),
    '/admin/' =>array('controller' => 'admin', 'action'=>'index'),
    '/admin' =>array('controller' => 'admin', 'action'=>'index'),
    '/login' => array('controller' => 'index', 'action'=>'login'),
    '/logout' => array('controller' => 'index', 'action'=>'logout'),
    '/admin/upload' => array('controller' => 'admin', 'action'=>'upload'),
    '/admin/upload2' => array('controller' => 'admin', 'action'=>'upload2'),
    '/admin/backup' => array('controller' => 'admin', 'action'=>'backup'),
    '/admin/recovery' => array('controller' => 'admin', 'action'=>'recovery'),
    '/admin/showlist' => array('controller' => 'admin', 'action'=>'showlist'),
    '/admin/create' => array('controller' => 'admin', 'action'=>'create'),
    '/admin/imglist' => array('controller' => 'admin', 'action'=>'imglist'),
    '/admin/delimages' => array('controller' => 'admin', 'action'=>'delimages'),
    '/admin/imglist_select' => array('controller' => 'admin', 'action'=>'imglist_select'),
);


/*роутинг*/
if (isset($_SERVER['REQUEST_URI'])){
    $real_uri = $_SERVER['REQUEST_URI'];

    if (($p = strpos($real_uri, '?')) === false){
        $uri = substr($real_uri, 0);
    }else{
        $uri = substr($real_uri, 0, strpos($real_uri, '?') - 1);
    }
    /*учет случая когда скрипт не в корневом каталоге сервера*/
    if (strlen($root_dir) && strpos($uri, $root_dir) === 0){
        $uri = substr($uri, strlen($root_dir));
    }

    if (isset($routes[$uri]) && is_array($routes[$uri])){
        if (isset($routes[$uri]['controller'])){
            $controller_name = $routes[$uri]['controller'];
        } else{
            $controller_name = $routes['404']['controller'];
        }
    }else{
        $controller_name = $routes['404']['controller'];
    }

    if (file_exists($controllers . DIRECTORY_SEPARATOR . $controller_name . '.php')) {
        require_once ($controllers . DIRECTORY_SEPARATOR. $controller_name . '.php');
        $controller_class_name = ucfirst($controller_name);
        $controller_instance = new $controller_class_name();
        $action = (isset($routes[$uri]['action']))? $routes[$uri]['action'] : 'index';

        $controller_instance->$action();
    }else{
        throw new Exception('Controller class not exists!');
    }
}else{
    echo 'Access not allow';
}
