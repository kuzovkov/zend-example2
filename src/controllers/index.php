<?php


    class Index extends Controller{
        

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $limit = 5;
            $this->loadModel('Post');
            $posts = $this->model->Post->getPosts($limit);
            echo $this->view->render('index.tpl', array('posts'=>$posts, 'upload_dir' => $this->config->path->upload_dir));
        } 
        
        public function addposts(){
            $limit = 5;
            $n = (isset($_GET['n']))? intval($_GET['n']) : 0;
            $this->loadModel('Post');
            $posts = $this->model->Post->getNextPosts($limit, $n);
            echo $this->view->render('posts.tpl', array('posts'=>$posts, 'upload_dir' => $this->config->path->upload_dir));
        }

        public function _404(){
            echo $this->view->render('404.tpl');
        }
        
        public function login(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $login = $_POST['login'];
                $pass = $_POST['pass'];
                Auth::login($login, $pass);
                if (Auth::isAuth('admin')){
                    header("Location: /admin");
                }else if (Auth::isAuth('user')){
                    header("Location: /");
                }else{
                    echo $this->view->render('admin/login.tpl', array('errmsg' => 'bad credintials'));
                }
                exit();
            }else{
                if (Auth::isAuth('admin')){
                    header("Location: /admin");
                    exit();
                }
                $login = Auth::getLogin();
                echo $this->view->render('admin/login.tpl', array('login'=>$login, 'errmsg' => ''));
            }
        }


        public function logout(){
            Auth::logout();
            //header("Content-Type: text/html; charset=utf8");
            header("Location: /");
            exit();
        }
        
    }



