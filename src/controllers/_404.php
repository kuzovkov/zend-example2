<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 19:10
 */

class _404 extends Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        http_response_code(404);
        echo $this->view->render('404.tpl');
    }


}