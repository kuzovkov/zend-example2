<?php
/* Smarty version 3.1.30, created on 2016-11-14 22:28:04
  from "/var/www/vhosts/test5/src/templates/admin/crud/list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582a10444771f5_65316816',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16df6086ed42733e2c960c73b228b0f9c6d4ab97' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/crud/list.tpl',
      1 => 1479151682,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/layout.tpl' => 1,
  ),
),false)) {
function content_582a10444771f5_65316816 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/vhosts/test5/include/Smarty/plugins/modifier.date_format.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1071616869582a104446f372_84337786', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_249632540582a10444760a7_98356741', "bottom_js");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_1071616869582a104446f372_84337786 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




<h4><a href="/admin">Home</a> -> <?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
</h4>
<h3><?php echo $_smarty_tpl->tpl_vars['data']->value['model']->title;?>
</h3>

<p>
<form method="get" action="/admin/create/<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
">
    <button>Create New</button>
</form>
</p>
<table class="table">
    <tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['model']->schema_list, 'val', false, 'col');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['col']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['visible']) {?>
        <th><a href="/admin/showlist/?entity=<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
&col=<?php echo $_smarty_tpl->tpl_vars['col']->value;?>
&order=<?php if (isset($_smarty_tpl->tpl_vars['data']->value['order'])) {
echo $_smarty_tpl->tpl_vars['data']->value['order'];
}?>"><?php echo $_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['name'];?>
</a></th>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['list'], 'object');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['object']->value) {
?>
    <tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['model']->schema_list, 'val', false, 'col');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['col']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['visible']) {?>
        <?php if ($_smarty_tpl->tpl_vars['col']->value == 'id') {?>
        <td><a title="Edit" href="/admin/edit/<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
/<?php echo $_smarty_tpl->tpl_vars['object']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['object']->value['id'];?>
</a></td>
        <?php } else { ?>
        <?php if ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'string') {?>
        <td><?php echo preg_replace('!<[^>]*?>!', ' ', $_smarty_tpl->tpl_vars['object']->value[$_smarty_tpl->tpl_vars['col']->value]);?>
</td>
        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'text') {?>
        <td><?php echo $_smarty_tpl->tpl_vars['object']->value[$_smarty_tpl->tpl_vars['col']->value];?>
</td>
        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'datetime') {?>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['object']->value[$_smarty_tpl->tpl_vars['col']->value],"%Y/%m/%d %H:%i:%s");?>
</td>
        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'date') {?>
        <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['object']->value[$_smarty_tpl->tpl_vars['col']->value],"%Y/%m/%d");?>
</td>
        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'img') {?>
        <td><img width="50" height="50" src="/<?php echo $_smarty_tpl->tpl_vars['data']->value['upload_dir'];?>
/<?php echo $_smarty_tpl->tpl_vars['object']->value[$_smarty_tpl->tpl_vars['col']->value];?>
"/></td>
        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'boolean') {?>
        <td><?php if ($_smarty_tpl->tpl_vars['object']->value[$_smarty_tpl->tpl_vars['col']->value]) {?> busy <?php }?></td>
        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'object_array') {?>
        <td>
            <?php $_smarty_tpl->_assignInScope('objects', $_smarty_tpl->tpl_vars['object']->value[$_smarty_tpl->tpl_vars['col']->value]);
?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['objects']->value, 'obj');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['obj']->value) {
?>
            <?php echo $_smarty_tpl->tpl_vars['obj']->value;?>
&nbsp;
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </td>
        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_list[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'array') {?>
        <td><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['object']->value[$_smarty_tpl->tpl_vars['col']->value], 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?> <?php echo $_smarty_tpl->tpl_vars['item']->value;?>
 <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</td>
        <?php }?>
        <?php }?>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <td>
            <form onsubmit="return confirmDelete(<?php echo $_smarty_tpl->tpl_vars['object']->value['id'];?>
);" method="get" action="/admin/delete/<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
/<?php echo $_smarty_tpl->tpl_vars['object']->value['id'];?>
"><button>Delete</button></form>
        </td>
        <td>
            <form method="get" action="/admin/edit/<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
/<?php echo $_smarty_tpl->tpl_vars['object']->value['id'];?>
"><button>Edit</button></form>
        </td>

    </tr>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


</table>


<?php
}
}
/* {/block "content"} */
/* {block "bottom_js"} */
class Block_249632540582a10444760a7_98356741 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/javascript">
    App.switchMenu('home');

    function confirmDelete(id){
        return confirm('Would you like delete item ' + id);
    }
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block "bottom_js"} */
}