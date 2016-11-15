<?php
/**
 * Created by PhpStorm.
 * User: user1
 * Date: 14.11.16
 * Time: 17:56
 */

class Tag extends Model{


    /**
     * @var array массив определяющий показ списка тегов в админке
     */
    public $schema_list = array(
        'id' => array('type'=>'integer','visible'=>true,'name'=>'id'),
        'name' => array('type'=>'string','visible'=>true,'name'=>'Имя Тега'),
    );
    
    /**
     * @var array массив определяющий создание формы при редактировании и создании тега
     */
    public $schema_edit = array(
        'id' => array('type'=>'integer','visible'=>true,'name'=>'id', 'enabled'=>false),
        'name' => array('type'=>'string','visible'=>true,'name'=>'Имя Тега'),
    );


    public function __construct(){
        parent::__construct();
        $this->title = 'Теги';
        $this->entity = 'Tag';
        $this->table = 'tag';
    }

    /**
     * переопределяем метод create для предотвращения
     * создания одинаковых тегов
     */
    public function create(){
        try{
            parent::create();
        }catch(Exception $e){

        }

    }

}