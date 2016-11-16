<?php
/* Smarty version 3.1.30, created on 2016-11-16 20:25:03
  from "/var/www/vhosts/test5/src/templates/admin/crud/list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582c966f5fb1f7_96423038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16df6086ed42733e2c960c73b228b0f9c6d4ab97' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/crud/list.tpl',
      1 => 1479317097,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/layout.tpl' => 1,
  ),
),false)) {
function content_582c966f5fb1f7_96423038 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/vhosts/test5/include/Smarty/plugins/modifier.date_format.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_690286898582c966f5f0e78_45710465', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_749087913582c966f5f98b0_36041173', "bottom_js");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_690286898582c966f5f0e78_45710465 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>




<h4><a href="/admin">Home</a> -> <?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
</h4>
<h3><?php echo $_smarty_tpl->tpl_vars['data']->value['model']->title;?>
</h3>

<p>
<a href="/admin/create/?entity=<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
">
    <button>Create New</button>
</a>
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
            <a class="del-btn" id="del-<?php echo $_smarty_tpl->tpl_vars['object']->value['id'];?>
" href="/admin/delete/?entity=<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
&id=<?php echo $_smarty_tpl->tpl_vars['object']->value['id'];?>
"><button>Delete</button></a>
        </td>
        <td>
            <a href="/admin/edit/?entity=<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
&id=<?php echo $_smarty_tpl->tpl_vars['object']->value['id'];?>
"><button>Edit</button></a>
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
class Block_749087913582c966f5f98b0_36041173 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 type="text/javascript">
    App.switchMenu('home');

    $('.del-btn').click(function(event){
        //event.preventDefault();
        var id = this.id.split('-').pop();
        if (!confirmDelete(id)){
            event.preventDefault();
        }
    });

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
