<?php
/* Smarty version 3.1.30, created on 2016-11-15 23:27:33
  from "/var/www/vhosts/test5/src/templates/admin/crud/object_array_edit.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582b6fb5d49354_07479665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c39e9024bb020793e6d174672a9c409a44627842' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/crud/object_array_edit.tpl',
      1 => 1479241651,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582b6fb5d49354_07479665 (Smarty_Internal_Template $_smarty_tpl) {
?>
<link rel="stylesheet" href="/css/style.css" type="text/css" media="screen, projection" />

<div id="objects-wrap">
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


    </div>
</div>

<?php echo '<script'; ?>
>
    function setHandlers(){
        $('.inner-object').click(function(event){
            event.preventDefault();
            var id = this.id;
            $.get('/admin/removetag/?obj=<?php echo $_smarty_tpl->tpl_vars['data']->value['object']['id'];?>
&tag='+id, function(data){
                console.log(data);
                updateObjectsWrap();
            });
        });
        $('.all-object').click(function(event){
            event.preventDefault();
            var id = this.id;
            $.get('/admin/addtag/?obj=<?php echo $_smarty_tpl->tpl_vars['data']->value['object']['id'];?>
&tag='+id, function(data){
                console.log(data);
                updateObjectsWrap();
            });
        });
    }
    function updateObjectsWrap(){
        $('#objects-wrap').load('/admin/showtags/?obj=<?php echo $_smarty_tpl->tpl_vars['data']->value['object']['id'];?>
', function(){
            setHandlers();
        });
    }
    setHandlers();
<?php echo '</script'; ?>
><?php }
}
