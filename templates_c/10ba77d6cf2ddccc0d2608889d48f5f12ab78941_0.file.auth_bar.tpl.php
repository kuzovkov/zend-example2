<?php
/* Smarty version 3.1.30, created on 2016-11-14 01:01:36
  from "/var/www/vhosts/test5/templates/admin/auth_bar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5828e2c0b61927_82785963',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10ba77d6cf2ddccc0d2608889d48f5f12ab78941' => 
    array (
      0 => '/var/www/vhosts/test5/templates/admin/auth_bar.tpl',
      1 => 1479074468,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5828e2c0b61927_82785963 (Smarty_Internal_Template $_smarty_tpl) {
?>
<ul class="nav navbar-nav navbar-right">

<?php if ($_smarty_tpl->tpl_vars['login']->value) {?><li><a href="/logout" id="login" class="menu">Logout (<?php echo $_smarty_tpl->tpl_vars['login']->value;?>
)</a></li><?php }?>

</ul><?php }
}
