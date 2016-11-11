<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 11.11.16
 * Time: 12:25
 */

$MYSQL_HOST		= "127.0.0.1";
$MYSQL_POST 	= "3306";
$MYSQL_USER 	= "root";
$MYSQL_PASSWORD = "rootroot";
$MYSQL_DB 		= "test3";

$root = dirname(__FILE__);

$config = array(
    // Настройки соединения с БД
    'db'    => array(
        // Адаптер
        'adapter'   => 'Mysqli',
        // Параметры
        'params'    => array(
            'host'          => $MYSQL_HOST,
            'port'          => $MYSQL_POST,
            'username'      => $MYSQL_USER,
            'password'      => $MYSQL_PASSWORD,
            'dbname'        => $MYSQL_DB,
            //'charset'       => 'utf8',
            'profiler'      => false,
        ),
    ),

    'path' => array('library' => $root . '/Zend')
);




$paths = implode(':', array ('/opt/ZendFramework-1.12.0/library', $config['path']['library'], get_include_path()));

// Пути по которым происходит поиск подключаемых файлов, это папка библиотек, моделей и системных файлов
set_include_path($paths);