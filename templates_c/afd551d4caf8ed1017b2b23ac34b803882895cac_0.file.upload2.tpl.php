<?php
/* Smarty version 3.1.30, created on 2016-11-14 23:06:13
  from "/var/www/vhosts/test5/src/templates/admin/upload2.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582a1935ec3a93_77395248',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'afd551d4caf8ed1017b2b23ac34b803882895cac' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/upload2.tpl',
      1 => 1479152788,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/layout.tpl' => 1,
    'file:admin/simple_upload_form.tpl' => 1,
  ),
),false)) {
function content_582a1935ec3a93_77395248 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_825073910582a1935ebf212_37036854', "content");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_615795353582a1935ec29f2_93333186', "bottom_js");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_825073910582a1935ebf212_37036854 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h4><a href="/admin">Home</a> -> Upload</h4>
<h3>Изображения</h3>

<?php $_smarty_tpl->_subTemplateRender("file:admin/simple_upload_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php
}
}
/* {/block "content"} */
/* {block "bottom_js"} */
class Block_615795353582a1935ec29f2_93333186 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

   <?php echo '<script'; ?>
 type="text/javascript">
        App.switchMenu('upload2');
   <?php echo '</script'; ?>
>
<?php
}
}
/* {/block "bottom_js"} */
}
