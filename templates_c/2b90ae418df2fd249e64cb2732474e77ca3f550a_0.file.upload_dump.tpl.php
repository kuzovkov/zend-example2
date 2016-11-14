<?php
/* Smarty version 3.1.30, created on 2016-11-14 19:16:50
  from "/var/www/vhosts/test5/src/templates/admin/upload_dump.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5829e3729e1ed5_24962060',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2b90ae418df2fd249e64cb2732474e77ca3f550a' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/upload_dump.tpl',
      1 => 1479075478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/layout.tpl' => 1,
  ),
),false)) {
function content_5829e3729e1ed5_24962060 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4766528015829e3729dc887_27823978', "content");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8928822315829e3729e0e45_70726954', "bottom_js");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_4766528015829e3729dc887_27823978 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="left">
        <h3>Заливка базы данных</h3>

        <p>Заливка дампа базы mysql в базу <b><?php echo $_smarty_tpl->tpl_vars['data']->value['db_name'];?>
</b></p>
        <p>Все прежние данные в базе <b><?php echo $_smarty_tpl->tpl_vars['data']->value['db_name'];?>
</b> будут потеряны!</p>

        <form method="post" action="<?php echo $_smarty_tpl->tpl_vars['data']->value['upload_url'];?>
" enctype="multipart/form-data">
        <input type="file" name="<?php echo $_smarty_tpl->tpl_vars['data']->value['field_name'];?>
" required="required"/><br/>
        <button> Загрузить </button>
        </form>
    </div>


<?php
}
}
/* {/block "content"} */
/* {block "bottom_js"} */
class Block_8928822315829e3729e0e45_70726954 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/javascript">
    App.switchMenu('recovery');
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "bottom_js"} */
}
