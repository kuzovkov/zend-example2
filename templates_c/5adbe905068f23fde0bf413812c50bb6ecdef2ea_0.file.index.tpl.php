<?php
/* Smarty version 3.1.30, created on 2016-11-14 01:05:49
  from "/var/www/vhosts/test5/templates/admin/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5828e3bdd56a59_80264249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5adbe905068f23fde0bf413812c50bb6ecdef2ea' => 
    array (
      0 => '/var/www/vhosts/test5/templates/admin/index.tpl',
      1 => 1479071964,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/layout.tpl' => 1,
  ),
),false)) {
function content_5828e3bdd56a59_80264249 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8456544645828e3bdd54c81_40835109', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_8456544645828e3bdd54c81_40835109 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


admin index page
<?php
}
}
/* {/block "content"} */
}
