<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 1:09
 */

/**
 * заливка дампа в БД
 */

    $config = Zend_Registry::get('config');
    $db_name = $config->db->params->dbname;
    $db_user = $config->db->params->username;
    $db_pass = $config->db->params->password;
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        $data['upload_url'] = '/admin/recovery';
        $data['field_name'] = 'db_dump';
        $data['db_name'] = $db_name;
        $smarty = Zend_Registry::get('smarty');
        $smarty->assign('login', Auth::getLogin());
        $smarty->assign('data', $data);
        echo $smarty->fetch('admin/upload_dump.tpl');
    }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_FILES['db_dump']['tmp_name']) && file_exists($_FILES['db_dump']['tmp_name'])){
            ob_start();
            $dump_name = $_FILES['db_dump']['tmp_name'];
            $comm = 'mysql -u' . $db_user . ' -p' . $db_pass . ' < ' . $dump_name;
            system($comm);
            header('Location: /admin');
            ob_end_clean();
            exit();
        }else{
            header('Location: /admin');
        }
    }
