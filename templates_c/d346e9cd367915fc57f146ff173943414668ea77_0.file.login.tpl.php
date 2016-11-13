<?php
/* Smarty version 3.1.30, created on 2016-11-14 01:03:00
  from "/var/www/vhosts/test5/templates/admin/login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5828e314500876_80141810',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd346e9cd367915fc57f146ff173943414668ea77' => 
    array (
      0 => '/var/www/vhosts/test5/templates/admin/login.tpl',
      1 => 1479074528,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/login_layout.tpl' => 1,
  ),
),false)) {
function content_5828e314500876_80141810 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8459163605828e3144fd665_10342923', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/login_layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_8459163605828e3144fd665_10342923 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<style>
.novalid
{
   border: 1px solid red;
}
.novalid-message
{
   color: red;
}
.form-group input
{
    width: 400px;
    margin: 0 auto 0 auto;
}
.login-form
{
    text-align: center;
}
</style>
<?php if ($_smarty_tpl->tpl_vars['errmsg']->value) {?>
<p class="novalid-message"><?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>
</p>
<?php }?>

<form method="post" action="/login">
    <div class="login-form">
        <div class="form-group">
            <input type="login" class="form-control" name="login" placeholder="Имя">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Пароль">
        </div>
        <button type="submit" id="login-btn" class="btn btn-default">Войти</button>
    </div>
</form>


<?php
}
}
/* {/block "content"} */
}
