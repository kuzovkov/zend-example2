<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 11.11.16
 * Time: 12:29
 */




require_once('Zend/Loader/Autoloader.php');



$loader = Zend_Loader_Autoloader::getInstance ();
$loader->setFallbackAutoloader ( true );
$config = new Zend_Config ( $config );
Zend_Registry::set ( 'config', $config );

$config = Zend_Registry::get('config');
$db = Zend_Db::factory($config->db);
Zend_Db_Table_Abstract::setDefaultAdapter($db);
Zend_Registry::set('db', $db);

function check_active($str){
	return false;
}

