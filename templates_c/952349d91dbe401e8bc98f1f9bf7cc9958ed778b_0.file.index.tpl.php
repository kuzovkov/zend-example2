<?php
/* Smarty version 3.1.30, created on 2016-11-14 20:04:57
  from "/var/www/vhosts/test5/src/templates/admin/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5829eeb9a7a920_03820674',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '952349d91dbe401e8bc98f1f9bf7cc9958ed778b' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/index.tpl',
      1 => 1479143094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/layout.tpl' => 1,
  ),
),false)) {
function content_5829eeb9a7a920_03820674 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21237293345829eeb9a74529_57698755', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21357397485829eeb9a795c4_96216001', "bottom_js");
?>


<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_21237293345829eeb9a74529_57698755 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


    <div class="myinfo">
        <table class="table">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['models']->value, 'model');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['model']->value) {
?>
            <tr>
                <td>
                    <p><a href="#"><?php echo $_smarty_tpl->tpl_vars['model']->value->title;?>
</a></p>
                </td>
                <td>
                    <p><form method="post" action="/admin/create"">
                    <input type="hidden" name="entity" value="<?php echo $_smarty_tpl->tpl_vars['model']->value->entity;?>
"/>
                    <button>Create New</button></form></p>
                </td>

                <td>
                    <p><form method="post" action="/admin/showlist">
                        <input type="hidden" name="entity" value="<?php echo $_smarty_tpl->tpl_vars['model']->value->entity;?>
"/>
                        <button>List</button>
                    </form></p>
                </td>
            </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>

    </div>
<?php
}
}
/* {/block "content"} */
/* {block "bottom_js"} */
class Block_21357397485829eeb9a795c4_96216001 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/javascript">
    App.switchMenu('home');
<?php echo '</script'; ?>
>
<?php
}
}
/* {/block "bottom_js"} */
}
