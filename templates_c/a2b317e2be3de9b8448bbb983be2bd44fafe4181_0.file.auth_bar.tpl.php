<?php
/* Smarty version 3.1.30, created on 2016-11-14 19:15:46
  from "/var/www/vhosts/test5/src/templates/admin/auth_bar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5829e3322fa6d1_35271017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2b317e2be3de9b8448bbb983be2bd44fafe4181' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/auth_bar.tpl',
      1 => 1479074468,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5829e3322fa6d1_35271017 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="nav navbar-nav navbar-right">

<?php if ($_smarty_tpl->tpl_vars['login']->value) {?><li><a href="/logout" id="login" class="menu">Logout (<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
)</a></li><?php }?>

</ul><?php }
}
