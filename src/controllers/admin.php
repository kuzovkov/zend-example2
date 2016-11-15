<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 18:16
 */

class Admin extends Controller{

    protected $login = '';
    protected $field_name = 'pictures';

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
     * показ списка объектов сущности
     * */
    public function showlist(){
        if (isset($_GET['entity'])){
            $entity = $_GET['entity'];
            $this->loadModel($entity);
            if (isset($_GET['col']) && array_key_exists($_GET['col'],$this->model->schema_list)){
                $order = (isset($_GET['order']) && in_array($_GET['order'], array('ASC','DESC')))? $_GET['order'] : 'ASC';
                $list = $this->model->getlist(array($_GET['col']=>$order));
                $this->data['order'] = ($order == 'ASC')? 'DESC' : 'ASC';
            }else
            {
                $list = $this->model->getlist();
            }
            $this->data['list'] = $list;
            $this->data['model'] = $this->model;
            $this->data['upload_dir'] = $this->config->path->upload_dir;
            echo $this->view->render('admin/crud/list.tpl', array('data' => $this->data, 'login'=>$this->login, ));
        }else{
            header('Location: /admin');
            exit();
        }
    }


    /**
     * создание объекта сущности
     * */
    public function create(){
        if (isset($_GET['entity'])){
            $entity = $_GET['entity'];
            $this->loadModel($entity);
            if ($_SERVER['REQUEST_METHOD'] == 'GET'){
                $this->data['model'] = $this->model;
            }else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                //print_r($req->post); exit();
                foreach($_POST as $key => $val){
                    if (array_key_exists($key, $this->model->schema_edit)){
                        $this->model->set->{$key} = $val;
                    }
                }
                //print_r($model->set);exit();
                $this->model->create();
                header("Location: /admin/showlist/?entity=" . $entity);
            }
            $this->data['action'] = 'create';
            $this->data['upload_dir'] = $this->config->path->upload_dir;
            echo $this->view->render('admin/crud/edit.tpl', array('data' => $this->data, 'login'=>$this->login));
        }else{
            header("Location: /admin");
        }
    }


    /**
     * редактирование объекта сущности
     * */
    public function edit(){
        if (isset($_GET['entity']) && isset($_GET['id'])){
            $entity = $_GET['entity'];
            $this->loadModel($entity);
            $id = intval($_GET['id']);
            if ($_SERVER['REQUEST_METHOD'] == 'GET'){
                $object = $this->model->getOne($id);
                $this->data['model'] = $this->model;
                $this->data['object'] = $object;
                $this->data['action'] = 'edit';
                $this->data['upload_dir'] = $this->config->path->upload_dir;
            }else if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                foreach($_POST as $key => $val){
                    if (array_key_exists($key, $this->model->schema_edit)){
                        $this->model->set->{$key} = $val;
                    }
                }
                $this->model->update($id);
                header("Location: /admin/showlist/?entity=".$entity);
            }
            echo $this->view->render('admin/crud/edit.tpl', array('data' => $this->data, 'login'=> $this->login));
        }else{
            header("Location: /admin");
        }
    }


    /**
     * удаление объекта сущности
     * */
    public function delete(){
        if (isset($_GET['entity']) && isset($_GET['id'])){
            $entity = $_GET['entity'];
            $this->loadModel($entity);
            $id = intval($_GET['id']);
            try{
                $this->model->delete($id);
            }catch(Exception $ex){
                header("Location: /admin/showlist/?entity=".$entity);
            }

        }
        header("Location: /admin/showlist/?entity=".$entity);
    }


    /**
     * Загрузка изображений
     */
    public function upload(){
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $this->data['upload_url'] = '/admin/upload';
            $this->data['field_name'] = $this->field_name;
            echo $this->view->render('admin/upload.tpl',array('data'=>$this->data, 'login'=>$this->login));
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            //file_put_contents('post_data.txt', print_r($req->server));exit();
            if (!file_exists($this->config->path->upload_dir) || !is_dir($this->config->path->upload_dir)){
                if (!mkdir($this->config->path->upload_dir)) {
                    http_response_code(500);
                    return false;
                }
            }
            if (isset($_FILES[$this->field_name])){
                if ($_FILES[$this->field_name]['error'] == 0){
                    $original_name = $_FILES[$this->field_name]['name'];
                    $tmp_name = $_FILES[$this->field_name]['tmp_name'];
                    $name = $original_name;
                    $name = $this->base64_encode_ext($original_name) . substr($original_name, strrpos($original_name,'.'));
                    $decoded = base64_decode(file_get_contents($tmp_name));
                    file_put_contents($tmp_name, $decoded);
                    $size = filesize($tmp_name);
                    $type = $_FILES[$this->field_name]['type'];
                    if(move_uploaded_file($tmp_name, $this->config->path->upload_dir.'/'.$name)){
                        echo round($size/1024) . ' Kb saved';
                        if (isset($_POST['makethumb'])){
                            $percent = intval($_POST['percent']);
                            $thumb_name = 'thumb_'.$percent.'_'.$name;
                            echo ($this->makeThumbnailScale($this->config->path->upload_dir.'/'.$name, $this->config->path->upload_dir.'/'.$thumb_name, $type, $percent))? ' ;thumb: OK' : ' ;thumb: Fail';
                        }
                        return true;
                    }else{
                        http_response_code(500);
                        return false;
                    }
                }
            }
        }
        http_response_code(500);
        return false;
    }


    /**
     * Загрузка изображений 2 вариант
     */
    public function upload2()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $this->data['upload_url'] = '/admin/upload2';
            $this->data['field_name'] = $this->field_name;
            echo $this->view->render('admin/upload2.tpl', array('data' => $this->data, 'login'=>$this->login));
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $file_field = $this->field_name;
            //print_r($_FILES); exit();
            if (isset($_FILES[$file_field])) {
                $files = $_FILES[$file_field];
                if (isset($files['error'])) {
                    foreach ($files['error'] as $index => $error) {
                        if ($error == 0) {
                            if (strpos($files['type'][$index], 'image') === 0) {
                                $tmp_name = $files['tmp_name'][$index];
                                $original_name = $files['name'][$index];
                                $name = $this->base64_encode_ext($original_name) . substr($original_name, strrpos($original_name,'.'));
                                move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT'] . '/' . $this->config->path->upload_dir. '/' . $name);
                            }
                        }
                    }
                }
            }
            header('Location: /admin/upload2');
        }
    }


    /**
     * кодирование данных
     * @param $str
     * @return mixed|string
     */
    private function base64_encode_ext($str){
        $result = base64_encode($str);
        $result = str_replace('+','-',$result);
        $result = str_replace('/','_',$result);
        return $result;
    }


    /**
     * декодирование данных
     * @param $str
     * @return mixed|string
     */
    private function base64_decode_ext($str){
        $result = str_replace('-','+',$str);
        $result = str_replace('_','/',$result);
        $result = base64_decode($result);
        return $result;
    }


    /**
     * преобразование закодированного имени в оригинальное
     * @param $name
     * @return mixed|string
     */
    public function name2original_name($name){
        return $this->base64_decode_ext(substr($name, 0, strrpos($name, '.')));
    }



    /**
     *  Make thumbnail for image
     * @param string $imgBig Filename big image
     * @param string $imgSmall Filename small image
     * @param string $type MIME-Type of image file
     * @param int $size Width of small image
     * @param bool $side Size is width or height
     * @return bool true if Ok or false if fail
     **/
    private function makeThumbnailScale( $imgBig, $imgSmall, $type, $percent )
    {
        list($width, $height) = getimagesize($imgBig);
        $newwidth = round($width * $percent/100);
        $newheight = round($height * $percent/100);
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        if ( $type == 'image/jpeg' ){
            $source = imagecreatefromjpeg($imgBig);
        }
        elseif ( $type == 'image/gif' ){
            $source = imagecreatefromgif($imgBig);
        }
        elseif ( $type == 'image/png' ){
            $source = imagecreatefrompng($imgBig);
        }
        else return false;
        if ( imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height))
        {
            if ( $type == 'image/jpeg' ){
                imagejpeg($thumb,$imgSmall);
            }
            elseif ( $type == 'image/gif' ){
                imagegif($thumb,$imgSmall);
            }
            elseif ( $type == 'image/png' ){
                imagepng($thumb,$imgSmall);
            }
            return true;
        }
        return false;
    }//end func


    /**
     *  Make thumbnail for image
     * @param string $imgBig Filename big image
     * @param string $imgSmall Filename small image
     * @param string $type MIME-Type of image file
     * @param int $size Width of small image
     * @param bool $side Size is width or height
     * @return bool true if Ok or false if fail
     **/
    private function makeThumbnailSize( $imgBig, $imgSmall, $type, $size, $side = true )
    {
        list($width, $height) = getimagesize($imgBig);
        $percent = ( $side )? $size / $width : $size / $height;
        $newwidth = $width * $percent;
        $newheight = $height * $percent;
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        if ( $type == 'image/jpeg' ){
            $source = imagecreatefromjpeg($imgBig);
        }
        elseif ( $type == 'image/gif' ){
            $source = imagecreatefromgif($imgBig);
        }
        elseif ( $type == 'image/png' ){
            $source = imagecreatefrompng($imgBig);
        }
        else return false;
        if ( imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height))
        {
            if ( $type == 'image/jpeg' ){
                imagejpeg($thumb,$imgSmall);
            }
            elseif ( $type == 'image/gif' ){
                imagegif($thumb,$imgSmall);
            }
            elseif ( $type == 'image/png' ){
                imagepng($thumb,$imgSmall);
            }
        }
    }//end func


    /**
     * вывод изображений
     */
    public function imglist(){
        $files = scandir($this->config->path->upload_dir);
        $images = array();
        if (is_array($files) && count($files)){
            foreach($files as $file){
                if ($file == '.' || $file == '..' || strpos($file, 'thumb') === 0 || $file == 'default.png') continue;
                $images[] = array('name'=>$file, 'origin_name'=>$this->name2original_name($file));
            }
        }
        echo $this->view->render('admin/img_list.tpl', array('upload_dir'=>$this->config->path->upload_dir, 'images'=>$images));
    }


    /**
     * вывод изображений для выбора
     */
    public function imglist_select(){
        $files = scandir($this->config->path->upload_dir);
        $images = array();
        if (is_array($files) && count($files)){
            foreach($files as $file){
                if ($file == '.' || $file == '..' || strpos($file, 'thumb') === 0 || $file == 'default.png') continue;
                $images[] = array('name'=>$file, 'origin_name'=>$this->name2original_name($file));
            }
        }
        echo $this->view->render('admin/crud/img_list_select.tpl', array('upload_dir'=>$this->config->path->upload_dir, 'images'=>$images));
    }


    /**
     * удаление изображений
     */
    public function delimages(){
        foreach($_POST as $name => $val){
            $name = trim(str_replace('_','.',$name));
            $fullname = $_SERVER['DOCUMENT_ROOT'] . '/' . $this->config->path->upload_dir . '/' . $name;
            //echo $fullname;
            if (file_exists($fullname)) unlink($fullname);
            if (file_exists('thumb_' . $fullname)) unlink('thumb_' . $fullname);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    /**
     * добавление тега к статье
     * @param $params массив параметров
     */
    public function addtag(){
        if (isset($_GET['tag']) && isset($_GET['obj'])){
            $post_id = intval($_GET['obj']);
            $tag_id = intval($_GET['tag']);
            $this->loadModel('Post');
            $this->model->addTag($post_id, $tag_id);
            echo $post_id, $tag_id;
        }
    }

    /**
     * удаление тега у статьи
     * @param $params массив параметров
     */
    public function removetag(){
        if (isset($_GET['tag']) && isset($_GET['obj'])){
            $post_id = intval($_GET['obj']);
            $tag_id = intval($_GET['tag']);
            $this->loadModel('Post');
            $this->model->removeTag($post_id, $tag_id);
            echo $post_id, $tag_id;
        }
    }

    /**
     * вывод актуального состояния тегов
     * @param $params массив параметров
     */
    public function showtags(){
        if (isset($_GET['obj'])){
            $post_id = intval($_GET['obj']);
            $this->loadModel('Post');
            $post_tags = $this->model->getTags($post_id);
            $data = array('model' => $this->model);
            echo $this->view->render('admin/crud/objects.tpl', array('data' => $data, 'value' => $post_tags));
        }
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

    /**
     * Заливка дампа БД
     * @throws Exception
     */
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

}