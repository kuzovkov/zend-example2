<?php
/* Smarty version 3.1.30, created on 2016-11-14 22:59:05
  from "/var/www/vhosts/test5/src/templates/admin/img_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582a1789e64d08_87188845',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7051c54e645f4a1b67672857cf437522b06b429' => 
    array (
      0 => '/var/www/vhosts/test5/src/templates/admin/img_list.tpl',
      1 => 1479153149,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582a1789e64d08_87188845 (Smarty_Internal_Template $_smarty_tpl) {
?>
<hr/>
<form method="post" action="/admin/delimages">
    <div id="image-list">
        <?php if (isset($_smarty_tpl->tpl_vars['images']->value) && $_smarty_tpl->tpl_vars['images']->value) {?>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'image');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['image']->value) {
?>
        <div class="image-conteiner">
            <img src="/<?php echo $_smarty_tpl->tpl_vars['upload_dir']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['image']->value['name'];?>
" width="20%", height="20%" />
            <p><?php echo $_smarty_tpl->tpl_vars['image']->value['origin_name'];?>
&nbsp; <input class="image-checkbox" type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['image']->value['name'];?>
"/></p>
        </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>


        <?php } else { ?>
        <h3>Изображений не загружено</h3>
        <?php }?>

        <div class="clear"></div>
    </div>


    <button class="img-del-btn">Удалить отмеченные</button>
</form>
<a href="#" id="select-all-img">Отметить все</a>
<a href="#" id="unselect-all-img">Снять отметки со всех</a>

<?php echo '<script'; ?>
 type="text/javascript">
    $('#select-all-img').click(function(ev){
        ev.preventDefault();
        $('input:checkbox').prop('checked', true);
    });
    $('#unselect-all-img').click(function(ev){
        ev.preventDefault();
        $('input:checkbox').prop('checked', false);
    });
<?php echo '</script'; ?>
><?php }
}
