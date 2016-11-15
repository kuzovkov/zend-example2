<?php
/* Smarty version 3.1.30, created on 2016-11-15 23:17:42
  from "/var/www/vhosts/test5/src/templates/admin/crud/objects.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582b6d66c70fd6_79656318',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '329f049a7b037393f70ad7a5c519ae58e797b84a' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/crud/objects.tpl',
      1 => 1479238251,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582b6d66c70fd6_79656318 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="inner-object-wrap">
    <?php if (isset($_smarty_tpl->tpl_vars['value']->value)) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['value']->value, 'obj');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['obj']->value) {
?>
            <a href="#" id="<?php echo $_smarty_tpl->tpl_vars['obj']->value['id'];?>
" class="inner-object" title="Удалить"><?php echo $_smarty_tpl->tpl_vars['obj']->value['name'];?>
</a>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    <?php }?>
    </div>

    <?php $_smarty_tpl->_assignInScope('array_object', $_smarty_tpl->tpl_vars['data']->value['model']->getObjects());
?>
    <hr/>
    Выберите из существующих:
    <div class="all-object-wrap">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['array_object']->value, 'obj');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['obj']->value) {
?>
        <a href="#" id="<?php echo $_smarty_tpl->tpl_vars['obj']->value['id'];?>
" class="all-object" title="Добавить"><?php echo $_smarty_tpl->tpl_vars['obj']->value['name'];?>
</a>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


</div><?php }
}
