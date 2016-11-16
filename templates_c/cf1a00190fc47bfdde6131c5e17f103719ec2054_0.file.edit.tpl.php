<?php
/* Smarty version 3.1.30, created on 2016-11-16 20:27:52
  from "/var/www/vhosts/test5/src/templates/admin/crud/edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582c97182de056_04306805',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf1a00190fc47bfdde6131c5e17f103719ec2054' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/crud/edit.tpl',
      1 => 1479317269,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:admin/layout.tpl' => 1,
    'file:admin/crud/object_array_edit.tpl' => 1,
    'file:admin/crud/object_array_create.tpl' => 1,
    'file:admin/crud/tinymce.tpl' => 1,
    'file:admin/crud/select_image.tpl' => 1,
  ),
),false)) {
function content_582c97182de056_04306805 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/var/www/vhosts/test5/include/Smarty/plugins/modifier.date_format.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1626968956582c97182cb738_75053514', "content");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1674736737582c97182dc4e8_83610875', "bottom_js");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:admin/layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_1626968956582c97182cb738_75053514 extends Smarty_Internal_Block
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
</style>

<h4><a href="/admin">Home</a> -> <a href="/admin/showlist/?entity=<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
</a> -> <?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;?>
</h4>
<h3><?php echo $_smarty_tpl->tpl_vars['data']->value['model']->title;?>
</h3>
<form onsubmit="return validate();" method="POST" action="/admin/<?php echo $_smarty_tpl->tpl_vars['data']->value['action'];?>
/?entity=<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->entity;
if (isset($_smarty_tpl->tpl_vars['data']->value['object'])) {?>&id=<?php echo $_smarty_tpl->tpl_vars['data']->value['object']['id'];
}?>" enctype="application/x-www-form-urlencoded">
<table class="table">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit, 'val', false, 'col');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['col']->value => $_smarty_tpl->tpl_vars['val']->value) {
if ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['visible']) {?>
<tr>
	<td><?php echo $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['name'];?>
</td>
    <td>

        <?php if (isset($_smarty_tpl->tpl_vars['data']->value['object'])) {?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'text') {?>
                <?php $_smarty_tpl->_assignInScope('value', $_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value]);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'datetime') {?>
                <?php $_smarty_tpl->_assignInScope('value', smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value],"%Y/%m/%d"));
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'date') {?>
                <?php $_smarty_tpl->_assignInScope('value', smarty_modifier_date_format($_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value],"%Y/%m/%d"));
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'array') {?>data.model.schema_edit[col]
                <?php $_smarty_tpl->_assignInScope('value', implode($_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value],","));
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'img') {?>
                <?php $_smarty_tpl->_assignInScope('value', $_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value]);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'integer') {?>
                <?php $_smarty_tpl->_assignInScope('value', $_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value]);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'object_array') {?>
                <?php $_smarty_tpl->_assignInScope('value', $_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value]);
?>
            <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'string') {?>
                <?php $_smarty_tpl->_assignInScope('value', $_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value]);
?>
            <?php }?>

            <?php if ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'checkbox') {?>
                <?php if ($_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value]) {?>
                    <?php $_smarty_tpl->_assignInScope('checked', 'checked');
?>
                <?php } else { ?>
                    <?php $_smarty_tpl->_assignInScope('checked', '');
?>
                <?php }?>
            <?php } else { ?>
                 <?php $_smarty_tpl->_assignInScope('checked', '');
?>
            <?php }?>
        <?php } else { ?>
            <?php if (isset($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['default'])) {?>
                <?php $_smarty_tpl->_assignInScope('value', $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['default']);
?>
            <?php } else { ?>
                <?php $_smarty_tpl->_assignInScope('value', '');
?>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'checkbox') {?>
                <?php if (isset($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['default']) && $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['default']) {
$_smarty_tpl->_assignInScope('checked', 'checked');
} else {
$_smarty_tpl->_assignInScope('checked', '');
}?>
            <?php } else { ?>
                <?php $_smarty_tpl->_assignInScope('checked', '');
?>
            <?php }?>
        <?php }?>
        <?php $_smarty_tpl->_assignInScope('disabled', '');
?>
        <?php if (isset($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['enabled'])) {
if (!$_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['enabled']) {
$_smarty_tpl->_assignInScope('disabled', 'disabled');
}
}?>
        <?php $_smarty_tpl->_assignInScope('required', '');
?>
        <?php if (isset($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['required'])) {
if ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['required']) {
$_smarty_tpl->_assignInScope('required', 'required');
}
}?>

        <?php if ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'select') {?>
            <p>
                <select name="<?php echo $_smarty_tpl->tpl_vars['col']->value;?>
">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['options'], 'opt');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['opt']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['opt']->value == $_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value]) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </select>
            </p>
        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'multiselect') {?>
            <p>
                <select multiple name="<?php echo $_smarty_tpl->tpl_vars['col']->value;?>
[]">
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['options'], 'opt');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['opt']->value) {
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['opt']->value == $_smarty_tpl->tpl_vars['data']->value['object'][$_smarty_tpl->tpl_vars['col']->value]) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['opt']->value;?>
</option>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </select>
            </p>
        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'text') {?>
            <textarea name="<?php echo $_smarty_tpl->tpl_vars['col']->value;?>
" type="<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'];?>
" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['class'])) {?> class="<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['class'];?>
" <?php }?>><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
</textarea>


        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'img') {?>

            <img id="img-preview" width="100" height="75"  src="<?php if ($_smarty_tpl->tpl_vars['value']->value == '') {?>/<?php echo $_smarty_tpl->tpl_vars['data']->value['upload_dir'];?>
/default.png<?php } else { ?>/<?php echo $_smarty_tpl->tpl_vars['data']->value['upload_dir'];?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value;
}?>" <?php if (isset($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['class'])) {?> class="<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['class'];?>
" <?php }?>/>
            <input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['col']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" id="img-value"/>
            <a href="#" id="open-images">Изображения</a>

        <?php } elseif ($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'] == 'object_array') {?>
            <?php if ($_smarty_tpl->tpl_vars['data']->value['action'] == 'edit') {?>
                <?php $_smarty_tpl->_subTemplateRender("file:admin/crud/object_array_edit.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php } else { ?>
                <?php $_smarty_tpl->_subTemplateRender("file:admin/crud/object_array_create.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            <?php }?>
        <?php } else { ?>
            <p><input name="<?php echo $_smarty_tpl->tpl_vars['col']->value;?>
" type="<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['type'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php echo $_smarty_tpl->tpl_vars['checked']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['disabled']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['required']->value;?>
 <?php if (isset($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['class'])) {?> class="<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['class'];?>
" <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['placeholder'])) {?> placeholder="<?php echo $_smarty_tpl->tpl_vars['data']->value['model']->schema_edit[$_smarty_tpl->tpl_vars['col']->value]['placeholder'];?>
" <?php }?>/></p>
        <?php }?>
    </td>
</tr>
<?php }
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


</table>
<button><?php if ($_smarty_tpl->tpl_vars['data']->value['action'] == 'edit') {?> Save <?php } else { ?> Create <?php }?></button>

</form>

<?php $_smarty_tpl->_subTemplateRender("file:admin/crud/tinymce.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:admin/crud/select_image.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php
}
}
/* {/block "content"} */
/* {block "bottom_js"} */
class Block_1674736737582c97182dc4e8_83610875 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

   <?php echo '<script'; ?>
 type="text/javascript">
        App.switchMenu('home');
   <?php echo '</script'; ?>
>
   <?php echo '<script'; ?>
 type="text/javascript" src="/js/validate.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript">
        $(function() {
            $( "input.datetime" ).datepicker();
        });
    <?php echo '</script'; ?>
>

    <?php echo '<script'; ?>
>
    <?php echo '</script'; ?>
>

<?php
}
}
/* {/block "bottom_js"} */
}
