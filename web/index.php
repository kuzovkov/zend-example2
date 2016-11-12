<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 11.11.16
 * Time: 12:24
 */

require_once '../include/config.php';
require_once '../include/bootstrap.php';

$controllers = 'controllers/';
$scripts = 'scripts/';
$root_dir = ''; /*если скрипт не в корневом каталоге сервера*/
$routes = array(
    '/' => $controllers . 'index.php',
    '404' => $controllers . '404.php',
    '/addposts' => $controllers . 'addposts.php',

    /*

    '/file' => $controllers . 'file.php',
    '/login' => $controllers . 'login.php',
    '/auth' => $scripts . 'auth.php',
    '/settings' => $controllers . 'settings.php',
    '404' => $controllers . '404.php',
    '/upload' => $scripts . 'upload.php',
    '/get_email_data' => $scripts . 'get_email_data.php',
    '/del-all' => array($scripts . 'action.php',array('action' => 'del-all')),
    '/mark-as-nosend' => array($scripts . 'action.php',array('action' => 'mark-as-nosend')),
    '/mark-as-send' => array($scripts . 'action.php',array('action' => 'mark-as-send')),
    '/del-sended' => array($scripts . 'action.php',array('action' => 'del-sended')),
    '/set-data' => $controllers . '/email_form.php',
    '/sended' => array($controllers . 'index.php', array('type'=>'sended')),
    '/nosended' => array($controllers . 'index.php', array('type'=>'nosended')),
    '/reset-db' => array($scripts . 'action.php', array('action' => 'reset-db')),
    '/get-list-emails' => $controllers . 'list_data.php',
    '/send-email' => array($scripts . 'action.php', array('action' => 'send-email')),
    '/images' => $controllers . 'img.php',
    '/img-upload' => $scripts . 'img_upload.php',
    '/del-images' => $scripts . 'img_del.php',
    '/save-data' => $scripts . 'save_data.php'echo $n; exit();

    */
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
    if (isset($routes[$uri])){
        if(is_array($routes[$uri])){
            if (isset($routes[$uri][1]) && is_array($routes[$uri][1]))
                foreach($routes[$uri][1] as $key => $val)
                    $_GET[$key] = $val;
            $require = '../' . $routes[$uri][0];
        }else{
            $require = '../' . $routes[$uri];
        }
    }else{
        $require = '../' . $routes['404'];
    }
    require_once ($require);
}else{
    echo 'Access not allow';
}
