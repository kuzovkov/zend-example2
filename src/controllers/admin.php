<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 18:16
 */

class Admin extends Controller{

    protected $login = '';

    public function __construct(){
        parent::__construct();

        if (!Auth::isAuth('admin')){
            header('Location: /');
            exit();
        }

        $this->login = Auth::getLogin();
    }
    
    public function index(){
        $models = $this->_getModels();
        echo $this->view->render('admin/index.tpl', array('login' => $this->login, 'models' => $models));
    }

    /**
     * дамп БД
     */
    public function backup(){
        $dump_name = $_SERVER['SERVER_NAME'] . '.dump.sql';
        ob_start();
        $h_temp = tmpfile();
        $tmp_file_metadata = stream_get_meta_data($h_temp);
        $tmp_file_name = $tmp_file_metadata['uri'];
        //tmp_file_name;

        $db_name = $this->config->db->params->dbname;
        $db_user = $this->config->db->params->username;
        $db_pass = $this->config->db->params->password;
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
    }

    public function recovery(){
        $db_name = $this->config->db->params->dbname;
        $db_user = $this->config->db->params->username;
        $db_pass = $this->config->db->params->password;
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $data['upload_url'] = '/admin/recovery';
            $data['field_name'] = 'db_dump';
            $data['db_name'] = $db_name;
            echo $this->view->render('admin/upload_dump.tpl', array('data'=>$data, 'login' => $this->login));
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
    }

    private function _getModels(){
        $files = scandir($this->config->path->models_dir);
        $models = array();
        foreach($files as $file){
            if ($file == '.' || $file == '..') continue;
            $fullname = $this->config->path->models_dir . DIRECTORY_SEPARATOR . $file;
            if (file_exists($fullname)){
                require_once ($fullname);
                $model_class_name = ucfirst(substr($file, 0, strpos($file, '.')));
                $models[] = new $model_class_name();
            }
        }
        return $models;
    }

    public function showlist(){
        print_r($_POST);
    }

    public function create(){
        print_r($_POST);
    }
}