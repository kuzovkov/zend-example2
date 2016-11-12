<?php
/* Smarty version 3.1.30, created on 2016-11-12 23:16:38
  from "/var/www/vhosts/test5/templates/404.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582778a6093b82_06600896',
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
function content_582778a6093b82_06600896 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
$_smarty_tpl->compiled->nocache_hash = '754003672582778a6083232_31288171';
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1539510510582778a6092a91_66435339', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_1539510510582778a6092a91_66435339 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <h3>Ничего не найдено</h3>
<?php
}
}
/* {/block "content"} */
}
