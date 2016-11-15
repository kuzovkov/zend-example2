<?php
/* Smarty version 3.1.30, created on 2016-11-15 21:09:14
  from "/var/www/vhosts/test5/src/templates/admin/crud/object_array_create.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582b4f4a202434_11387656',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ac850d47b935738f6cbfb5e231dc726af4c6126' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/crud/object_array_create.tpl',
      1 => 1479233352,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582b4f4a202434_11387656 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen, projection" />

<div id="objects-wrap">
    <div class="inner-object-wrap" id="inner-object-wrap">
        <?php if (isset($_smarty_tpl->tpl_vars['value']->value) && is_array($_smarty_tpl->tpl_vars['value']->value)) {?>
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


    </div>
</div>

<input id="object_array_input" type="hidden" name="tags" value="" />

<?php echo '<script'; ?>
>
    var objectId = [];
    function setHandlers(){
        $('.all-object').click(function(event){
            event.preventDefault();
            var id = this.id;
            var name = this.text;
            if (objectId.indexOf(id) == -1){
                objectId.push(id);
                $('#object_array_input').val(objectId.join(','));
                $('#inner-object-wrap').append('<a href="#" id="'+id+'" class="inner-object" title="Удалить">'+name+'</a>');
                $('.inner-object').click(function(event){
                    event.preventDefault();
                    var id = this.id;
                    $(this).remove();
                    for (var i = 0; i < objectId.length; i++){
                        if ((objectId[i]) == id)
                            objectId.splice(i,1);
                    }
                    $('#object_array_input').val(objectId.join(','));
                });
            }
        });
    }
    setHandlers();
<?php echo '</script'; ?>
>
<?php }
}
