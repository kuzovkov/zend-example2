<?php
/* Smarty version 3.1.30, created on 2016-11-14 01:18:49
  from "/var/www/vhosts/test5/templates/admin/upload_dump.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5828e6c94ca5b4_47496678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2230d21ba59fe3b29cb51d48bd14d53ac3dd33e3' => 
    array (
      0 => '/var/www/vhosts/test5/templates/admin/upload_dump.tpl',
      1 => 1479075478,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/layout.tpl' => 1,
  ),
),false)) {
function content_5828e6c94ca5b4_47496678 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4795990895828e6c94c4322_65306243', "content");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12656333095828e6c94c92c9_36354358', "bottom_js");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_4795990895828e6c94c4322_65306243 extends Smarty_Internal_Block
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
class Block_12656333095828e6c94c92c9_36354358 extends Smarty_Internal_Block
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
