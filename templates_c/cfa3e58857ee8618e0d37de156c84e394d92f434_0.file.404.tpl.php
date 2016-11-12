<?php
/* Smarty version 3.1.30, created on 2016-11-12 22:59:30
  from "/var/www/vhosts/test5/templates/404.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582774a2b21792_71242888',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfa3e58857ee8618e0d37de156c84e394d92f434' => 
    array (
      0 => '/var/www/vhosts/test5/templates/404.tpl',
      1 => 1478979502,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_582774a2b21792_71242888 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1470474843582774a2b203c0_83908137', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_1470474843582774a2b203c0_83908137 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <h3>Ничего не найдено</h3>
<?php
}
}
/* {/block "content"} */
}
