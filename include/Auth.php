<?php
/**
 * Class Auth класс аутентификациии
 */
class Auth{

    /*зашитые аккаунты по-умолчанию*/
    static public $account = array(
        'admin' => array('hash' => '21232f297a57a5a743894a0e4a801fc3', 'role' => array('admin')),
        //'user1' => array('hash' => '24c9e15e52afc47c225b757e7bee1f9d', 'role' => array('user')),
        //'user2' => array('hash' => '7e58d63b60197ceb55a1c487989a3720', 'role' => array('user')),
        //'user3' => array('hash' => '92877af70a45fd6a2ed7fe81e1236b78', 'role' => array('user'))

    );

    static public function login($login, $pass){
        if (isset($_SESSION)){
            $hash = self::makeHash($pass);
            if ( self::checkPass($login, $hash)){
                $_SESSION['login'] = $login;
                $_SESSION['hash'] = $hash;
            }else{
                self::logout();
            }

        }
    }

    static public function logout(){
        if (isset($_SESSION)){
            $_SESSION['login'] = '';
            $_SESSION['hash'] = '';
        }
    }

    static private function checkPass($login, $hash){
        //self::getAccounts();
        if (!is_array(self::$account) && !count(self::$account)) return false;
        if (isset(self::$account[$login])){
            if (self::$account[$login]['hash'] == $hash) return true;
        }
        return false;
    }

    static public function isAuth($role){
        if (!isset($_SESSION['login']) || !isset($_SESSION['hash'])) return false;
        $login = $_SESSION['login'];
        $hash = $_SESSION['hash'];

        if (self::checkPass($login, $hash)){
            $roles = self::getRoles($login);
            if (in_array($role, $roles)) return true;
        }
        return false;
    }

    static public function makeHash($str){
        return md5($str);
    }

    static public function getLogin(){
        return (isset($_SESSION['login']))? $_SESSION['login'] : '';
    }


    static private function getRoles($login){
        return (isset(self::$account[$login]))? self::$account[$login]['role'] : null;
    }

    /*
    static private function getAccounts(){
        $um = new UserModel();
        $users = $um->getlist();
        foreach($users as $user){
            $userdata = array('hash' => $user->getHash(), 'role' => $user->getRole());
            self::$account[$user->getLogin()] = $userdata;
        }
    }
    */

}
