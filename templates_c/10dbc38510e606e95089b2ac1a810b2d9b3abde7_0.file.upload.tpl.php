<?php
/* Smarty version 3.1.30, created on 2016-11-14 22:46:44
  from "/var/www/vhosts/test5/src/templates/admin/upload.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582a14a4b76d09_42549307',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10dbc38510e606e95089b2ac1a810b2d9b3abde7' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/upload.tpl',
      1 => 1479152783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/layout.tpl' => 1,
    'file:admin/upload_form_multi.tpl' => 1,
  ),
),false)) {
function content_582a14a4b76d09_42549307 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1717930148582a14a4b733d5_19481885', "content");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_170090527582a14a4b76319_70844809', "bottom_js");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_1717930148582a14a4b733d5_19481885 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h4><a href="/admin">Home</a> -> Upload</h4>
<h3>Изображения</h3>

<?php $_smarty_tpl->_subTemplateRender("file:admin/upload_form_multi.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php
}
}
/* {/block "content"} */
/* {block "bottom_js"} */
class Block_170090527582a14a4b76319_70844809 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

   <?php echo '<script'; ?>
 type="text/javascript">
        App.switchMenu('upload');
   <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "bottom_js"} */
}
