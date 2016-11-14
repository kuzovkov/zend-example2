<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 17:56
 */

class Tag extends Model{

    public function __construct(){
        parent::__construct();
        $this->title = 'Теги';
        $this->entity = 'Tag';
    }
    
}