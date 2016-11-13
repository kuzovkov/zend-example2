<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 1:09
 */

/**
 * дамп БД
 */

    $dump_name = $_SERVER['SERVER_NAME'] . '.dump.sql';
    ob_start();
    $h_temp = tmpfile();
    $tmp_file_metadata = stream_get_meta_data($h_temp);
    $tmp_file_name = $tmp_file_metadata['uri'];
    //tmp_file_name;

    $config = Zend_Registry::get('config');
    $db_name = $config->db->params->dbname;
    $db_user = $config->db->params->username;
    $db_pass = $config->db->params->password;
    $comm = 'mysqldump -u' . $db_user . ' -p' . $db_pass . ' --opt --databases ' . $db_name . ' > ' . $tmp_file_name;
    //echo $comm;
    system($comm);
    header('Content-Disposition: attachment; filename=' . basename($dump_name));
    header('Content-Length: ' . filesize($tmp_file_name));
    header('Keep-Alive: timeout=5; max=100');
    header('Connection: Keep-Alive');
    header('Content-Type: application/octet-stream');
    ob_end_clean();
    readfile($tmp_file_name);

