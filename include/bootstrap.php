<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 12.11.16
 * Time: 21:20
 */


require_once('Zend/Loader/Autoloader.php');
require_once('Smarty/Smarty.class.php');

$loader = Zend_Loader_Autoloader::getInstance ();
$loader->setFallbackAutoloader ( true );
$config = new Zend_Config ( $config );
Zend_Registry::set ( 'config', $config );

$config = Zend_Registry::get('config');
$db = Zend_Db::factory($config->db);
Zend_Db_Table_Abstract::setDefaultAdapter($db);
Zend_Registry::set('db', $db);


$smarty = new Smarty();
$smarty->config_dir = $config->path->root . '/configs/';
$smarty->template_dir = $config->path->root . '/src/templates/';
$smarty->compile_dir = $config->path->root . '/templates_c/';
$smarty->plugins_dir = $config->path->root . '/include/Smarty/plugins/';
//$smarty->caching = Smarty::CACHING_LIFETIME_CURRENT;

Zend_Registry::set('smarty', $smarty);

